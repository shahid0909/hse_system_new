@extends('layouts.app')

@section('style')

@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
    @include('dashboards.users.partial.header')

           <div class="body d-flex py-3">
            <div class="container-xxl">
                <div
                class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3"
            >
                <div class="col">
                <div class="alert-success alert mb-0" style="background: #009688; color: #fff;">
                    <div class="d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Total Inspection</div>
                        <span class="small">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-danger alert mb-0"  style="background-color: #00FF00 !important;">
                    <div class="d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0 text-white">Close Inspection</div>
                        <span class="small text-white">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-warning alert mb-0" style="background-color: #3C78D8 !important;">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0 text-white">Pending Inspection</div>
                        <span class="small text-white">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div
                class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3"
            >
                <div class="col">
                <div class="alert-danger alert mb-0" style="background-color: #FF0000;">
                    <div class="d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Immediately (Urgent)</div>
                        <span class="small">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-danger alert mb-0"  style="background-color: #FFFF00 !important;">
                    <div class="d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Do it within 1 or 2 days</div>
                        <span class="small">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-warning alert mb-0" style="background-color: #D9D9D9 !important;">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Do it within 1 week/more </div>
                        <span class="small">120</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Monthly Inspection Chart</h6>
                    </div>
                    <div class="card-body">
                        <div id="apex-basic-column"></div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header">
                      <h3 class="text-center"> Recent Inspection List</h3>
                      <hr>
                    </div>
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL No</th> 
                                    <th>LOCATION </th>
                                    <th>PICTURE</th> 
                                    <th>UNSAFE ACT/UNSAFE CONDITION/HAZARDS/ISSUES </th>  
                                    <th>DATE IDENTIFIED  </th>
                                    <th>CORRECTIVE ACTIONS TO BE TAKEN</th> 
                                    <th>PIC</th>  
                                    <th>TARGET DATE </th>
                                    <th>PRIORITY</th> 
                                    <th>TASK RECTIFIED WITH PICTURE</th> 
                                    <th>DATE RECTIFIED  </th>
                                    <th>STATUS </th> 
                                    <th>JUSTIFICATION </th> 
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Laundy Department</td>
                                    <td>
                                        <img class="avatar" src="assets/images/xs/avatar1.svg" alt="">
                                    </td>
                                    <td>
                                        Portable Steam Iron's Tube too hot when it is in operation and its defective
                                    </td>
                                    <td>Shakib Hasan</td>
                                    <td>Shakib Hasan</td>
                                    <td>09-05-2021</td>
                                    <td>IMMEDIATELY (URGENT)</td>
                                    <td> <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt=""></td>
                                    <td>09-05-2021</td>
                                    <td>closed</td>
                                    <td>The tube insulated with heat resistant material. </td>
                                    <td>"1. Wrap insulation around the hot tube
                                        2. Put signage on to warn the hazard (emits hot steam - burn hazard)"
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>




@endsection

@section('script')
        

 <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/page/chart-apex.js')}}"></script
  <script src="../js/template.js"></script>
    <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            $('.deleterow').on('click',function(){
            var tablename = $(this).closest('table').DataTable();  
            tablename
                .row( $(this)
                .parents('tr') )
                .remove()
                .draw();

            } );
        });
    </script>
@endsection
