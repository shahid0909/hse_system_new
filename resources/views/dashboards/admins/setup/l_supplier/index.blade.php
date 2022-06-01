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
    @include('dashboards.admins.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.admins.partial.header')

        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>Supplier Entry</b></h5>


                <div class="card-body">

                    <form name="supplierForm" id="supplierForm" method="post"
                          @if(isset($data->id))
                          action="{{ route('l_supplier.update', ['id' => $data->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('l_supplier.store')}}">
                        @endif
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Supplier Name<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('supplier_name', isset($data->SupplierName) ? $data->SupplierName:'') }}"
                                       class="form-control inpcol"
                                       id="supplier_name"
                                       name="supplier_name"
                                       placeholder="Enter Supplier Name"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="name-error"></span>
                            </div>

                            <div class="col-md-6">
                                <label><strong>Contact No<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('contactNo', isset($data->contactNo) ? $data->contactNo:'') }}"
                                       class="form-control inpcol"
                                       id="contactNo"
                                       name="contactNo"
                                       placeholder="Enter Contact No"
                                       autocomplete="off"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                >
                                <span class="text-danger" id="contactNo-error"></span>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Email</strong></label>
                                <input type="email"
                                       value="{{old('supplier_email', isset($data->Email) ? $data->Email:'') }}"
                                       class="form-control inpcol"
                                       id="supplier_email"
                                       name="supplier_email"
                                       placeholder="Enter Email Address"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Address<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('address', isset($data->address) ? $data->address:'') }}"
                                       class="form-control inpcol"
                                       id="address"
                                       name="address"
                                       placeholder="Enter Address"
                                       autocomplete="off"
                                >
                                <span class="text-danger" id="address-error"></span>
                            </div>


                        </div>
                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                    Save
                                </button>
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
                <h5 class="card-header bg-info-light"><b>Supplier List</b></h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table class="table table-sm datatable mdl-data-table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Supplier Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    {{--                                    <th>Status</th>--}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('l_supplier.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "SupplierName"},
                    {"data": "contactNo"},
                    {"data": "Email"},
                    {"data": "address"},
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
