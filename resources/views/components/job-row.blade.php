@props(['job'])

<td class="pr-2 pb-2">{{ $job->function }}</td>
<td class="pr-2 pb-2">{{ $job->company-> name }} </td>
<td class="pr-2 pb-2">{{ $job->city-> name }}</td>
<td>
    <button class="text-xs p-1 ml-2 font-bold bg-yellow-200 rounded">
        <a href="/admin/jobs/edit/{{ $job->id }}">Wijzig</a>
    </button>
    <button type="submit" form="form_{{ $job->id }}" class="text-xs p-1 ml-2 font-bold bg-red-200 rounded">
        Verwijder
    </button>
    <form id="form_{{ $job->id }}" method="POST" action="/admin/jobs/delete/{{ $job->id }}">
        @csrf
        @method('DELETE')
    </form>
</td>
</tr>