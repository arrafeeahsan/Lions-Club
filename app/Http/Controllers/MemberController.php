<?php

namespace App\Http\Controllers;
use App\Models\Club;
use App\Models\Member;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $clubs = Club::all(); 
        return view('/member/memberadd', compact('clubs'));
    }


    public function store(Request $req){
        $data = new Member;

        $data->member_id            = $req->memberid;
        $data->member_name          = $req->membername;
        $data->member_type          = $req->membertype;
        $data->member_club          = $req->memberclub;
        $data->member_phone         = $req->memberphone;
        $data->member_email         = $req->memberemail;
        $data->member_address       = $req->memberaddress;
        $data->member_father_name   = $req->memberfathername;
        $data->member_mother_name   = $req->membermothername;


        if ($req -> hasFile('memberpicture')){
            $file = $req -> file ('memberpicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/member/', $filename);
            $data->member_picture = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Member Data Added Successfully'
        ]);
    }


    public function listview(Request $request){
        $data = Member::all();
        $clubs = Club::all();

        if($request -> ajax()){
            return response()->json([
                'member'=>$data,
            ]);
        }

        //return view('member/memberlist', ['members' => $data]);
        return view('member/memberlist', compact('clubs'));

    }

    public function edit($id){
        $data = Member::find($id);
        if($data){
            return response()->json([
                'status'=>200,
                'member'=>$data,
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Member::find($id);
        
        $data->member_id            = $req->memberid;
        $data->member_name          = $req->membername;
        $data->member_type          = $req->membertype;
        $data->member_club          = $req->memberclub;
        $data->member_phone         = $req->memberphone;
        $data->member_email         = $req->memberemail;
        $data->member_address       = $req->memberaddress;
        $data->member_father_name   = $req->memberfathername;
        $data->member_mother_name   = $req->membermothername;

        if ($req -> hasFile('memberpicture')) {

            // $path = 'uploads/member/' . $data->member_picture;
            // if(File::exists($path)){
            //     File::delete($path);
            // }

            $file = $req -> file ('memberpicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/member/', $filename);
            $data->member_picture = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Member Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Member::find($id)->delete($id);

        return response ()->json([
            'status'=>200,
            'success'=> 'Record deleted successfully!'
        ]);
    }
}
