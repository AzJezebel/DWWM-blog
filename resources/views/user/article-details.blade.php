@extends('layouts.user')

@section('title', $article->title)

@section('content')
    <div class="article-detail-container">
        {{-- Retour à la liste --}}
        <a href="{{ route('articles.index') }}" class="back-link">← Retour à la liste</a>

        {{-- En-tête de l'article --}}
        <header class="article-header">
            <div class="tags">
                <span class="tag category-tag">{{ $article->category->name }}</span>
                @if(isset($article->tags) && $article->tags->isNotEmpty())
                    @foreach($article->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                    @endforeach
                @endif
            </div>

            <h1 class="article-title">{{ $article->title }}</h1>

            <div class="article-meta">
                <span class="author">Par {{ $article->user->name ?? 'Auteur inconnu' }}</span>
                <span class="separator">·</span>
                <time class="article-date">{{ $article->created_at->translatedFormat('d M. Y') }}</time>
            </div>
        </header>

        {{-- Contenu complet --}}
        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>

        {{-- Section commentaires --}}
        <section class="comments-section">
            <h2 class="comments-title">2 commentaires</h2>

            {{-- Commentaire 1 --}}
            <div class="comment" id="comment-1">
                <div class="comment-header">
                    <strong class="comment-author">Henri Amédépan</strong>
                    <time class="comment-date">15 jan. 2026</time>
                </div>
                <p class="comment-content">Contenu du commentaire. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin, turpis sit amet placerat elementum, libero nisl rhoncus nisl, in consequat justo nisi et arcu.</p>
            </div>

            {{-- Commentaire 2 --}}
            <div class="comment" id="comment-2">
                <div class="comment-header">
                    <strong class="comment-author">Théa Louest</strong>
                    <time class="comment-date">13 jan. 2026</time>
                </div>
                <p class="comment-content">Contenu du commentaire. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin, turpis sit amet placerat elementum, libero nisl rhoncus nisl, in consequat justo nisi et arcu.</p>
            </div>

            {{-- Espace commentaire (visiteur) --}}
            <div class="comment-cta">
                <p class="cta-message">Connectez-vous pour commenter</p>
                <a href="#" class="btn-pill login-btn">Se connecter</a>
            </div>

            {{-- OU pour utilisateur connecté (commenté pour l'instant) --}}
            {{-- 
            <div class="comment-form-wrapper">
                <h3 class="form-title">Laisser un commentaire</h3>
                <form class="comment-form">
                    <div class="form-group">
                        <textarea 
                            class="form-control" 
                            rows="4" 
                            placeholder="Votre commentaire..."
                        ></textarea>
                    </div>
                    <button type="submit" class="btn-pill submit-btn">Publier</button>
                </form>
            </div>
            --}}
        </section>
    </div>
@endsection
{{-- Styles pour la page --}}
@push('styles')
<style>/* Add these styles after your existing CSS in app.blade.php */

/* Article Detail Page Styles */
.article-detail-container {
    max-width: 800px;
    margin: 0 auto;
}

.back-link {
    display: inline-block;
    margin-bottom: 30px;
    color: #666;
    text-decoration: underline;
    font-size: 0.95rem;
    transition: color 0.2s;
}

.back-link:hover {
    color: #000;
}

.article-header {
    margin-bottom: 40px;
}

.article-header .tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 15px;
}

.article-header .tag {
    display: inline-block;
    padding: 4px 12px;
    background: #f0f0f0;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #555;
}

.article-header .tag::before,
.article-header .tag::after {
    content: none;
}

.category-tag {
    background: #e3f2fd;
    color: #1976d2;
    font-weight: 500;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 15px 0 10px 0;
    line-height: 1.2;
    color: #1a1a1a;
}

.article-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 0.95rem;
    margin-top: 10px;
}

.article-meta .author {
    font-weight: 500;
    color: #333;
}

.article-meta .separator {
    color: #ccc;
}

.article-meta .article-date {
    color: #888;
    font-size: 0.95rem;
}

.article-content {
    margin-bottom: 50px;
    line-height: 1.8;
    font-size: 1.1rem;
    color: #333;
    padding-top: 20px;
    border-top: 1px solid #ddd;
}

.article-content p {
    margin-bottom: 1.5rem;
}

/* Horizontal rule style */
.article-divider {
    border: none;
    border-top: 1px solid #ddd;
    margin: 40px 0;
}

/* Comments Section */
.comments-section {
    border-top: 1px solid #ddd;
    padding-top: 30px;
    margin-top: 10px;
}

.comments-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 25px;
    color: #1a1a1a;
}

.comment {
    padding: 20px 0;
    border-bottom: 1px solid #f0f0f0;
}

.comment:last-of-type {
    border-bottom: none;
}

.comment-header {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 8px;
    flex-wrap: wrap;
}

.comment-author {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 0.95rem;
}

.comment-header .separator {
    color: #ccc;
    margin: 0 4px;
}

.comment-date {
    color: #999;
    font-size: 0.85rem;
}

.comment-content {
    margin: 0;
    color: #444;
    line-height: 1.6;
    font-size: 0.95rem;
}

.no-comments {
    color: #888;
    font-style: italic;
    padding: 20px 0;
}

/* Comment CTA (for visitors) */
.comment-cta {
    margin-top: 30px;
    padding: 30px 20px;
    text-align: center;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.cta-message {
    margin: 0 0 15px 0;
    color: #555;
    font-size: 1rem;
}

/* Login button in comment CTA */
.comment-cta .btn-pill {
    background: #111;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    display: inline-block;
    transition: background 0.2s;
}

.comment-cta .btn-pill:hover {
    background: #333;
}

/* Comment form for logged-in users */
.comment-form-wrapper {
    margin-top: 30px;
    padding: 25px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.form-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0 0 15px 0;
    color: #1a1a1a;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: inherit;
    font-size: 0.95rem;
    transition: border-color 0.2s;
    resize: vertical;
    background: #fff;
}

.form-control:focus {
    outline: none;
    border-color: #000;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
}

.submit-btn {
    background: #111;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: background 0.2s;
}

.submit-btn:hover {
    background: #333;
}

/* Error states */
.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 5px;
}

/* Edit comment form */
.edit-comment-form {
    margin: 10px 0;
}

.edit-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.cancel-btn {
    background: #f0f0f0;
    color: #333;
    border: 1px solid #ddd;
    padding: 10px 24px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: background 0.2s;
}

.cancel-btn:hover {
    background: #e0e0e0;
}

.comment-action {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 0.85rem;
    padding: 2px 8px;
    border-radius: 3px;
    text-decoration: underline;
}

.edit-btn {
    color: #0066cc;
}

.edit-btn:hover {
    background: #e6f0ff;
}

.delete-btn {
    color: #dc3545;
}

.delete-btn:hover {
    background: #ffe6e6;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .article-detail-container {
        padding: 0 15px;
    }

    .article-title {
        font-size: 1.8rem;
    }

    .article-content {
        font-size: 1rem;
    }

    .comment-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }

    .comment-cta {
        padding: 20px 15px;
    }

    .article-header .tags {
        gap: 6px;
    }

    .article-header .tag {
        font-size: 0.75rem;
        padding: 3px 10px;
    }
}

/* Print styles */
@media print {
    .back-link,
    .comment-cta,
    .comment-form-wrapper {
        display: none;
    }

    .article-detail-container {
        max-width: 100%;
    }

    .article-header .tag {
        background: #f0f0f0;
        color: #000;
    }

    .category-tag {
        background: #e3f2fd;
        color: #1976d2;
    }
}

/* Animation for comment actions */
.comment-action {
    transition: opacity 0.2s;
}

.comment-action:hover {
    opacity: 0.7;
}

/* Style for article link in card */
.article-link {
    color: inherit;
    text-decoration: none;
}

.article-link:hover {
    color: #0066cc;
}

/* Admin simulation link styling (already in your CSS, but ensure consistency) */
.admin-sim-link {
    text-decoration: none;
    border: 1px solid #000;
    border-radius: 20px;
    padding: 6px 14px;
    transition: all 0.2s;
}

.admin-sim-link:hover {
    background: #000;
    color: #fff;
}
</style>
@endpush