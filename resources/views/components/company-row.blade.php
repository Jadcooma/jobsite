@props(['company'])

    <td>{{ $company->name }}</td>
    <td>{{ $company->sector }} </td>
    <td>
        <button class="text-xs p-1 ml-2 font-bold bg-yellow-200 rounded">
            Wijzig
        </button>
        <button class="text-xs p-1 ml-2 font-bold bg-red-200 rounded">
            Verwijder
        </button>
    </td>
</tr>