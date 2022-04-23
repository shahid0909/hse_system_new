@extends('layouts.app')

@section('title')
Report Meeting 
@endsection

@section('style')
<style type="text/css">
 
   
</style>

@endsection

@section('content')

    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')
       
        <div class="container-xxl">
                    
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0 py-3 pb-2">Meeting Report</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row justify-content-center">
       
                <div class="col-lg-12 col-md-12">
                    <div class="card p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <h3 style="text-align:center;font-weight: bold;font-size: 17px;">MINUTES OF MEETING<br>
                                INAUGURAL SAFETY COMMITTEE MEETING<br>
                                NO. 1/2021
                            </h3>
                            <div class="info" style="height:100px">
                                
                                    <p><span>Date</span>		:<span>{{ $values->date }}</span></p>
                                    <p><span>Time</span>		:<span>{{ $values->time }}</span></p>
                                    <p><span> Venue	</span>	: 	<span>{{ $values->venue }}</span></p>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <h3>INTRODUCTION</h3>
                            <div class="info">
                                <ul>
                                    <li>{!!$values->introduction!!}</li>
                                </ul>
                                <h3>Endorsement	</h3>
                                <div class="info">
                                    <ul>
                                        <li>{!!$values->endorsement!!}</li>
                                    </ul>
                             
                                
                                    
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Agenda</th>
                                        <th >PIC</th>
                                        <th >Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                        <td>  @foreach (json_decode($values->agenda, true) as $agenda)
                                            {{ $agenda }}
                                        @endforeach</td>
                                        <td > @foreach (json_decode($values->pic, true) as $pic)
                                            {{ $pic }}
                                            @endforeach</td>
                                        <td > @foreach (json_decode($values->remarks, true) as $remarks)
                                            {{ $remarks }}
                                            @endforeach</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                </div>    
                
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title">

                        </div>
                        <div class="card-body">
                            <h5>Closing</h5>
                            <p>{!!$values->closing!!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="footer_right"style="inline-block";>
                        <h4>Reviewed and Approved by:</h4>
                        <br>
                        <br>
                        ------------------------------------------
                        <h4> (Mr. Renato De Oliveira- GM )</h4>
                       <p>chairman</p>
                
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer_right"style="inline-block";>
                        <h4>Reviewed and Approved by:</h4>
                        <br>
                        <br>
                        ------------------------------------------
                        <h4> (Mr. Renato De Oliveira- GM )</h4>
                       <p>chairman</p>
                
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('meeting.report-pdf',$values->id) }}"><button type="button" class="bg bg-info">Download</button></a>
                </div>
            </div>

            </div>

@endsection
