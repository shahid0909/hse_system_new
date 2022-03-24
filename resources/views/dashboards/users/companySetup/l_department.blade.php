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

        <div class="body d-flex">
            <div class="container-xxl">
{{--                <x-action.response-message/>--}}
                <div class="row align-items-center">
                    <div class="border-0 py-3">
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
                                <h6 class="mb-0 fw-bold">Department Add</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" id="department"
                                      action="{{route('department.store')}}">
                                    @csrf
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label"
                                            >Depertment Name</label
                                            >
                                            <input type="text" class="form-control" name="department_name"
                                                   id="dept_name"/>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label"
                                            >Depertment Location</label
                                            >
                                            <input type="text" class="form-control" name="dept_loc" id="dept_loc"/>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="deptwophone" class="form-label"
                                            >Phone</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="dept_phone"
                                                name="dept_phone"
                                            />
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="fileimg" class="form-label"
                                            >Depertment Image</label
                                            >
                                            <input
                                                type="File"
                                                class="form-control"
                                                id="fileimg"
                                                name="fileimg"
                                            />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Add Contact
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table
                                    id="myProjectTable"
                                    class="table table-hover  align-middle mb-0"
                                    style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>Department Name</th>
                                        <th>Location</th>
                                        <th>Image</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span>Kitchne</span>
                                        </td>
                                        <td>Second Floor</td>
                                        <td>
                                            <img
                                                class="avatar"
                                                src="assets/images/xs/avatar1.svg"
                                                alt=""
                                            />
                                        </td>
                                        <td>518-555-0145</td>
                                        <td>
                                            <div
                                                class="btn-group"
                                                role="group"
                                                aria-label="Basic outlined example"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expedit"
                                                >
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary deleterow"
                                                >
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Londry</span>
                                        </td>
                                        <td>Second Floor</td>
                                        <td>
                                            <img
                                                class="avatar"
                                                src="assets/images/xs/avatar1.svg"
                                                alt=""
                                            />
                                        </td>
                                        <td>518-555-0145</td>
                                        <td>
                                            <div
                                                class="btn-group"
                                                role="group"
                                                aria-label="Basic outlined example"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expedit"
                                                >
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary deleterow"
                                                >
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Food</span>
                                        </td>
                                        <td>Second Floor</td>
                                        <td>
                                            <img
                                                class="avatar"
                                                src="assets/images/xs/avatar1.svg"
                                                alt=""
                                            />
                                        </td>
                                        <td>518-555-0145</td>
                                        <td>
                                            <div
                                                class="btn-group"
                                                role="group"
                                                aria-label="Basic outlined example"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expedit"
                                                >
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary deleterow"
                                                >
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Painting</span>
                                        </td>
                                        <td>Second Floor</td>
                                        <td>
                                            <img
                                                class="avatar"
                                                src="assets/images/xs/avatar1.svg"
                                                alt=""
                                            />
                                        </td>
                                        <td>518-555-0145</td>
                                        <td>
                                            <div
                                                class="btn-group"
                                                role="group"
                                                aria-label="Basic outlined example"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expedit"
                                                >
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary deleterow"
                                                >
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Drywash</span>
                                        </td>
                                        <td>Second Floor</td>
                                        <td>
                                            <img
                                                class="avatar"
                                                src="assets/images/xs/avatar1.svg"
                                                alt=""
                                            />
                                        </td>
                                        <td>518-555-0145</td>
                                        <td>
                                            <div
                                                class="btn-group"
                                                role="group"
                                                aria-label="Basic outlined example"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#expedit"
                                                >
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary deleterow"
                                                >
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
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
