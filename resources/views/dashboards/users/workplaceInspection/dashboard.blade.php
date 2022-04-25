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
                        <span class="small">{{$count}}</span>
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

                        <span class="small">{{$priority[0]->urgent}}</span>

                    

                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-danger alert mb-0"  style="background-color: #FFFF00 !important;">
                    <div class="d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Do it within 1 or 2 days</div>
                        <span class="small">{{$priority1[0]->days}}</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="alert-warning alert mb-0" style="background-color: #D9D9D9 !important;">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h3 mb-0">Do it within 1 week/more </div>
                        <span class="small">{{$priority2[0]->more_week}}</span>
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
                        <table id="" class="table table-hover align-middle mb-0 datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>SL No</th>
                                    <th>LOCATION </th>
                                    <th>PICTURE</th>
                                    <th>UNSAFE ACT/UNSAFE CONDITION/HAZARDS/ISSUES </th>
                                    <th>DATE IDENTIFIED  </th>
                                    <th>CORRECTIVE ACTIONS TO BE TAKEN</th>
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

@endsection

@section('script')


 <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/page/chart-apex.js')}}"></script>


     <script src="../js/template.js"></script>

 <script type="text/javascript">

     function format ( d ) {
                 // `d` is the original data object for the row
                 return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                     '<tr>'+
                     '<td>Full name:</td>'+
                     '<td>'+d.country.country+'</td>'+
                     '</tr>'+
                     '<tr>'+
                     '<td>Extension number:</td>'+
                     '<td>'+d.Justification+'</td>'+
                     '</tr>'+
                     '<tr>'+
                     '<td>Extra info:</td>'+
                     '<td>And any further details here (images etc)...</td>'+
                     '</tr>'+
                     '</table>';
             }

     $(document).ready(function() {
         var table = $('.datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: {
                 url: "{{ route('create_ispection.datatable') }}",
                 type: 'GET',
                 'headers': {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 }
             },
             "columns": [
                 {
                     "className": 'dt-control',
                     "orderable": false,
                     "data": null,
                     "defaultContent": ''
                 },

                 {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                 {"data": "country.country"},
                 {"data": "image"},
                 {"data": "Justification"},

                 {"data": "admitdate"},
                 {"data": "text"},


                 // {"data": "status"},
                 {data: 'action', name: 'action', orderable: false, searchable: false}
             ],
             language: {
                 paginate: {
                     next: '<i class="bx bx-chevron-right">',
                     previous: '<i class="bx bx-chevron-left">'
                 }
             }
         });

         $('.datatable tbody').on('click', 'td.dt-control', function () {
                     var tr = $(this).closest('tr');
                     var row = table.row( tr );

                     if ( row.child.isShown() ) {
                         // This row is already open - close it
                         row.child.hide();
                         tr.removeClass('shown');
                     }
                     else {
                         // Open this row
                         row.child( format(row.data()) ).show();
                         tr.addClass('shown');
                     }
                 } );






     });


  </script>




 {{--   <script>

{{--     function format ( d ) {--}}
{{--            // `d` is the original data object for the row--}}
{{--            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+--}}
{{--                '<tr>'+--}}
{{--                '<td>Full name:</td>'+--}}
{{--                '<td>'+d.country.country+'</td>'+--}}
{{--                '</tr>'+--}}
{{--                '<tr>'+--}}
{{--                '<td>Extension number:</td>'+--}}
{{--                '<td>'+d.Justification+'</td>'+--}}
{{--                '</tr>'+--}}
{{--                '<tr>'+--}}
{{--                '<td>Extra info:</td>'+--}}
{{--                '<td>And any further details here (images etc)...</td>'+--}}
{{--                '</tr>'+--}}
{{--                '</table>';--}}
{{--        }--}}

{{--        // project data table--}}
{{--        $(document).ready(function() {--}}
{{--            var table =$('.datatable').DataTable({--}}
{{--                        processing: true,--}}
{{--                        serverSide: true,--}}
{{--                        ajax: {--}}
{{--                            url: "{{ route('create_ispection.datatable') }}",--}}
{{--                            type: 'GET',--}}
{{--                            'headers': {--}}
{{--                                'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                            }--}}
{{--                        },--}}
{{--                        "columns": [--}}
{{--                            {--}}
{{--                                "className":      'dt-control',--}}
{{--                                "orderable":      false,--}}
{{--                                "data":           null,--}}
{{--                                "defaultContent": ''--}}
{{--                            },--}}

{{--                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},--}}
{{--                            {"data": "country.country"},--}}
{{--                            {"data": "image"},--}}
{{--                            {"data": "Justification"},--}}
{{--                            --}}
{{--                            {"data": "admitdate"},--}}
{{--                            {"data": "text"},--}}
{{--                            --}}

{{--                            // {"data": "status"},--}}
{{--                            {data: 'action', name: 'action', orderable: false, searchable: false}--}}
{{--                        ],--}}
{{--                        language: {--}}
{{--                            paginate: {--}}
{{--                                next: '<i class="bx bx-chevron-right">',--}}
{{--                                previous: '<i class="bx bx-chevron-left">'--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}

{{--            $('.datatable tbody').on('click', 'td.dt-control', function () {--}}
{{--                var tr = $(this).closest('tr');--}}
{{--                var row = table.row( tr );--}}

{{--                if ( row.child.isShown() ) {--}}
{{--                    // This row is already open - close it--}}
{{--                    row.child.hide();--}}
{{--                    tr.removeClass('shown');--}}
{{--                }--}}
{{--                else {--}}
{{--                    // Open this row--}}
{{--                    row.child( format(row.data()) ).show();--}}
{{--                    tr.addClass('shown');--}}
{{--                }--}}
{{--            } );--}}

{{--        --}}

{{--         --}}
{{--        });--}}
{{--    </script>--}}


@endsection
