<tr>
    <td><strong>{{ $category->name }}</strong></td>
    <td><code style="background:#f5f5f5;padding:2px 8px;border-radius:4px;font-size:13px;">{{ $category->slug }}</code></td>
    <td>
        <span class="article-count">{{ $category->articles_count ?? $category->articles->count() }}</span>
    </td>
    <td class="actions">
        <button type="button" class="icon-btn" title="Modifier" disabled>✎</button>
        <button type="button" class="icon-btn" title="Supprimer" disabled>✕</button>
    </td>
</tr>