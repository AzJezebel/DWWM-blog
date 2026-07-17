<article class="article-card">
    <div class="article-card-top">
        <div class="tags">
            <span class="tag">{{ $article->category->name }}</span>
        </div>
        <time class="article-date">{{ $article->created_at->translatedFormat('d M. Y') }}</time>
    </div>
    <h2 class="article-title">
        <a href="{{ route('article.show', ['slug' => $article->slug]) }}" class="article-link">
            {{ $article->title }}
        </a>
    </h2>
    <p class="article-excerpt">{{ Str::limit($article->content, 160) }}</p>
    <a href="{{ route('article.show', ['slug' => $article->slug]) }}" class="read-link">Lire →</a>
</article>