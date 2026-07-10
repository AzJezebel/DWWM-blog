<article class="article-card">
    <div class="article-card-top">
        <div class="tags">
            <span class="tag">{{ $article->category->name }}</span>
        </div>
        <time class="article-date">{{ $article->created_at->translatedFormat('d M. Y') }}</time>
    </div>
    <h2 class="article-title">{{ $article->title }}</h2>
    <p class="article-excerpt">{{ Str::limit($article->content, 160) }}</p>
    <a href="#" class="read-link">Lire →</a>
</article>