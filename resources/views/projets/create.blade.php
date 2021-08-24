@extends('layouts.app')
@section('content')

<div class="container bg-white shadow my-5 py-3">

	<div class="text-center border-bottom border-primary">
		<h3>Publier un projet</h3>
	</div>
	<form method="POST" action="{{route('projets.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="row pb-4">
			<div class="col-12 col-lg-10 offset-lg-1">
				
				<div class="row mt-4 pb-0 border-bottom border-primary">
					<div class="col-md-6">
						<div class="form-group">
							<h5>Titre du projet</h5>
							<input type="text" value="{{old('projet_intitule')}}" class="form-control @error('projet_intitule') is-invalid @enderror" name="projet_intitule" placeholder="developpement d'une plateforme">
							@error('projet_intitule')
                                <span class="alert text-danger">{{$message}}</span>
                        	@enderror
						</div>
					</div>
					<div class="col-md-6">
						<h5>Catégorie</h5>
						<select class="custom-select" name="projet_categorie" data-size="7" title="Selectionner une categorie">
							@foreach(App\categorie::all() as $categorie)
								<option value="{{$categorie->id}}">{{$categorie->intitule}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-12">
						<div class="form-group">
							<h5>Description du projet</h5>
						<textarea name="projet_description" rows="5" class="form-control @error('projet_description') is-invalid @enderror">{{old('projet_description')}}</textarea>
							@error('projet_description')
                                <span class="alert text-danger">{{$message}}</span>
                        	@enderror
						</div>
					</div>
					<div class="col-12">
						<div class="custom-file mb-4">	
							<input type="file" name=file class="custom-file-input @error('file') is-invalid @enderror" id="upload" value="importer">
							<h5 class="custom-file-label" for="upload">Choisir les fichiers (Optionnel)</h5>
							@error('file')
						        <div class="alert text-danger mt-0 pt-1 pb-3">{{$message}}</div>
						    @enderror
						</div>
					</div>
				</div>
				
				<div class="mt-4" id="addPostes">
					<div class="text-center">
						<h3>Ajouter des postes à ce projet</h3>
					</div>
					@error('noPoste')
					    <div class="alert alert-danger py-1">{{$message}}</div>
					@enderror
					<div class="p-1 rounded">
						<add-postes is="add-postes" 
							v-for="(poste, index) in postes" 
							v-bind:key="poste.id"
							v-on:remove="postes.splice(index, 1)"
						></add-postes>
						<div class="text-center">
							<button type="button" class="btn btn-primary">
								<i class="fa fa-plus" v-on:click="add"> ajouter un autre poste à ce projet</i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1 mt-3">
				<button type="submit" class="btn btn-primary btn-block">
					<i class="fa fa-plus"></i> publier le projet
				</button>
			</div>
		</div>
	</form>

</div>

@endsection

@section('script')

<script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
  		var fileName = $(this).val().split("\\").pop();
  		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>

@endsection