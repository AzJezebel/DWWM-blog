<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Développement Web',
                'slug' => 'developpement-web',
                'created_at' => now(),
            ],
            [
                'name' => 'Voyages et Découvertes',
                'slug' => 'voyages-et-decouvertes',
                'created_at' => now(),
            ],
            [
                'name' => 'Photographie Créative',
                'slug' => 'photographie-creative',
                'created_at' => now(),
            ],
            [
                'name' => 'Lecture et Littérature',
                'slug' => 'lecture-et-litterature',
                'created_at' => now(),
            ],
            [
                'name' => 'Programmation Informatique',
                'slug' => 'programmation-informatique',
                'created_at' => now(),
            ],
            [
                'name' => 'Cuisine Gastronomique',
                'slug' => 'cuisine-gastronomique',
                'created_at' => now(),
            ],
            [
                'name' => 'Bien-être et Santé',
                'slug' => 'bien-etre-et-sante',
                'created_at' => now(),
            ],
            [
                'name' => 'Culture et Arts',
                'slug' => 'culture-et-arts',
                'created_at' => now(),
            ],
            [
                'name' => 'Astuces Pratiques',
                'slug' => 'astuces-pratiques',
                'created_at' => now(),
            ],
            [
                'name' => 'Tutoriels Débutants',
                'slug' => 'tutoriels-debutants',
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
