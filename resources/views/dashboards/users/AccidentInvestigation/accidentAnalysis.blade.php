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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
    @include('dashboards.users.partial.header')

    <!-- Body: Body -->
        <div class="body d-flex py-3">  <!--d-flex py-lg-3 py-md-2-->
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                        >
                            <h3 class="fw-bold mb-0">ACCIDENT INVESTIGATION ANALYSIS</h3>
                        </div>
                    </div>
                </div>
                <!-- Row end  -->

                <div class=" row clearfix g-3">
                    <div class="col-lg-12 col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="checkout-steps">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <ul id="accordionExample">
                                        <li>
                                            <section>
                                                <h6 class="title collapsed fw-bold" id="headingOne"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">Accident
                                                    Information </h6>
                                                <div class="checkout-steps-form-content collapse show" id="collapseOne"
                                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <form class="mt-3" method="POST" action="{{route('accident_investigation.store')}}">
                                                        @csrf
                                                        <div class="row g-3 align-items-center">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Injured Person
                                                                    Depertment </label>
                                                                <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="em_dept" name="em_dept">
                                                                    <option selected>-- Select Depertment --</option>
                                                                    @foreach($dep as $list)
                                                                        <option
                                                                            value="{{$list->id}}">{{$list->depertment_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="employee_name" class="form-label">Injured
                                                                    Person Name </label>
                                                                <select
                                                                    name="em_name"
                                                                    id="employee_list" autofocus
                                                                    class="form-control col-md-12">
                                                                    <option>Select Employee</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="employee_designation" class="form-label">Employee Designation </label>
                                                                <input class="form-control"

                                                                       aria-label="Default select example" readonly
                                                                       name="em_des" id="employee_designation">

                                                                        aria-label="Default select example" readonly
                                                                        name="em_des" id="employee_designation">


                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Location of Incident
                                                                    : </label>
                                                                <input class="form-control" type="text" name="l_of_incident">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Type of Accident </label>
                                                                <select class="form-select" name="t_of_accident">
                                                                    <option selected>-- Select --</option>
                                                                    <option value="1">Near Miss</option>
                                                                    <option value="2">First Aid Injury</option>
                                                                    <option value="3">Injury(4 Days MC)</option>
                                                                    <option value="4">Serious Bodily Injury</option>
                                                                    <option value="5">Fatal Injury</option>
                                                                    <option value="6">Occupational Diseases</option>
                                                                    <option value="7">Occupational Poisoning</option>
                                                                    <option value="8">Dangerous Occurrence</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="cityblock1" class="form-label">Time Of
                                                                    Incident</label>
                                                                <input type="time" class="form-control" id="abc" name="tim_of_incident"
                                                                       required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Report to DOSH </label>
                                                                <select class="form-select"
                                                                        name="rpt_to_dosh">
                                                                    <option selected>-- Select --</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                                    <h6 class="mb-0 fw-bold ">Status of Investigation
                                                                        Report</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <textarea id="summernote1" name="st_of_invesg"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0" >
                                                                    <h6 class="mb-0 fw-bold ">Outcome of
                                                                        Investigation</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <textarea id="summernote2" name="outcom_of_investg"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                                    <h6 class="mb-0 fw-bold ">Summary of Incident</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <textarea id="summernote" name="summ_of_incident"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h6 style="font-weight: bold">MC ANALYSIS</h6>
                                                        <div id="show_item">
                                                            <div class="row">
                                                                <div class="row g-3 align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Start Date Of
                                                                            MC</label>
                                                                        <input type="date" class="form-control"
                                                                               name="start_dateMC[]" id="s_date[]" required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">End Date Of MC</label>
                                                                        <input type="date" class="form-control"
                                                                               name="end_dateMC[]" id="e_date[]" required>
                                                                    </div>
                                                                    {{-- <button >Show</button> --}}
                                                                    <div class="col-md-4">
                                                                        <label for="postcode1" class="form-label">Total
                                                                            Duration</label>
                                                                        <input type="number"  class="form-control"
                                                                               name="total_duration[]" id="output[]" onclick="calculateDays()" value=""
                                                                               required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Type of Notification
                                                                            : </label>
                                                                        <input class="form-control" name="typ_of_notif[]"
                                                                               type="text">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Type of Records
                                                                            : </label>
                                                                        <input class="form-control" name="typ_of_record[]"
                                                                               type="text">
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <button type="button"
                                                                                class="btn btn-primary addROw" style="  display: block;
                                                                                        margin-left: auto;
                                                                                        margin-right: 0;">Add More
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                                class="btn btn-primary mt-4 px-5 text-uppercase">Save
                                                        </button>
                                                    </form>
                                                </div>
                                            </section>
                                        </li>

                                        <!-- Row End -->
                                </div>
                            </div>
                            @endsection

                            @section('script')
                                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
                                <script>
                                    $(document).ready(function () {

                                        $('#em_dept').on('change', function () {
                                            let emDepartment = $(this).val();

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            $.ajax({
                                                type:'get',
                                                url:"get-em-name"+'/'+emDepartment,
                                                data: {emDepartment:emDepartment},
                                                success: function (data) {

                                                    $('#employee_list').html(data);
                                                }
                                            });
                                        });


                                        $('#employee_list').on('change', function () {
                                            let emp_id = $(this).val();

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            $.ajax({
                                                type:'get',
                                                url:"get-emp_designation"+'/'+emp_id,
                                                data: {emp_id:emp_id},
                                                success: function (data) {

                                                    $('#employee_designation').val(data[0].department);
                                                }
                                            });
                                        });


                                        $('#summernote').summernote({
                                            placeholder: 'Describe Incident',
                                            tabsize: 2,
                                            height: 100
                                        });

                                        $('#summernote1').summernote({
                                            placeholder: 'Describe Incident',
                                            tabsize: 2,
                                            height: 100
                                        });

                                        $('#summernote2').summernote({
                                            placeholder: 'Describe Incident',
                                            tabsize: 2,
                                            height: 100
                                        });

                                        $(".addROw ").click(function (e) {
                                            e.preventDefault();
                                            $("#show_item").prepend(`
                                                <div class="row">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-md-4">
                                                    <label class="form-label">Start Date Of MC</label>
                                                    <input type="date" class="form-control" name="start_dateMC[]" id="s_date[]"  required>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label class="form-label">End Date Of MC</label>
                                                    <input type="date" class="form-control" name="end_dateMC[]" id="e_date[]" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label for="postcode1" class="form-label">Total Duration</label>
                                                    <input type="number"  class="form-control" name="total_duration[]" id="output[]" onclick="calculateDays()" value="" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label class="form-label">Type of Notification : </label>
                                                    <input class="form-control" name="typ_of_notif[] type="text">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label class="form-label">Type of Records : </label>
                                                    <input class="form-control" name="typ_of_record[]" type="text">
                                                    </div>
                                                    <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger rmvROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0;">Remove</button>
                                                </div>
                                                </div>`);
                                            $(document).on('click', '.rmvROw', function (e) {
                                                e.preventDefault();
                                                let row_item = $(this).parent().parent();
                                                $(row_item).remove();
                                            });
                                        });

                                    });






                                        function calculateDays() {

                                        var d1 = document.getElementById("s_date[]").value;
                                        var d2 = document.getElementById("e_date[]").value;
                                        const dateOne = new Date(d1);
                                        const dateTwo = new Date(d2);
                                        const time = Math.abs(dateTwo - dateOne);
                                        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
                                        var Myelement = document.getElementById("output[]");
                                        Myelement.value = days;
                                    }


                                    $('#em_dept').on('change', function () {
                                        let emDepartment = $(this).val();
                                        if( ((emDepartment !== undefined) || (emDepartment != null)) && emDepartment) {
                                            $.ajax({
                                                url: "get-em-name"+'/'+emDepartment,
                                                type: "GET",
                                                data : {"_token":"{{ csrf_token() }}"},
                                                dataType: "json",
                                                success: function (data) {
                                                    console.log(data)
                                                    if (data) {
                                                        $('#employee_name').empty();
                                                        $('#employee_name').append('<option hidden>Choose Employee</option>');
                                                        $.each(data, function (key, emp) {
                                                            $('select[name="employee_name"]').append('<option value="' + key + '">' +emp.em_name + '</option>');
                                                        });
                                                    } else {
                                                        $('#employee_name').empty();
                                                    }
                                                }
                                            });
                                        } else {
                                            $('#employee_name').empty();
                                        }
                                    });

                                            $('#em_dept').on('change', function () {
                                            let emDepartment = $(this).val();
                                            if( ((emDepartment !== undefined) || (emDepartment != null)) && emDepartment) {
                                                $.ajax({
                                                    url: "get-em-name"+'/'+emDepartment,
                                                    type: "GET",
                                                  data : {"_token":"{{ csrf_token() }}"},
                                                    dataType: "json",
                                                    success: function (data) {
                                                        console.log(data)
                                                        if (data) {
                                                            $('#employee_name').empty();
                                                            $('#employee_name').append('<option hidden>Choose Employee</option>');
                                                            $.each(data, function (key, emp) {
                                                                $('select[name="employee_name"]').append('<option value="' + key + '">' +emp.em_name + '</option>');
                                                            });
                                                        } else {
                                                            $('#employee_name').empty();
                                                        }
                                                    }
                                                });
                                            } else {
                                                $('#employee_name').empty();
                                            }
                                        });

                                </script>

@endsection
