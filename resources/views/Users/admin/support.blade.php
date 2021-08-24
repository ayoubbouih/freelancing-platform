@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="support technique">
<meta name="robots" content="noindex , nofollow">
<title>support technique | Beemployer</title>
@endsection
@section('support','active')
@section('right')
    <div class="mt-3">
        <div class="card pt-2 pl-2">
            <div class="card-head">
                <h4>Les messages de support technique</h4>
            </div>
        </div>

        <div class="card mb-sm-3 mb-md-0">
            <div class="card-body">
                <table class="table table-striped message">
                    <tbody>
                        <?php $i=0; ?>
                        @forelse($conversations['data'] as $conversation)
                        <tr>
                            <td scope="row">
                                <form action="{{route('dashboard','message')}}" method=get name="form{{$conversation->id}}">
                                    <input type="hidden" name="conversationId" value="{{$conversation->id}}">
                                    <div class="d-flex" style="cursor: pointer" onclick="form{{$conversation->id}}.submit()">
                                        <div class="img_cont">
                                            @if($conversation->freelancer_id == Auth::user()->id)
                                                @php $u=App\User::find($conversation->client_id) @endphp
                                                <img src="{{asset('images').'/'.$u->image}}" class="rounded-circle user_img">
                                            @else
                                                @php $u=App\User::find($conversation->freelancer_id) @endphp
                                                <img src="{{asset('images').'/'.$u->image}}" class="rounded-circle user_img">
                                            @endif
                                            <span class="online_icon {{$u->last_activity<(time()-60)?'offline':''}}"></span>
                                        </div>
                                        <div class="mt-3">
                                            <span><span class="font-weight-bold">Renseignez-vous sur: </span>{{$conversations['nomProjet'][$i++]}}</span>
                                            <p>
                                                {{App\User::find($conversation->client_id)->username}} - {{App\User::find($conversation->freelancer_id)->username}}
                                                @if($conversation->messages->last())
                                                <span class="text-muted small">{{$conversation->messages->last()->created_at->diffForHumans()}}</span>
                                                @else
                                                <span class="text-muted small">{{$conversation->created_at->diffForHumans()}}</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td><h2 class="text-center px-2 py-5">Pas de messages actuellement</h2></td>
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