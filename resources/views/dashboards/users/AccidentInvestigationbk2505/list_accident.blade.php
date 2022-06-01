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
                            <h3 class="fw-bold mb-0">Accident Analysis List</h3>
                            <div class="col-auto d-flex w-sm-100">
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover datatable align-middle mb-0"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Departmet</th>
                                    <th>Designation</th>
                                    <th>Incident location</th>
                                    <th>Type of accitent</th>
                                    <th>Time of accitentE</th>
                                    <th>Repost to DOSH</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($data as $key=>$v_data)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $v_data->em_name }}</td>
                                    <td>{{ $v_data->depertment_name }}</td>
                                    <td>{{ $v_data->em_des }}</td>
                                    <td>{{ $v_data->l_of_incident }}</td>
                                    @if($v_data->t_of_accident==1)
                                    <td>Near miss</td>
                                    @elseif($v_data->t_of_accident==2)
                                    <td>Demo</td>
                                    @endif
                                    
                                    <td>{{ $v_data->tim_of_incident }}</td>
                                    <td>{{ $v_data->typ_of_notif }}</td>
                                
                                </tbody>
                                @endforeach
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

    <!-- <script type="text/javascript">

                 function format(d) {
                     // `d` is the original data object for the row
                     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                         '<td>Full name:</td>' +
                         '<td>' + d.employee.em_name + '</td>' +
                        '</tr>' +
                         '<tr>' +
                         '<td>Extension number:</td>' +
                         '<td>' + d.country.country + '</td>' +
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
                            {"data": "country.country"},
                            {"data": "inspection_title"},
                            {"data": "image"},
                            {"data": "employee.em_name"},
                            {"data": "priority"},
                            {"data": "admitdate"},
                            {"data": "targetdate"},

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

    </script> -->


@endsection


