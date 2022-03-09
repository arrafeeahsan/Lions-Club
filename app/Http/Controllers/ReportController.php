<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Club;

class ReportController extends Controller
{
    public function date(Request $request){
        $data = Payment::all();
        $clubs = Club::all();

        if($request -> ajax()){
            return response()->json([
                'report'=>$data,
                'club' => $clubs,
            ]);
        }

        //return view('member/memberlist', ['members' => $data]);
        return view('report/reportdate', compact('clubs'));
       
    }

    public function club(Request $request){
        $data = Payment::all();
        $clubs = Club::all();

        if($request -> ajax()){
            return response()->json([
                'report'=>$data,
            ]);
        }
        
        //return view('member/memberlist', ['members' => $data]);
        return view('report/reportclub', compact('clubs'));
       
    }

    public function specificClub($id){
        $data = Club::find($id)->payment;
        //$data = Payment::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
            ]);
        }
       
    }
}
