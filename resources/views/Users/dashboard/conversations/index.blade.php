@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="mes conversation">
<meta name="robots" content="noindex , nofollow">
<title>Mes conversations | Beemployer</title>
@endsection
@section('messages','active')
@section('right')
    <div class="mt-3">
        <div class="card pt-2 pl-2">
            <div class="card-head">
            <h4>Type des messages</h4>
            </div>
            <form class="msgForm" method=get action="{{route('conversation.index')}}">
                <div class="card-body p-2 d-flex mr-2">
                    <div class="custom-control custom-radio ml-3">
                        <input type="radio" class="custom-control-input" id="customRadio2" name=msgsType value=support {{$type=='support'?'checked':''}}>
                        <label class="custom-control-label" for="customRadio2">le support technique</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input type="radio" class="custom-control-input" id="customRadio3" name=msgsType value=message {{$type=='message'?'checked':''}}>
                        <label class="custom-control-label" for="customRadio3">Tous les messages</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="card mb-sm-3 mb-md-0">
            <div class="card-body">
                <table class="table table-striped message">
                    <tbody>
                        <?php $i=0; ?>
                        @forelse($conversations['data'] as $conversation)
                        <tr>
                            <td scope="row" class="{{$conversation->messages->last() && $conversation->messages->last()->Vu==0 && $conversation->messages->last()->user_id!=Auth::User()->id ?'font-weight-bold bg-secondary text-white':''}}">
                                <a href="{{route('conversation.show',$conversation->id)}}">
                                    <div class="d-flex">
                                        <div class="img_cont">
                                            @if($conversation->freelancer_id == Auth::user()->id)
                                                    @php $us=App\User::find($conversation->client_id) @endphp
                                                    <img src="{{asset('images').'/'.$us->image}}" class="rounded-circle user_img border-0">
                                                    <span class="online_icon {{$us->last_activity<(time()-60)?'offline':''}}"></span>
                                                @else
                                                    @php $us=App\User::find($conversation->freelancer_id) @endphp
                                                    <img src="{{asset('images').'/'.$us->image}}" class="rounded-circle user_img border-0">
                                                    <span class="online_icon {{$us->last_activity<(time()-60)?'offline':''}}"></span>
                                                @endif
                                        </div>
                                        <div class="mt-1">
                                            <span><span class="font-weight-bold">Renseignez-vous sur: </span>{{$conversations['nomProjet'][$i++]}}</span>
                                            <p>
                                                @if($conversation->freelancer_id == Auth::user()->id)
                                                    {{App\User::find($conversation->client_id)->username}} 
                                                @else
                                                    {{App\User::find($conversation->freelancer_id)->username}}  
                                                @endif
                                                @if($conversation->messages->last())
                                                    <span class="small">{{$conversation->messages->last()->created_at->diffForHumans()}}</span>
                                                @else
                                                    <span class="small">{{$conversation->created_at->diffForHumans()}}</span>
                                                @endif
                                                <span class="small d-block">Dernière activité: {{$us->updated_at ? $us->updated_at->diffForHumans() : 'date invalide!'}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td><h2 class="text-center px-2 py-5">Pas de messages actuellemnt</h2></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$conversations['data']->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection