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
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>Safe Work Procedure</b></h5>

                <div class="card-body">

                    <form name="supplierForm" id="supplierForm" method="post" enctype="multipart/form-data"
                          @if(isset($data->id))
                          action="{{ route('safe_work_procedure.update', ['id' => $data->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('safe_work_procedure.store')}}">
                        @endif
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Work Tittle<small> (Safe Work procedure For)</small> <span
                                            class="span">*</span></strong></label>
                                <input type="text"
                                       value=""
                                       class="form-control inpcol"
                                       id="work_title"
                                       name="work_title"
                                       placeholder="Work Title"
                                       autocomplete="off">
                                <span class="text-danger" id="name-error"></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>Before Work</strong></label>
                                <textarea class="form-control" name="before_work" id="before_work"
                                          placeholder="Please Enter Before Work Procedure"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Before Work Image</strong></label>
                                <input type="file" class="form-control" name="before_work_image" id="before_work_image"
                                       placeholder="Please Enter Before Work Procedure Image">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>During Work</strong></label>
                                <textarea class="form-control" name="during_work" id="during_work"
                                          placeholder="Please Enter During Work Procedure"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>During Work Image</strong></label>
                                <input type="file" class="form-control" name="during_work_image" id="during_work_image"
                                       placeholder="Please Enter During Work Procedure Image">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>After Work</strong></label>
                                <textarea class="form-control" name="after_work" id="after_work"
                                          placeholder="Please Enter After Work Procedure"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>During Work Image</strong></label>
                                <input type="file" class="form-control" name="after_work_image" id="after_work_image"
                                       placeholder="Please Enter After Work Procedure Image">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>Potential Hazard</strong></label>
                                <textarea class="form-control" name="potential_hazard" id="potential_hazard"
                                          placeholder="Please Enter Potential Hazard"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Potential Hazard Image</strong></label>
                                <input type="file" class="form-control" name="potential_hazard_image" id="potential_hazard_image"
                                       placeholder="Please Enter Potential Hazard Image">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>PPE</strong></label>
                                <select class="form-control" name="ppe_name" id="ppe_name">
                                    <option value="">---Choose---</option>
                                    @foreach($ppe as $value)
                                        <option value="{{$value->id}}">{{$value->ppe_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Remarks</strong></label>
                                <textarea type="text" class="form-control" name="remarks" id="remarks"
                                          placeholder="Please Enter Remarks"></textarea>
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
            {{--            <div class="card mb-5">--}}
            {{--                <h5 class="card-header bg-info-light"><b>Supplier List</b></h5>--}}

            {{--                <div class="card-body">--}}
            {{--                    <div class="card-text">--}}
            {{--                        <div class="table-responsive">--}}
            {{--                            <table class="table table-sm datatable mdl-data-table">--}}
            {{--                                <thead>--}}
            {{--                                <tr>--}}
            {{--                                    <th>SL</th>--}}
            {{--                                    <th>Supplier Name</th>--}}
            {{--                                    <th>Contact No</th>--}}
            {{--                                    <th>Email</th>--}}
            {{--                                    <th>Address</th>--}}
            {{--                                    --}}{{--                                    <th>Status</th>--}}
            {{--                                    <th>Actions</th>--}}
            {{--                                </tr>--}}
            {{--                                </thead>--}}
            {{--                                <tbody>--}}

            {{--                                </tbody>--}}
            {{--                            </table>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>




@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);
            {{--$('.datatable').DataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    ajax: {--}}
            {{--        url: "{{ route('l_supplier.datatable') }}",--}}
            {{--        type: 'GET',--}}
            {{--        'headers': {--}}
            {{--            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
            {{--        }--}}
            {{--    },--}}
            {{--    "columns": [--}}
            {{--        {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},--}}
            {{--        {"data": "SupplierName"},--}}
            {{--        {"data": "contactNo"},--}}
            {{--        {"data": "Email"},--}}
            {{--        {"data": "address"},--}}
            {{--        {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--    ],--}}
            {{--    language: {--}}
            {{--        paginate: {--}}
            {{--            next: '<i class="bx bx-chevron-right">',--}}
            {{--            previous: '<i class="bx bx-chevron-left">'--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
        });


    </script>

@endsection
