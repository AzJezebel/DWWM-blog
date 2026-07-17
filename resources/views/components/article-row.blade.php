<tr>
    <td><a href="{{ route('article.show', ['slug' => $article->slug]) }}" class="article-link">{{ $article->title }}</a></td>
    <td>{{ $article->category->name }}</td>
    <td>
        <span class="status-dot status-{{ strtolower($article->status) }}"></span>
        {{ $article->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
    </td>
    <td>{{ $article->created_at->format('d/m/Y') }}</td>
    <td class="actions">
        <a href="{{ route('admin.article-edit', $article) }}" class="icon-btn" title="Modifier">✎</a>
        <form action="{{ route('admin.article-delete', $article) }}" method="POST" class="inline-action-form" onsubmit="return confirm('Supprimer cet article ? Cette action est irréversible.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="icon-btn" title="Supprimer">✕</button>
        </form>         
        <form action="{{ route('admin.article-publish', $article) }}" method="POST" class="inline-action-form">
            @csrf
            @method('PATCH')
            <button type="submit" class="icon-btn" title="Publier">➤</button>
        </form>
    </td>
</tr>