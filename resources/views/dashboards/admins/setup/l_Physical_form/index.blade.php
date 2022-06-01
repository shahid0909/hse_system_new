@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
            text-transform:uppercase;
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

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>Physical Form Entry</b></h5>
                <div class="card-body">

                    <form name="casForm" id="casForm" method="post"
                          @if(isset($data->id))
                          action="{{ route('l_physical_form.update', ['id' => $data->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('l_physical_form.store')}}">
                        @endif
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Physical Form Name<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('physical_form', isset($data->physicalform) ? $data->physicalform:'') }}"
                                       class="form-control inpcol"
                                       id="physical_form" required
                                       name="physical_form"
                                       placeholder="Enter Physical Form Name"
                                       autocomplete="off"

                                >
                                <span class="text-danger" id="name-error"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Status<span class="span">*</span></strong></label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio" name="status"
                                               value="Y"
                                               @if(isset($data->status) && $data->status == "Y") checked @endif
                                               required id="active_y" checked
                                        />
                                        <label class="form-check-label"
                                               for="active_y">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status"
                                               required id="active_n" value="N"
                                               @if(isset($data->status) && $data->status == "N") checked @endif
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
                <h5 class="card-header bg-info-light"><b>Physical Form List</b></h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table class="table table-sm datatable mdl-data-table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Physical Form Name</th>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('l_physical_form.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "physicalform"},
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
