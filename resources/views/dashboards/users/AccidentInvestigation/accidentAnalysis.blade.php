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
                                    <ul id="accordionExample">
                                        <li>
                                            <section>
                                                <h6 class="title collapsed fw-bold" id="headingOne"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">Accident
                                                    Information </h6>
                                                <div class="checkout-steps-form-content collapse show" id="collapseOne"
                                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <form class="mt-3">
                                                        <div class="row g-3 align-items-center">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Injured Person
                                                                    Depertment </label>
                                                                <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="em_dept">
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
                                                                <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        name="employee_name" id="employee_name">
                                                                    <option selected>-- Select Name --</option>
                                                                    {{-- <option value="1">India</option>
                                                                    <option value="2">Australia</option>
                                                                    <option value="3">Italy</option> --}}
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Employee Designation
                                                                    : </label>
                                                                <input class="form-control" type="text">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Location of Incident
                                                                    : </label>
                                                                <input class="form-control" type="text">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Type of Accident </label>
                                                                <select class="form-select"
                                                                        aria-label="Default select example">
                                                                    <option selected>-- Select --</option>
                                                                    <option value="1">Near Miss</option>
                                                                    <option value="1">First Aid Injury</option>
                                                                    <option value="1">Injury(4 Days MC)</option>
                                                                    <option value="1">Serious Bodily Injury</option>
                                                                    <option value="2">Fatal Injury</option>
                                                                    <option value="3">Occupational Diseases</option>
                                                                    <option value="3">Occupational Poisoning</option>
                                                                    <option value="3">Dangerous Occurrence</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="cityblock1" class="form-label">Time Of
                                                                    Incident</label>
                                                                <input type="time" class="form-control" id="abc"
                                                                       required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Report to DOSH </label>
                                                                <select class="form-select"
                                                                        aria-label="Default select example">
                                                                    <option selected>-- Select --</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="1">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                                    <h6 class="mb-0 fw-bold ">Status of Investigation
                                                                        Report</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div id="summernote1"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                                    <h6 class="mb-0 fw-bold ">Outcome of
                                                                        Investigation</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div id="summernote2"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                                    <h6 class="mb-0 fw-bold ">Summary of Incident</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div id="summernote"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h6 style="font-weight: bold">MC AMALYSIS</h6>
                                                        <div id="show_item">
                                                            <div class="row">
                                                                <div class="row g-3 align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Start Date Of
                                                                            MC</label>
                                                                        <input type="date" class="form-control"
                                                                               name="start_dateMC[]" id="abc" required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">End Date Of MC</label>
                                                                        <input type="date" class="form-control"
                                                                               name="end_dateMC[]" id="abc" required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="postcode1" class="form-label">Total
                                                                            Duration</label>
                                                                        <input type="number" class="form-control"
                                                                               name="total_duration[]" id="postcode1"
                                                                               required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Type of Notification
                                                                            : </label>
                                                                        <input class="form-control" name="typ_of_notif"
                                                                               type="text">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Type of Records
                                                                            : </label>
                                                                        <input class="form-control" name="typ_of_record"
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
                                        <li>
                                            {{-- <section>
                                                <h6 class="title collapsed fw-bold" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">MC Analysis</h6>

                                                <div class="checkout-steps-form-content collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <form class="mt-3" id="add_form" method="" action="">
                                                    <div id="show_item">
                                                     <div class="row">
                                                        <div class="row g-3 align-items-center">
                                                          <div class="col-md-4">
                                                            <label class="form-label">Start Date Of MC</label>
                                                            <input type="date" class="form-control" name="StartDateMC[]" id="abc"  required>
                                                          </div>
                                                          <div class="col-md-4">
                                                            <label class="form-label">End Date Of MC</label>
                                                            <input type="date" class="form-control" id="abc" required>
                                                          </div>
                                                          <div class="col-md-4">
                                                            <label for="postcode1" class="form-label">Total Duration</label>
                                                            <input type="number" class="form-control" id="postcode1" required>
                                                          </div>
                                                          <div class="col-md-4">
                                                            <label class="form-label">Type of Notification : </label>
                                                            <input class="form-control" type="text">
                                                          </div>
                                                          <div class="col-md-4">
                                                            <label class="form-label">Type of Records : </label>
                                                            <input class="form-control" type="text">
                                                          </div>
                                                          <div class="input-group-append">
                                                            <button type="button" class="btn btn-primary addROw" style="  display: block;
                                                            margin-left: auto;
                                                            margin-right: 0;">Add More</button>
                                                        </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                      <div class="col-md-12">
                                                        <div class="steps-form-btn">
                                                            <a href="#" class="btn btn-primary px-5 text-uppercase">Save</a>
                                                        </div>
                                                  </form>
                                                  </div>

                                            </section> --}}
                                        </li>
                                        <!-- Row End -->
                                </div>
                            </div>
                            @endsection

                            @section('script')
                                <script
                                    src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $('#country').on('change', function () {
                                            let country_id = this.value;
                                            $("#state").html('');
                                            $.ajax({
                                                url: "{{url('user/get-states-by-country')}}",
                                                type: "POST",
                                                data: {
                                                    country_id: country_id,
                                                    _token: '{{csrf_token()}}'
                                                },
                                                dataType: 'json',
                                                success: function (result) {
                                                    $('#state').html('<option value="">Select State</option>');
                                                    $.each(result.states, function (key, value) {
                                                        $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                                                    });
                                                    $('#city-dropdown').html('<option value="">Select State First</option>');
                                                }
                                            });

                                            $('#state').on('change', function () {
                                                let state_id = this.value;
                                                $("#city-dropdown").html('');
                                                $.ajax({
                                                    url: "{{url('get-cities-by-state')}}",
                                                    type: "POST",
                                                    data: {
                                                        state_id: state_id,
                                                        _token: '{{csrf_token()}}'
                                                    },
                                                    dataType: 'json',
                                                    success: function (result) {
                                                        $('#city-dropdown').html('<option value="">Select City</option>');
                                                        $.each(result.cities, function (key, value) {
                                                            $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                                                        });
                                                    }
                                                });
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


                                        $(".addROw").click(function (e) {
                                            e.preventDefault();
                                            $("#show_item").prepend(`
                                  <div class="row">
                                  <div class="row g-3 align-items-center">
                                    <div class="col-md-4">
                                      <label class="form-label">Start Date Of MC</label>
                                      <input type="date" class="form-control" name="StartDateMC[]" id="abc"  required>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="form-label">End Date Of MC</label>
                                      <input type="date" class="form-control" id="abc" required>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="postcode1" class="form-label">Total Duration</label>
                                      <input type="number" class="form-control" id="postcode1" required>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="form-label">Type of Notification : </label>
                                      <input class="form-control" type="text">
                                    </div>
                                    <div class="col-md-4">
                                      <label class="form-label">Type of Records : </label>
                                      <input class="form-control" type="text">
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


                                        // ("#em_dept").on("change", function () {
                                        //     let em_dept = $("#em_dept").val();
                                        //     alert(em_dept);
                                        //
                                        //     let url ='/get_em_name/';
                                        //     if( ((emp_id !== undefined) || (emp_id != null)) && em_dept) {
                                        //         $.ajax({
                                        //             type: "GET",
                                        //             url: url+em_dept,
                                        //             success: function (data) {
                                        //
                                        //                 $('#emp_designation').val(data[0].designation);
                                        //                 // $('#rent_per_hour').val(data.price_per_hour);
                                        //             },
                                        //             error: function (data) {
                                        //                 alert('error asche');
                                        //             }
                                        //         });
                                        //     } else {
                                        //         // $('#rent_per_km').val('');
                                        //         // $('#rent_per_hour').val('');
                                        //     }
                                        // });












                                    });
                                </script>

@endsection
