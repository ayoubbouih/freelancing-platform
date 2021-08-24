<div id="footer">
    
    <div class="container py-2">
        <div class="row py-4">
            <div class="col-6 col-md-3">
                <div class="footer-links">
                    <h3 class="mb-3">Qui sommes nous ?</h3>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="footer-links">
                    <h3 class="mb-3">Pour les membres</h3>
                    <ul class="pl-0" style="list-style:none">
                         <li><a href="{{route('categorie.index')}}"><span>Parcourir les projets</span></a></li>
                        <li><a href="{{route('user.index')}}"><span>Parcourir les Freelancers</span></a></li>
                        <li><a href="{{route('projets.create')}}"><span>Publier un projet</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="footer-links">
                    <h3 class="mb-3">Liens utiles</h3>
                    <ul class="pl-0" style="list-style:none">
                        <li><a href="{{route('contact')}}"><span>Contact</span></a></li>
                        <li><a href="{{route('privacy')}}"><span>Politique de confidentialité</span></a></li>
                        <li><a href="{{route('terms')}}"><span>Conditions d'utilisation</span></a></li>
                        <li><a href="{{route('faq')}}">faq</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="footer-links">
                    <h3 class="mb-3">Compte</h3>
                    <ul class="pl-0" style="list-style:none">
                        <li><a href="{{route('login')}}"><span>S'identifier</span></a></li>
                        <li><a href="{{route('dashboard')}}"><span>Mon compte</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr color='#fff'>
        <div class="row footer-bottom-section">
            <div class="col-xl-12 text-center pb-2">
                © <?=date('Y')?> <strong>BeEmployer</strong>. Tous les droits sont réservés.
            </div>
        </div>
    </div>
</div>