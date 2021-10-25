@props(['company'])

<td class="pr-2">{{ $company->name }}</td>
<td class="pr-2">{{ $company->sector }} </td>
<td>
    <button class="text-xs p-1 ml-2 font-bold bg-yellow-200 rounded">
        <a href="/admin/company/edit/{{ $company->id }}">Wijzig</a>
    </button>
    <button type="submit" form="form_{{ $company->id }}" class="text-xs p-1 ml-2 font-bold bg-red-200 rounded">
        Verwijder
    </button>
    <form id="form_{{ $company->id }}" method="POST" action="/admin/company/delete/{{ $company->id }}">
        @csrf
        @method('DELETE')
    </form>
</td>
</tr>