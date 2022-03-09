<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = Club::all();
        $member = Member::all();
        $total_deposit = Club::get()->sum("total_deposit");
        $total_due = Club::get()->sum("due_amount");
        $total_paid = Club::get()->sum("paid_amount");

        if($request -> ajax()){
            return response()->json([
                'club'=>$data,
            ]);
        }

        return view('home', ['clubs' => $data, 'members' => $member, 'total_deposits'=>$total_deposit, 'total_dues'=>$total_due, 'total_paids'=>$total_paid,]);
        //return $total_deposit;
    }


   
}