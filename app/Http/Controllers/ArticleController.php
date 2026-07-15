<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private array $placeholderTags = ['Tag 1', 'Tag 2', 'Tag 3'];
    public function index(): View {
        // $articles = Article::all();
        
        $query = Article::query()->with('category');
        $articles = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();
        
        $data = [
            'articles'   => $articles,
            'categories' => $categories,
            'tags'       => $this->placeholderTags,
        ];

        return session('is_admin') ? view('admin.articles-list', $data) : view('user.articles-list', $data);
    }
 
    public function toggleAdmin()
    {
        session(['is_admin' => ! session('is_admin', false)]);
    
        return back();
    }
    
    public function show(Article $article)
    {
        // Charger les relations nécessaires
        $article->load(['user', 'category']);

        return view('user.article-details', compact('article'));
    }
}
