<tr>
    <td><strong>{{ $category->name }}</strong></td>
    <td><code style="background:#f5f5f5;padding:2px 8px;border-radius:4px;font-size:13px;">{{ $category->slug }}</code></td>
    <td>
        <span class="article-count">{{ $category->articles_count ?? $category->articles->count() }}</span>
    </td>
    <td class="actions">
        {{-- View button --}}
        {{-- <a href="{{ route('categories.show', $category->id) }}" 
           class="icon-btn" 
           title="Voir">
            👁️
        </a> --}}

        {{-- Edit button --}}
        <a href="{{ route('categories.edit', $category->id) }}" 
           class="icon-btn" 
           title="Modifier">
            ✎
        </a>

        {{-- Delete button with confirmation --}}
        <form action="{{ route('categories.destroy', $category->id) }}" 
              method="POST" 
              style="display:inline;"
              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="icon-btn" title="Supprimer">✕</button>
        </form>
    </td>
</tr>