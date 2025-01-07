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
                     <th scope="col">Course</th>
                     <th scope="col">Start Date</th>
                     <th scope="col">End Date</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody>

                    @foreach($programs as $program)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Training Program on Financial matters for different department officers</td>
                        <td>{{ \Carbon\Carbon::parse($program->program->start_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($program->program->end_date)->format('d-m-Y') }}</td>
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
                             <x-redirect-form :id="$program->id" type="class">
                                Go To Class
                            </x-redirect-form>

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
