@extends('../layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Enrolled Programs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Manage Program</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard min-vh-100 py-4">
        <div class="container">
            <!-- End Logo -->

            <div class="programs">


                @foreach ($programs as $program)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h2>Enrollement Program Details </h2> <!-- Accessing the module relationship -->
                        </div>
                        <div class="card-body">
                            <p><strong>Module Name:</strong> {{ $program->module->module_name ?? 'N/A' }}</p>
                            <p><strong>Course Name:</strong> {{ $program->course->course_name ?? 'N/A' }}</p>
                            <!-- Accessing the course relationship -->
                            <p><strong>Duration:</strong> {{ $program->duration }} days</p>
                            <p><strong>Start Date:</strong> {{ $program->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $program->end_date }}</p>
                            <p><strong>Enrollment Start Date:</strong> {{ $program->en_start_date }}</p>
                            <p><strong>Enrollment End Date:</strong> {{ $program->en_end_date }}</p>


                            <hp>VC Dates</hp>
                            <ul>
                                @foreach ($program->programVcDates as $vcDate)
                                    <li>{{ $vcDate->description ?? 'N/A' }} :- {{ $vcDate->vc_date ?? 'N/A' }}</li>
                                    <!-- Accessing programVcDates -->
                                @endforeach
                            </ul>
                            <p><strong>Panel Discussion Date:</strong> {{ $program->exam_date }}</p>
                            <p><strong>Exam Date:</strong> {{ $program->exam_date }}</p>
                            <div class="btn btn-info askRequestToenroll" data-program-id = {{ $program->id }} > Request To Enroll </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>


    </section>
      <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Enroll Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 programWrap">
                          <p>1. Traing the programme will start within 7 days of enrollment.</p>
                          <p>2. One parcticipant has to appear all subjec examination.</p>
                          <p>3. One trainee during this period of training has to attend one ve mandatorily.</p>
                          <p>4. The final examination will be held at MPRAFM on the date mentioned.</p>
                          <p>5. Before final examination one trainee will sit in the panel discussion</p>
                          <p>6. After completion of examination and after submission of Feedback one can download cpmpletion certificate</p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>
@endsection

@section('script')
    $('.askRequestToenroll').on('click', function () {
        const program_id = $(this).attr('data-program-id');
        $('.modal-footer').html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning requestToEnroll" data-programId = ${program_id} data-bs-dismiss="modal">Enroll</button>
`)
      $('#enrollModal').modal('show')
    })

    $(document).on('click', '.requestToEnroll', function () {
        let programId = $(this).attr('data-programId');

        $.ajax({
            url: "{{ route('requestToEnroll') }}", // Your route to fetch courses
            type: 'POST',
            data: {
                program_id: programId
            },
            success: function(data) {
                console.log(data)

                if (data.error) {
                    alert(data.error);
                } else {
                    alert(data.message);
                   window.location.reload = "route('get.enrolledPrograms')"

                }
            },
            error: function(xhr) {
                console.error(xhr);
                $('#moduleWrap').html('<p>An error occurred while fetching courses.</p>');
            }
        });
    });
@endsection
