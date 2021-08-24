@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="Crée une expérience | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<title>Crée une expérience | BeEmployer</title>
@endsection
@section('experiences','active')
@section('right')
<div class="container mt-3 pr-sm-0">

	<div class="text-center border-bottom border-primary">
		<h3>Ajouter une expérience</h3>
	</div>
	<form method="POST" action="{{route('experience.update',$experience->id)}}" enctype="multipart/form-data" name="formExp">
		@csrf
		@method('PUT')
		<div class="row pb-4">
			<div class="col-12 col-lg-10 offset-lg-1">
				
				<div class="row mt-4 pb-0 border-bottom border-primary">
					<div class="col-md-6">
						<div class="form-group">
							<h5>Vous avez réalisé quoi ?</h5>
							<input type="text" class="form-control @error('experience_intitule') is-invalid @enderror" name="experience_intitule" value="{{$experience->intitule}}">
							@error('experience_intitule')
                                <span class="alert text-danger">{{$message}}</span>
                        	@enderror
						</div>
					</div>
					<div class="col-md-6">
						<h5>Lien</h5>
							<input type="text" class="form-control @error('experience_link') is-invalid @enderror" name="experience_link" value="{{$experience->lien}}">
							@error('experience_link')
                                <span class="alert text-danger">{{$message}}</span>
                        	@enderror
					</div>
					<div class="col-12 col-lg-10">
						<div class="form-group">
							<h5>Décrire votre expérience</h5>
						<textarea name="experience_description" rows="5" class="form-control @error('experience_description') is-invalid @enderror">{{$experience->description}}</textarea>
							@error('experience_description')
                                <span class="alert text-danger">{{$message}}</span>
                        	@enderror
						</div>
					</div>
					<div class="col-12">
					    <input type="hidden" name="oldImageName" value="{{$experience->image}}">
						<div class="custom-file mb-4">	
							<input type="file" name=file class="custom-file-input @error('file') is-invalid @enderror" id="upload" value="importer">
							<h5 class="custom-file-label" for="upload">Importez une image (Optionnel)</h5>
							@error('file')
						        <div class="alert text-danger mt-0 pt-1 pb-3">{{$message}}</div>
						    @enderror
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1 mt-3">
				<button class="btn btn-primary w-75" onclick="formExp.submit();this.disabled =true;this.textContent='En cours de publication ...'">
					<i class="fa fa-pencil"></i> Editer
				</button>
    			<button class="btn btn-success w-25 pull-right" onclick="event.preventDefault();window.location='{{route('dashboard','experiences')}}';">Annuler</button>
			</div>
		</div>
	</form>

</div>
@endsection