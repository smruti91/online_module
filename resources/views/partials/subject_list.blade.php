@if ($subjects->isEmpty())
   <p>No Programs available for this module.</p>
@else
<table class="table">
    <thead>
        <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Subject</th>
            <!-- <th scope="col">Type</th> -->
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject )

        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$subject->subject_name}}</td>
            <td><button class="btn btn-primary subject" data-subjectId="{{$subject->id}}">
                    Details
                </button></td>
        </tr>
        @endforeach

    </tbody>
</table>

@endif
