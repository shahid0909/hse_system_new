@extends('layouts.app')
@section('style')

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

        <div class="main px-lg-4 px-md-4">
            <div class="container-xxl">
                    
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0 py-3 pb-2">Safety work Policy</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row justify-content-center">    
                    <div class="col-lg-12 col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="card p-xl-5 p-lg-4 p-0">
                                    <div class="card-header">
                                        <h1 style="background: rebeccapurple; color: white; border-radius: 5px;padding: 10px;text-align: center;">{{ $values->work_title }}</h1>
                                    </div>

                                    <h1>before work</h1>
                                    <div class="card-body">
                                        <div class="work">
                                            <div class="row" style="background-color: grey;">
                                                <div class="content col-md-8" style="min-height: 150px;background-color: grey;float:left;">   <p>{!!$values->before_work_rules!!}
                                                    
                                                    </p>

                                                </div>
                                                <div class="image col-md-3">
                                                    <img src="/image/SafetyWorkProcedure/beforeWork/{{$values->before_work_image }}" alt="activity_img" style="width: 100%;transform: translate(67px, 20px);float:right;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1>during work</h1>
                                    <div class="card-body">
                                        <div class="work">
                                            <div class="row" style="background-color: grey;">
                                                <div class="content col-md-6" style="min-height: 150px;margin-left: -52px;background-color: grey;">
                                                    <p>
                                                        {!!$values->during_work_rules!!}
                                                        </p>


                                                </div>
                                                <div class="image col-md-3">
                                                    <img src="/image/SafetyWorkProcedure/duringWork/{{$values-> during_work_image}}" alt="activity_img" style="width: 100%;transform: translate(186px, 20px);margin-left: 81px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1>after work</h1>
                                    <div class="card-body">
                                        <div class="work">
                                            <div class="row" style="background-color: grey;">
                                                <div class="content col-md-5" style="min-height: 150px;background-color: grey;"><p>{!!$values->after_work_rules!!}</p>

                                                    

                                                </div>
                                                <div class="image col-md-3">
                                                    <img src="/image/SafetyWorkProcedure/afterWork/{{$values->after_work_image }}" alt="activity_img" style="width: 100%;transform: translate(50px, 50px);margin-left: -460px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1>potential_hazard</h1>
                                    <div class="card-body">
                                        <div class="work">
                                            <div class="row" style="background-color: grey;">
                                                <div class="content col-md-5" style="min-height: 150px;background-color: grey;"><p>{!!$values->potential_hazard!!}</p>

                                                    

                                                </div>
                                                <div class="image col-md-3">
                                                    <img src="/image/SafetyWorkProcedure/potentialHazard/{{$values->potential_hazard_image }}" alt="activity_img" style="width: 100%;transform: translate(50px, 50px);margin-left: -460px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <br>
                                    <br>
                                    <div class="card-header">
                                        <h1 style="background: rgb(165, 96, 144); color: white; border-radius: 5px;padding: 10px;text-align: center;">SAFE WORK PROCEDURE FOR COLD SPOTTING BOARD USAGE</h1>
                                    </div>
                                    <h1>Work Procedure</h1>
                                    <div class="card-body">
                                        <div class="work">
                                            <div class="row" style="background-color: grey;">
                                                <div class="content col-md-6" style="min-height: 150px;margin-left: -52px;background-color: grey;">
                                                    <p>Turn on power supply 
                                                        Switch on machine by pressing power button
                                                        Mount shirt on to the board
                                                        Put bleaching powder on stain/spotted area & start brushing until stain is gone
                                                        Hold spray gun in a proper position before spraying
                                                        Spray water onto stain area for a little rinse 
                                                        Followed by dry air spray gun to dry off the wet area
                                                        Ensure spray guns are put back at proper positions after use
                                                        Turn off machine by pressing power button after use.
                                                        Turn off power supply of machine before leaving
                                                        </p>

                                                </div>
                                                <div class="image col-md-3">
                                                    <img src="assets/images/product/product-1.jpg" alt="activity_img" style="width: 100%;transform: translate(186px, 20px);margin-left: 81px;">
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

        @endsection
