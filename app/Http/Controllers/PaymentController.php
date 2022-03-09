<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        $clubs = Club::all(); 
        return view('/payment/paymentadd', compact('clubs'));
    }
    
    // public function index(){
    //     $prev_due = Club::find(2)->due_amount;
        
    //     return $prev_due;
    // }

    public function showDue($id){
        $data = Club::find($id);
        

         if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
            ]);
        }
    }

    public function store(Request $req, $id){
        $data = new Payment;
        

        //$payment = Payment::find($req->clubid);


        $data->past_due            = $req->pastdue;
        $data->current_payment     = $req->currentpayment;
        $data->payment_due         = $req->pastdue - $req->currentpayment;
        $data->payment_note        = $req->paymentnote;
        $data->club_serial         = $req->clubserial;
        $data->club_id             = $req->clubid;
        $data->save();



        $club = Club::find($id);
        $club->due_amount = $req->pastdue - $req->currentpayment;
        
        $stat = $req->pastdue - $req->currentpayment;

        if($stat == 0){
            $club->payment_status = 'Paid';
        }

        $prev_payment = Club::find($id)->paid_amount;
        $club->paid_amount = $prev_payment + $req->currentpayment;
  
        $club->save();



        // $due_payment->save();
        //$vehicle->cars()->where('id', $car_id)->update(['fuel' => $request->input('fuel')]);
        

        return response() -> json([
            'status'=>200,
            'message' => 'Payment Data Added Successfully',
        ]);
    }


    public function listview(Request $request){
        $data = Payment::all();
        $clubs = Club::all();

        if($request -> ajax()){
            return response()->json([
                'payment'=>$data,
            ]);
        }

        //return view('member/memberlist', ['members' => $data]);
        return view('payment/paymentlist', compact('clubs'));

    }

    public function edit($id){
        $data = Payment::find($id);
        if($data){
            return response()->json([
                'status'=>200,
                'payment'=>$data,
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Payment::find($id);
        
        $data->past_due            = $req->pastdue;
        $data->current_payment     = $req->currentpayment;
        $data->payment_due         = $req->paymentdue;
        $data->payment_note        = $req->paymentnote;
        $data->club_serial         = $req->clubserial;

        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Payment Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Payment::find($id)->delete($id);

        return response ()->json([
            'status'=>200,
            'success'=> 'Record deleted successfully!'
        ]);
    }
}
