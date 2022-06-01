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

        <div class="body d-flex py-3">
            <div class="container-xxl">
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">WorkPlace Inspection List</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-primary btn-set-task w-sm-100"
                                        data-bs-toggle="modal" data-bs-target="#expadd">
                                        
                                        <a  class="btn btn-primary btn-set-task w-sm-100" href="{{route('create_ispection.index')}}">
                                            <i class="icofont-plus-circle me-2 fs-6">
                                            
                                        </i>


                                        Add Workplace Inspection</a>
                                        
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover datatable align-middle mb-0"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Sl</th>
                                    <th>LOCATION</th>
                                    <th>PICTURE</th>
                                    <th>PIC</th>
                                    <th>PRIORITY</th>
                                    <th>TARGET DATE</th>
                                    <th>Admit DATE</th>      
                                    <th>Action</th>
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
    </div>
    </div>



@endsection


@section('script')

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js-->
    <script src="assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/js/template.js"></script>

    <script type="text/javascript">

                 function format(d) {
                     // `d` is the original data object for the row
                     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                         '<td>Full name:</td>' +
                         '<td>' + d.employee.em_name + '</td>' +
                        '</tr>' +
                         '<tr>' +
                         '<td>Extension number:</td>' +
                         '<td>' + d.country.depertment_name + '</td>' +
                         '</tr>' +
                         '<tr>' +
                         '<td>Extra info:</td>' +
                         '<td>And any further details here (images etc)...</td>' +
                         '</tr>' +
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
                            {"data": "country.depertment_name"},

                            // {"data": "inspection_title"},

                            // {"data": "inspection_title"},

                            {"data": "image"},
                            {"data": "employee.em_name"},
                            {"data": "priority"},
                            {"data": "admitdate"},
                            {"data": "targetdate"},


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

    </script>
    

@endsection


