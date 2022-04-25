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
                            <h3 class="fw-bold mb-0">Hirarc List</h3>
                         
                        </div>
                        <div class="card-body">
                            <table id="" class="table table-hover myProjectTable align-middle mb-0"
                                   style="width:100%">
                                <thead>
                                <tr>

                                    
                                    <th>Sl</th>
                                    <th>Depertment</th>
                                    <th>Location</th>
                                    <th>RM_Assessor</th>
                                    <th>Job Activity</th>
                                  
                                    <th>Action</th>
                                    <!-- <th>View</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$value)
                                    <tr>
                                       
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->depertment_name}}</td>
                                        <td>{{$value->location}}</td>
                                        <td>{{$value->rm}}</td>
                                        <td>{{$value->job_activity}}</td>
                                      
                                       

                                         <td>
                                            <a href="{{route('hirarc.edit',$value->id)}}" class="icofont-edit" > <i class=""></i></a>||

                                            <a href="{{route('hirarc.destroy',$value->id)}}" class="btn btn-danger btn-xs" > <i class="icofont-delete-alt"></i></a>||

                                            <a href="{{route('hirarc.view',$value->id)}}" class="btn btn-success btn-xs" > <i class="icofont-eye-alt"></i></a>

                                        </td>
                                     

                                       
                        
                        
                                    </tr>

                                    @endforeach


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

    <script>
          // project data table
      $(document).ready(function () {
        $(".myProjectTable")
          .addClass("nowrap")
          .dataTable({
            responsive: true,
            columnDefs: [{ targets: [-1, -3], className: "dt-body-right" }],
          });
        $(".deleterow").on("click", function () {
          var tablename = $(this).closest("table").DataTable();
          tablename.row($(this).parents("tr")).remove().draw();
        });
      });

         
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('hirarc.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                   

                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                            {"data": "depertment_id"},
                            {"data": "location"},
                            {"data": "rm_assessor"},
                            // {"data": "job_a.job_activity"},
                            // {"data": "job_activity"},
                            // {"data": "job_activity"},
                            // {"data": "job_activity"},
                            
                            // {"data": "image"},
                           

                    
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="bx bx-chevron-right">',
                        previous: '<i class="bx bx-chevron-left">'
                    }
                }
            });

        


        });

    </script>
    

@endsection


