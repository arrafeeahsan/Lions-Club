<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Payment;

class ClubController extends Controller
{
     public function index(){
        return view('/club/clubadd');
    }


    public function store(Request $req){
        $data = new Club;

        $data->serial_number    = $req->serialnumber;
        $data->club_name        = $req->clubname;
        $data->president_name   = $req->presidentname;
        $data->secretary_name   = $req->secretaryname;
        $data->address          = $req->address;
        $data->total_deposit    = $req->totaldeposit;
        $data->paid_amount      = $req->paidamount;
        //$data->due_amount       = $req->dueamount;

        $data->due_amount       = $req->totaldeposit - $req->paidamount;
        $data->payment_status   = $req->paymentstatus;


        if ($req -> hasFile('clublogo')){
            $file = $req -> file ('clublogo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/club/', $filename);
            $data->club_logo = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Club Data Added Successfully'
        ]);
    }


    public function listview(Request $request){
        $data = Club::all();

        if($request -> ajax()){
            return response()->json([
                'club'=>$data,
            ]);
        }

        return view('club/clublist', ['clubs' => $data]);
    }

    public function edit($id){
        $data = Club::find($id);
        if($data){
            return response()->json([
                'status'=>200,
                'club'=>$data,
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Club::find($id);
        
        $data->serial_number    = $req->serialnumber;
        $data->club_name        = $req->clubname;
        $data->president_name   = $req->presidentname;
        $data->secretary_name   = $req->secretaryname;
        $data->address          = $req->address;
        $data->total_deposit    = $req->totaldeposit;
        $data->paid_amount      = $req->paidamount;
        //$data->due_amount       = $req->dueamount;
        $data->due_amount       = $req->totaldeposit - $req->paidamount;
        $data->payment_status   = $req->paymentstatus;

        if ($req -> hasFile('clublogo')) {

            // $path = 'uploads/club/' . $data->club_logo;
            // if(File::exists($path)){
            //     File::delete($path);
            // }

            $file = $req -> file ('clublogo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/club/', $filename);
            $data->club_logo = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Club Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Club::find($id)->delete($id);

        return response ()->json([
            'status'=>200,
            'success'=> 'Record deleted successfully!'
        ]);
    }
}
