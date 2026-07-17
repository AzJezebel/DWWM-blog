<tr>
    <td><a href="{{ route('articles.show', ['slug' => $article->slug]) }}" class="article-link">{{ $article->title }}</a></td>
    <td>{{ $article->category->name }}</td>
    <td>
        <span class="status-dot status-{{ strtolower($article->status) }}"></span>
        {{ $article->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
    </td>
    <td>{{ $article->created_at->format('d/m/Y') }}</td>
    <td class="actions">
        <a href="{{ route('admin.article-edit', $article) }}" class="icon-btn" title="Modifier">✎</a>
        <button type="button" class="icon-btn" title="Supprimer" disabled>✕</button>
        <button type="button" class="icon-btn" title="Publier" disabled>➤</button>
    </td>
</tr>