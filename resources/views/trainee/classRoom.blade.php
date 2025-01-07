@extends('../layouts.app')
@section('content')

  {{-- <div class="pagetitle">
    <h1>Classes </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Training Class</li>
      </ol>
    </nav>
  </div> --}}

  <section class="section dashboard min-vh-100 ">
    <div class="container-fluid mt-2 pt-2">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-md-4">
                <h4>Subjects</h4>
                <div class="progress my-3">
                    <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"
                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        0%
                    </div>
                </div>
                <p id="progressText" class="text-center">0 of 0 Lessons Completed</p>

                <div class="accordion" id="subjectAccordion">
                    @foreach ($subjects as $subject)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $subject->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $subject->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $subject->id }}">
                                    {{ $subject->subject_name }}
                                </button>
                            </h2>
                            <div id="collapse{{ $subject->id }}" class="accordion-collapse collapse"
                                 aria-labelledby="heading{{ $subject->id }}" data-bs-parent="#subjectAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group subject-list">
                                        @forelse ($subject->topics as $topic)
                                            @php
                                                $isCompleted = isset($progress[$topic->id]);
                                            @endphp
                                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                                style="font-size:15px">
                                                {{ $topic->topic_name }}
                                                <div class="actionBtns d-flex justify-content-between align-items-center">
                                                    <button class="btn btn-sm btn-primary play-btn mx-1"
                                                            data-ppt="{{ $topic->ppt_file }}"
                                                            data-topicId="{{ $topic->id }}"
                                                            data-topicName="{{ $topic->topic_name }}">
                                                        Play
                                                    </button>
                                                    <div class="form-check position-relative">
                                                        <input class="form-check-input ml-1 chkComplete"
                                                               data-topicId="{{ $topic->id }}"
                                                               data-subjectId="{{ $subject->id }}" type="checkbox"
                                                               {{ $isCompleted ? 'checked' : '' }}>
                                                        <span class="text-success d-none mark-complete-text">Mark as Complete</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="list-group-item">No topics available</li>
                                        @endforelse
                                    </ul>
                                </div>

                                <form action="{{ route('practice-test') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                    <input type="hidden" name="program_id" value="{{ $program_id  }}">
                                    <button type="submit" class="btn btn-primary">Practice Text

                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-md-8">
                <div class="player text-center">
                    <iframe id="pptViewer" src="" frameborder="0" width="660" height="1000"
                            style="height: 450px;" allowfullscreen="true" allow="autoplay"
                            mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                </div>

                <div class="col-12 d-none" id="option_area">
                    <!-- Modal Area -->
                    <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="queryModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="queryForm" class="mt-3 ">
                                        <form id="queryFormContent">
                                            <div class="mb-3">
                                                <label for="queryTopic" class="form-label">Query Type</label>
                                                <select class="form-select" aria-label="Default select example" id="queryType">
                                                    <option selected>Select Query Type</option>
                                                    <option value="1">Subject Related</option>
                                                    <option value="2">Technical Related</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 techType" style="display:none" >
                                                <label for="queryTopic" class="form-label">Select One Type</label>
                                                <select class="form-select techQueryType" aria-label="Default select example">
                                                    <option value="0" selected>Select Query Type</option>
                                                    <option value="1">Sound is not audible</option>
                                                    <option value="2">PPT is not visible</option>
                                                    <option value="3">Could not download the PPT, PDF</option>
                                                    <option value="4">Unable to access the file</option>
                                                    <option value="5">Others</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 queryDesc d-none">
                                                <label for="queryDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="queryDescription" rows="4"
                                                    placeholder="Describe your query"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-success" id="submitQueryBtn">Submit Query</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="raiseQueryBtn">Raise a Query</button>
                    <div class="query_div mt-2" id="queryTableContainer" style="padding: 10px;border: 1px solid #1931c5; background: aliceblue;width: 100%;box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4p">
                        <table class="table table-striped table-hover">
                           <thead>
                            <th>Sl No</th>
                            <th>Topic Name</th>
                            <th>Query Type</th>
                            <th>Technical Type</th>
                            <th>Query Description</th>
                            <th>Status</th>
                            <th>Remark</th>
                           </thead>
                           <tbody>
                            <tr></tr>
                           </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection

@section('script')
document.addEventListener('DOMContentLoaded', function() {
    document.body.classList.add('toggle-sidebar');
});

