<div class="container">
    <table class="table border text-center" id="mytable" style="direction: rtl;">
        <thead>
            <tr>
                <th>id</th>
                <th>ability name</th>
                <th>ability desc</th>
                <th>activion</th>
                <th>url</th>
                <th>module name</th>
                <th>desc</th>
                <th>control</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($abilities as $key => $ability)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $ability->ability_name }}</td>
                    <td>{{ $ability->ability_description }}</td>
                    <td><span @class([
                        'text-success' => $ability->activation == 'active',
                        'text-danger' => $ability->activation == 'not active',
                    ])>{{ $ability->activation }}</span></td>
                    <td>{{ $ability->url }}</td>
                    <td>{{ $ability->modulename->status_name }}</td>
                    <td>{{ $ability->description }}</td>
                    <td></td>

                </tr>
            @endforeach



        </tbody>
    </table>
</div>