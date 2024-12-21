

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

             <div class="uaser_list">
               <table class="table table-striped" id="users_tbl">
                 <thead>

                   <tr>
                     <th scope="col">SL No</th>
                     <th scope="col">Program</th>

                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                    @foreach($programs as $program)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $program->program->program_name ?? 'N/A' }}</td>

                        <td>
                            @if($program->status == 1)
                                Pending At Course Co-ordinating Officer
                            @elseif($program->status == 2)
                                Approved

                            @else
                                Unknown
                            @endif
                        </td>
                        <!-- Actions -->
                        <td>


                            <!-- Send to Approve Button (if status is 1) -->
                            @if($program->status == 2)
                             <!-- Edit Button -->
                             <a href="http://localhost/otm/users/trainee_class.php" class="btn btn-sm btn-primary">Go to Class</a>

                             <!-- Delete Button -->

                            @endif
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
               </table>
             </div>


         </div>
  </section>

@endsection

@section('script')


@endsection
