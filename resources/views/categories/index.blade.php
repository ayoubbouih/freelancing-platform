@extends('layouts.app')
@section('meta-generator')
<meta name="title" content="tous les projets">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="Tous les projets | BeEmployer">
<title>Tous les projets | BeEmployer</title>
@endsection
@section('includes')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
<style>
    #footer h3{color:#fff;}
    p, .task-tags span, select{color:#000 !important;}
    .p-wrap{overflow-wrap: anywhere;}
</style>
@endsection

@section('content')
<div class="py-3"></div>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="sidebar-container">
                <div>
                    <h3>Categories</h3>
                    <div>
                        <select name="categories" id=categories class="custom-select">
                            <option value="0"><b>Tous les projet</b></option>
                            @foreach($categories as $cat)
                                    <option value="{{$cat->lienDeCategorie}}">{{$cat->intitule}}</option>
                            @endforeach
                        </select>
                    </div>
                        
                </div>
            </div>
                <div>
                    <h3>Rechercher</h3>
                    <form action="{{route('categorie.index')}}" method=get>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                            <input type="text" name=str class="keyword-input" placeholder="ex: designe project" value="{{$str}}">
                                <button class="btn btn-primary keyword-input-button ripple-effect"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <input type=hidden name="option" value="{{$option}}">
                    </form>
                </div>

            </div>
            <div class="col-xl-9 col-lg-8 content-left-offset">
            <div class="notify-box">
                <h3 class="page-title"><b>Tous les projets</b></h3>
                <div class="sort-by">
                    <form action="{{route('categorie.index')}}" method=get name="optionForm">
                        <select class="custom-select mt-2 py-1" name="option" onchange="optionForm.submit()">
                            <option value="aleatoire" {{$option=='aleatoire'?'selected':''}}>Aléatoire</option>
                            <option value="recent" {{$option=='recent'?'selected':''}}>plus récent</option>
                            <option value="ancien" {{$option=='ancien'?'selected':''}}>plus ancien</option>
                        </select>
                        <input type=hidden name="str" value="{{$str}}">
                    </form>
                </div>
            </div>
            
            <!-- Tasks Container -->
            <div class="tasks-list-container compact-list">
            @forelse($projets as $projet)		
                <a href="{{route('projets.show',$projet->id)}}" class="task-listing">
                    <div class="task-listing-details m-3 px-1 px-md-0">
                        <div class="task-listing-description">
                            <h3 class="task-listing-title"><b>{{$projet->intitule}}</b></h3>
                            <ul class="task-icons small">
                                <li><i class="fa fa-user text-muted"></i> {{$projet->user->username}}</li>
                                <li><i class="fa fa-clock-o text-muted"></i> {{$projet->diffForHumans($projet->created_at)}}</li>
                                <li><i class="fa fa-archive text-muted"></i> {{substr($projet->categorie->intitule,0,20)."..."}}</li>
                            </ul>
                            <p class="task-listing-text p-wrap">{{substr($projet->description,0,100)."..."}}</p>
                            <div class="task-tags">
                            @foreach($projet->postes as $poste)
                                <span>{{$poste->intitule}}</span>
                            @endforeach
                            </div>
                        </div>
                        <div class="position-relative">
                            <span class="btn btn-primary button float-right" style="">voir plus</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center text-muted my-3 py-5">
                    <h3 class="pt-4"><i class="fa fa-frown-o fa-5x"></i></h3>
                    <h3 class="pb-5">Pas de projets actuellement</h3>
                </div>
            @endforelse
            </div>
            <!-- Tasks Container / End -->

            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <!-- Pagination -->
                        {{$projets->appends(['str'=>$str,'option'=>$option])->links()}}
                    </div>
                </div>
            </div>
            <!-- Pagination / End -->

        </div>
    </div>
        
</div>

@endsection

@section('script')

<script>
    $('select#categories').on("change",()=>{
        window.location.href="categorie/"+document.getElementById('categories').value;
    });
</script>

@endsection