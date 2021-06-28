<tr>
    <td>{{ $feedback->email }}</td>
    <td>{{ $feedback->message }}</td>
    <td>{{ $feedback->created_at->toFormattedDateString() }}</td>
</tr>
