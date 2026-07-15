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
        $query = Article::query()
            ->with('category')
            ->where('status', 'PUBLISHED');
        
        // // Apply category filter if present
        // if (request()->has('category') && request('category') != '') {
        //     $query->where('category_id', request('category'));
        // }
        
        // // Apply tag filter if present (if you have tags implemented)
        // if (request()->has('tag') && request('tag') != '') {                                                                    
        //     // If you have a tags relationship
        //     // $query->whereHas('tags', function($q) {
        //     //     $q->where('name', request('tag'));
        //     // });
        // }
        
        $articles = $query->latest()->paginate(4)->withQueryString();
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
    
    public function show(string $slug)
    {
        // Find article by slug instead of ID
        $article = Article::with(['user', 'category'])->where('slug', $slug)->firstOrFail();

        return view('user.article-details', compact('article'));
    }
}
