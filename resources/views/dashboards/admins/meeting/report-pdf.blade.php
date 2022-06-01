<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css') }}" />
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
      #customers tr:hover {background-color: #ddd;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10" style="margin: 0 auto;">
                <h4 style="text-align: center">MINUTES OF MEETING
                    INAUGURAL SAFETY COMMITTEE MEETING
                </h4>
                <p style="text-align: center;margin:0px">Date:{{ $data1->meeting_date }}</p>
                <p style="text-align: center;margin:0px">Time:{{ $data1->time }}</p>
                <p style="text-align: center;margin:0px">venue:{{ $data1->venue }}</p>
                <p style="margin: 0px 10px">Introduction:</p>
                <p style="margin: 0px 20px">{!! $data1->introduction !!}</p>
                <p style="margin: 0px 10px">ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </p>
                <p style="margin: 0px 20px">{!! $data1->endorsement !!}</p>
            
                <table id="customers">
                    <tr>
                      <th>Agenda</th>
                      <th>PIC</th>
                      <th>Remarks</th>
                    </tr>
                    <tr>
                      <td>                
                          @foreach ($data2 as $data)
                            <p style="margin: 20px 0px"> {{ $data->agenda }}</p><br />
                        @endforeach
                    </td>
                      <td>               
                        @foreach ($data2 as $data)
                            <p style="margin: 20px 0px">{{ $data->pic }}</p><br />
                        @endforeach</td>
                      <td>
                        @foreach ($data2 as $data)
                            <p>{{ $data->remarks }}</p>
                        @endforeach
                      </td>
                    </tr>
                  </table>
                <p>Closing </p>
                <p style="margin: 0px 10px">{!! $data1->closing !!}</p>
                    <table>
                        <tr>
                            <td style="float:right">                        
                                <h4>Prepared by</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                                <p style="margin: 0px 10px">chairman</p></td>
                            <td style="float:right">
                                <h4>Reviewed and Approved by:</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                                <p style="margin: 0px 10px">chairman</p></td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
    <script src="{{ public_path('bootstrap/js') }}"></script>
</body>

</html>
