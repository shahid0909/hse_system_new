@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                     {{session()->get('message')}}
                     </div>
                    @endif
                </div>
              <div class="card mb-3">
                  <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h6 class="fw-bold mb-0">Create Hirarc</h6>
                  </div>
                  <div class="card-body">
                    <div class="row align-item-center">
                      <div class="col-md-12">
                         <form method="POST" enctype="multipart/form-data" id="department"

                                      @if(isset($data->id))
                                      action="{{ route('h_hazard.update', ['id' => $data->id]) }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    @else
                                        action="{{ route('h_hazard.store')}}">
                                    @endif
                                    @csrf
                              <div class="row g-3" style="margin: 0 auto;">
                                <div class="col-md-6 mb-6">
                                      <div class="form-group " >
                                          <label class="form-label" >
                                         Department
                                      <span class="text-danger">*</span>
                                      </label>

                                          <!-- <input type="text" class="form-control" required> -->

                                          
                                          <select name="depertment_id" id="depertment_id" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                            <option value="">Select Department</option>
                                             @foreach($department as $list)

                                          <option value="{{$list->id}}">
                                        
                                            {{isset($list->id)? $list->depertment_name: ''}}

                                           </option>

                                          @endforeach
                                          </select>

                                      </div>
                            
                                  </div>
                            
                                    <div class="col-md-6 mb-6">
                                      <div class="form-group " >
                                          <label class="form-label" >
                                         Job
                                      <span class="text-danger">*</span>
                                      </label>

                                          <!-- <input type="text" class="form-control" required> -->

                                          
                                          <select name="job_activity_id" id="job_activity_id" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                            <option value="">Select job</option>

                                        @foreach($c_job as $list)

                                          <option value="{{$list->id}}">
                                        
                                            {{isset($list->id)? $list->job_activity: ''}}

                                             </option>

                                          @endforeach
                                            
                                          </select>

                                      </div>

                                  </div>

                                 
          
                                
                                               
                                  <div  id="show_item">
                                    <div class="row">
                                  
                                  <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >SEQUENCE OF THE JOB
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;" 
                                                   class="form-control"
                                                   id="sequence_job"
                                                   name="sequence_job[]"
                                                   value="{{isset($data1->sequence_job)? $data1->sequence_job: ''}}"
                                            />
                                        </div>


                                     <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >HAZARD
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="hazard"
                                                   name="hazard[]"
                                                   value="{{isset($data1->hazard)? $data1->hazard: ''}}"
                                            />
                                        </div>

                                     <div class="col-md-6 mb-6">
                                      <div class="form-group">
                                          <label class="form-label">Category Hazard 
                                            <span class="text-danger">*</span>
                                          </label>
                                          <!-- <input type="text" class="form-control" required> -->
                                          <select  name="c_hazard[]" id="c_hazard" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color);border-color:#c0b1b1;">
                                            <option value="">Select Hazard</option>
                                            <option value="PHYSICAL">PHYSICAL/HEALTH</option>
                                            <option value="CHEMICAL">CHEMICAL</option>
                                            <option value="BIOLOGICAL">BIOLOGICAL</option>
                                            <option value="PHYCHOSOCIALe">PHYCHOSOCIALe</option>
                                          </select>
                                      </div>
                                  </div>

                                            <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Event and Consequences
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="event_consequences"
                                                   name="event_consequences[]"
                                                   value="{{isset($data1->event_consequences)? $data1->event_consequences: ''}}"
                                            />
                                        </div>

                                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h6 class="fw-bold mb-0">RISK EVALUATION </h6>
                                    </div>   

                                 
                                     <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Existing Risk Control (if any)
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="risk_control"
                                                   name="risk_control[]"
                                                   value="{{isset($data1->risk_control)? $data1->risk_control: ''}}"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Justification of Likelihood 
                                            <span class="text-danger">*</span>
                                            </label
                                            >

                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="j_likelihood"
                                                   name="j_likelihood[]"
                                                   value="{{isset($data1->j_likelihood)? $data1->j_likelihood: ''}}"
                                            />
                                        </div>

                                  

                                            <div class="col-md-4 mb-6">
                                            <label for="depone" class="form-label"
                                            >Likelihood (L)
                                            <span class="text-danger">*</span>
                                            </label
                                            >

                                            <input type="number"
                                                   class="form-control"
                                                   style=" border-color:#c0b1b1;"
                                                   id="likelihood_l"
                                                   name="likelihood_l[]"
                                                   min="1"
                                                   max="5"
                                                   onkeyup="caltoprice();"
                                                   value="{{isset($data1->likelihood_l)? $data1->likelihood_l: ''}}"
                                            />
                                        </div>

                                           <div class="col-md-4 mb-6">
                                            <label for="depone" class="form-label"
                                            > Severity (S)
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="number"
                                                   class="form-control"
                                                   style=" border-color:#c0b1b1;"
                                                   id="severity_s"
                                                   name="severity_s[]"
                                                   min="1"
                                                   max="5"
                                                   onkeyup="caltoprice();"
                                                   value="{{isset($data1->severity_s)? $data1->severity_s: ''}}"
                                            />
                                        </div>
                                            <div class="col-md-4 mb-6">
                                            <label for="depone" class="form-label"
                                            >RMN
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type=""
                                                   class="form-control"
                                                   style=" border-color:#c0b1b1;"
                                                   id="rmn" 
                                                    name="rmn[]" 
                                                   value="{{isset($data1->rmn)? $data1->rmn: ''}}"
                                            />
                                        </div>
                                          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h6 class="fw-bold mb-0"> RISK CONTROL
                                            <span class="text-danger">*</span>
                                        </h6>
                                    </div> 

                                         <div class="col-md-12 mb-6">
                                            <label for="depone" class="form-label"
                                            >Additional Risk Control
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   style=" border-color:#c0b1b1;"
                                                   id="additional_risk"
                                                   name="additional_risk[]"
                                                   value="{{isset($data1->additional_risk)? $data1->additional_risk: ''}}"
                                            />
                                        </div>
                                        
                                          <input type="hidden" name="company_id" id="" class="form-control" value="">
                                                   

                                  
                                
                                       



                                            <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary addROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0; margin-top: 10px;">ADD more</button>
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
          
     
    <script>


        $("#depertment_id").on("change", function () {
            let dept_id = $("#depertment_id").val();
                 $.ajax({
                type: 'get',
                url: "depertmentonchange"+'/'+dept_id,   
                success: function (data) {
                    

                       $('#job_activity_id').html(data);

            
                }
                
            });
        });  





    


        // project data table
             $("#employee_id").on("change", function () {
                      let emp_id = $("#employee_id").val();
                 $.ajax({
                type: 'get',
                url: "getempdesignation"+'/'+emp_id,   
                success: function (data) {


                    $('#designation').val(data.ds_name);
                    $('#designation_id').val(data.id);
                }
            });
                    });

        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            $('.deleterow').on('click',function()
            {
            var tablename = $(this).closest('table').DataTable();  
            tablename
                    .row( $(this)
                    .parents('tr') )
                    .remove()
                    .draw();

            } );
        });
   
              $(".addROw").click(function () {
                                            // e.preventDefault();
                                            $("#show_item").prepend(`

                                           <div class="row">
                                            <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >SEQUENCE OF THE JOB</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="sequence_job"
                                                   name="sequence_job[]"
                                                   value="{{isset($data->sequence_job)? $data->sequence_job: ''}}"
                                            />
                                        </div>


                                     <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >HAZARD</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="hazard"
                                                   name="hazard[]"
                                                   value="{{isset($data->hazard)? $data->hazard: ''}}"
                                            />
                                        </div>

                                     <div class="col-md-6 mb-6">
                                      <div class="form-group">
                                          <label class="form-label">Category Hazard</label>
                                          <!-- <input type="text" class="form-control" required> -->
                                          <select name="c_hazard[]" id="c_hazard" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color);">
                                            <option value="">Select Hazard</option>
                                            <option value="PHYSICAL/HEALTH">PHYSICAL/HEALTH</option>
                                            <option value="CHEMICAL">CHEMICAL</option>
                                            <option value="BIOLOGICAL">BIOLOGICAL</option>
                                            <option value="">PHYCHOSOCIALe</option>
                                          </select>
                                      </div>
                                  </div>

                                            <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Event and Consequences</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="event_consequences"
                                                   name="event_consequences[]"
                                                   value="{{isset($data->event_consequences)? $data->event_consequences: ''}}"
                                            />
                                        </div>
                                           <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h6 class="fw-bold mb-0">RISK EVALUATION </h6>
                                    </div>   

                                 
                                     <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Existing Risk Control (if any)</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="risk_control"
                                                   name="risk_control[]"
                                                   value="{{isset($data->risk_control)? $data->risk_control: ''}}"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Justification of Likelihood</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="j_likelihood"
                                                   name="j_likelihood[]"
                                                   value="{{isset($data->j_likelihood)? $data->j_likelihood: ''}}"
                                            />
                                        </div>

                                  

                                            <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >Likelihood (L)</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="likelihood_l"
                                                   name="likelihood_l[]"
                                                   onkeyup="caltoprice();"
                                                   value="{{isset($data->likelihood_l)? $data->likelihood_l: ''}}"
                                            />
                                        </div>

                                           <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            > Severity (S)</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="severity_s"
                                                   name="severity_s[]"
                                                   onkeyup="caltoprice();"
                                                   value="{{isset($data->severity_s)? $data->severity_s: ''}}"
                                            />
                                        </div>
                                            <div class="col-md-12 mb-6">
                                            <label for="depone" class="form-label"
                                            >RMN</label
                                            >
                                            <input type=""
                                                   class="form-control"
                                                   id="rmn"
                                                   name="rmn[]"
                                                   onkeyup="caltoprice();"
                                                   value="{{isset($data->rmn)? $data->rmn: ''}}"
                                            />
                                        </div>
                                          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h6 class="fw-bold mb-0"> RISK CONTROL</h6>
                                    </div> 

                                         <div class="col-md-12 mb-6">
                                            <label for="depone" class="form-label"
                                            >Additional Risk Control</label
                                            >
                                            <input type="text"
                                                   class="form-control"
                                                   id="additional_risk"
                                                   name="additional_risk[]"
                                                   value="{{isset($data->additional_risk)? $data->additional_risk: ''}}"
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

            var total =parseInt((likelihood_l*severity_s));
       
            $('#rmn').val(total);
        }

 function caltoprice1() {
            var likelihood_l1 = parseInt($('#likelihood_l1').val());
            var severity_S1 = parseInt($('#severity_S1').val());

            var total =parseInt((likelihood_l1*severity_S1));
       
            $('#rmn1').val(total);
        }




          </script>


     <!--      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();

                    $("#job_activity_id").on("change", function () {
                      let emp_id = $("#job_activity_id").val();
                 $.ajax({
                type: 'get',
                url: "getdesignation"+'/'+emp_id,   
                success: function (data) {
                    $('#designation').val(data.ds_name);
                    $('#designation_id').val(data.id);
                }
            });
                    });

                });

                </script> -->

@endsection


                               