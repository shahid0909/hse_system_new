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
                                            class="table table-hover  datatable align-middle mb-0"
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
{{--                                                <th>Country</th>--}}
                                                <th>Date Of Joining</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key=>$value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->em_name}}</td>
                                                    <td>{{$value->ds_name}}</td>
                                                    <td>{{$value->depertment_name}}</td>
                                                    <td>{{$value->em_ic_passport_no}}</td>
                                                    <td>{{$value->em_mail}}</td>
                                                    <td>{{$value->em_phone}}</td>
{{--                                                    <td>{{$value->em_country}}</td>--}}
                                                    <td>{{$value->em_j_date}}</td>
                                                    <td style="padding-right: .5px;padding-left: .5px;text-align: center;">
                                                        <i class="icofont-edit" style="color: #729DEC;cursor: pointer;" onclick="getModaldata('{{$value->id}}')"></i>
                                                    </td>

                                                </tr>
                                            @endforeach
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
                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
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
                                                >Employees Name
                                                <span class="text-danger">*</span>
                                                </label
                                                >
                                                <input type="text" class="form-control"  id="ema_name" name="em_name"/>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Designation
                                                <span class="text-danger">*</span>
                                            </label>
                                                <select class="form-control" name="emp_des" id="emp_des">
                                                    <option value="">---Choose</option>
                                                    @foreach($des as $list)
                                                        <option value="{{$list->id}}">{{$list->ds_name}}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Department
                                                <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select class="form-control" name="em_department" id="em_department">
                                                    <option value="">---Choose---</option>
                                                    @foreach($dep as $list)
                                                        <option
                                                            value="{{$list->id}}">{{$list->depertment_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees IC/Passport No
                                                <span class="text-danger">*</span>
                                                </label
                                                >
                                                <input type="text" class="form-control" name="em_ic_passport_no"/>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Company Name</label>
                                                <input type="text" readonly class="form-control" name="" id="" value="{{$company->company_name}}">

                                            </div>
                                            <input type="hidden" class="form-control" name="company_name" id="company_name"value="{{$company->id}}">
                                            <div class="col-sm-12">
                                                <label for="taxtno" class="form-label"
                                                >Employees Photo
                                                <span class="text-danger">*</span>
                                            </label>
                                                <input type="File" class="form-control" name="em_photo" accept="image/*"/>
                                            </div>
                                        </div>
                                            <div class="col-sm-12">
                                                <label for="taxtno" class="form-label"
                                                >Employees Signature
                                                <span class="text-danger">*</span>
                                            </label>
                                                <input type="File" class="form-control" name="em_signature" id="em_signature"  accept="image/*"/>
                                            </div>

                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="depone" class="form-label">Country
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="">---Choose---</option>
                                                    @foreach($country as $list)
                                                        <option value="{{$list->id}}">{{$list->country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc" class="form-label"
                                                >Employees Register date
                                                <span class="text-danger">*</span>
                                                </label
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
                                                <label for="abc11" class="form-label">Mail
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="em_mail" id="em_mail"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc111" class="form-label">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="em_phone" id="em_phone"/>
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
                <div class="modal fade" id="edit_form" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="expaddLabel">
                                    Update Employees
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
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Name</label
                                                >
                                                <input type="text" class="form-control" id="em_name" name="em_name"/>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Designation</label>
                                                <select class="form-control" name="emp_des" id="emp_des">
                                                    <option value="">---Choose</option>

                                                    @foreach($des as $list)
                                                        <option value="{{$list->id}}" >{{$list->ds_name}} </option>
                                                    @endforeach
{{--                                                    @foreach($des as $list)--}}
{{--                                                        <option value="{{$list->id}}"--}}
{{--                                                                {{$list->id == $des?'SELECTED':''}} data-report-name="{{$list->ds_name}}">{{$list->ds_name}} </option>--}}
{{--                                                    @endforeach--}}

                                                </select>

                                            </div>

                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees Department</label
                                                >
                                                <select class="form-control" name="em_department" id="em_department">
                                                    <option value="">---Choose---</option>
                                                    @foreach($dep as $list)
                                                        <option
                                                            value="{{$list->id}}">{{$list->depertment_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Company Name</label>
                                                <input type="text" readonly class="form-control" name="" id="" value="{{$company->company_name}}">

                                            </div>
                                            <input type="hidden" class="form-control" name="company_name" id="company_name"value="{{$company->id}}">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="item" class="form-label"
                                                >Employees IC/Passport No</label
                                                >
                                                <input type="text" class="form-control" id="em_ic_passport_no" name="em_ic_passport_no"/>
                                            </div>
                                            <div class="col-sm-10">
                                                <label for="taxtno" class="form-label"
                                                >Employees Photo</label>
                                                <input type="file" class="form-control" id="em_photo" name="em_photo"/>
                                            </div>

                                            <div class="col-sm-2">
                                                <img src="" id="emp_photos" alt="" class="mt-4" width="50%">
                                            </div>
                                            <div class="col-sm-10">
                                                <label for="taxtno" class="form-label"
                                                >Employees Signature
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="File" class="form-control" name="em_signature" id="em_signature"  accept="image/*"/>
                                            </div>
                                            <div class="col-sm-2">
                                                <img src="" id="emp_signature" alt="" class="mt-4" width="50%">
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
                                                    name="em_j_date" id="em_j_date"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="abc11" class="form-label">Mail</label>
                                                <input type="text" class="form-control" id="em_email" name="em_mail"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="abc111" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="em_phone_no" name="em_phone"/>
                                            </div>
                                        </div>

                                            <div class="modal-footer">

                                                <input type="hidden" id="emp_id" name="emp_id" value="">
                                                <input type="button" class="btn btn-success" value="Submit" onclick="employeeUpdate()">
                                                <button  type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                            </div>

                                    </form>
                                </div>
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
                    $(".datatable")
                        .dataTable({
                            responsive: true,
                            columnDefs: [{targets: [-1, -3], className: "dt-body-right"}],
                        });
                    $(".deleterow").on("click", function () {
                        var tablename = $(this).closest("table").DataTable();
                        tablename.row($(this).parents("tr")).remove().draw();
                    });
                });
                function getModaldata(e) {

                    $.ajax({
                        type: 'get',

                        // url: '/emp-information-ajax-data',
                        url: "{{ route('employee.getempinfo') }}",

                        data: {emp_id: e},

                        success: function (data) {

                            let values = data.split("||");
                            let designation = values[2];
                            let department = values[4];
                            let country = values[9];
                            let emp_image = values[12];
                            let em_signature = values[15];
                            let company = values[13];

                            console.log(values);
                            $('#emp_photos').attr('src', "{{ asset('uploads/l_employees') }}"+ '/' + emp_image),
                            $('#emp_signature').attr('src', "{{ asset('uploads/emp_signature') }}"+ '/' + em_signature),
                            $('#em_name').val(values[1]);
                            $(`#emp_des option[value='${designation}']`).prop('selected', true);
                            $(`#em_department option[value='${department}']`).prop('selected', true);
                            $(`#country option[value='${country}']`).prop('selected', true);
                            $(`#company_name option[value='${company}']`).prop('selected', true);
                            $('#em_ic_passport_no').val(values[6]);
                            $('#em_email').val(values[7]);
                            $('#em_phone_no').val(values[8]);
                            $('#em_j_date').val(values[11]);
                            $('#emp_id').val(values[0]);


                            $('#edit_form').modal('show');
                        }
                    });
                }
                function employeeUpdate() {

                    var emp_id = $('#emp_id').val();
                    var em_name = $('#em_name').val();
                    var emp_des = $('#emp_des option:selected').val();
                    var em_department = $('#em_department option:selected').val();
                    var em_ic_passport_no = $('#em_ic_passport_no').val();
                    // var em_photo = $('#em_photo').val().replace("C:\\fakepath\\", "");
                    var em_photo = $('#em_photo').val();
                    var em_signature = $('#em_signature').val();
                    var country = $('#country option:selected').val();
                    var company_name = $('#company_name option:selected').val();
                    var em_j_date = $('#em_j_date').val();
                    var em_email = $('#em_email').val();
                    var em_phone_no = $('#em_phone_no').val();

                    // alert(m_flag);alert(asset_status);

                    $.ajax({
                        type: 'POST',
                        url: '{{route('employee.empUpdate')}}',
                        enctype: 'multipart/form-data',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            emp_id: emp_id,
                            em_name: em_name,
                            emp_des: emp_des,
                            em_department: em_department,
                            em_ic_passport_no: em_ic_passport_no,
                            em_photo: em_photo,
                            country: country,
                            em_j_date: em_j_date,
                            em_email: em_email,
                            em_phone_no: em_phone_no,
                            company_name:company_name,
                            em_signature:em_signature,
                        },
                        success: function (data) {
                            console.log(data);

                            if (data) {
                                alertify.set('notifier','position', 'top-right');
                                alertify.success(data);
                                $('#edit_form').modal('hide');
                                window.location.reload();
                            } else {
                                alertify.set('notifier','position', 'top-right');
                                alertify.error('error');
                                // alert("ami ekhon else a asi")
                            }
                        }
                    });
                }


            </script>
@endsection
