@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="Projets | admin">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="Categories | admin">
<title>Catégories | Beemployer</title>
@endsection
@section('includes')
<link href="{{asset('css/users/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/users/left-dashboard.css')}}" rel="stylesheet">
<style>
    #footer h3{
        color:#FFF;
    }
</style>
@endsection
@section('categories','active')
@section("right")
<div class="container mt-3 pr-sm-0">

	<div class="text-center border-bottom border-primary">
		<h3>{{$categorie->intitule}}</h3>
	</div>
	<form method="POST" action="{{route('categorie.update',$categorie->id)}}" enctype="multipart/form-data" name="formExp">
		@csrf
		@method('PUT')
		<div class="row pb-4">
			<div class="col-12 col-lg-10 offset-lg-1">
				
				<div class="row mt-4 pb-0 border-bottom border-primary">
					<div class="col-md-12">
						<div class="form-group">
							<h5>le nom de la catégorie</h5>
							<input type="text" class="form-control" name="categorie_intitule" value="{{$categorie->intitule}}">

						</div>
					</div>
					
					<div class="col-12 col-lg-10">
						<div class="form-group">
							<h5>La description de la catégorie</h5>
						<textarea name="categorie_description" rows="5" class="form-control">{{$categorie->description}}</textarea>
						</div>
					</div>
					<div class="col-12">
					    <input type="hidden" name="oldImageName" value="{{$categorie->image}}">
						<div class="custom-file mb-4">	
							<input type="file" name=file class="custom-file-input" id="upload" value="importer">
							<h5 class="custom-file-label" for="upload">Importez une image (Optionnel)</h5>
							@error('file')
						        <div class="alert text-danger mt-0 pt-1 pb-3">{{$message}}</div>
						    @enderror
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1 mt-3">
				<button class="btn btn-primary w-75" onclick="formExp.submit();this.disabled =true;this.textContent='En cours de mise à jour ...'">
					<i class="fa fa-pencil"></i> Editer
				</button>
    			<button class="btn btn-success w-25 pull-right" onclick="event.preventDefault();window.location='{{route('dashboard','categories')}}';">Annuler</button>
			</div>
		</div>
	</form>

</div>
@endsection