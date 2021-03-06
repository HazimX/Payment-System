<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CreditCardDB;
use App\Models\OnlineBankingDB;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class PaymentController extends Controller
{

     public function main() {
    return view('Main');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditcard = CreditCardDB::all();
        return view('payment.index',compact('creditcard'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'name'=>'required',
            'email' =>'required',
            'paid_amount'=>'required',
            'card_number'=>'required',
            'card_cvc'=>'required',
            'card_exp_month'=>'required',
            'card_exp_year'=>'required',

        ]); 

             $payment = new CreditCardDB([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'paid_amount' => $request['paid_amount'],
            'card_number' => $request->get('card_number'),
            'card_cvc' => $request->get('card_cvc'),
            'card_exp_month' => $request->get('card_exp_month'),
            'card_exp_year' => $request->get('card_exp_year'),
            
            
            ]);
         

        $payment->save();
        
         return redirect('payment')->with('success', 'Payment Detail Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($payment_id)
    {
        $creditcard = CreditCardDB::all();
        return view('payment.show', compact('creditcard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
