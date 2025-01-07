

@extends('../layouts.app')
@section('content')

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Practice Test</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard min-vh-100 py-4">
        <div class="container">

            <table class="table table-hover">
                <thead>
                    <th>Sl No</th>
                    <th>Subject Name</th>
                    <th>Exam Status</th>
                    <th>Mark</th>
                    <th>Action</th>

                </thead>
                <tbody>

                    @foreach($tests as $test)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $test->subject->subject_name }}</td>
                        <td>
                            @if (in_array($test->id, $examStatus))
                                <span class="text-success">Completed</span>
                            @else
                                <span class="text-danger">Not Completed</span>
                            @endif
                        </td>
                        <td>NA</td>
                        <td>
                            @if (!$allCompleted)
                               <p class="text-danger">Complete All the Topics</p>
                               @else
                               <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#examModal">Start Exam</a>

                               <div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="queryModalLabel">Exam Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong> Exam Duration :</strong> {{$test->exam_duration}} minutes</p>
                                            <p><strong>No. Of Questions :</strong> {{$test->total_question}}</p>
                                            <p><strong>Each question have  :</strong> {{$test->mark_per_right_ans}} marks</p>
                                            <p><strong>Each Write Ans  :</strong> {{$test->mark_per_right_ans}}  marks</p>
                                            <p><strong>Each Wrong Ans  :</strong> {{$test->marks_per_wrong_answer}} marks</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('start.test') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="subject_id" value="{{ $test->subject_id }}">
                                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                                <button type="submit" class="btn btn-primary">
                                                    Practice Text
                                                </button>
                                            </form>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

         </div>
  </section>

@endsection

@section('script')
$(document).ready(function () {

});
@endsection


