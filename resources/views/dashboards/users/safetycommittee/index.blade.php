@extends('layouts.app')
@section('title')
@endsection
@section('style')
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
            <a href="{{ route('committee.index') }}">
                 <button class="bg bg-info">Generate Committe</button>
                </a>
           
            <div class="container-xxl">
                <div class="card">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Safety Committee List</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button
                                type="button"
                                id="modal-btn"
                                class="btn btn-primary btn-set-task w-sm-100"
                                data-bs-toggle="modal"
                                data-bs-target="#expadd"
                            >
                                <i class="icofont-plus-circle me-2 fs-6"></i>Add Safety
                                Committee
                            </button>

                    
                           
                        </div>
                    </div>
                    <div class="card-body" id="card-content">
                        @php
                            $count = $management_representative->count();
                            $count_emp_rep = $employee_representative->count();
                            $count_chairman = $chairman->count();
                            $count_secretary = $secretary->count();
                        @endphp
                        @if($count_chairman !== 0)
                        <h1 class="mb-4 mt-4 committee-designation"> {{ $chairman[0]->designation }} </h1>
                        @endif
                        <div id="chairman"></div>
                        @if($count_secretary !== 0)
                        <h1 class="mb-4 mt-4 committee-designation"> {{ $secretary[0]->designation }} </h1>
                        @endif
                        <div id="secretary"></div>
                        @if($count_emp_rep !== 0)
                          <h1 class="mb-4 mt-4 committee-designation"> {{ $employee_representative[0]->designation }} </h1>
                        @endif
                        <div id="employee_representative"></div>
                        @if($count !== 0)
                          <h1 class="mb-4 mt-4 committee-designation"> {{ $management_representative[0]->designation }} </h1>
                        @endif
                        <div id="management_representative"></div>
                    </div>
                </div>
                <!-- Add Committee-->
                <div class="modal fade" id="expadd" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="expaddLabel">
                                    Add Safety Commity Member
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
                                    <form method="post" action="#" id="committee" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="item" class="form-label">Employee</label>
                                                <select
                                                    name="employee_id"
                                                    id="employee_id" autofocus
                                                    class="form-control col-md-12">
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees as $list)
                                                        <option value="{{ $list->id }}">{{ $list->em_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Select Designation</label>
                                                <select name="designation"
                                                        id="designation" class="form-control col-md-12">
                                                    <option value="">Select Designation</option>
                                                    <option value="Chairman">Chairman</option>
                                                    <option value="Secretary">Secretary</option>
                                                    <option value="EMPLOYEE REPRESENTATIVE">EMPLOYEE REPRESENTATIVE</option>
                                                    <option value="MANAGEMENT/EMPLOYER REPRESENTATIVE">
                                                        MANAGEMENT/EMPLOYER REPRESENTATIVE
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="offset-3 col-sm-6">
                                                <label for="photo" class="form-label">Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photo">
                                            </div>
                                        </div>
                                        <div class="btn-modal"></div>
                                        <div class="row">
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-secondary" data-bs-dismiss="modal">
                                                        <i class="icofont-ui-close"></i> Close
                                                    </button>
                                                    <button type="submit" id="create-btn" class="btn btn-primary">
                                                        <i class="icofont-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Committee-->
                <div class="modal fade" id="edit_committee" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="expaddLabel">
                                    Edit Safety Commity Member
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
                                    <form method="post" action="#" id="edit_committee_form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="edit_form_id">
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="item" class="form-label">Employee</label>
                                                <select
                                                    name="employee_id"
                                                    id="employee_id" autofocus
                                                    class="form-control col-md-12">
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees as $list)
                                                        <option value="{{ $list->id }}">{{ $list->em_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Select Designation</label>
                                                <select name="designation"
                                                        id="designation" class="form-control col-md-12">
                                                    <option value="">Select Designation</option>
                                                    <option value="Chairman">Chairman</option>
                                                    <option value="Secretary">Secretary</option>
                                                    <option value="EMPLOYEE REPRESENTATIVE">EMPLOYEE REPRESENTATIVE</option>
                                                    <option value="MANAGEMENT/EMPLOYER REPRESENTATIVE">
                                                        MANAGEMENT/EMPLOYER REPRESENTATIVE
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="offset-3 col-sm-6">
                                                <label for="photo" class="form-label">Photo</label>
                                                <input type="file" onchange="readURL(this);" class="form-control" name="photo" id="photo">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="offset-3 col-sm-3" id="committee_pic_div" >
                                                <label class="img-label">Old Committee Pic</label>
                                                <img src="" id="old_committee_pic" height="50" width="50" alt="">
                                            </div>
                                            <div class="col-sm-3" style="display: none" id="new_committee_pic_div" >
                                                <label class="img-label">New Committee Pic</label>
                                                <img src="" id="new_committee_pic" height="50" width="50" alt="">
                                            </div>
                                        </div>
                                        <div class="btn-modal"></div>
                                        <div class="row">
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-secondary" data-bs-dismiss="modal">
                                                        <i class="icofont-ui-close"></i> Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="icofont-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("#expadd").on('shown.bs.modal', function () {
            $(this).find('#employees').focus();
        });
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#committee').on('submit',function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: "{{ route('safety_committee.store') }}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        $('#expadd').modal('hide');
                        let msg = 'Committee Successfully Inserted !!';
                        window.location.reload();
                        toastr.success(msg);
                    },
                    error: function(data){
                        let msg = 'Something Went Wrong !!';
                        toastr.error(msg);
                        console.log(data);
                    }
                });
            });
            $('#edit_committee_form').on('submit',function(e) {
                e.preventDefault();
                // let id = $(this).data('id');
                let id = $('#edit_committee_form').find('input[name="id"]').val();
                console.log(id)
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "/user/safety_committee/update"+'/'+ id,
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // this.reset();
                        $('#edit_committee').modal('hide');
                        let msg = 'Committee Successfully Updated !!';
                        window.location.reload();
                        toastr.success(msg);
                    },
                    error: function(data){
                        let msg = 'Something Went Wrong !!';
                        toastr.error(msg);
                        console.log(data);
                    }
                });
            });
            $.get('{{ route('safety_committee.getData') }}',function(data){
                let chairman = data.chairman
                let secretary = data.secretary
                let employee_representative = data.employee_representative
                let management_representative = data.management_representative
                let res='';
                let sec_res='';
                let emp_representative_res='';
                let management_representative_res='';
                $.each (chairman, function (key, value) {
                    // console.log(value)
                    res +=
                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +
                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +
                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +
                        "                                       data-bs-toggle=\"modal\"\n" +
                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"icofont-edit\"></i></a>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +
                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +
                        "                                        <img class=\"committee-img\"\n" +
                        "                                             src=\"{{ asset('uploads/safetyCommittee') }}"+'/'+"" +value.photo+"\"\n" +
                        "                                             alt=\"\"\n" +
                        "                                             height=\"150px\"/>\n" +
                        "                                    </div>\n" +
                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h3 class=\"committee-name\">\n" +
                        "                                            Name: "+value.em_name+"\n" +
                        "                                        </h3>\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Designation: "+value.designation+"\n" +
                        "                                        </h4>\n" +
                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Rc/Passport NO: "+value.em_ic_passport_no+" \n" +
                        "                                        </p>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>"

                });
                $.each (secretary, function (key, value) {
                    // console.log(value)
                    sec_res +=
                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +
                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +
                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +
                        "                                       data-bs-toggle=\"modal\"\n" +
                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"icofont-edit\"></i></a>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +
                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +
                        "                                        <img class=\"committee-img\"\n" +
                        "                                             src=\"{{ asset('uploads/safetyCommittee') }}"+'/'+"" +value.photo+"\"\n" +
                        "                                             alt=\"\"\n" +
                        "                                             height=\"150px\"/>\n" +
                        "                                    </div>\n" +
                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h3 class=\"committee-name\">\n" +
                        "                                            Name: "+value.em_name+"\n" +
                        "                                        </h3>\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Designation: "+value.designation+"\n" +
                        "                                        </h4>\n" +
                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Rc/Passport NO: "+value.em_ic_passport_no+" \n" +
                        "                                        </p>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>"

                });
                $.each (employee_representative, function (key, value) {
                    // console.log(value)
                    emp_representative_res +=
                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +
                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +
                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +
                        "                                       data-bs-toggle=\"modal\"\n" +
                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"icofont-edit\"></i></a>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +
                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +
                        "                                        <img class=\"committee-img\"\n" +
                        "                                             src=\"{{ asset('uploads/safetyCommittee') }}"+'/'+"" +value.photo+"\"\n" +
                        "                                             alt=\"\"\n" +
                        "                                             height=\"150px\"/>\n" +
                        "                                    </div>\n" +
                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h3 class=\"committee-name\">\n" +
                        "                                            Name: "+value.em_name+"\n" +
                        "                                        </h3>\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Designation: "+value.designation+"\n" +
                        "                                        </h4>\n" +
                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Rc/Passport NO: "+value.em_ic_passport_no+" \n" +
                        "                                        </p>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>"

                });
                $.each (management_representative, function (key, value) {
                    // console.log(value)
                    management_representative_res +=
                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +
                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +
                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +
                        "                                       data-bs-toggle=\"modal\"\n" +
                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"icofont-edit\"></i></a>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +
                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +
                        "                                        <img class=\"committee-img\"\n" +
                        "                                             src=\"{{ asset('uploads/safetyCommittee') }}"+'/'+"" +value.photo+"\"\n" +
                        "                                             alt=\"\"\n" +
                        "                                             height=\"150px\"/>\n" +
                        "                                    </div>\n" +
                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h3 class=\"committee-name\">\n" +
                        "                                            Name: "+value.em_name+"\n" +
                        "                                        </h3>\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Designation: "+value.designation+"\n" +
                        "                                        </h4>\n" +
                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                            Rc/Passport NO: "+value.em_ic_passport_no+" \n" +
                        "                                        </p>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>"

                });

                $('#chairman').html(res);
                $('#secretary').html(sec_res);
                $('#employee_representative').html(emp_representative_res);
                $('#management_representative').html(management_representative_res);
            });
            $(document).on('click', '#edit', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                // console.log(id);
                $('#edit_committee').find('form')[0].reset();
                $('#edit_committee').find('span.error-text').text('');
                $.post('/user/safety_committee/edit'+'/'+ id,{ id:id }, function (data) {
                    console.log(data);
                    $('#edit_committee').find('input[name="id"]').val(data.safety_committee.id);
                    $('#edit_committee').find('select[name="employee_id"]').val(data.safety_committee.employee_id);
                    $('#edit_committee').find('select[name="designation"]').val(data.safety_committee.designation);
                    $('#edit_committee').find('#old_committee_pic').attr('src', "{{ asset('uploads/safetyCommittee') }}"+ '/' + data.safety_committee.photo);
                    // $('#expadd').modal('show');
                }, 'json');
            });
        });
        function readURL(input) {
            $("#new_committee_pic_div").fadeOut(5000).attr("style", "display:none");
            if (input.files && input.files[0]) {
                $("#new_committee_pic_div").fadeIn(2000).attr("style", "display:block");

                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#new_committee_pic').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
