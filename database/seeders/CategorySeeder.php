<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $categories = [
            [
                'name' => 'Développement Web',
                'slug' => 'developpement-web',
                'created_at' => '2026-01-15 09:30:00',
                'updated_at' => '2026-01-15 09:30:00',
            ],
            [
                'name' => 'Voyages et Découvertes',
                'slug' => 'voyages-et-decouvertes',
                'created_at' => '2026-01-18 14:20:00',
                'updated_at' => '2026-01-18 14:20:00',
            ],
            [
                'name' => 'Photographie Créative',
                'slug' => 'photographie-creative',
                'created_at' => '2026-01-21 11:45:00',
                'updated_at' => '2026-01-21 11:45:00',
            ],
            [
                'name' => 'Lecture et Littérature',
                'slug' => 'lecture-et-litterature',
                'created_at' => '2026-01-24 16:00:00',
                'updated_at' => '2026-01-24 16:00:00',
            ],
            [
                'name' => 'Programmation Informatique',
                'slug' => 'programmation-informatique',
                'created_at' => '2026-01-27 08:15:00',
                'updated_at' => '2026-01-27 08:15:00',
            ],
            [
                'name' => 'Cuisine Gastronomique',
                'slug' => 'cuisine-gastronomique',
                'created_at' => '2026-01-30 13:30:00',
                'updated_at' => '2026-01-30 13:30:00',
            ],
            [
                'name' => 'Bien-être et Santé',
                'slug' => 'bien-etre-et-sante',
                'created_at' => '2026-02-02 19:45:00',
                'updated_at' => '2026-02-02 19:45:00',
            ],
            [
                'name' => 'Culture et Arts',
                'slug' => 'culture-et-arts',
                'created_at' => '2026-02-05 07:00:00',
                'updated_at' => '2026-02-05 07:00:00',
            ],
            [
                'name' => 'Astuces Pratiques',
                'slug' => 'astuces-pratiques',
                'created_at' => '2026-02-08 10:10:00',
                'updated_at' => '2026-02-08 10:10:00',
            ],
            [
                'name' => 'Tutoriels Débutants',
                'slug' => 'tutoriels-debutants',
                'created_at' => '2026-02-11 17:30:00',
                'updated_at' => '2026-02-11 17:30:00',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
