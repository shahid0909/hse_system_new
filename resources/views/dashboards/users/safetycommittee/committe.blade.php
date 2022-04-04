@extends('layouts.app')

@section('title')

@endsection

@section('style')
@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')

        @if ($message = Session::get('success'))
            <div class="alert alert-success message">
                <p>{{ $message }}</p>
            </div>
        @endif
        <h3 class="bg bg-success text-center text-white">Generate Committe</h3>
        <form method="post" action="{{ route('committee.store') }}" id="committee" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">

                <div class="col-sm-6">
                    <label class="form-label">Select Designation</label>
                    <select name="designation_id"
                            id="designation_id" class="form-control col-md-12">
                        <option value="">Select Designation</option>
                        <option value="CHAIRMAN">Chairman</option>
                        <option value="SECRETARY">Secretary</option>
                        <option value="EMPLOYEE REPRESENTATIVE">EMPLOYEE REPRESENTATIVE</option>
                        <option value="MANAGEMENT/EMPLOYER REPRESENTATIVE">
                            MANAGEMENT/EMPLOYER REPRESENTATIVE
                        </option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="item" class="form-label">Employee</label>
                    <select
                        name="employee_id"
                        id="employee_list" autofocus
                        class="form-control col-md-12">
                        <option>Select Employee</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="item" class="form-label">Add Company Name</label>
                    <input type="text" name="c_name"   class="form-control col-md-12" placeholder="Enter Company Name">
                </div>
                <div class="col-sm-12">
                    <input type="submit"  value="submit"  class="bg bg-success text-white">
                </div>

            </div>


        </form>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="bg bg-success text-white text-center">View Generate Committes </h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sr </th>
                        <th scope="col">Designation </th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($gc as $key=>$g)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $g->designation_name  }}</td>
                            <td>{{ $g->employee->em_name  }}</td>
                            <td>{{  $g->company_name }}</td>
                            <td>
                                <a href="{{ route('committee.pdf',$g->id) }}"><button class="btn btn-info">
                                    Download</button></a>
                                    <a href="{{ route('committee.destroy',$g->id) }}"><button class="btn btn-danger"> Delete</button></a>
                            </td>
                          </tr>
                        @endforeach   
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    //alert('gasggsgs');]
    $('#designation_id').change(function(){
      var designation=$(this).val();
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
        type:'POST',
        url:"{{ route('committee.employee') }}",
        data: {designation:designation},
        success: function (data) {

          $('#employee_list').html(data);
        }
      });
    });
  });
  </script>
  @endsection

