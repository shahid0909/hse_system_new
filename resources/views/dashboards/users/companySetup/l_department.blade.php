@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
        }

        .span {
            content: '*';
            color: red;
        }

        .toast-top-center {
            top: 2rem;
            left: 0%;
            margin: 0 0 0 0;
        }

    </style>
    <!-- Body: Body -->
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
        <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                        >
                            <h3 class="fw-bold py-3 mb-0">Department</h3>
                        </div>
                    </div>
                </div>
                <!-- Row end  -->
                <div class="row clearfix g-3">
                    <div class="col-lg-4">
                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
{{--                                <h6 class="mb-0 fw-bold"></h6>--}}
                            </div>

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" id="department"

                                      @if(isset($data->id))
                                      action="{{ route('department.update', ['id' => $data->id]) }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    @else
                                        action="{{ route('department.store')}}">
                                    @endif
                                    @csrf
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label"
                                            >Depertment Name</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   name="department_name"
                                                   id="dept_name"
                                                   value="{{isset($data->depertment_name) ? $data->depertment_name:''}}"
                                            />
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label"
                                            >Depertment Location</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   name="dept_loc"
                                                   id="dept_loc"
                                                   value="{{isset($data->depertment_location) ? $data->depertment_location:''}}"
                                            />
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="deptwophone" class="form-label"
                                            >Phone</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="dept_phone"
                                                name="dept_phone"
                                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                                value="{{isset($data->phone) ? $data->phone:''}}"
                                            />
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="fileimg" class="form-label"
                                            >Depertment Image</label
                                            >
                                            <input
                                                type="File"
                                                class="form-control"
                                                id="depertment_image"
                                                name="depertment_image"
                                                accept="image/png, image/jpeg,image/jpg"
                                                value="{{isset($data->depertment_image) ? $data->depertment_image:''}}"
                                            />
                                            @if(isset($data->id))
                                                <img src="/image/Department/{{ $data->depertment_image }}" width="10%">@endif
                                        </div>
                                    </div>
                                    @if(isset($data->id))
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    @else
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                        @endif
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table
                                    id="myProjectTable"
                                    class="table table-hover datatable align-middle mb-0"
                                    style="width: 100%"
                                >
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Department Name</th>
                                        <th>Location</th>
{{--                                        <th>status</th>--}}
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
        </div>


        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script>

                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);
                    $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('department.datatable') }}",
                            type: 'GET',
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        "columns": [
                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                            {"data": "depertment_name"},
                            {"data": "depertment_location"},
                            {"data": "phone"},
                            {"data": "depertment_image"},
                            // {"data": "status"},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ],
                        language: {
                            paginate: {
                                next: '<i class="bx bx-chevron-right">',
                                previous: '<i class="bx bx-chevron-left">'
                            }
                        }
                    });
                });
            </script>

@endsection

