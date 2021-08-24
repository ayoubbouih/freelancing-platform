<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'intitule'=>'Développement Web et logiciel',
                'logo'=>'fa-file-code-o',
                'description'=>'Ingénieur logiciel, développeur Web, Mobile et plus',
                'lienDeCategorie'=>Str::slug('Développement Web et logiciel','-')
            ],
            [
                'intitule'=>'Data Science et Analitycs',
                'logo'=>'fa-cloud-upload',
                'description'=>'Data Spécialiste, Scientifique, Data Analyste et plus',
                'lienDeCategorie'=>Str::slug('Data Science et Analitycs','-')
            ],
            [
                'intitule'=>'Comptabilité et conseil',
                'logo'=>'fa-suitcase',
                'description'=>'Auditeur, comptable, analyste financier et plus',
                'lienDeCategorie'=>Str::slug('Comptabilité et conseil','-')
            ],
            [
                'intitule'=>'Rédaction et traductions',
                'logo'=>'fa-pencil',
                'description'=>'Concepteur-rédacteur, rédacteur créatif, traducteur, etc',
                'lienDeCategorie'=>Str::slug('Rédaction et traductions','-')
            ],
            [
                'intitule'=>'Ventes et Marketing',
                'logo'=>'fa-pie-chart',
                'description'=>'Chef de marque, coordinateur marketing et plus',
                'lienDeCategorie'=>Str::slug('Ventes et Marketing','-')
            ],
            [
                'intitule'=>'Graphics et Design',
                'logo'=>'fa-image',
                'description'=>'Directeur créatif, concepteur Web et plus',
                'lienDeCategorie'=>Str::slug('Graphics et Design','-')
            ],
            [
                'intitule'=>'Digital Marketing',
                'logo'=>'fa-bullhorn',
                'description'=>'Analyste marketing, administrateur de profil social, etc',
                'lienDeCategorie'=>Str::slug('Digital Marketing','-')
            ],
            [
                'intitule'=>'Éducation et formation',
                'logo'=>'fa-graduation-cap',
                'description'=>'Conseiller, entraîneur, coordonnateur de l\'éducation et plus',
                'lienDeCategorie'=>Str::slug('Éducation et formation','-')
            ],
        ]);
    }
}
