@extends('layouts.app')

@section('content')
<div class="container content">
    <!-- Intro Headline -->
    <div class="row">
        <div class="col-md-5 text-center mt-md-4 mt-lg-0">
            <img src="images/men-women.png" class="w-100">
        </div>
        <div class="col-md-7">
            <p class="text-center pt-lg-3">
                <h2 class="embaucher">
                    <strong>Embaucher des experts ou être embauché pour n'importe quel travail, à tout moment.</strong>
                    <br>
                    <span>Des milliers de petites entreprises utilisent <strong>HireMe</strong> pour transformer leurs idées en réalité.</span>
                </h2>
            </p>
        </div>
    </div>
    <!-- Search Bar -->
    <div class="row">
        <div class="col-lg-10 offset-lg-1 my-lg-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control border border-primary" placeholder="Titre du poste ou mots clés">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mt-4 py-2 border border-primary rounded" style="background:#eee">
        <div class="col-6 col-sm-3">
            <div class="text-center">
                <i class="fa fa-suitcase fa-4x"></i>
                <div>
                    <h3><span class="counter">1586</span></h3>
                    <span class="text-muted"><b>Postes publiées</b></span>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="text-center">
                <i class="fa fa-legal fa-4x"></i>
                <div>
                    <h3><span class="counter">3543</span></h3>
                    <span class="text-muted"><b>Tâches publiées</b></span>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="text-center">
                <i class="fa fa-user fa-4x"></i>
                <div>
                    <h3><span class="counter">2413</span></h3>
                    <span class="text-muted"><b>Active Freelancer</b></span>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="text-center">
                <i class="fa fa-trophy fa-4x"></i>
                <div>
                    <h3><span class="counter">99</span>%</h3>
                    <span class="text-muted"><b>Taux de satisfaction</b></span>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Category Boxes -->
<div class="section">
    <div class="container">
        <div class="row border border-primary rounded mt-3 pt-2">
            <div class="col-xl-12">

                <div class="text-center py-1 border-bottom border-primary">
                    <h3>Catégories d'emploi populaires</h3>
                </div>

                <div class="d-flex flex-wrap justify-content-around">
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-file-code-o fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">612</div>
                        <div class="category-box-content">
                            <h3>Web & Software Dev</h3>
                            <p>Software Engineer, Web / Mobile Developer & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-cloud-upload fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">113</div>
                        <div class="category-box-content">
                            <h3>Data Science & Analitycs</h3>
                            <p>Data Specialist / Scientist, Data Analyst & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-suitcase fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">186</div>
                        <div class="category-box-content">
                            <h3>Accounting & Consulting</h3>
                            <p>Auditor, Accountant, Fnancial Analyst & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-pencil fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">298</div>
                        <div class="category-box-content">
                            <h3>Writing & Translations</h3>
                            <p>Copywriter, Creative Writer, Translator & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-pie-chart fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">549</div>						
                        <div class="category-box-content">
                            <h3>Sales & Marketing</h3>
                            <p>Brand Manager, Marketing Coordinator & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-image fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">873</div>
                        <div class="category-box-content">
                            <h3>Graphics & Design</h3>
                            <p>Creative Director, Web Designer & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-bullhorn fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">125</div>
                        <div class="category-box-content">
                            <h3>Digital Marketing</h3>
                            <p>Darketing Analyst, Social Profile Admin & More</p>
                        </div>
                    </a>
                    <a href="#" class="category-box nav-link">
                        <div>
                            <i class="fa fa-graduation-cap fa-3x"></i>
                        </div>
                        <div class="badge badge-info mb-2">445</div>
                        <div class="category-box-content">
                            <h3>Education & Training</h3>
                            <p>Advisor, Coach, Education Coordinator & More</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Category Boxes / End -->

@endsection