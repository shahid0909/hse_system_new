@extends('layouts.app')
@section('style')
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

<div class="body d-flex py-3">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
          >
            <h3 class="fw-bold mb-0">Safety Policy</h3>
          </div>
        </div>
      </div>
    
      <!-- Row end  -->
    
    <div class="row g-3 mb-xl-3">
      <div
        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8"
        style="margin: 0 auto"
      >
        <div
          class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 row-deck g-3"
        >
          <div
            class="card"
            style="
              padding: 20px;
              background: rgb(41, 128, 200);
              color: #fff;
              font-size: 20px;
              font-weight: 800;
              font-family: 'Times New Roman', Times, serif;
            "
          >
            <p>
              OSHA's mission is to ensure that employees work in a safe
              and healthful environment by setting and enforcing
              standards, and by providing training, outreach, education
              and assistance. Employers must comply with all applicable
              OSHA standards
            </p>
          </div>
          <div class="col">
            <div
              class="card profile-card mt-5"
              style="box-shadow: 0px 0px 5px 2px #1f9163"
            >
              <div
                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
              >
                <h6
                  class="mb-0 fw-bold"
                  style="text-align: center !important; color: #315948"
                >
                  Next Rewiew Date Of Safety Ploicy
                </h6>
              </div>
              <div
                class="card-body d-flex profile-fulldeatil flex-column"
              >
                <div class="profile-block text-center w220 mx-auto">
                  <div
                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column"
                  >
                    <strong class="text-muted">12-12-2022</strong>
                  </div>
                </div>
                <div class="profile-info w-100">
                  <h6
                    class="mb-0 mt-2 fw-bold d-block fs-6 text-center"
                  >
                    Joan Dyer
                  </h6>
                  <span
                    class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"
                    >Chairman, Safety Committee</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-6">
       <div class="row">
           <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
             
                </div>
                <div class="card-body">
                  <h5 class="card-title">Next Review Data of Safety policy</h5>
                  <p class="card-text">Date:11/11/22</p>
                  <h4>Mentor:Jahid</h4>
                </div>
               
              </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                
                </div>
                <div class="card-body">
               
                  <p class="card-text">After  Every Two Years or the CEO change,need  to safety policy Review</p>
                  {{-- <a href="{{route('upload_policy.index')}}"> <button
                    type="button"
                    class="btn btn-info btn-lg my-1" >
                    <i class="fa fa-print"></i> 
                </button></a> --}}
                </div>
               
              </div>
           </div>
       </div>
    </div>
    @if(isset($safetys->id))
    <div class="col-md-6 ">
  
       
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

                    <h4>{{ $safetys->title }}</h4>
                    <div>
                      <h6 >
                        <strong >{{$safetys->company->company_name }}</strong> is
                        committed to continual improvement in health,
                        safety and welfare of all its employees,
                        customers, contractors and visitors and those
                        under its influence in the neighborhood and
                        community at large.
                      </h6>
                    </div>
                    <div class="mid">
                        <p> {!!$safetys->commitment!!} </p>
                        <p class="text-center">Tag line</p>
                      <ul>
                        <li>
                       
                            {{ $safetys->tagline}}
                        </li>

                      </ul>
                    </div>
                </div>
               <div class="col-md-3"> <h6> {{$safetys->employee->em_name}}</h6>
                <p class="text-muted">{{  $safetys->designation->ds_name }}</p>
</div>
   
                <div class="col-md-3"><p>{{$safetys->company->company_name }}</p>
                    <p>{{ $safetys->created_at->format('Y:M:D') }}</p></div>
         
            </div>

                <!-- Row end  -->

                <!-- Row end  -->
                <div>
                    <a href="{{route('upload_policy.index')}}"> <button
                        type="button"
                        class="btn btn-dark btn-lg my-1" >
                        <i class="fa fa-print"></i> Upload
                    </button></a>
                    <a href="{{ route('safety.download',$safetys->id) }}">
                        <button type="button" class="btn btn-primary btn-lg my-1">
                            <i class="fa fa-paper-plane-o"></i> Download
                          </button>
                    </a>
                    <a href="{{ route('safety.modify',$safetys->id) }}">
                        <button type="button" class="btn btn-info btn-lg my-1">
                            <i class="fa fa-paper-plane-o"></i>Modify
                          </button>
                    </a>
                    <a href="{{ route('safety.destroy',$safetys->id) }}">
                        <button type="button" class="btn btn-danger btn-lg my-1">
                          <i class="fa fa-paper-plane-o"></i>Delete </button>
                    </a>
                  </div>
             
              </div>
              @else
            <div style="height:100%;width:35%; margin-right:auto;background:green;color:white; font-size:18px">
              <p style="text-align: center">You Have No Safety Ploicy</p>
            </div>
            </div>
              @endif
      
        <!-- Row end  -->
      </div>
  </div>

  </div>
  @endsection
