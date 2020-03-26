@extends('layouts.app')
@section('content')
<div class="dashboard-container">
	<div class="dashboard-content-container">
		<div class="dashboard-content-inner" >
			<div class="dashboard-headline">
				<h3>Publier un projet</h3>

			</div>
			<form method="POST" action="{{Route('projets.store')}}">
                @csrf
				<div class="row">
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i>ajouter un projet</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-lg-6">
										<div class="submit-field">
											<h5>titre du projet</h5>
											<input type="text" class="with-border" name="projet_intitule" placeholder="developpement d'une plateforme">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="submit-field">
											<h5>Categorie</h5>
											<select class="selectpicker with-border" name="projet_categorie" data-size="7" title="Selectionner une categorie">
												<!-- une boucle des categories -->
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="dashboard-box margin-top-30">
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i>ajouter un poste à ce projet</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>l'intitulé du poste <i class="help-icon" data-tippy-placement="right" title="Up to 5 skills that best describe your project"></i></h5>
											<input type="text" class="with-border" name="poste_intitule" placeholder="ex: developpeur web"/>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>votre budget</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" name="poste_min" type="number" placeholder="Minimum">
														<i class="currency">USD</i>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input class="with-border" name="poste_max" type="number" placeholder="Maximum">
														<i class="currency">USD</i>
													</div>
												</div>
											</div>
										</div>
									</div>

									

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Description de poste</h5>
											<textarea name="projet_description" cols="30" rows="5" class="with-border"></textarea>
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
												<label class="uploadButton-button ripple-effect" for="upload">importer des fichier</label>
												<span class="uploadButton-file-name">un document qui decrit ce poste</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<input type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> publier le projet</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection