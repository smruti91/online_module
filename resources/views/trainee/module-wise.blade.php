

@extends('../layouts.app')
@section('content')

  <div class="pagetitle">
    <h1>Dashboard</h1>
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
          <div class="row">


             <div class="col-md-6">
                <h2 class="mb-4">Module-Wise Training Programs</h2>

                <div class="accordion" id="modulesAccordion">

                    @foreach ($modules as $module)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $module->id }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $module->id }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $module->id }}" style="background: bisque;margin: 5px;">
                                {{ $module->module_name }} <!-- Module Name -->
                            </button>
                        </h2>
                        <div id="collapse{{ $module->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            aria-labelledby="heading{{ $module->id }}" data-bs-parent="#modulesAccordion">
                            <div class="accordion-body">
                                @if ($module->courses->isNotEmpty())
                                    <ul>
                                        @foreach ($module->courses as $course)
                                            <li class="list-group-item course-item" style="cursor: pointer;" data-course-id="{{ $course->id }}" >{{ $course->course_name }}</li> <!-- Course Name -->
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No courses available under this module.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
             </div>

             <div class="col-md-6">
                <h4>Related Programs</h4>
                <div id="related-programs" class="p-3 border rounded" style="min-height: 200px;">
                    <p>Select a course to view related programs.</p>
                </div>
             </div>
        </div>
        //modals
        <div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="programModalLabel">Program Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Content will be loaded here dynamically -->
                        <div id="programDetailsContent"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="programModalLabel">Subject and Topic Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Content will be loaded here dynamically -->
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Subjects</h5>
                                <div class="table-responsive" id="subjectTbl"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>Topics</h5>
                                <div class="table-responsive" id="topicTbl"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#programModal">Back</button>
                    </div>
                </div>
            </div>
        </div>
         </div>
  </section>

@endsection

@section('script')
$(document).ready(function () {
    $('.course-item').on('click', function () {
        let courseId = $(this).data('course-id');

        // Make an AJAX request to fetch related programs
        $.ajax({
            url: "{{ url('/module') }}/" + courseId + "/programs",
            type: "GET",
            success: function (response) {
                if (response.status === 'success') {
                    let programs = response.programs;
                    let html = '';

                    if (programs.length > 0) {
                        html += '<ul class="list-group">';
                        programs.forEach(function (program) {
                            html += `<li class="list-group-item program-item" data-program-id="${program.id}" style="background-color: #4d57cb;color: #ffffff;margin-bottom: 10px;cursor: pointer;" >
                                ${program.program_name}</li>`;
                        });
                        html += '</ul>';
                    } else {
                        html = '<p>No related programs found.</p>';
                    }

                    $('#related-programs').html(html);
                } else {
                    $('#related-programs').html('<p>Error fetching data. Please try again.</p>');
                }
            },
            error: function () {
                $('#related-programs').html('<p>An error occurred. Please try again.</p>');
            }
        });
    });

    $(document).on('click', '.program-item', function () {
        let programId = $(this).data('program-id');

        // Fetch data via AJAX
        $.ajax({
            url: "{{ route('get.program.details') }}", // Route to fetch details
            type: "POST",
            data: { program_id: programId },
            success: function (response) {
                if (response.status === 'success') {
                    $('#programDetailsContent').html(response.html);
                    $('#programModal').modal('show'); // Show modal
                } else {
                    alert('Failed to load program details.');
                }
            },
            error: function () {
                alert('An error occurred while fetching data.');
            }
        });
    });

    $(document).on('click', '.detailSubject', function () {
        let programId = $(this).attr('data-programId');
        $.ajax({
            url: "{{ route('fetch.allSubjects') }}", // Your route to fetch courses
            type: 'POST',
            data: {
                course_id: programId
            },
            success: function(response) {
                console.log(response)

                $('#subjectTbl').html(response);
                $('#subjectModal').modal('show');


            },
            error: function(xhr) {
                console.error(xhr);
                $('#moduleWrap').html('<p>An error occurred while fetching courses.</p>');
            }
        });
    });


    $(document).on('click', '.subject', function () {
        let subjectId = $(this).attr('data-subjectId');
        console.log(subjectId);

        $.ajax({
            url: "{{ route('fetch.allTopics') }}", // Your route to fetch courses
            type: 'POST',
            data: {
                subject_id: subjectId
            },
            success: function(response) {
                console.log(response)

                $('#topicTbl').html(response);

            },
            error: function(xhr) {
                console.error(xhr);
                $('#moduleWrap').html('<p>An error occurred while fetching courses.</p>');
            }
        });
    });

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
                    location.reload();

                }
            },
            error: function(xhr) {
                console.error(xhr);
                $('#moduleWrap').html('<p>An error occurred while fetching courses.</p>');
            }
        });
    });
});
@endsection


