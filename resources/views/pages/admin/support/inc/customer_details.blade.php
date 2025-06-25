<div class="row">
    <div class="col-12">
        <table class="table table-borderless">
            <tr>
                <th class="w-25">Customer</th>
                <td>{{ $ticket->name }}</td>
            </tr>
            <tr>
                <th class="w-25">Email</th>
                <td>{{ $ticket->email }}</td>
            </tr>
            <tr>
                <th class="w-25">Phone</th>
                <td>{{ isset($ticket->phone) ? $ticket->phone : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-25">Status</th>
                <td>
                    @if($ticket->is_read == 1)
                        <span class="text-success">Replied</span>
                    @else
                        <span class="text-warning">Pending</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="w-25">Date</th>
                <td>
                    {{ $ticket->created_at }}
                </td>
            </tr>
        </table>
    </div>
</div>