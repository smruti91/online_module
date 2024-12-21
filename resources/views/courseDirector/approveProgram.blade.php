

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

             <div class="uaser_list">
               <table class="table table-striped" id="users_tbl" style="font-size: 12px;" >
                 <thead>

                   <tr>
                     <th scope="col">SL No</th>
                     <th scope="col">Module</th>
                     <th scope="col">Course</th>
                     <th scope="col">Program</th>
                     <th scope="col">Start Date</th>
                     <th scope="col">End Date</th>
                     <th scope="col">Enroll Start Date</th>
                     <th scope="col">Enroll End Date</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                    @foreach($programs as $program)
                    <tr>
                        <td>{{ $program->id }}</td>
                        <td>{{ $program->module->module_name ?? 'N/A' }}</td>
                        <td>{{ $program->course->course_name ?? 'N/A' }}</td>
                        <td>{{ $program->program->program_name ?? 'N/A' }}</td>
                        <td>{{ $program->start_date }}</td>
                        <td>{{ $program->end_date }}</td>
                        <td>{{ $program->en_start_date }}</td>
                        <td>{{ $program->en_end_date }}</td>
                        <td>
                            @if($program->status == 1)
                                Draft
                            @elseif($program->status == 2)
                                Pending
                            @elseif($program->status == 3)
                                Approve
                            @else
                                NA
                            @endif
                        </td>
                        <!-- Actions -->
                        <td>
                            @if($program->status == 2)
                            <a href="#" data-programId = {{ $program->id }} class="btn btn-sm btn-primary approvebtn">Approve</a>
                            <a href="#" data-programId = {{ $program->id }} class="btn btn-sm btn-danger">Reject</a>

                            @endif
                            @if($program->status == 3)
                              Approved
                            @endif


                        </td>
                    </tr>
                    @endforeach
                 </tbody>
               </table>
             </div>

             <div class="modal fade" id="AddVcModal" tabindex="-1" aria-labelledby="motal_title" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h1 class="modal-title fs-5" id="motal_title"> Program Program </h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                     <form class="row g-3 " id="newProgramfrm" action="#" method="post">
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-4 col-form-label">Start Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="start_date" class="form-control" id="start_date" readonly >
                            </div>
                          </div>
                          <div class="row mb-3 mt-2">
                            <label class="col-sm-4 col-form-label">End Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="end_date" class="form-control" id="end_date" readonly>
                            </div>
                          </div>
                          <hr>
                          <span class="text-info" >VC Date & Exam Date should be between Start Date and End Date</span>
                          <small class="text-danger" id="errMsg" ></small>
                          <div class="row mb-3 mt-2">
                            <label class="col-sm-4 col-form-label">VC-1 Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="vc1_date" class="form-control" id="vc1_date" >
                            </div>
                          </div>
                          <div class="row mb-3 mt-2">
                            <label class="col-sm-4 col-form-label">VC-2 Date </label>
                            <div class="col-sm-8">
                                <input type="date" name="vc2_date" class="form-control" id="vc2_date" >
                            </div>
                          </div>
                          <div class="row mb-3 mt-2">
                            <label class="col-sm-4 col-form-label">Exam Date </label>
                            <div class="col-sm-8">
                                <input type="date" name="exam_date" class="form-control" id="exam_date" >
                            </div>
                          </div>
                          <input type="hidden" name="program_id" id="program_id" >
                     </form>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" id="approveBtn" >Approve</button>
                   </div>
                 </div>
               </div>
             </div>
         </div>
  </section>

@endsection

@section('script')

$('.approvebtn').click('approvebtn',function(){
   const programId = $(this).attr('data-programId')

   $.ajax({
        url: "{{ route('cd.getPrograms') }}", // Your route to fetch courses
        type: 'POST',
        dataType: 'json',
        data: {
            programId: programId,

        },
        success: function(data) {
            console.log(data[0].start_date)
            if (data.error) {
                alert(data.error);
            } else {
             $('#start_date').val(data[0].start_date);
             $('#end_date').val(data[0].end_date);
             $('#program_id').val(data[0].program_id);
             $('#AddVcModal').modal('show');
            }

        },
        error: function(xhr) {
            console.error(xhr);
            $('#program').html('<p>An error occurred while fetching program.</p>');
        }
    });
})
//approve program
$('#approveBtn').click(function(){
   const programId = $('#program_id').val();
   const start_date = convertToDMY($('#start_date').val()); // Convert date
   const end_date = convertToDMY($('#end_date').val());     // Convert date
   const vc1_date = convertToDMY($('#vc1_date').val());
   const vc2_date = convertToDMY($('#vc2_date').val());
   const exam_date = convertToDMY($('#exam_date').val());

   console.log(start_date,end_date);

    $.ajax({
         url: "{{ route('cd.approveProgram') }}", // Your route to fetch courses
         type: 'POST',
         dataType: 'json',
         data: {
             programId: programId,
             start_date:start_date,
             end_date:end_date,
             vc1_date:vc1_date,
             vc2_date:vc2_date,
             exam_date:exam_date

         },
         success: function(data) {
             console.log(data)
             $('#errMsg').html('');
             if (data.error) {
                 alert(data.error);
             } else {
               location.reload();
              //$('#AddVcModal').modal('show');
             }

         },
         error: function(xhr) {
             console.error(xhr);
             if (xhr.status === 422) {
                // Extract validation errors
                const errors = xhr.responseJSON.errors;
                let errorMessage = '';
                for (const field in errors) {
                    errorMessage += errors[field].join('\n') + '\n <br>';
                }
                $('#errMsg').html(errorMessage);
               // alert("Validation Errors:\n" + errorMessage);
            } else {
                alert('An unexpected error occurred. Please try again later.');
            }
         }
     });
 })

 // Function to convert yyyy-mm-dd to dd-mm-yyyy
function convertToDMY(date) {
    if (!date) return '';
    const parts = date.split('-'); // Split date into parts
    return `${parts[2]}-${parts[1]}-${parts[0]}`; // Rearrange to dd-mm-yyyy
}
@endsection
