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
        <form method="post" action="{{ route('committee.store') }}" id="committee" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">
               
                <div class="col-sm-6">
                    <label class="form-label">Select Designation</label>
                    <select name="designation_id"
                            id="designation_id" class="form-control col-md-12">
                        <option value="">Select Designation</option>
                        @foreach ($committes as $committe)
                        <option value="{{$committe->id }}">{{$committe->designation }}</option>
                        @endforeach
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
                    <input type="submit"  value="submit">
                </div>
                
            </div>
       
         
        </form>

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

