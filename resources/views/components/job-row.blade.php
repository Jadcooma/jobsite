@props(['job'])

    <td>{{ $job->function }}</td>
    <td>{{ $job->company-> name }} </td>
    <td>{{ $job->city-> name }}</td>
    <td>
        <button class="text-xs p-1 ml-2 font-bold bg-yellow-200 rounded">
            Wijzig
        </button>
        <button class="text-xs p-1 ml-2 font-bold bg-red-200 rounded">
            Verwijder
        </button>
    </td>
</tr>