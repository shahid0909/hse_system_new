<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css') }}" />
</head>
<body>
    
 
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>MINUTES OF MEETING
                    INAUGURAL SAFETY COMMITTEE MEETING
                   </h4>

                  
                        <p >Date:{{ $values->date }}</p>
                        <p >Time:{{  $values->time }}</p>
                        <p >venue:{{ $values->venue}}</p>
               
                        <p>Introduction:</p>
                        <p>{!!$values->introduction!!}</p>
              
               
                        <p>ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </p>
                        <p >{!!$values->endorsement!!}</p>
        
                        @foreach (json_decode($values->agenda, true) as $agenda)
                        <p>Agenda:{{ $agenda }}</p>
                        @endforeach
                
                        
                            @foreach (json_decode($values->pic, true) as $pic)
                            <p>Pic:{{ $pic }}</p>
                        @endforeach 
                
                       
                            @foreach (json_decode($values->remarks, true) as $remarks)
                            <p>Remarks:{{ $remarks }}</p>
                        @endforeach 
                
             
                 
                            <p>Closing </p>
                            <p>{!!$values->closing!!}</p>
                    

                     
                                <h4>Reviewed and Approved by:</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                               <p>chairman</p>
                        
             

                           
                                <h4>Reviewed and Approved by:</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                               <p>chairman</p>
                        
                      
            
        </div>
    </div>

        </div>
    

                


    <script src="{{ public_path('bootstrap/js') }}"></script>
</body>
</html>