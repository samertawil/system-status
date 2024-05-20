<table class="table">
    <thead class="text-center">
        <tr>
            <th>id</th>
            <th>status_name</th>
            <th>parent_id</th>
            <th>used in system</th>
            <th>routes name</th>
            <th>page name</th>
            <th>desc</th>
            <th>r_name</th>
        </tr>
    </thead>
    <tbody class="text-center">

        @foreach ($statuses_data as $status_data)
            <tr>
                <td>{{ $status_data->id }}</td>
                <td>{{ $status_data->status_name }}</td>
                @if ($status_data->p_id)
                    <td>{{ $status_data->parentname->status_name }}</td>
                @else
                    <td class="text-info fw-bold"> /// </td>
                @endif

                <td>{{ $status_data->used_in_system }}</td>
                <td>{{$status_data->route_name}}</td>
                <td>{{$status_data->page_name}}</td>
                <td>{{ $status_data->description }}</td>
                <td>{{ $status_data->route_system_name }}</td>
            </tr>
        @endforeach


    </tbody>
</table>