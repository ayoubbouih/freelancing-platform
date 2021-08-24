@extends('layouts.app')
@section('meta-generator')
<meta name="title" content="BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="Embauchez des experts ou être embauché pour n'importe quel travail, à tout moment, be employer with beemployer">
<title>BeEmployer</title>
@endsection
@section('includes')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection
@section('content')
    <div id="one">
        <div class="container mt-lg-0 pt-lg-4 mt-sm-0 pt-sm-0">
            <div class="row">
                <div class="col-md-5 text-center mt-md-4 d-none d-md-block d-lg-block">
                    <svg xmlns="http://www.w3.org/2000/svg" id="a79c70b2-3a32-4f99-833c-b78d151fe0d8" data-name="Layer 1" width="100%" height="250px" viewBox="0 0 790.52292 730.49185"><title>contract</title><path d="M252.65186,143.094a47.96791,47.96791,0,0,0-47.91332,47.91332V742.99707a47.96778,47.96778,0,0,0,47.91332,47.91272H657.57652a47.96766,47.96766,0,0,0,47.91272-47.91272V191.00728A47.96778,47.96778,0,0,0,657.57652,143.094Z" transform="translate(-204.73854 -84.75407)" fill="#3f3d56"/><rect x="24.91599" y="92.37149" width="450.91871" height="579.75263" fill="#fff"/><rect x="83.86359" y="196.28941" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="254.6293" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="312.96919" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="371.30907" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="429.64896" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="487.98885" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="83.86359" y="546.32874" width="333.02352" height="21.87746" fill="#4789c6"/><rect x="332.19662" y="167.05547" width="335.70794" height="431.62449" transform="translate(-265.49105 11.51607) rotate(-10.37053)" fill="#e6e6e6"/><rect x="352.62694" y="246.5507" width="247.93524" height="16.28772" transform="translate(-242.80136 5.19986) rotate(-10.37053)" fill="#4789c6"/><rect x="360.44561" y="289.27509" width="247.93524" height="16.28772" transform="translate(-250.36459 7.30526) rotate(-10.37053)" fill="#4789c6"/><rect x="368.26429" y="331.99947" width="247.93524" height="16.28772" transform="translate(-257.92782 9.41067) rotate(-10.37053)" fill="#4789c6"/><rect x="376.08296" y="374.72385" width="247.93524" height="16.28772" transform="translate(-265.49105 11.51607) rotate(-10.37053)" fill="#4789c6"/><rect x="383.90164" y="417.44824" width="247.93524" height="16.28772" transform="matrix(0.98366, -0.18001, 0.18001, 0.98366, -273.05427, 13.62147)" fill="#4789c6"/><rect x="391.72032" y="460.17262" width="247.93524" height="16.28772" transform="translate(-280.6175 15.72687) rotate(-10.37053)" fill="#4789c6"/><rect x="399.53899" y="502.89701" width="247.93524" height="16.28772" transform="translate(-288.18073 17.83227) rotate(-10.37053)" fill="#4789c6"/><rect x="776.82937" y="612.36811" width="94.98996" height="122.12995" transform="translate(-312.49937 74.63623) rotate(-10.37053)" fill="#e6e6e6"/><rect x="782.61021" y="634.86162" width="70.15431" height="4.60868" transform="translate(-306.07923 72.84904) rotate(-10.37053)" fill="#fff"/><rect x="784.82254" y="646.95066" width="70.15431" height="4.60868" transform="translate(-308.21928 73.44477) rotate(-10.37053)" fill="#fff"/><rect x="787.03487" y="659.0397" width="70.15431" height="4.60868" transform="translate(-310.35932 74.0405) rotate(-10.37053)" fill="#fff"/><rect x="789.2472" y="671.12874" width="70.15431" height="4.60868" transform="translate(-312.49937 74.63623) rotate(-10.37053)" fill="#fff"/><rect x="791.45952" y="683.21779" width="70.15431" height="4.60868" transform="translate(-314.63942 75.23197) rotate(-10.37053)" fill="#fff"/><rect x="793.67185" y="695.30683" width="70.15431" height="4.60868" transform="translate(-316.77946 75.8277) rotate(-10.37053)" fill="#fff"/><rect x="795.88418" y="707.39587" width="70.15431" height="4.60868" transform="translate(-318.91951 76.42343) rotate(-10.37053)" fill="#fff"/><path d="M538.60427,115.13943H498.86881v-8.13468a22.25068,22.25068,0,0,0-22.25068-22.25068H433.60965A22.25067,22.25067,0,0,0,411.359,107.00475v8.13468H371.62352a22.25067,22.25067,0,0,0-22.25067,22.25068V199.003H560.85494V137.39011A22.25067,22.25067,0,0,0,538.60427,115.13943Z" transform="translate(-204.73854 -84.75407)" fill="#3f3d56"/><path d="M440.85016,714.719c6.5698-4.49614,13.32206-9.17218,21.12382-11.21592,7.11815-1.86465,15.29169-1.37138,20.92177,3.84062,4.54356,4.20617,6.46192,10.671,3.09554,16.20474a10.29789,10.29789,0,0,1-6.82246,4.96408,8.21862,8.21862,0,0,1-7.38872-2.88661c-1.7651-1.95045-2.82116-4.83323-1.88322-7.40419.98627-2.70345,3.62463-4.3568,6.21589-5.27948a46.00407,46.00407,0,0,1,9.27017-1.915l12.89241-1.76494,52.76891-7.22392,58.76538-8.04482a1.83592,1.83592,0,0,0,1.27334-2.24265,1.87009,1.87009,0,0,0-2.24265-1.27334L491.90922,706.48508c-4.2295.579-8.51865.99359-12.70418,1.84428a21.363,21.363,0,0,0-9.12184,3.7888c-5.60138,4.43473-5.20124,12.27858-.04661,16.918,5.21814,4.69652,12.78382,3.888,17.36291-1.29921a15.74343,15.74343,0,0,0,1.19385-19.291c-4.99863-7.53725-14.10711-10.43294-22.81019-9.36395-10.06518,1.23628-18.59831,6.89386-26.77333,12.48856-1.92477,1.31724-.103,4.47836,1.84033,3.14842Z" transform="translate(-204.73854 -84.75407)" fill="#3f3d56"/><path d="M851.14474,579.59059l1.21542,12.15415s-7.29249,26.73911,8.5079,26.73911,3.64624-26.73911,3.64624-26.73911l1.21542-9.72332Z" transform="translate(-204.73854 -84.75407)" fill="#a0616a"/><path d="M961.54032,539.0976,955.96349,549.965s-20.63925,18.49815-7.36938,27.075,17.577-20.47743,17.577-20.47743l6.29883-7.50632Z" transform="translate(-204.73854 -84.75407)" fill="#a0616a"/><path d="M870.59137,590.52932l17.0158,115.46436,8.5079,82.64818s7.29249,18.23121,31.60078,2.43083l-3.64625-47.40116-2.43083-42.5395s-2.43082-41.32409-4.86165-48.61658,1.21541-31.60077,1.21541-31.60077l9.72332-40.10867Z" transform="translate(-204.73854 -84.75407)" fill="#2f2e41"/><path d="M898.5459,786.211l-9.72331,10.93873s-14.585-4.86166-18.23122,4.86165,27.95453,12.15415,27.95453,12.15415,32.81619,2.43083,32.81619,0-.8793-21.02177-5.30131-22.05732S898.5459,786.211,898.5459,786.211Z" transform="translate(-204.73854 -84.75407)" fill="#2f2e41"/><path d="M916.77712,584.45225l17.0158,121.54143,8.5079,82.64818s7.29248,18.23121,31.60077,2.43083l-3.64624-47.40116-2.43083-42.5395s-2.43083-41.32409-4.86166-48.61658,1.21542-31.60077,1.21542-31.60077l-2.43083-44.97033Z" transform="translate(-204.73854 -84.75407)" fill="#2f2e41"/><path d="M944.73165,786.211l-9.72332,10.93873s-14.585-4.86166-18.23121,4.86165,27.95453,12.15415,27.95453,12.15415,32.81618,2.43083,32.81618,0-.8793-21.02177-5.3013-22.05732S944.73165,786.211,944.73165,786.211Z" transform="translate(-204.73854 -84.75407)" fill="#2f2e41"/><circle cx="675.57615" cy="282.13901" r="25.5237" fill="#a0616a"/><polygon points="694.415 293.685 705.354 311.917 677.399 324.071 673.753 302.193 694.415 293.685" fill="#a0616a"/><path d="M913.13087,394.84762s-25.5237-2.43083-35.247,13.36955L853.89409,426.4494a13.82858,13.82858,0,0,0-5.34159,12.82422L869.376,596.60639l30.38536-1.21541,49.832-9.72332,14.585-3.64624-7.29249-64.417s-8.5079-25.5237,1.21541-42.5395l-4.86165-59.5553L919.208,402.1401Z" transform="translate(-204.73854 -84.75407)" fill="#575a89"/><path d="M856.0064,431.31005l-1.82312-3.03854s-2.43083,0-2.43083,4.86166-4.25395,109.995-4.25395,109.995l-1.21541,40.10868,23.09287,2.43082,8.5079-75.35568-3.64624-49.832Z" transform="translate(-204.73854 -84.75407)" fill="#575a89"/><path d="M936.22375,413.07883l17.0158,2.43083a112.94944,112.94944,0,0,1,17.0158,23.09287c7.29248,13.36956,29.16994,38.89326,24.30828,58.33989S975.117,551.63606,975.117,551.63606l-23.09288-9.72331s18.23122-42.5395,17.0158-46.18574-15.80038-25.52371-15.80038-25.52371Z" transform="translate(-204.73854 -84.75407)" fill="#575a89"/><path d="M862.69118,352.91582s-20.662-1.21541-7.29249-14.585c0,0,10.93873-4.86166,15.80039-2.43083,0,0,7.29249-4.86166,7.29249-2.43083,0,0,25.5237-7.29248,29.16994,18.23122s-2.43083,37.67784-2.43083,37.67784l-17.0158-1.21541s3.64624-20.66205-9.72331-18.23122c0,0-10.93873,3.64625-12.15415,0S862.69118,352.91582,862.69118,352.91582Z" transform="translate(-204.73854 -84.75407)" fill="#2f2e41"/><polygon points="667.676 499.09 678.615 426.166 671.322 381.195 673.753 430.109 666.461 499.09 667.676 499.09" opacity="0.2"/></svg>
                </div>
                <div class="col-md-7" id="slider-content">
                    <p class="text-center pt-lg-3">
                        <h1 class="text-center">
                            Recrutez le bon freelancer pour votre projet
                            </h1><h1 class="text-center"><span class="mt-3"><strong>BeEmployer</strong> et transformez vos idées en réalité</span>
                        </h1>
                    </p>
                    <div class="row">
                        <div class="col-6 col-md-5 offset-md-1">
                            <a href="/faq"><button class="btn btn-outline-light btn-lg">Comment ça marche</button></a>
                        </div>
                        <div class="col-6 col-md-5 offset-md-1">
                            <a href="/categorie"><button class="btn btn-outline-light btn-lg">Voir les projets</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="row">
                    <div class="col-10 offset-1 mt-lg-4">
                        <div class="mt-2"></div>
                        <form action="{{route('categorie.index')}}" method="get">
                            <div class="input-group">
                                <input type="text" name=str class="form-control border border-primary" placeholder="Titre du poste ou mots clés">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="container">
                <div class="row py-5 justify-content-center">
                    <div class="col-6 col-md-4">
                        <div class="text-center">
                            <i class="fa fa-suitcase fa-4x"></i>
                            <div>
                                <h3><span class="counter">{{App\projet::cursor()->count()}}</span></h3>
                                <span><b>Projets publiées</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="text-center">
                            <i class="fa fa-legal fa-4x"></i>
                            <div>
                                <h3><span class="counter">{{App\poste::cursor()->count()}}</span></h3>
                                <span><b>Postes publiées</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="text-center">
                            <i class="fa fa-user fa-4x"></i>
                            <div>
                                <h3><span class="counter">{{App\User::cursor()->count()}}</span></h3>
                                <span><b>Active Freelancer</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<div class="bg-light py-5" id='commencer'>
    <div class="container">
        <h2 class="text-center mb-5">Commencer votre carrière</h2>
        <div class="row">
            <div class="col-md-6 d-none d-md-block d-lg-block">
                <svg xmlns="http://www.w3.org/2000/svg" id="add8efa2-ea20-4a06-887e-6413c87b31a4" data-name="Layer 1" width="100%" height="100%" viewBox="0 0 885.86993 622.8043"><title>through_the_park</title><polygon points="461.601 348.37 400.416 348.37 400.416 350.344 409.958 350.344 409.958 369.094 411.932 369.094 411.932 350.344 449.098 350.344 449.098 369.094 451.072 369.094 451.072 350.344 461.601 350.344 461.601 348.37" fill="#3f3d56"/><polygon points="484.299 300.014 468.509 300.014 468.509 315.803 475.829 315.803 475.829 369.007 477.803 369.007 477.803 315.803 484.299 315.803 484.299 300.014" fill="#3f3d56"/><rect x="400.53636" y="342.46486" width="61.18538" height="1.97372" fill="#3f3d56"/><rect x="400.53636" y="337.53055" width="61.18538" height="1.97372" fill="#3f3d56"/><rect x="400.53636" y="332.59625" width="61.18538" height="1.97372" fill="#3f3d56"/><path d="M775.57723,513.38047h-1.97372c0-93.59519-76.14539-169.7401-169.7401-169.7401-93.59518,0-169.74009,76.14491-169.74009,169.7401H432.1496c0-94.68325,77.03057-171.71382,171.71381-171.71382C698.54714,341.66665,775.57723,418.69722,775.57723,513.38047Z" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="161.35177" cy="161.35177" r="161.35177" fill="#4789c6"/><path d="M438.4403,192.17931a161.36436,161.36436,0,0,1-268.85975,170.77,161.36567,161.36567,0,1,0,268.85975-170.77Z" transform="translate(-157.06503 -138.59785)" opacity="0.2"/><polygon points="161.795 161.352 162.238 161.352 170.217 618.811 153.373 618.811 161.795 161.352" fill="#3f3d56"/><rect x="329.05538" y="537.54454" width="7.97893" height="30.14264" transform="translate(509.8146 -138.12101) rotate(62.23413)" fill="#3f3d56"/><circle cx="755.27647" cy="229.8063" r="130.59346" fill="#4789c6"/><path d="M1009.48506,281.178a130.60365,130.60365,0,0,1-217.60732,138.2163A130.60471,130.60471,0,1,0,1009.48506,281.178Z" transform="translate(-157.06503 -138.59785)" opacity="0.2"/><polygon points="755.635 229.806 755.994 229.806 762.452 600.06 748.819 600.06 755.635 229.806" fill="#3f3d56"/><rect x="920.95206" y="560.70661" width="6.45792" height="24.39658" transform="translate(843.51724 -650.35577) rotate(62.23413)" fill="#3f3d56"/><circle cx="369.90725" cy="321.70366" r="20.55846" fill="#4789c6"/><path d="M542.265,446.57008a20.56006,20.56006,0,0,1-34.25647,21.75847A20.56023,20.56023,0,1,0,542.265,446.57008Z" transform="translate(-157.06503 -138.59785)" opacity="0.2"/><polygon points="369.964 321.704 370.02 321.704 371.037 379.99 368.891 379.99 369.964 321.704" fill="#3f3d56"/><rect x="528.32779" y="490.57441" width="1.01663" height="3.84059" transform="translate(561.19589 -343.48173) rotate(62.23413)" fill="#3f3d56"/><circle cx="559.878" cy="255.44299" r="52.63144" fill="#4789c6"/><path d="M756.09357,358.88718A52.63554,52.63554,0,0,1,668.394,414.59075a52.636,52.636,0,1,0,87.69954-55.70357Z" transform="translate(-157.06503 -138.59785)" opacity="0.2"/><polygon points="560.023 255.443 560.167 255.443 562.77 404.662 557.275 404.662 560.023 255.443" fill="#3f3d56"/><rect x="720.41323" y="471.54209" width="2.60265" height="9.83225" transform="translate(650.03004 -522.71764) rotate(62.23413)" fill="#3f3d56"/><path d="M354.5881,734.63564s.68149-14.27971,14.65205-12.61989" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="193.57562" cy="575.45671" r="6.99217" fill="#4789c6"/><rect x="192.43789" y="587.23109" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M403.93115,702.06922s.68149-14.27971,14.652-12.61988" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="242.91867" cy="542.89029" r="6.99217" fill="#4789c6"/><rect x="241.78094" y="554.66468" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M552.67,591.58462s.54127-11.34162,11.63735-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="392.46975" cy="436.6403" r="5.55351" fill="#4789c6"/><rect x="391.56611" y="445.99208" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M769.77945,556.05762s.54127-11.34162,11.63735-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="609.57917" cy="401.1133" r="5.55351" fill="#4789c6"/><rect x="608.67553" y="410.46508" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M562.53864,621.19045s.54127-11.34163,11.63735-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="402.33836" cy="466.24613" r="5.55351" fill="#4789c6"/><rect x="401.43472" y="475.59791" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M538.854,642.90139s.54127-11.34162,11.63735-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="378.6537" cy="487.95707" r="5.55351" fill="#4789c6"/><rect x="377.75006" y="497.30885" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M803.33272,574.808s.54128-11.34162,11.63736-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="643.13244" cy="419.86366" r="5.55351" fill="#4789c6"/><rect x="642.22881" y="429.21544" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M483.58976,599.47951s.54127-11.34163,11.63735-10.02332" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="323.38948" cy="444.53519" r="5.55351" fill="#4789c6"/><rect x="322.48584" y="453.88696" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M740.17362,543.22843s.54127-11.34162,11.63735-10.02331" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="579.97334" cy="388.28411" r="5.55351" fill="#4789c6"/><rect x="579.0697" y="397.63589" width="1.56762" height="10.97337" fill="#3f3d56"/><path d="M268.73119,737.59622s.68149-14.27971,14.652-12.61989" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="107.71872" cy="578.41729" r="6.99217" fill="#4789c6"/><rect x="106.58099" y="590.19168" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M948.67842,733.64878s.68149-14.27971,14.65205-12.61989" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="787.66594" cy="574.46985" r="6.99217" fill="#4789c6"/><rect x="786.52822" y="586.24423" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M891.44048,700.0955s.68149-14.27971,14.65205-12.61988" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="730.42801" cy="540.91657" r="6.99217" fill="#4789c6"/><rect x="729.29028" y="552.69096" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M883.54559,750.42541s.6815-14.27971,14.65205-12.61988" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><circle cx="722.53312" cy="591.24648" r="6.99217" fill="#4789c6"/><rect x="721.39539" y="603.02087" width="1.97372" height="13.81605" fill="#3f3d56"/><path d="M280.09142,761.08258S590.95263,679.17311,587.992,595.28993c-5.42774-23.19124-42.92846-29.1124-42.92846-29.1124s-88.81749-11.84233-40.4613-40.4613,180.59557-21.71094,180.59557-21.71094-136.18682,21.71094-75.9883,33.55327c48.35619,2.96058,110.52843,15.78978,110.52843,15.78978S846.0562,579.99358,863.8197,645.12641s2.96058,115.46273,2.96058,115.46273Z" transform="translate(-157.06503 -138.59785)" fill="#e6e6e6"/><path d="M618.67289,761.40215l-1.16407-1.627q2.4668-1.76367,4.85938-3.50781l1.17773,1.61719Q621.14359,759.63213,618.67289,761.40215Z" transform="translate(-157.06503 -138.59785)" fill="#fff"/><path d="M633.18265,750.72832l-1.207-1.59375c3.23144-2.44727,6.41406-4.90918,9.46-7.31738l1.24023,1.56836C639.61917,745.80254,636.42484,748.27324,633.18265,750.72832Zm18.82324-14.89941-1.27734-1.53907c3.12793-2.59863,6.18652-5.21,9.09082-7.76074l1.32031,1.502C658.22171,730.59453,655.14847,733.21855,652.00589,735.82891Zm18.03223-15.86914-1.36914-1.459c2.98535-2.7998,5.86328-5.60254,8.55469-8.332l1.42382,1.4043C675.93851,714.32012,673.04105,717.14238,670.03812,719.95977Zm16.8584-17.14063-1.48828-1.33594c2.74218-3.05468,5.33593-6.11426,7.709-9.09277l1.56445,1.24609C692.28421,696.64531,689.66507,699.73516,686.89652,702.81914ZM701.84964,683.952,700.1973,682.825c2.32519-3.40723,4.42285-6.80859,6.23437-10.10938l1.75391.9629C706.34281,677.035,704.211,680.492,701.84964,683.952Zm11.5-21.21386-1.86133-.73047a69.37031,69.37031,0,0,0,3.39551-11.29l1.959.40234A71.21576,71.21576,0,0,1,713.34964,662.73809Zm2.66992-23.69629a47.10965,47.10965,0,0,0-1.60839-11.50684l1.93164-.52148a49.17317,49.17317,0,0,1,1.67675,11.99511Zm-5.98339-22.30274a60.32109,60.32109,0,0,0-6.65625-9.66406l1.5332-1.2832a62.27891,62.27891,0,0,1,6.87695,9.98632Zm-14.91993-18.10449a108.36226,108.36226,0,0,0-9.32617-7.34766l1.1543-1.63281a110.07889,110.07889,0,0,1,9.498,7.48438Zm-19.34863-13.78418c-3.27148-1.92285-6.80078-3.8418-10.4873-5.70312l.90039-1.78516c3.72558,1.87988,7.292,3.81933,10.60058,5.76367Zm-21.29687-10.81445c-3.48145-1.54688-7.18946-3.10352-11.02149-4.62793l.74024-1.85742c3.85547,1.5332,7.58789,3.10058,11.09375,4.65722ZM632.23539,565.157c-3.56348-1.292-7.37305-2.61816-11.32129-3.94141l.63476-1.89648c3.96387,1.3291,7.78906,2.66016,11.36817,3.957Zm-22.73145-7.64648c-3.48535-1.09961-7.2373-2.25684-11.47119-3.53907l.58008-1.91406c4.24072,1.28418,8.00048,2.44434,11.49267,3.54492Zm-22.979-6.99317c-4.0459-1.21-7.90332-2.36621-11.51465-3.47851l.58886-1.91211c3.60645,1.1123,7.458,2.2666,11.499,3.47461Zm-22.98389-7.1875a95.0565,95.0565,0,0,1-11.26416-4.53418l.89941-1.78711a92.76387,92.76387,0,0,0,11.019,4.43067Zm-15.103-13.11035-1.42578-1.40234c1.82324-1.85254,5.42969-3.665,11.02539-5.542l.63574,1.89649C553.45658,526.9207,550.01273,528.61992,548.438,530.21953Zm21.67676-8.30566-.4834-1.94141c3.459-.86133,7.39942-1.76269,11.71192-2.67871l.415,1.957C577.46878,520.16094,573.5513,521.05742,570.11478,521.91387Zm23.36963-5.01856-.375-1.96484c3.68506-.7041,7.65381-1.4336,11.79687-2.168l.34961,1.96875C601.12113,515.46465,597.16117,516.19219,593.48441,516.89531ZM617.05374,512.7l-.33007-1.97266q5.65283-.94775,11.83105-1.93847l.31641,1.97461Q622.69827,511.75371,617.05374,512.7Z" transform="translate(-157.06503 -138.59785)" fill="#fff"/><path d="M640.9307,508.865l-.30664-1.97656q2.9165-.45119,5.93554-.91114l.30079,1.97657Q643.84281,508.41387,640.9307,508.865Z" transform="translate(-157.06503 -138.59785)" fill="#fff"/><path d="M685.194,305.71659l9.08474-7.26606c-7.05753-.77863-9.95734,3.07039-11.14411,6.11693-5.51363-2.28947-11.51587.711-11.51587.711l18.17688,6.59885A13.75483,13.75483,0,0,0,685.194,305.71659Z" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><path d="M516.44078,361.96766l9.08474-7.26605c-7.05753-.77864-9.95734,3.07039-11.14411,6.11692-5.51363-2.28946-11.51587.711-11.51587.711l18.17688,6.59885A13.75487,13.75487,0,0,0,516.44078,361.96766Z" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><path d="M560.84953,245.51807l9.08473-7.26606c-7.05753-.77863-9.95733,3.07039-11.14411,6.11693-5.51363-2.28947-11.51587.711-11.51587.711l18.17688,6.59885A13.75484,13.75484,0,0,0,560.84953,245.51807Z" transform="translate(-157.06503 -138.59785)" fill="#3f3d56"/><path d="M659.609,569.03965s-7.86875,0-8.74306,4.80868-2.18577,57.267-1.31146,63.82431.87431,5.24584.87431,5.24584-1.743,12.4609,2.18858,13.00631S656.5489,641.607,656.5489,641.607l3.06008-53.33264Z" transform="translate(-157.06503 -138.59785)" fill="#9e616a"/><path d="M693.7069,569.03965s7.86875,0,8.74306,4.80868,2.18577,57.267,1.31146,63.82431-.8743,5.24584-.8743,5.24584,1.743,12.4609-2.18859,13.00631S696.767,641.607,696.767,641.607l-3.06008-53.33263Z" transform="translate(-157.06503 -138.59785)" fill="#9e616a"/><path d="M658.29752,751.76952h-3.49721a7.86866,7.86866,0,0,0-7.86875,7.86857v.00018H668.352V749.58375H658.29752Z" transform="translate(-157.06503 -138.59785)" fill="#2f2e41"/><path d="M691.95829,751.76952h3.49721a7.86867,7.86867,0,0,1,7.86875,7.86857v.00018H681.90377V749.58375h10.05452Z" transform="translate(-157.06503 -138.59785)" fill="#2f2e41"/><circle cx="516.09568" cy="409.02131" r="11.36598" fill="#9e616a"/><path d="M670.53781,553.73931s-1.31146,14.426-3.06008,15.73749,18.36042-.8743,18.36042-.8743-6.99444-10.49167-5.683-13.98889S670.53781,553.73931,670.53781,553.73931Z" transform="translate(-157.06503 -138.59785)" fill="#9e616a"/><path d="M696.32981,569.03965s-24.04341-10.05451-39.78091,0c0,0-3.93436,10.05451-.87431,15.7375s7.86875,19.23472,3.06008,28.41493.43716,5.24584.43716,5.24584-6.12014,24.48056-6.99445,43.71525,2.62293,88.30487,5.24583,88.742,10.92883,1.31146,11.80314,0,6.99444-92.67636,6.99444-92.67636,2.62292,93.55069,5.24582,93.55069,9.61737,0,10.92883-2.18577,12.24027-86.55625,8.30591-104.04235-6.55729-26.22917-6.55729-26.22917,4.80867-3.06007,3.49723-4.80869-7.86877-20.54616-4.80869-23.60625S696.32981,569.03965,696.32981,569.03965Z" transform="translate(-157.06503 -138.59785)" fill="#2f2e41"/><circle cx="523.30871" cy="402.17104" r="18.36042" fill="#2f2e41"/><path d="M691.83867,531.57749a12.36814,12.36814,0,0,1-9.33162-14.29294c-.05359.188-.104.37762-.14921.57a12.36847,12.36847,0,0,0,24.0811,5.65832c.0452-.19233.08448-.38459.12022-.57676A12.36815,12.36815,0,0,1,691.83867,531.57749Z" transform="translate(-157.06503 -138.59785)" fill="#2f2e41"/><circle cx="535.52108" cy="386.38703" r="8.98489" fill="#2f2e41"/></svg>
            </div>
            <div class="col-md-6" style="postion:relative">
                <div id="ps1" class="text-center">
                    <h3 class="commencer">avec <strong>Beemployer</strong> vous pouvez commencer votre carrière professionnelle,</h3>
                    <h3 class="commencer">démotrer vos compétences,</h3>
                    <h3 class="commencer">réaliser des projets et enricher votre portfolio.</h3> 
                </div> 
                
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-2">
    <div class="container my-4">
                <h3 class="text-center mb-3">Les categories</h3>
                <div class="row">
                    @foreach($categories as $categorie)
                        <div class="col-md-6 col-lg-4 categories">
                            <div class="card mb-2">
                                <a href="{{'/categorie/'.$categorie->lienDeCategorie}}" class="text-dark">
                                    <i class="card-img-top mw-100 fa {{$categorie->logo}}" alt="Card image cap"
                                        style="font-size: 3rem;"></i>
                                    <div class="card-body">
                                      <h4 class="card-title">{{$categorie->intitule}}</h4>
                                      <p class="card-text">{{substr($categorie->description,0,50)}}</p>
                                    </div>
                                </a>
                             </div>
                        </div>
                    @endforeach
                </div>
                
                  </div>
