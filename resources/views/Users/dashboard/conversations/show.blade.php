@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="{{$intitule=App\conversation::find($conversationId)->demande->poste->intitule}} | Beemployer">
<meta name="robots" content="noindex , nofollow">
<title>conversation concernant le poste: {{$intitule}} | Beemployer</title>
@endsection
@section('includes')
    <link href="{{asset('css/users/left-dashboard.css')}}" rel=stylesheet>
    <style>
        .dashboard-container{
            width: auto !important;
            flex-wrap: nowrap !important;
        }
        .fixOverFlow{
            max-height: 400px;
            min-height:282px;
            overflow: auto;
            flex-direction:column-reverse;
            transition: all .5s;
            scroll-behavior:smooth;
        }
        @media(max-width:400px){
            .fixOverFlow{
                max-height: calc(300px);
            }
        }
        .msg_envoyer, .msg_recevoir{
            min-width:100px;
        }
        .rating{display:flex;flex-direction:row-reverse;justify-content:center}
        .rating>label{position:relative;width:1em;font-size:40px;color:#ffd600;cursor:pointer}
        .rating>label::before{content:"\2605";position:absolute;opacity:0}
        .rating>label:hover:before,.rating>label:hover~label:before{opacity:1!important}
        .rating>input:checked~label:before{opacity:1}
        .rating:hover>input:checked~label:before{opacity:.4}body{background:#222225;color:#fff}
    </style>
@endsection
@section('messages','active')
@section('right')
<div class="container-fluid mt-3">
    @if(session()->has('success'))
        <div class='alert alert-success'>{{session()->get('success')}}</div>
    @endif
    @error('error')
        <div class='alert alert-danger'>{{$message}}</div>
    @enderror
    <div class="card">
        <div class="card-header py-0">
            <div class="d-flex">
                <a href="{{route('user.show',[$conversationWith['id']])}}">
                    <div class="img_cont">
                        <img src="{{asset('images')}}/{{$conversationWith['image']}}" class="rounded-circle user_img">
                        <span class="online_icon {{$conversationWith->last_activity<(time()-60)?'offline':''}}"></span>
                    </div>
                </a>
                @php $conv=App\conversation::find($conversationId) @endphp
                <div class="user_info mt-0">
                    <span>Chat avec <b>{{$conversationWith['fullname']}}</b> </span>
                    <p class="mb-0"><b><a href="{{route('projets.show',$conv->demande->poste->projet->id)}}">{{$conv->demande->poste->projet->intitule}}</a></b> - <b>{{$conv->demande->poste->intitule}}</b></p>
                    <span>Status de recrutement: <b>{{$conv->demande->recrutement?$conv->demande->recrutement->status:'pas encore recruter'}}</b></span>
                </div>
            </div>
            <span id="action_menu_btn" class="rounded text-center" style="width:20px;background:#eee"><i class="fa fa-ellipsis-v"></i></span>
            <div class="action_menu">
                <ul>
                    <li>
                        <a href="{{route('user.show',[$conversationWith['id']])}}"><i class="fa fa-user-circle"></i> Visiter le profile
                    </a></li>
                    <li>
                        @if(App\conversation::find($conversationId)->support_id)
                            <i class="fa fa-ban"></i> déjà réclamer
                        @else
                            <form method="post" action="{{route('conversation.update',$conversationId)}}" name="form_reclamer">
                                @csrf @method('PUT')
                                <input type=hidden value="reclamer" name="type">
                                <a href="#" onclick="event.preventDefault();form_reclamer.submit()"><i class="fa fa-ban"></i> Réclamer</a>
                            </form>
                        @endif
                    </li>
                    
                    @if($conv->demande->recrutement && $conv->demande->recrutement->status!="terminé")
                        @if($conv->freelancer_id==Auth::User()->id && Carbon\Carbon::now()->diffInDays($conv->demande->created_at)>=$conv->demande->duree && $conv->demande->recrutement->status!="en attente")
                            <li>
                                <form method="post" action="{{route('conversation.update',$conversationId)}}" name="form_finaliser_freelancer">
                                    @csrf @method('PUT')
                                    <input type=hidden value="finaliser_freelancer" name="type">
                                    <a href="#" onclick="event.preventDefault();form_finaliser_freelancer.submit()"><i class="fa fa-check"></i> Finaliser le recrutement</a>
                                </form>
                            </li>
                        @endif
                        @if($conv->client_id==Auth::User()->id)
                            @if($conv->demande->recrutement->status!="en attente")
                                <li>
                                    <form method="post" action="{{route('conversation.update',$conversationId)}}" name="form_finaliser_client">
                                        @csrf @method('PUT')
                                        <input type=hidden value="finaliser_client" name="type">
                                        <a href="#" onclick="event.preventDefault();form_finaliser_client.submit()"><i class="fa fa-check"></i> Finaliser le recrutement</a>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form method="post" action="{{route('conversation.update',$conversationId)}}" name="form_finaliser_client_accepter">
                                        @csrf @method('PUT')
                                        <input type=hidden value="finaliser_client_accepter" name="type">
                                        <a href="#" onclick="event.preventDefault();form_finaliser_client_accepter.submit()"><i class="fa fa-key"></i> Accepter la demande de finaliser le recrutement</a>
                                    </form>
                                </li>
                            @endif
                        @endif
                        <li>
                            <form method="post" action="{{route('conversation.update',$conversationId)}}" name="form_annuler">
                                    @csrf @method('PUT')
                                    <input type=hidden value="annuler" name="type">
                                    <a href="#" onclick="event.preventDefault();form_annuler.submit()"><i class="fa fa-times"></i> Annuler le recrutement</a></a>
                            </form>
                        </li>
                    @endif
                    @if($conv->client_id==Auth::User()->id && $conv->demande->recrutement && $conv->demande->recrutement->status=="terminé" && $conv->demande->recrutement->avis==null)
                            <li data-toggle="modal" data-target="#modalAvis">
                                <a href="#" onclick="event.preventDefault()"><i class="fa fa-star"></i> Donner votre avis!</a>
                            </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="card-body fixOverFlow">
            
            @forelse($messages as $message)
                @if($message->user_id==Auth::user()->id)
                    <div class="d-flex justify-content-start mb-2">
                        <div class="img_cont img_msg">
                            <img src="{{asset('images')}}/{{Auth::user()->image}}" class="rounded-circle img_msg">
                        </div>
                        <div class="msg_envoyer">
                            {{$message->contenu}}
                            <span class="msg_time_send">{{$message->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-end mb-2">
                        <div class="msg_recevoir {{$message->type_message=='support'?'bg-success':''}}">
                            {{$message->contenu}}
                            <span class="msg_time">{{$message->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="img_cont img_msg">
                            <img src="{{asset('images')}}/{{$conversationWith['image']}}" class="rounded-circle img_msg">
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center text-muted my-3 NoMessagesYet">
                    <h3 class="pt-4"><i class="fa fa-comments fa-4x"></i></h3>
                    <h3 class="pb-5">Pas De Message Actuellement</h3>
                </div>
            @endforelse
            <div class="new-message"></div>
           
        </div>
        <div class="card-footer">
            <form method=post id="ajaxform" action="{{route('message.store')}}">
                @method('PUT')
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for=files><i class="fa fa-paperclip"></i></label>
                        <input type=file class="d-none position-absolute" id=files name=file>
                    </div>
                    <textarea name="textMessage" row="2" class="form-control" placeholder="Inserer votre message..."></textarea>
                    <div class="input-group-append">
                        <button type=submit class="btn btn-success m-0 send-button"><i class="fa fa-location-arrow"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <input type=hidden name=LatestMessageId value="{{$LatestMessageId}}">
    </div>
   
</div>

@if($conv->client_id==Auth::User()->id && $conv->demande->recrutement && $conv->demande->recrutement->status=="terminé" && $conv->demande->recrutement->avis==null)
    <!-- Modal -->
    <form action="{{route('avi.store')}}" method=post>
        @csrf
        <div class="modal fade" id="modalAvis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header pb-0" style="padding-top:6px">
                <h5 class="modal-title" id="exampleModalLabel">Avis sur le travail de <strong>{{$conversationWith['username']}}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div class="rating text-center">
                        @for($i=5;$i>0;$i--)
                            <input type="radio" name="rating" value="{{$i}}" id="{{$i}}" class="d-none"><label for="{{$i}}">☆</label>
                        @endfor
                    </div>
                    <div class="form-group">
                        <label for="Avis">Ecrivez votre avis:</label>
                        <textarea class="form-control" id="Avis" rows="3" name=avis></textarea>
                    </div>
                    <input type=hidden name=conversation value="{{$conversationId}}">
              </div>
              <div class="modal-footer p-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuuler</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </div>
            </div>
          </div>
        </div>
    </form>
@endif

@endsection

@section('script_ajax')

<script>
    $('#action_menu_btn').on('click',()=>$('.action_menu').toggle());
    
    //les messages envoyer ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function SendMessage(){
          event.preventDefault();
    
          let textMessage = $("textarea[name='textMessage']").val();
          let _token   = $('input[type="hidden"][name="_token"]').val();
            
          $.ajax({
            url: "{{route('message.store')}}",
            type:"POST",
            data:{
              textMessage:textMessage,
              _token: _token,
              conversationId:{{intval($conversationId)}},
              send_user:{{Auth::user()->id}},
              recieve_user:{{$conversationWith['id']}}
            }, 
            encode : true,
            success:function(response){
              if(response) {
                $('.NoMessagesYet').hide();
                $('.new-message').append("<div class=\"d-flex justify-content-start mb-2\"><div class=\"img_cont img_msg\"><img src=\"{{asset('images')}}/{{Auth::user()->image}}\" class=\"rounded-circle img_msg\"><\/div><div class=msg_envoyer>"+response['contenu']+"<span class=msg_time_send>"+response['created_at']+"<\/span><\/div><\/div>");
                $("#ajaxform")[0].reset();
                $('.card-body')[0].scrollTop = $('.card-body')[0].scrollHeight;
              }
            }
       });
    }
    $(".send-button").click(function(event){
        SendMessage();
    });
    $("textarea[name=textMessage]").keydown(function (e) {
        if (e.keyCode == 13)
            SendMessage();
    });
    //les messages recevoirs ajax
    setInterval(function(){
          let _token = $('input[type="hidden"][name="_token"]').val();
          let _method = $('input[type="hidden"][name="_method"]').val();
          let _LatestId= $('input[type="hidden"][name="LatestMessageId"]');
            
          $.ajax({
            url: "{{route('message.update',[1])}}",
            type:"POST",
            data:{
              _token: _token,
              _method: _method,
              conversationId:{{intval($conversationId)}},
              send_user:{{Auth::user()->id}},
            //   recieve_user:{{$conversationWith['id']}}, //unused
              LatestMessageId:parseInt(_LatestId.val())
            },
            success:function(response){
              if(response) {
                  for(i=0;i<response['i'];i++){
                    let string="<div class=\"d-flex justify-content-end mb-2\"><div class='msg_recevoir ";
                        if(response['type_message'][i]=="support"){
                            string+=" bg-success";   
                        }
                    string+="'>"+response['contenu'][i]+"<span class=msg_time>"+response['created_at'][i]+"</span></div><div class=\"img_cont img_msg\"><img src=\"{{asset('images')}}/"+response['user_img'][i]+"\" class=\"rounded-circle img_msg\"></div></div>";
                    $('.new-message').append(string);
                    $('.card-body')[0].scrollTop = $('.card-body')[0].scrollHeight;
                  }
                  _LatestId.val(response['LatestMessageId']);
              }
            }
           });
    },1000);
</script>

@endsection