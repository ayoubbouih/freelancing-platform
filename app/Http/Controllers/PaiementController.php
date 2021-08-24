<?php

namespace App\Http\Controllers;
use Redirect;
use auth;
use paypal;
use App\paiement;
use App\User;
use Session;
use App\notification;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;



class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paiement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[];
        $data['items'] = [
            [
                'name' => 'beemployer.com',
                'price' => $request['price'],
                'desc'  => 'recharge de votre compte',
                'qty' => 1
            ],
            [
                'name' => 'les frais',
                'price' => $request['price']*0.044+0.3,
                'desc'  => 'les frais de paypal',
                'qty' => 1
            ],
        ];
        
        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paiement.paypalSuccess');
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        $data['total'] = $total;
        
        $p=paiement::create([
            'amount'=>$request['price'],
            'user_id'=>auth::user()->id,
            'mode_paiement'=>'paypal_request',
            'token'=>$data['invoice_id'],
            'transaction_id'=>'',
        ]);
        
        $data['cancel_url'] = route('paiement.destroy',$p->id);
        $provider = new ExpressCheckout;
        $options = [
            'BRANDNAME' => 'Beemployer',
            'LOGOIMG' => 'https://beemployer.com/images/logo2.png',
            'CHANNELTYPE' => 'Merchant'
        ];
        $provider->addOptions($options)->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data,true);
        return Redirect::to($response['paypal_link']);
    }

    public function show(paiement $paiement)
    {
        
    }

    public function edit(paiement $paiement)
    {
        //
    }

    public function update(Request $request, paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function refund($id){
        $p=paiement::find($id);
        if($p->user_id == auth::user()->id){
            if(auth::user()->solde < $p->amount)
                Session::flash('refundFailed','votre solde est inssufisant pour rembourser ce paiement');
            else{
            $provider = new ExpressCheckout;
            $response = $provider->refundTransaction($p->transaction_id);
            $user=$p->user;
            $user->solde-=$p->amount;
            $user->save();
            $p->mode_paiement="rembourssé";
            $p->save();
            Session::flash('refundSuccessed','votre paiement a été remboursé');
            }
        }
        else{
            Session::flash('refundDenied','vous avez pas le droit pour effecuter cette opération');
        }
        return redirect()->route('paiement.index');
    }
    
    public function delete($id){
        $p=paiement::find($id);
        $p->delete();
        return redirect()->route('paiement.index')->with('refundSuccessed','vous avez annulé votre demande de retrait avec succes ! ');
    }
    public function destroy($id)
    {
        
        $p=paiement::find($id);
        $p->delete();
        return redirect()->route('paiement.index');
    }
    public function paypalSuccess(Request $request,ExpressCheckout $provider) {
        $response1 = $provider->getExpressCheckoutDetails($request->token);
        $p=paiement::all()->where('token',$response1["INVNUM"])->first();
        $data['items'] = [
            [
                'name' => 'beemployer.com',
                'price' => $p->amount,
                'desc'  => 'Description goes here',
                'qty' => 1
            ],[
                'name' => 'les frais',
                'price' => $p->amount*0.044+0.3,
                'desc'  => 'les frais de paypal',
                'qty' => 1
            ],
        ];
        $data['invoice_id'] = $response1["INVNUM"];
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paiement.paypalSuccess');
        $data['cancel_url'] = route('paiement.destroy',$p->id);
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        $data['total'] = $total;
        $response2 = $provider->doExpressCheckoutPayment($data, $request->token, $request->PayerID);
        $p->transaction_id=$response2["PAYMENTINFO_0_TRANSACTIONID"];
        $p->mode_paiement="paypal";
        $p->save();
        $user=User::find($p->user_id);
        $user->solde+=$p->amount;
        $user->save();
        Session::flash('success','vous avez rechargé votre wallet par $'.$p->amount);
        return redirect()->route('paiement.index');
    }
    
    public function retraitRequest(Request $request){
        if(auth::user()->solde < $request['paypal_amount']){
            Session::flash('soldeInssifusant','vous avez pas le montant que vous voulez retirer');
            return redirect()->route('paiement.index');
        }
        $provider = new AdaptivePayments;
        $data = [
            'receivers'  => [
                [
                    'email' => $request['paypal_email'],
                    'amount' => $request['paypal_amount'],
                    'primary' => false,
                ]
            ],
            'payer' => 'SENDER',
            'return_url' => route('paiement.index'),
            'cancel_url' => route('paiement.index'),
        ];
        $response = $provider->createPayRequest($data);
        if(!isset($response['payKey'])){
            Session::flash('soldeInssifusant','veuillez vérifier votre adresse paypal');
            return redirect()->route('paiement.index');
        } 
        
        if($request['paypal_email'] != auth::user()->paypal){
            $user=auth::user();
            $user->paypal=$request['paypal_email'];
            $user->save();
        }
        $p=Paiement::create([
            'user_id'=>auth::user()->id,
            'amount'=>$request['paypal_amount'],
            'token'=>uniqid(),
            'mode_paiement'=>'en attente',
            'transaction_id'=>'',
        ]);
        $admins=User::all()->where('role_id',"==",2);
        foreach($admins as $admin){
            $n=notification::create([
                'user_id'=>$admin->id,
                'type'=>'paiement',
                'notifiable_type'=>"",
                'data'=> '',
            ]);
            $n->data=$p->user->username.' demande de retirer '.$p->amount.'$, <a href="/notification/'.$n->id.'">proceder ce paiement</a>';
            $n->save();
        }
        
        
        Session::flash('retraitRequest','les adminisstrateurs vont procéder votre paiement le plus vite possible');
        return redirect()->route('paiement.index');
    }
    public function retrait($id){
        $provider = new AdaptivePayments;
        $p=paiement::find($id);
        $data = [
            'receivers'  => [
                [
                    'email' => $p->user->paypal,
                    'amount' => $p->amount,
                    'primary' => false,
                ]
            ],
            'payer' => 'SENDER',
            'return_url' => route('paiement.paypalRetraitSuccess',$p->id),
            'cancel_url' => route('paiement.index'),
        ];
        $response = $provider->createPayRequest($data);
        if(isset($response['payKey']))
        $redirect_url = $provider->getRedirectUrl('approved', $response['payKey']);
        else{
            Session::flash('soldeInssifusant','veuillez vérifier votre adresse paypal');
            return redirect()->route('paiement.index');
        }

        return redirect($redirect_url);
    }
    public function retraitSuccess($id){
        $p=paiement::find($id);
        $p->mode_paiement="retrait vers paypal";
        $p->save();
        $p->user->solde-=$p->amount;
        $p->user->save();
        $n=notification::create([
            'user_id'=>$p->user->id,
            'type'=>'retrait success',
            'notifiable_type'=>'route("paiement.index")',
            'data'=>'',
        ]);
        $n->data="votre paiement de ".$p->amount."$ a été bien effectué, <a href='/notification/'".$n->id."'>consultez votre historique de paiement</a>";
        $n->save();
        return redirect()->route('dashboard','paiements')->withSuccess('le paiement a été effectué avec succes');
    }
    public function retraitRefus($id){
        $p=paiement::find($id);
        $p->mode_paiement="refusé";
        $p->save();
        $n=notification::create([
            'user_id'=>$p->user->id,
            'type'=>'retrait success',
            'notifiable_type'=>'route("paiement.index")',
            'data'=>'',
        ]);
        $n->data="votre paiement de ".$p->amount."$ a refusé par l'administration, <a href='/notification/'".$n->id."'>consultez votre historique de paiement</a>";
        $n->save();
    }
}