</div>

              
                </div>
            </div>
            </div>
            </div>

@endsection
@section('script')
@auth
<script>
    $(document).ready(function(){ var resp;
    val=$("#id").val();
           $.ajax({
               url:"/notification/read/"+val,
               type:"GET",
               data:{
                   "id":$("#id").val(),
               },
               success:function(response){
                if(Object.keys(response).length != 0){
                    $("#notif").html("");
                    $("#nbrnot").html("<span class='badge badge-primary rounded-circle'>"+Object.keys(response).length+"</span>");
                    $.each(response, function (index, order) {
                        $("#notif").append('<li class="list-group-item"><span>'+order.data+'</span></li>');
                    });
                }
              },
              error:function(response){
                console.log(response); 
              },
           })
});
setInterval(function(){
    val=$("#id").val();
          $.ajax({
              url:"/notification/read/"+val,
              type:"GET",
              data:{
                  "id":$("#id").val(),
              },
              success:function(response){
                if(Object.keys(response).length != 0){
                    $("#notif").html("");
                    $("#nbrnot").html("<span class='badge badge-primary rounded-circle'>"+Object.keys(response).length+"</span>");
                    $.each(response, function (index, order) {
                        $("#notif").append('<li class="list-group-item"><span>'+order.data+'</span></li>');
                    });
                }
              },
              error:function(response){
                console.log(response); 
              },
          })
},3000);
</script>
@endauth
<script>
        $(document).ready(function(){
            if($('.navbar').offset().top < 20){
                $('#logo').attr('src','{{asset("/images/logo-white.png")}}');
                $('.navbar-nav.notification a, .navbar-nav.projet a, .navbar-nav.guest a').attr('style','color:white ! important');
                $('.navbar').attr('style','background:transparent !important;box-shadow:none !important');
            }
            else{
            $('#logo').attr('src','{{asset("/images/logo2.png")}}');
             $('.navbar-nav.notification a, .navbar-nav.projet a, .navbar-nav.guest a').attr('style','color:black ! important');
             $('.navbar').attr('style','background:#fafafa; box-shadow: 0px 0px 10px -2px #4789C6');
        } 
        });
        $(document).on('scroll',function(){
        if($('.navbar').offset().top < 20){
            $('#logo').attr('src','{{asset("/images/logo-white.png")}}');
            $('.navbar-nav.notification a, .navbar-nav.projet a, .navbar-nav.guest a').attr('style','color:white ! important');
            $('.navbar').attr('style','background:transparent !important;box-shadow:none !important');
        }
        else{
            $('#logo').attr('src','{{asset("/images/logo2.png")}}');
            $('.navbar-nav.notification a, .navbar-nav.projet a, .navbar-nav.guest a').attr('style','color:black ! important');
             $('.navbar').attr('style','background:#fafafa; box-shadow: 0px 0px 10px -2px #4789C6');
        }
    }); 
</script>
@endsection