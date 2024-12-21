@if ($topics->isEmpty())
   <p>No Programs available for this module.</p>
@else
<table class="table">
    <thead>
        <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Topic</th>
            <!-- <th scope="col">Type</th> -->
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic )

        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$topic->topic_name}}</td>
            <td></td>
        </tr>
        @endforeach

    </tbody>
</table>

@endif
