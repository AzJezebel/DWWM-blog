<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $firstCategoryId = DB::table('categories')->oldest('id')->value('id');
        $firstUserId = DB::table('users')->oldest('id')->value('id');

        $articles = [
            [
                'title' => 'Bienvenue sur mon blog',
                'slug' => 'bienvenue-sur-mon-blog',
                'content' => 'Ceci est mon tout premier article sur ce blog. Je suis ravi de partager avec vous mes réflexions et découvertes. Au fil des prochains articles, je parlerai de divers sujets qui me passionnent comme le développement web, la photographie et les voyages. N hésitez pas à laisser des commentaires et à partager vos propres expériences.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Les bases du développement web',
                'slug' => 'les-bases-du-developpement-web',
                'content' => 'Le développement web est un domaine fascinant qui ne cesse d évoluer. Dans cet article, je vous propose de découvrir les fondamentaux : HTML pour la structure, CSS pour le style et JavaScript pour l interactivité. Ces trois langages forment la base de tout site internet moderne et sont accessibles aux débutants.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Mes astuces pour voyager pas cher',
                'slug' => 'mes-astuces-pour-voyager-pas-cher',
                'content' => 'Voyager ne doit pas forcément rimer avec dépenser une fortune. Après plusieurs années à parcourir le monde, j ai compilé mes meilleures astuces pour économiser : réserver ses billets à l avance, privilégier les auberges de jeunesse, utiliser les transports locaux et manger dans les marchés. Avec un peu de préparation, on peut découvrir des merveilles sans se ruiner.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Pourquoi j aime la photographie argentique',
                'slug' => 'pourquoi-j-aime-la-photographie-argentique',
                'content' => 'À l heure du tout numérique, la photographie argentique connaît un regain d intérêt. Personnellement, j adore le grain, les couleurs et la lenteur du processus. Développer ses propres pellicules est une expérience presque magique qui nous reconnecte à l essence même de la photographie. Chaque cliché compte et cela change complètement notre façon de shooter.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => '10 livres à lire absolument en 2026',
                'slug' => '10-livres-a-lire-absolument-en-2026',
                'content' => 'La lecture est une porte ouverte sur d autres mondes. Cette année, j ai sélectionné dix ouvrages qui m ont particulièrement marqué. Des romans contemporains aux essais philosophiques en passant par des recueils de poésie, il y en a pour tous les goûts. Je vous invite à découvrir ces pépites littéraires qui ont enrichi ma réflexion et mon imaginaire.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Comment débuter en programmation Python',
                'slug' => 'comment-debuter-en-programmation-python',
                'content' => 'Python est aujourd hui l un des langages de programmation les plus prisés. Sa syntaxe claire et sa polyvalence en font un excellent choix pour les débutants. Dans ce tutoriel, je vous guide pas à pas pour installer Python, écrire votre premier script Hello World et comprendre les bases comme les variables, les boucles et les fonctions.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Ma recette de pain maison facile',
                'slug' => 'ma-recette-de-pain-maison-facile',
                'content' => 'Rien ne vaut l odeur du pain frais qui sort du four. Après de nombreux essais, j ai trouvé la recette parfaite pour un pain croustillant à l extérieur et moelleux à l intérieur. Il ne vous faut que de la farine, de l eau, du sel et un peu de levure. Le plus dur est d attendre que la pâte lève. Mais croyez-moi, le résultat en vaut la peine.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Les bienfaits de la méditation quotidienne',
                'slug' => 'les-bienfaits-de-la-meditation-quotidienne',
                'content' => 'La méditation a transformé ma vie. En pratiquant seulement dix minutes par jour, j ai constaté une réduction significative de mon stress, une meilleure concentration et un sommeil réparateur. Dans cet article, je partage quelques techniques simples pour débuter et les conseils qui m ont aidé à intégrer cette pratique dans mon quotidien bien chargé.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Mon voyage au Japon : carnet de bord',
                'slug' => 'mon-voyage-au-japon-carnet-de-bord',
                'content' => 'Le Japon est un pays qui m a toujours fasciné. Lors de mon récent voyage, j ai découvert un mélange unique de traditions ancestrales et de modernité ultratechnologique. Des temples de Kyoto aux ruelles animées de Tokyo, chaque instant était une nouvelle aventure. Je vous raconte ici mes coups de cœur, mes bonnes adresses et mes anecdotes de voyage.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Les erreurs à éviter en tant que débutant blogueur',
                'slug' => 'les-erreurs-a-eviter-en-tant-que-debutant-blogueur',
                'content' => 'Démarrer un blog est une aventure excitante mais comporte son lot d embûches. Après plusieurs mois d expérience, j ai identifié les erreurs les plus fréquentes : négliger le référencement, publier de manière irrégulière, ignorer son audience ou encore choisir une thématique trop large. Je vous livre mes conseils pour débuter du bon pied et fidéliser vos lecteurs.',
                'created_at' => now(),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
        ];

        DB::table('articles')->insert($articles);
    }
}