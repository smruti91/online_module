{{-- @extends('panel.layouts.app'); --}}
@extends('../layouts.app');
@section('content')
    <div class="pagetitle">
        <h1>Question Bank</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Manage Question Bank</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                <label for="">Select Course</label>
                <select name="" id="clt_course" name="course_id" class="form-select">
                    <option value="0">Choose Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Select Subject</label>
                <select name="" id="clt_subject" name="subject_id" class="form-select">
                    <option value="0">Choose Subject</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary mt-4">View</button>
            </div>
        </div>
        <div class="row">
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary col-2 mt-3" data-bs-toggle="modal"
                data-bs-target="#QuestionModal">
                Add Questions
            </button>

            <!-- Modal -->
            <div class="modal fade" id="QuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Exam Subject Question Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="exam_subject_question_form">

                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Question Title</label>
                                    <div class="col-sm-9">
                                        <!-- <input type="text" name="exam_subject_question_title" id="exam_subject_question_title" class="form-control" required data-parsley-trigger="keyup" /> -->
                                        <textarea class="form-control" id="exam_subject_question_title" name="exam_subject_question_title" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Option 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="option_title_1" id="option_title_1" autocomplete="off"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Option 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="option_title_2" id="option_title_2" autocomplete="off"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Option 3</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="option_title_3" id="option_title_3" autocomplete="off"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Option 4</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="option_title_4" id="option_title_4" autocomplete="off"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-sm-3 col-form-label">Answer</label>
                                    <div class="col-sm-9">
                                        <select name="exam_subject_question_answer" id="exam_subject_question_answer"
                                            class="form-select" required>
                                            <option value="0">Select</option>
                                            <option value="1">1 Option</option>
                                            <option value="2">2 Option</option>
                                            <option value="3">3 Option</option>
                                            <option value="4">4 Option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">


                                    <input type="button" name="submit" id="submit_button"
                                        class="btn btn-success add-question" value="Add" />
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 question_list"  id="question_list">

                @foreach($questions as $question)
                <h2>{{ strip_tags($question->question_title) }}</h2>
                <ul>
                    @foreach($question->options as $option)

                        <li>
                            {{ $option->option_value }}

                            @if($option->is_correct)
                            <span class="text-success">Correct</span>

                            @endif

                        </li>
                    @endforeach
                </ul>
            @endforeach
          </div>

        </div>
    </section>
@endsection

@section('script')
    $(document).ready(function(){
    CKEDITOR.replace('exam_subject_question_title');
    $('#clt_course').on('change',function(){
    var course_id = $(this).val();
    $.ajax({
    url: "{{ route('get.subject') }}",
    data: {course_id:course_id},
    dataType:" json",
    success:function(data){
    console.log(data);
    $('#clt_subject').empty();
    $.each(data, function(key,value){
    $('#clt_subject').append('<option value="'+value.id+'">'+value.subject_name+'</option>');

    });

    }
    });

    });

    $('.add-question').on('click',function(){
    var subject_id = $('#clt_subject').val();
    var course_id = $('#clt_course').val();
    var question_title = CKEDITOR.instances['exam_subject_question_title'].getData();
    var option_title_1 = $('#option_title_1').val();
    var option_title_2 = $('#option_title_2').val();
    var option_title_3 = $('#option_title_3').val();
    var option_title_4 = $('#option_title_4').val();

    var write_option = $('#exam_subject_question_answer').val();


    $.ajax({
    url: "{{ route('add.question') }}",
    method:'POST',
    data: {subject_id:subject_id,course_id:course_id, question_title:question_title,option_title_1,
    option_title_2, option_title_3, option_title_4, write_option},
    dataType:"json",
    success:function(data){
    console.log(data);
    $('#exam_subject_question_title').val('');
    $('#clt_subject').val('');
    $('#clt_course').val('');
     if(data.status == 'success'){
        alert('Question Added Successfully');
        location.reload();
     }
    }
    });

    })
    })
@endsection
