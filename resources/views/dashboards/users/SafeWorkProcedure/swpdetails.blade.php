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
                            <h3 class="fw-bold mb-0 py-3 pb-2">Safety work Procedure</h3>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                <div class="row justify-content-center">    
                    <div class="col-lg-12 col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="card p-xl-5 p-lg-4 p-0">






                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">before work</th>
                                            <th scope="col">during work</th>
                                            <th scope="col">after work</th>
                                            <th scope="col">potential_hazard</th>
                                            <th scope="col">Work Procedure</th>
                                            <th scope="col">potentialHazard</th>
                                            <th scope="col">during_work_image</th>
                                            <th scope="col">potentialHazard</th>
                                            <th scope="col">potentialHazard</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>{{ $values->work_title }}</td>
                                            <td>{!!$values->before_work_rules!!}</td>
                                            <td>  {!!$values->during_work_rules!!}</td>
                                            <td>  {!!$values->after_work_rules!!}</td>
                                            <td>{!!$values->potential_hazard!!}</td>
                                            <td>{!! $values->during_work_rules!!}</td>
                                            <td> <img src="/image/SafetyWorkProcedure/potentialHazard/{{$values->potential_hazard_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/duringWork/{{$values->during_work_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/afterWork/{{$values->after_work_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/beforeWork/{{$values->before_work_image }}" alt="activity_img" style="width:50px;"></td>
                                          </tr>
                                         
                                        </tbody>
                                      </table>


                </div> <!-- Row end  -->
            </div>
        </div>

        @endsection
