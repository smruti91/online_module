@if($programs && $programs->count() > 0)

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Program Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>VC Dates</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
                <tr>
                    <!-- Access program name safely -->
                    <td>{{ $program->program->program_name ?? 'N/A' }}</td>

                    <!-- Access start and end dates safely -->
                    <td>{{ $program->start_date ?? 'N/A' }}</td>
                    <td>{{ $program->end_date ?? 'N/A' }}</td>

                    <!-- Display multiple VC Dates -->
                    <td>
                        @if($program->programVcDates && $program->programVcDates->count() > 0)
                            <ul>
                                @foreach($program->programVcDates as $vcDate)
                                    <li>
                                        {{ $vcDate->description ?? 'VC Date' }}:
                                        {{ $vcDate->vc_date ?? 'N/A' }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            No VC Dates Available
                        @endif
                    </td>
                    <td>
                        <input class="btn btn-primary btn-sm detailSubject" data-programId = {{$program->id}} type="button" value="View Subjects">
                        <input class="btn btn-warning btn-sm requestToEnroll" data-programId = {{$program->id}} type="button" value="Request To Enroll">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No programs available for the given ID.</p>
@endif
