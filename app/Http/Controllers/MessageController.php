<?php

namespace App\Http\Controllers;
use App\User;
use App\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class MessageController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('conversation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->last_activity();
        $data = $request->all();
        $validator = $request->validate([
            "textMessage" => 'required|min:1:max:255',
            "send_user"=>'required',
            'recieve_user'=>'required'
        ]);
        // $message=message::create([]); doesn't work with AJAX, still dont know why!
        $message=new message;
        $message->conversation_id=intval($data['conversationId']);
        $message->user_id=intval($data['send_user']);
        $message->recepteur_id=intval($data['recieve_user']);
        $message->type_message=Auth::User()->role->intitule=="admin"?"support":"msg";
        $message->contenu=$data['textMessage'];
        $message->save();
        $c=$message->conversation; //update conversation
        $c->updated_at=date("Y-m-d H:i:s");
        $c->save();
        
        if($request->ajax())
            return response()->json([
                'contenu'=>$message->contenu,
                'created_at'=>$message->created_at->diffForHumans()
            ]);
        else
            return redirect()->route('conversation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($message)
    {
        $this->last_activity();
        return view('message.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->last_activity();
        $data = $request->all();
        // return response()->json($request);
        if(Auth::User()->role->intitule=="admin"){
            $messages=message::where('conversation_id',$data['conversationId'])
                ->where('user_id','!=',$data['send_user'])
                // ->where('type_message','!=','support')
                // ->where('created_at','>',Carbon::now()->add(-1,'second'))
                ->where('id','>',$data['LatestMessageId'])
                ->get();
        }else{
            $messages=message::where('conversation_id',$data['conversationId'])
                ->where('user_id','!=',$data['send_user'])
                // ->where('Vu',0)
                // ->where('type_message',)
                ->where('id','>',$data['LatestMessageId'])
                ->get()->reject(function ($m) {
                    return ($m->Vu==1 && $m->type_message!="support") or ($m->Vu==2 && $m->type_message=="support");
                });
        }
        // if(!empty($messages)) $message->conversation->save(); //update conversation
        if($request->ajax()){
            $i=0;$LatestMessageId=0;$contenu=[];$created_at=[];$type_message=[];$user_img=[];
            foreach($messages as $m){
                if(Auth::User()->role->intitule!="admin"){
                    if($m->Vu==0)
                        $m->Vu=1;
                    elseif($m->Vu==1 && $m->type_message=="support")
                        $m->Vu=2;
                    $m->save();
                }
                $LatestMessageId=$m->id;
                array_push($contenu,$m->contenu);
                array_push($created_at,$m->created_at->diffForHumans());
                array_push($type_message,$m->type_message);
                array_push($user_img,$m->user->image);
                $i++;
            }
            return response()->json([
                'contenu'=>$contenu,
                'created_at'=>$created_at,
                'i'=>$i,
                'type_message'=>$type_message,
                'LatestMessageId'=>$LatestMessageId>$data['LatestMessageId']?$LatestMessageId:$data['LatestMessageId'],
                'user_img'=>$user_img
            ]);
        }else
            return redirect()->route('conversation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}
