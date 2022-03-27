@extends('layouts.app')

@section('style')
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
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
        <body>
        <div id="ebazar-layout" class="theme-blue">
            <!-- sidebar -->


            <!-- main body area -->
            <div class="main px-lg-4 px-md-4">
                <!-- Body: Header -->
                <div class="header">
                    <nav class="navbar py-4">
                        <div class="container-xxl">


                            <!-- menu toggler -->
                            <button
                                class="navbar-toggler p-0 border-0 menu-toggle order-3"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#mainHeader"
                            >
                                <span class="fa fa-bars"></span>
                            </button>
                        </div>
                    </nav>
                </div>

                <!-- Body: Body -->
                <div class="body d-flex py-lg-3 py-md-2">
                    <div class="container-xxl">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div
                                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                                >
                                    <h3 class="fw-bold mb-0">Employees Information</h3>
                                    <div class="col-auto d-flex w-sm-100">
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-set-task w-sm-100"
                                            data-bs-toggle="modal"
                                            data-bs-target="#expadd"
                                        >
                                            <i class="icofont-plus-circle me-2 fs-6"></i>Add Employees
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end  -->
                        <div class="row clearfix g-3">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <table
                                            id="myProjectTable"
                                            class="table table-hover align-middle mb-0"
                                            style="width: 100%"
                                        >
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th>IC/PASSPORT NO.</th>
                                                <th>Mail</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Date Of Joining</th>
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


                <div class="modal fade" id="expadd" tabindex="-1" aria-hidden="true">
                    <div
                        class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable"
                    >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="expaddLabel">
                                    Add Employees
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="deadline-form">
                                    <form method="POST" enctype="multipart/form-data"
                                          action="{{route('employee.store')}}">
                                        @csrf
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Name</label
                                                >
                                                <input type="text" class="form-control" name="em_name"/>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Designation</label>
                                                <select class="form-control" name="emp_des" id="emp_des">
                                                    <option value="">---Choose</option>
                                                    @foreach($des as $list)
                                                        <option value="{{$list->id}}">{{$list->ds_name}}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Department</label
                                                >
                                                <select class="form-control" name="em_department" id="em_department">
                                                    <option value="">---Choose---</option>
                                                    @foreach($dep as $list)
                                                        <option value="{{$list->id}}">{{$list->depertment_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees IC/Passport No</label
                                                >
                                                <input type="text" class="form-control" name="em_ic_passport_no"/>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="taxtno" class="form-label"
                                                >Employees Photo</label>
                                                <input type="File" class="form-control" name="em_photo"/>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="depone" class="form-label">Country</label>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="">---Choose---</option>
                                                    @foreach($country as $list)
                                                    <option value="{{$list->id}}">{{$list->country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc" class="form-label"
                                                >Employees Register date</label
                                                >
                                                <input
                                                    type="date"
                                                    class="form-control w-100"
                                                    name="em_j_date"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="abc11" class="form-label">Mail</label>
                                                <input type="text" class="form-control" name="em_mail"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc111" class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="em_phone"/>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Edit Employees -->
                <div class="modal fade" id="expedit" tabindex="-1" aria-hidden="true">
                    <div
                        class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable"
                    >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="expeditLabel">
                                    Edit Employees
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="deadline-form">
                                    <form>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-12">
                                                <label for="item1" class="form-label"
                                                >Employees Name</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="item1"
                                                    value="Cloth"
                                                />
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="taxtno1" class="form-label"
                                                >Employees Profile</label
                                                >
                                                <input type="file" class="form-control" id="taxtno1"/>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">Country</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="South Africa"
                                                />
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc1" class="form-label"
                                                >Employees Register date</label
                                                >
                                                <input
                                                    type="date"
                                                    class="form-control w-100"
                                                    id="abc1"
                                                    value="2021-03-12"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="mailid" class="form-label">Mail</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="mailid"
                                                    value="PhilGlover@gmail.com"
                                                />
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="phoneid" class="form-label">Phone</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="phoneid"
                                                    value="843-555-0175"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">Total Order</label>
                                                <input type="text" class="form-control" value="18"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Done
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

        <!-- Plugin Js-->
        <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

        <!-- Jquery Page Js -->
        <script src="{{asset('../js/template.js')}}"></script>
        </body>
        @endsection

        @section('script')

            <script>
                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);
                    $("#myProjectTable")
                        .addClass("nowrap")
                        .dataTable({
                            responsive: true,
                            columnDefs: [{targets: [-1, -3], className: "dt-body-right"}],
                        });
                    $(".deleterow").on("click", function () {
                        var tablename = $(this).closest("table").DataTable();
                        tablename.row($(this).parents("tr")).remove().draw();
                    });
                });

            </script>
@endsection
