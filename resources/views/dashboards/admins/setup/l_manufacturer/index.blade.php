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
            left:0%;
            margin:0 0 0 0;
        }

    </style>
    <!-- Body: Body -->
@endsection
@section('content')
    <!-- sidebar -->
    @include('dashboards.admins.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.admins.partial.header')
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b> Manufacturer Entry</b></h5>

                <div class="card-body">


                     <form name="manufacturerForm" id="manufacturerForm" method="post"
                              @if(isset($data->id))
                              action="{{ route('l_manufacturer.update', ['id' => $data->id]) }}">
                            <input name="_method" type="hidden" value="PUT">
                            @else
                                action="{{route('l_manufacturer.store')}}">
                            @endif
                            @csrf


                        <div class="row">
                            <div class="col-md-4">
                                <label><strong>Company Name<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{ old('name', isset($data['insertedData'][0]->name) ? $data['insertedData'][0]->name:'') }}"
                                       class="form-control inpcol"
                                       id="name"
                                       name="name"
                                       placeholder="Enter Name"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="name-error"></span>
                            </div>

                            <div class="col-md-4">
                                <label><strong>Company Address<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{ old('address', isset($data['insertedData'][0]->address) ? $data['insertedData'][0]->address:'') }}"
                                       class="form-control inpcol"
                                       id="address"
                                       name="address"
                                       placeholder="Enter Address"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="address-error"></span>
                            </div>

                            <div class="col-md-4">
                                <label><strong>Contact No<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{ old('contactNo', isset($data['insertedData'][0]->contactNo) ? $data['insertedData'][0]->contactNo:'') }}"
                                       class="form-control inpcol"
                                       id="contactNo"
                                       name="contactNo"
                                       placeholder="Enter Contact No"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="contactNo-error"></span>
                            </div>
                            <div class="col-md-4">
                                <label><strong>Email</strong></label>
                                <input type="email"
                                       value="{{ old('email', isset($data['insertedData'][0]->email) ? $data['insertedData'][0]->email:'') }}"
                                       class="form-control inpcol"
                                       id="email"
                                       name="email"
                                       placeholder="Enter Email Address"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="email-error"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Status<span class="span">*</span></strong></label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio" name="status"
                                               value="1"
                                               @if(isset($data['insertedData'][0]->status) && $data['insertedData'][0]->status == "1") checked @endif
                                               required id="active_y" checked
                                        />
                                        <label class="form-check-label"
                                               for="active_y">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status"
                                               required id="active_n" value="2"
                                               @if(isset($data['insertedData'][0]->status) && $data['insertedData'][0]->status == "2") checked @endif
                                        />
                                        <label class="form-check-label"
                                               for="active_n">In-Active</label>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                @if(isset($data->id))
                                <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                    Update

                                </button>
                                @else
                                    <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                    Save
                                </button>
                            @endif
                                <button type="reset" class="btn btn-outline shadow mb-1 btn-danger cursor-auto">
                                    Clear
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="card mb-5">
                <h5 class="card-header bg-info-light">Manufacturer List</h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table class="table table-sm datatable mdl-data-table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Status</th>
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
        </div>
    </div>




@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('l_manufacturer.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "name"},
                    {"data": "address"},
                    {"data": "contactNo"},
                    {"data": "status"},
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
