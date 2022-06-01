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
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h6 class="fw-bold mb-0">Create Hezard</h6>
                        </div>
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form method="POST" enctype="multipart/form-data" id="department"

                                          @if(isset($data->id))
                                          action="{{ route('hirarc.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('hirarc.store')}}">
                                        @endif
                                        @csrf
                                        <div class="row g-3" style="margin: 0 auto;">
                                            <div class="col-md-4 mb-6">
                                                <div class="form-group ">
                                                    <label class="form-label">
                                                        Department
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="depertment_id" id="depertment_id" class="col-md-12"
                                                            style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                        <option value="">Select Department</option>
                                                        @foreach($department as $list)

                                                            <option value="{{$list->id}}">

                                                                {{isset($list->id)? $list->depertment_name: ''}} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2 mb-6">
                                                <div class="form-group">
                                                    <label for="process" class="form-label"> process</label>
                                                    <input id="process" type="text"
                                                           class="form-control @error('process') is-invalid @enderror"
                                                           name="process" value="{{ old('process') }}" required
                                                           autocomplete="process" autofocus placeholder="process ">
                                                    @error('process')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-6">
                                                <div class="form-group">
                                                    <label for="validationCustom0001">Location
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <input style=" border-color:#c0b1b1;"
                                                               type="text"
                                                               class="form-control"
                                                               id="validationCustom0001"
                                                               name="location"
                                                               placeholder="Enter Location"
                                                               value="{{isset($data->location)? $data->location: ''}}"

                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-6">
                                                <label for="last_assessment" class="form-label">Last Assessment
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="last_assessment"
                                                    name="last_assessment"
                                                    value="{{isset($data->last_assessment)? $data->last_assessment: ''}}"
                                                    required
                                                />
                                            </div>


                                            <div class="col-md-2 mb-6">
                                                <label for="assessment_date" class="form-label">Assessment Date/Review
                                                    Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="assessment_date"
                                                    name="assessment_date"
                                                    value="{{isset($data->assessment_date)? $data->assessment_date: ''}}"

                                                    required
                                                />
                                            </div>

                                            <div
                                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                                <h6 class="fw-bold mb-0">RM Assessor
                                                    <span class="text-danger">*</span>
                                                </h6>
                                            </div>


                                            <div class="col-md-4 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Assessor
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_assessor" id="rm_assessor" class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee Name
                                                    </option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">
                                                            {{$list->em_name}}
                                                            {{isset($list->id)? $list->rm_assessor: ''}}

                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 1
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member1" id="rm_member1" class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 2
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member2" id="rm_member2" class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 3
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member3" id="rm_member3" class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color);border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 4
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member4" id="rm_member4" class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color);border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>


                                            <div
                                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                                <h6 class="fw-bold mb-0">Approved by: </h6>
                                            </div>

                                        <!--  <div class="col-md-4 mb-6">
                                            <label for="depone" class="form-label"
                                            >Signature
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="file"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="Signature"
                                                   name="Signature"
                                                   value=""
                                            />
                                        </div> -->

                                            <div class="col-md-3 mb-6">
                                                <label for="employee_id" class="form-label"
                                                >Name
                                                    <span class="text-danger">*</span>
                                                </label
                                                >

                                                <select
                                                    name="employee_id" id="employee_id" class="col-md-12"
                                                    style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee Name</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{isset($list->id)}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-3 mb-6">
                                                <label for="designation_id" class="form-label"
                                                >Designation
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                            <!--   <select

                                             name="designation_id" id="designation_id" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                            <option value="">Select Designation</option>
                                             @foreach($Designation as $list)

                                                <option value="{{$list->id}}">{{$list->ds_name}}


                                                    </option>

@endforeach
                                                </select> -->

                                                <div class="col-lg-12">

                                                    <input name="designation" id="designation" class="form-control"
                                                           readonly>

                                                </div>

                                                <input type="hidden" name="designation_id" id="designation_id"
                                                       class="form-control">

                                            </div>


                                            <div class="col-md-3 mb-6">
                                                <label for="admitdate" class="form-label">Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="date"
                                                    name="date"
                                                    value="{{isset($data->date)? $data->date: ''}}"
                                                    required
                                                />
                                            </div>

                                            <div class="col-md-3 mb-6">
                                                <label for="admitdate" class="form-label">Reference no
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="reference_no"
                                                    name="reference_no"
                                                    value="{{isset($data->reference_no)? $data->reference_no: ''}}"
                                                    required
                                                />
                                            </div>

                                            <input type="hidden" name="company_id" id="" class="form-control" value="">

                                            <div
                                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                                <h6 class="fw-bold mb-0">Create job</h6>
                                            </div>
                                            <div id="show_item">
                                                <div class="row">


                                                    <div class="col-md-6 mb-6">
                                                        <label for="depone" class="form-label"
                                                        >JOB ACTIVITY
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="job_activity"
                                                               name="job_activity[]"
                                                               value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                                                        />
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="depone" class="form-label">
                                                            Picture
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="file"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="imagefile"
                                                               name="imagefile[]"
                                                               value="{{isset($data->imagefile)? $data->imagefile: ''}}"
                                                        />
                                                    </div>


                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary addROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0; margin-top: 10px;">ADD more
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                $("#employee_id").on("change", function () {
                    let emp_id = $("#employee_id").val();
                    $.ajax({
                        type: 'get',
                        url: "getempdesignation" + '/' + emp_id,
                        success: function (data) {


                            $('#designation').val(data.ds_name);
                            $('#designation_id').val(data.id);
                        }
                    });
                });

                $(document).ready(function () {
                    $('#myProjectTable')
                        .addClass('nowrap')
                        .dataTable({
                            responsive: true,
                            columnDefs: [
                                {targets: [-1, -3], className: 'dt-body-right'}
                            ]
                        });
                    $('.deleterow').on('click', function () {
                        var tablename = $(this).closest('table').DataTable();
                        tablename
                            .row($(this)
                                .parents('tr'))
                            .remove()
                            .draw();

                    });
                });

                $(".addROw").click(function () {
                    // e.preventDefault();
                    $("#show_item").prepend(`

                                           <div class="row">


                                         <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >

                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="job_activity"
                                                   name="job_activity[]"
                                                   value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                                            />
                                        </div>

                                             <div class="col-md-6 mb-6">
                                                  <label for="formFileMultiple" class="form-label">


                                                 </label
                                                  >
                                                  <input
                                                    class="form-control"
                                                    style=" border-color:#c0b1b1;"
                                                    type="file"
                                                    id="image"
                                                    name="imagefile[]"
                                                    value="{{isset($data->image)? $data->image: ''}}"
                                                    multiple
                                                    required
                                                  />
                                                </div>





                                           <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger rmvROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0;margin-top: 10px;">Remove</button>
                                        </div>

                                        </div>
                                                </div>`
                    );
                    $(document).on('click', '.rmvROw', function (e) {
                        e.preventDefault();
                        let row_item = $(this).parent().parent();
                        $(row_item).remove();
                    });
                });


                function caltoprice() {
                    var likelihood_l = parseInt($('#likelihood_l').val());
                    var severity_s = parseInt($('#severity_s').val());

                    var total = parseInt((likelihood_l + severity_s));

                    $('#rmn').val(total);
                }

                function caltoprice1() {
                    var likelihood_l1 = parseInt($('#likelihood_l1').val());
                    var severity_S1 = parseInt($('#severity_S1').val());

                    var total = parseInt((likelihood_l1 + severity_S1));

                    $('#rmn1').val(total);
                }


            </script>

@endsection


