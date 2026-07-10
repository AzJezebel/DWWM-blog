<tr>
    <td>{{ $article->title }}</td>
    <td>{{ $article->category->name }}</td>
    <td>
        <span class="status-dot status-{{ $article->status }}"></span>
        {{ $article->status === 'published' ? 'Publié' : 'Brouillon' }}
    </td>
    <td>{{ $article->created_at->format('d/m/Y') }}</td>
    <td class="actions">
        <button type="button" class="icon-btn" title="Modifier" disabled>✎</button>
        <button type="button" class="icon-btn" title="Supprimer" disabled>✕</button>
        <button type="button" class="icon-btn" title="Publier" disabled>➤</button>
    </td>
</tr>