document.addEventListener('DOMContentLoaded', () => {
    const subjectList = document.querySelectorAll('.subject-list > li');
    const playButtons = document.querySelectorAll('.play-btn');
    const pptViewer = document.getElementById('pptViewer');
    const raiseQueryBtn = document.getElementById('raiseQueryBtn');
    const submitQueryBtn = document.getElementById('submitQueryBtn');
    const checkboxes = document.querySelectorAll('.chkComplete');
    const progressBar = document.getElementById('progressBar');
    let currentTopicId = null;
    let currentTopicName = null;

    // Toggle topics on subject click
    subjectList.forEach(subject => {
        subject.addEventListener('click', () => {
            const topicList = subject.querySelector('.topic-list');
            topicList.style.display = topicList.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Play PPT and audio
    playButtons.forEach(button => {
        button.addEventListener('click', () => {
            const pptFile = button.getAttribute('data-ppt');
            const topicId = button.getAttribute('data-topicId');
            const topicName = button.getAttribute('data-topicName');
            currentTopicId = topicId;
            currentTopicName = topicName;

            loadRiseQuery(topicId);
            $('#option_area').removeClass('d-none');
            const relativePath = `../online_module/public/slides/${pptFile}/index.html`;

            // Create an absolute URL
            const absoluteUrl = new URL(relativePath, window.location.origin).href;
            pptViewer.src = absoluteUrl;
        });
    });

    raiseQueryBtn.addEventListener('click', () => {
        $('#queryModalLabel').html(`Raise a query for Subject - "${currentTopicName}"`);
        $('#queryModal').modal('show');
    });
    $('#queryType').change(function(){
        if($(this).val() == '2'){
            $('.techType').css('display','block');
            $('.queryDesc').addClass('d-none');
        }else{
            $('.techType').css('display','none');
            $('.queryDesc').removeClass('d-none');
        }
    });
    $('.techQueryType').change(function(){
        if($(this).val() == '5'){
            $('.queryDesc').removeClass('d-none');
        }else{
            $('.queryDesc').addClass('d-none');
        }
    })
    submitQueryBtn.addEventListener('click', () => {

        const queryDesc = $('#queryDescription').val();
        const queryType = $('#queryType').val();
        const techQueryType = $('#techQueryType').val()??null;


        $.ajax({
            url: '{{ route('query.store') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                queryType: queryType,
                queryDesc: queryDesc,
                techQueryType:techQueryType,
                program_id:program_id,
                currentTopicId: currentTopicId
            },
            success: function(response) {
               // console.log(request);
                if (response.status === 'success') {
                    $('#queryModal').modal('hide');
                    $('.message_div').html(`<div class="alert alert-success" role="alert">${response.message}</div>`);
                    loadRiseQuery(currentTopicId);
                }
            }
        });
    });

    // Update progress dynamically
    function updateProgress() {
        const totalTopics = checkboxes.length;
        const completedTopics = Array.from(checkboxes).filter(chk => chk.checked).length;
        const progressPercent = Math.round((completedTopics / totalTopics) * 100);

        progressBar.style.width = `${progressPercent}%`;
        progressBar.setAttribute('aria-valuenow', progressPercent);
        progressBar.textContent = `${progressPercent}%`;

        progressText.textContent = `${completedTopics} of ${totalTopics} Lessons Completed`;
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateProgress);

        checkbox.addEventListener('click', function () {
            const topicId = this.getAttribute('data-topicId');
            const subjectId = this.getAttribute('data-subjectId');
            const isChecked = this.checked;
            const program_id = @json($program_id);

            // Send the completion status to the server
            $.ajax({
                url: '{{route('save.progress')}}', // Laravel route to handle the save request
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    topic_id: topicId,
                    subject_id: subjectId,
                    program_id:program_id,
                    status: isChecked ? 1 : 0, // 1 for complete, 0 for incomplete
                },
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        console.log('Progress saved successfully.');
                        // Optionally, update the UI or display a success message
                    } else {
                        console.error('Failed to save progress.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error saving progress:', error);
                },
            });
        });
    });

    updateProgress(); // Initial update

    //complete topic



});

function loadRiseQuery(topicId) {
    const program_id = @json($program_id);
    $.ajax({
        url: '{{ route('query.load') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            topicId: topicId,
            program_id:program_id
        },
        success: function(response) {
            console.log(response);
            let cells=[];
            response.data.forEach((data,index)=>{
                 cells = [
                item => index + 1,
                item =>item.topic ? item.topic.topic_name : 'N/A',
                item =>item.query_type == 1?"Subject Related":"Technical Related",
                item =>item.techQuery ? item.techQuery.name : 'N/A',
                item =>item.query_desc,
                item =>item.status == 1 ?"Pending":"Solved",
                item =>item.remarks


            ];
            })
            const headers = ['ID','Topic Name', 'Query Type', 'Tech Query Name','Query Desc', 'Status', 'Remark'];
            createQueryTable(response.data, headers, cells);
           // $('.query_div').html(response);
        }
    });
}

@endsection
