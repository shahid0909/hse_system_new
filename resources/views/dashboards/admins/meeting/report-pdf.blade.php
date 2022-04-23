<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4 style="text-align: center">Meeting Report PDF</h4>
      <div  style="margin-left:50px;text-align: center;width:500px;">
         <h4>MINUTES OF MEETING
            INAUGURAL SAFETY COMMITTEE MEETING
            NO. 1/2021</h4>
      </div>

    <div class="container">
        <div class="content">
            <p style="font-size:20px;margin-left:30px">Date:{{ $values->date }}</p>
            <p style="font-size:20px;margin-left:30px">Time:{{  $values->time }}</p>
            <p style="font-size:20px;margin-left:30px">venue:{{ $values->venue}}</p>
        </div>
    </div>

    <div>
       <p>Introduction:</p>
       <p>{!!$values->introduction!!}</p>
    </div>
    <div>
       <p>ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </p>
       <p>{!!$values->endorsement!!}</p>
    </div>
    <div>
        @foreach (json_decode($values->agenda, true) as $agenda)
        <p>Agenda:{{ $agenda }}</p>
        @endforeach

        
            @foreach (json_decode($values->pic, true) as $pic)
            <p>Pic:{{ $pic }}</p>
        @endforeach 

       
            @foreach (json_decode($values->remarks, true) as $remarks)
            <p>Remarks:{{ $remarks }}</p>
        @endforeach 

    <div>
        <p>Closing </p>
        <p>{!!$values->closing!!}</p>
     </div>
     <div style="width:1000px;display:inline-block;">
        <div style="inline-block;width:500px";>
            <h4>Reviewed and Approved by:</h4>
            <br>
            <br>
            ------------------------------------------
            <h4> (Mr. Renato De Oliveira- GM )</h4>
           <p>chairman</p>
    
        </div>
        <div class="footer_right" style="inline-block;width:500px";>
            <h4>Reviewed and Approved by:</h4>
            <br>
            <br>
            ------------------------------------------
            <h4> (Mr. Renato De Oliveira- GM )</h4>
           <p>chairman</p>
    
        </div>
    </div>
</body>
</html>