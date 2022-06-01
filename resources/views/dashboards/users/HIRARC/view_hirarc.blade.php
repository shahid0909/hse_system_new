@extends('layouts.app')
@section('style')
<link
          rel="stylesheet"
          href="assets/plugin/datatables/responsive.dataTables.min.css"
        />
        
        <link
          rel="stylesheet"
          href="assets/plugin/datatables/dataTables.bootstrap5.min.css"
        />
    
        <!-- project css file  -->
        <link rel="stylesheet" href="assets/css/ebazar.style.min.css" />
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

           <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0 py-3 pb-2">HIRARC</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->


                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-12">
                                    <div class="card p-xl-5 p-lg-4 p-0">
                                        <div class="card-header">
                                            <h3 style="text-align: center;">HIRARC - ST Regis</h1>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-3 pb-3 border-bottom">
                                                Department: {{$data1->depertment_name}}
                                                <strong> 
                                             
                                      

                                        </strong>
                                                <span class="float-end"> <strong>Reference No:</strong>{{ $data1->Reference_no}}</span>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                    <h6 class="mb-3 col-md-3"><strong>Process:</strong> <span>{{ $data1->process}}</span>
                                                    </h6>
                                                    <p class="col-md-3"><strong>location:</strong><span>{{$data1->location}}</span></p>
                                                    <p class="col-md-3"><strong>Review Date:</strong><span>{{$data1->date}}</span></p>
                                                    <p class="col-md-3"><strong>Last Assesment Date</strong><span>{{$data1->assessment_date}}</span></p>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                          <h6 class="mb-3 col-md-3"><strong>RM Assessor:</strong> <span>{{$data1->m2}}</span>
                                                          </h6>
                                                          <p class="col-md-2"><strong>RM Team 1  :</strong><span style="text-align: right;">{{$data1->m3}}</span></p>
                                                          <p class="col-md-2"><strong>RM Team 2  :</strong><span style="text-align: right;">{{$data1->m4}}</span></p>
                                                          <p class="col-md-2"><strong>RM Team 3  :</strong><span style="text-align: right;">{{$data1->m5}}</span></p>
                                                          <p class="col-md-3"><strong>RM Team 4  :</strong><span style="text-align: right;">{{$data1->m6}}</span></p>
                                                    </div>

                                                </div>
                                            </div> <!-- Row end  -->
                                            <div class="row">
                                              <h1>Activity List</h1>
                                              <hr>
                                            

                                              <div class="image col-md-3 mt-15" style="margin-top: 5%;">
                                                  <img src="/image/jobimage/{{$data2->image}}" alt="activity_img" style="width: 100%; height: 180px;border-radius: 15px 15px 0px 0px;" >

                                                  <p style="background: #21bb74; padding: 20px; border-radius: 0px 0px 15px 15px; color: #fff; font-size: 20px; font-weight: bold;">
                                                     

                                                    {{$data2->job_activity}}
                                                  

                                                  </p>
                                              </div>

                                              <div class="col-md-9">
                                                <div class="row clearfix g-3">
                                                  <div class="col-sm-12" style="overflow: scroll;">
                                                    <div class="card mb-3">
                                                      <div class="card-body">
                                                        <table
                                                          class="myProjectTable"
                                                          class="table table-striped align-middle"
                                                          style="width: 100%"
                                                        >
                                                          <thead>
                                                            <tr>
                                                              <th>SEQUENCE OF THE JOB</th>
                                                              <th>HAZARD and Category:</th>
                                                              <th>RMN Value & Risk: </th>
                                                            </tr>
                                                          </thead>

                                                          <tbody>
                                                       
                                                                <tr>
                                                                   
                                                                    @foreach($data as $key=>$value)
                                                                     
                                                                     <td>{{$value->sequence_job}}
                                                                         
                                                                     </td>
                                                                     <td>{{$value->hazard}}-{{$value->c_hazard}}<br>
                                                                         
                                                                     </td>
                                                                    @if( $value->rmn >= 14)
                                                                        <td>
                                                                          <span style="background-color: red; padding: 5px; border-radius: 5px; color: white; font-weight: bold; height: 10PX; width:35px ; object-fit: cover;">{{$value->rmn}}-
                                                                            {{"High Rick"}}
                                                                        
                                                                            </span>
                                                                        </td>
                                                                    @endif

                                                                     @if( $value->rmn >= 4 && $value->rmn <= 14)
                                                                    <td>
                                                                      <span style="background-color: orange; padding: 5px ; border-radius: 5px; color: white; font-weight: bold;height: 10PX; width:35px ; object-fit: cover;">{{$value->rmn}}-
                                                                    {{"Medium Rick"}}
                                                                    
                                                                    </span>
                                                                    </td>
                                                                  

                                                                   @endif

                                                               @if( $value->rmn <= 4) 
                                                                <td>
                                                                  
                                                      
                                                                  <span  style="background-color: green; padding: 5px  ; border-radius: 5px ; color: white; font-weight: bold;">{{$value->rmn}}-
                                                                {{"Low Rick"}}
                                                                 </span>
                                                               </td>
                                                                @endif
                                                             
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
                                </div>
                            </div> <!-- Row end  -->
                        </div>

                    </div> <!-- Row end  -->
                </div>
            </div>

        

    </div>


        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('assets/js/template.js')}}"></script>

    <script>
      // project data table
      $(document).ready(function () {
        $(".myProjectTable")
          .addClass("nowrap")
          .dataTable({
            responsive: false,
            columnDefs: [{ targets: [-1, -3], className: "dt-body-left" }],
          });
        $(".deleterow").on("click", function () {
          var tablename = $(this).closest("table").DataTable();
          tablename.row($(this).parents("tr")).remove().draw();
        });
      });
    
 
     // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);
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
                            {"data": "reference_no"},
                            {"data": "phone"},
                            {"data": "depertment_image"},
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
                });

                 </script>
          

@endsection
