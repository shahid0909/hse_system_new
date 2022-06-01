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



                <div class="col-sm-3">

                    <label class="form-label">Select Designation

                        <span class="text-danger">*</span>

                    </label>

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



                <div class="col-sm-3">

                    <label for="item" class="form-label">Employee

                        <span class="text-danger">*</span>

                    </label>

                    <select

                        name="employee_id"

                        id="employee_list" autofocus

                        class="form-control col-md-12">

                        <option >Select Employee</option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label class="form-label">Comany Name

                        <span class="text-danger">*</span>

                    </label>
                      
                      <input name="company_name" id="" class="form-control" value="{{ $companies->company_name }}" readonly>


                      </div>

                      <input type="hidden" name="company_id" id="" class="form-control" value="{{ $companies->id }}">

                </div>



               

                <div class="col-md-3 mt-4 ">

                    <button type="submit" class="btn btn-info">Generate</button>

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



