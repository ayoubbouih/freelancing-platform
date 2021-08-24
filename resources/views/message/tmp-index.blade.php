@extends('Users.dashboard')
@section('right')

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3 d-none d-lg-block">
            //Right Dashboard Here
        </div>
        <div class="col-md-8">

            <div class="card pt-2 pl-2">
                <div class="card-head">
                <h4>Type des messages</h4>
                </div>
                <div class="card-body p-2 d-flex mr-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Les messages lus</label>
                    </div>
                    <div class="custom-control custom-checkbox ml-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Les messages non lus</label>
                    </div>
                    <div class="custom-control custom-checkbox ml-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Tous les messages</label>
                    </div>
                </div>
            </div>

            <div class="card mb-sm-3 mb-md-0">
                <div class="card-body">
                    <table class="table table-striped message">
                        <tbody>
                            @forelse($messages as $message)
                            <tr>
                                <td scope="row">
                                    <a href="{{route('message.show',$message->id)}}">
                                        <div class="d-flex">
                                            <div class="img_cont">
                                                <img src="{{asset('images/male-avatar.png')}}" class="rounded-circle user_img">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="mt-3">
                                                <span><span class="font-weight-bold">Renseignez-vous sur:</span>{{$message['nomProjet']}}</span>
                                                <p>
                                                    @if($message['data']->envoyeur_id == Auth::user()->id)
                                                        {{App\User::find($message['data']->recepteur_id)->username}} 
                                                    @else
                                                        {{App\User::find($message['data']->envoyeur_id)->username}} 
                                                    @endif
                                                    <span class="text-muted">{{$message['data']->created_at->diffForHumans()}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <td scope="row">-->
                            <!--        <a href="{{route('message.show',[1])}}">-->
                            <!--            <div class="d-flex">-->
                            <!--                <div class="img_cont">-->
                            <!--                    <img src="{{asset('images/female-avatar.png')}}" class="rounded-circle user_img">-->
                            <!--                    <span class="online_icon offline"></span>-->
                            <!--                </div>-->
                            <!--                <div class="mt-1">-->
                            <!--                    <span><span class="font-weight-bold">Renseignez-vous sur:</span> Project Name Goes Here</span>-->
                            <!--                    <p>Taherah <span class="text-muted">left 7 mins ago</span></p>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </a>-->
                            <!--    </td>-->
                            <!--</tr>-->
                            @empty
                            <tr>
                                <td><h2 class="text-center">Pas de messages actuellemnt</h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection