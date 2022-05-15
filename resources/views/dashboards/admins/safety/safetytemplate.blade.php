@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"/>
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
          <div
            class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
          >
            <h3 class="fw-bold mb-0 py-3 pb-2">Safety Ploicy Template</h3>
          </div>
        </div>
      </div>
      <!-- Row end  -->



      <div class="row ">
        <div class="col-md-6 ">
          <div class="">
            <div class="">
              <div
                class="card p-xl-5 p-lg-4 p-0"
                style="
                  box-shadow: 0px 0px 5px 0px #ccc;
                  background-image: url('assets/images/bg-2.png');
                  background-size: 100% 100%;
                "
              >
                <div class="card-body">
                  <div class="mb-3 pb-3 border-bottom text-center">
                    <h3><b> SAFETY & HEALTH POLICY</b></h3>
                  </div>

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div>
                        <h6>
                          <strong>GCH RETAIL (M) SDN BHD</strong> is
                          committed to continual improvement in health,
                          safety and welfare of all its employees,
                          customers, contractors and visitors and those
                          under its influence in the neighborhood and
                          community at large.
                        </h6>
                      </div>
                      <div class="mid">
                        <p>
                          In fulfilling this commitment, we as far as
                          reasonably practicable, ensure;
                        </p>
                        <ul>
                          <li>
                            A safe and healthy working environment to
                            prevent injuries, disabilities, ill health and
                            diseases.
                          </li>
                          <li>
                            Employee awareness by providing information,
                            instruction, training, supervision, and
                            adequate personal protective equipment.
                          </li>
                          <li>
                            Strong rapport with authorities and the local
                            community in promoting safety and health.
                          </li>
                          <li>
                            All applicable safety and health legislative
                            requirements, regulations, and code of
                            practice are complied.
                          </li>
                          <li>
                            Continuous improvement for the safety of our
                            work environment by investing in our people
                            and our facilities.
                          </li>
                          <li>
                            A safety culture to achieve an accident-free
                            work environment.
                          </li>
                        </ul>

                        <p style="text-align: center">Tag Line Here</p>
                      </div>
                    </div>
                  </div>
                  <!-- Row end  -->
                  <div class="row">
                    <div class="col-lg-12">
                      <h6>Miss Vimala</h6>
                      <p class="text-muted">Chief Executive Officer</p>
                    </div>
                  </div>
                  <!-- Row end  -->
                </div>
              </div>
              <div class="col-lg-12 text-end">
           
                <a href="{{ route('safety.policy-index') }}">
                    <button type="button" class="btn btn-primary btn-lg my-1">
                        <i class="fa fa-paper-plane-o"></i> Use This Template
                      </button>
                </a>
              </div>
            </div>
        
          <!-- Row end  -->
        </div>
      </div>
      
      <div class="col-md-6 ">
        <div class="">
          <div class="">
            <div
              class="card p-xl-5 p-lg-4 p-0"
              style="
                box-shadow: 0px 0px 5px 0px #ccc;
                background-image: url('assets/images/bg-2.png');
                background-size: 100% 100%;
              "
            >
              <div class="card-body">
                <div class="mb-3 pb-3 border-bottom text-center">
                  <h3><b> SAFETY & HEALTH POLICY</b></h3>
                </div>

                <div class="row mb-4">
                  <div class="col-sm-12">
                    <div>
                      <h6>
                        <strong>GCH RETAIL (M) SDN BHD</strong> is
                        committed to continual improvement in health,
                        safety and welfare of all its employees,
                        customers, contractors and visitors and those
                        under its influence in the neighborhood and
                        community at large.
                      </h6>
                    </div>
                    <div class="mid">
                      <p>
                        In fulfilling this commitment, we as far as
                        reasonably practicable, ensure;
                      </p>
                      <ul>
                        <li>
                          A safe and healthy working environment to
                          prevent injuries, disabilities, ill health and
                          diseases.
                        </li>
                        <li>
                          Employee awareness by providing information,
                          instruction, training, supervision, and
                          adequate personal protective equipment.
                        </li>
                        <li>
                          Strong rapport with authorities and the local
                          community in promoting safety and health.
                        </li>
                        <li>
                          All applicable safety and health legislative
                          requirements, regulations, and code of
                          practice are complied.
                        </li>
                        <li>
                          Continuous improvement for the safety of our
                          work environment by investing in our people
                          and our facilities.
                        </li>
                        <li>
                          A safety culture to achieve an accident-free
                          work environment.
                        </li>
                      </ul>

                      <p style="text-align: center">Tag Line Here</p>
                    </div>
                  </div>
                </div>
                <!-- Row end  -->
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Miss Vimala</h6>
                    <p class="text-muted">Chief Executive Officer</p>
                  </div>
                </div>
                <!-- Row end  -->
              </div>
            </div>
            <div class="col-lg-12 text-end">
         
              <a href="{{ route('safety.policy-index') }}">
                  <button type="button" class="btn btn-primary btn-lg my-1">
                      <i class="fa fa-paper-plane-o"></i> Use This Template
                    </button>
              </a>
            </div>
          </div>
      
        <!-- Row end  -->
      </div>
    </div>
    <div class="col-md-6 ">
        <div class="">
          <div class="">
            <div
              class="card p-xl-5 p-lg-4 p-0"
              style="
                box-shadow: 0px 0px 5px 0px #ccc;
                background-image: url('assets/images/bg-2.png');
                background-size: 100% 100%;
              "
            >
              <div class="card-body">
                <div class="mb-3 pb-3 border-bottom text-center">
                  <h3><b> SAFETY & HEALTH POLICY</b></h3>
                </div>

                <div class="row mb-4">
                  <div class="col-sm-12">
                    <div>
                      <h6>
                        <strong>GCH RETAIL (M) SDN BHD</strong> is
                        committed to continual improvement in health,
                        safety and welfare of all its employees,
                        customers, contractors and visitors and those
                        under its influence in the neighborhood and
                        community at large.
                      </h6>
                    </div>
                    <div class="mid">
                      <p>
                        In fulfilling this commitment, we as far as
                        reasonably practicable, ensure;
                      </p>
                      <ul>
                        <li>
                          A safe and healthy working environment to
                          prevent injuries, disabilities, ill health and
                          diseases.
                        </li>
                        <li>
                          Employee awareness by providing information,
                          instruction, training, supervision, and
                          adequate personal protective equipment.
                        </li>
                        <li>
                          Strong rapport with authorities and the local
                          community in promoting safety and health.
                        </li>
                        <li>
                          All applicable safety and health legislative
                          requirements, regulations, and code of
                          practice are complied.
                        </li>
                        <li>
                          Continuous improvement for the safety of our
                          work environment by investing in our people
                          and our facilities.
                        </li>
                        <li>
                          A safety culture to achieve an accident-free
                          work environment.
                        </li>
                      </ul>

                      <p style="text-align: center">Tag Line Here</p>
                    </div>
                  </div>
                </div>
                <!-- Row end  -->
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Miss Vimala</h6>
                    <p class="text-muted">Chief Executive Officer</p>
                  </div>
                </div>
                <!-- Row end  -->
              </div>
            </div>
            <div class="col-lg-12 text-end">
         
              <a href="{{ route('safety.policy-index') }}">
                  <button type="button" class="btn btn-primary btn-lg my-1">
                      <i class="fa fa-paper-plane-o"></i> Use This Template
                    </button>
              </a>
            </div>
          </div>
      
        <!-- Row end  -->
      </div>
    </div>
    <div class="col-md-6 ">
        <div class="">
          <div class="">
            <div
              class="card p-xl-5 p-lg-4 p-0"
              style="
                box-shadow: 0px 0px 5px 0px #ccc;
                background-image: url('assets/images/bg-2.png');
                background-size: 100% 100%;
              "
            >
              <div class="card-body">
                <div class="mb-3 pb-3 border-bottom text-center">
                  <h3><b> SAFETY & HEALTH POLICY</b></h3>
                </div>

                <div class="row mb-4">
                  <div class="col-sm-12">
                    <div>
                      <h6>
                        <strong>GCH RETAIL (M) SDN BHD</strong> is
                        committed to continual improvement in health,
                        safety and welfare of all its employees,
                        customers, contractors and visitors and those
                        under its influence in the neighborhood and
                        community at large.
                      </h6>
                    </div>
                    <div class="mid">
                      <p>
                        In fulfilling this commitment, we as far as
                        reasonably practicable, ensure;
                      </p>
                      <ul>
                        <li>
                          A safe and healthy working environment to
                          prevent injuries, disabilities, ill health and
                          diseases.
                        </li>
                        <li>
                          Employee awareness by providing information,
                          instruction, training, supervision, and
                          adequate personal protective equipment.
                        </li>
                        <li>
                          Strong rapport with authorities and the local
                          community in promoting safety and health.
                        </li>
                        <li>
                          All applicable safety and health legislative
                          requirements, regulations, and code of
                          practice are complied.
                        </li>
                        <li>
                          Continuous improvement for the safety of our
                          work environment by investing in our people
                          and our facilities.
                        </li>
                        <li>
                          A safety culture to achieve an accident-free
                          work environment.
                        </li>
                      </ul>

                      <p style="text-align: center">Tag Line Here</p>
                    </div>
                  </div>
                </div>
                <!-- Row end  -->
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Miss Vimala</h6>
                    <p class="text-muted">Chief Executive Officer</p>
                  </div>
                </div>
                <!-- Row end  -->
              </div>
            </div>
            <div class="col-lg-12 text-end">
         
              <a href="{{ route('safety.policy-index') }}">
                  <button type="button" class="btn btn-primary btn-lg my-1">
                      <i class="fa fa-paper-plane-o"></i> Use This Template
                    </button>
              </a>
            </div>
          </div>
      
        <!-- Row end  -->
      </div>
    </div>
    

    



    
      <!-- Row end  -->
    </div>
  </div>
  @endsection