@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="conversation de support technique | Beemployer">
<meta name="robots" content="noindex , nofollow">
<title>conversation de support technique | Beemployer</title>
@endsection
@section('support','active')
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
    </style>
@endsection
@section('messages','active')
@section('right')
<div class="container-fluid mt-3">
            <div class="card">
                @if(Session::has('denied'))
                <div class="alert alert-danger">{{Session::get('denied')}}</div>
                    @else
                <div class="card-header py-0">
                    <div class="d-flex">
                        <h4>Conversation de support technique</h4>
                    </div>
                </div>
                <div class="card-body fixOverFlow">
                    
                    @forelse($messages as $message)
                        @if($message->type_message=="support")
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
                                <div class="msg_recevoir">
                                    {{$message->contenu}}
                                    <span class="msg_time">{{$message->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="img_cont img_msg">
                                    <img src="{{asset('images')}}/{{$message->user->image}}" class="rounded-circle img_msg">
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
            @endif
            </div>
            
</div>

@endsection

@section('script')

<script>
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
              conversationId:{{$conversationId}},
              send_user:{{$id=Auth::User()->id}},
              recieve_user:{{$id}}
            }, 
            encode : true,
            success:function(response){
              if(response) {
                $('.NoMessagesYet').hide();
                $('.new-message').append("<div class=\"d-flex justify-content-start mb-2\"><div class=\"img_cont img_msg\"><img src=\"{{asset('images')}}/{{Auth::user()->image}}\" class=\"rounded-circle img_msg\"><\/div><div class=msg_envoyer>"+response['contenu']+"<span class=msg_time_send>"+response['created_at']+"<\/span><\/div><\/div>");
                $("#ajaxform")[0].reset();
                $('.nbrMsgs').html(parseInt($('.nbrMsgs').text())+1);
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
              conversationId:{{$conversationId}},
              send_user:{{$id=Auth::User()->id}},
              recieve_user:{{$id}},
              LatestMessageId:parseInt(_LatestId.val())
            },
            success:function(response){
              if(response) {
                for(i=0;i<response['i'];i++){
                    $('.new-message').append("<div class=\"d-flex justify-content-end mb-2\"><div class=msg_recevoir>"+response['contenu'][i]+"<span class=msg_time>"+response['created_at'][i]+"</span></div><div class=\"img_cont img_msg\"><img src=\"{{asset('images')}}/"+response['user_img'][i]+"\" class=\"rounded-circle img_msg\"></div></div>");
                    $('.nbrMsgs').html(parseInt($('.nbrMsgs').text())+1);
                    $('.card-body')[0].scrollTop = $('.card-body')[0].scrollHeight;
                }
                _LatestId.val(response['LatestMessageId']);
              }
            }
           });
    },1000);
</script>

@endsection