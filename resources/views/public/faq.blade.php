@extends('layouts.app')

@section('meta-generator')
<meta name="title" content="FAQ | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="FAQ | BeEmployer">
<title>FAQ | BeEmployer</title>
@endsection

@section('content')
<div class="container pt-3">
    <h2>Fonctionnement et premiers pas</h2>
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Comment créer un compte ?
                    </button>
                 </h5>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    Vous pouvez créer votre compte en cliquant sur S'enregistrer en haut de la page ou <a href="https://beemployer.com/login">cliquer ici </a>, vous saisir vous information ou connectez-vous via Google. 
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Comment publier un projet ?
                    </button>
                 </h5>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    La publication d'un nouveau projet est tres simple, il suffit d'aller à la page <a href="https://beemployer.com/projets/create">+ Nouveau projet</a> et de saisir une description de votre projet avec les details des postes que vous voulez recruter
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Comment postuler à un projet pour occuper un poste ?
                    </button>
                 </h5>
                <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    Il suffit d'aller à la page du projet, vous trouvez un formaulaire à remplire avec les details de votre demande ( decription, duree, prix) quand vous etes recruter par l'employeur vous serez notifiés
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection