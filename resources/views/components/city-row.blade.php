@props(['city'])

<td class="pr-2">{{ $city->name }}</td>
<td class="pr-2">{{ $city->code }} </td>
<td>
    <button class="text-xs p-1 ml-2 font-bold bg-yellow-200 rounded">
        <a href="/admin/city/edit/{{ $city->id }} ">
            Wijzig
        </a>
    </button>
    <button type="submit" form="form_{{ $city->id }}" class="text-xs p-1 ml-2 font-bold bg-red-200 rounded">
        Verwijder
    </button>
    <form id="form_{{ $city->id }}" method="POST" action="/admin/city/delete/{{ $city->id }}">
        @csrf
        @method('DELETE')
    </form>
</td>
</tr>