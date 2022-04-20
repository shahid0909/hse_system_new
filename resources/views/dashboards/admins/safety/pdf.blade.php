<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
      .wrap{
       margin: 0%;
       padding:0%;
      }
      .wrap ul li{
       font-size: 15px;
          list-style: none;

      }
    </style>
</head>
<body>

    <div class="wrap">
             <ul class="text-size" style="width: 100%;word-spacing:5px">
           <li style="text-align: center;font-size: 30px;">Safety Policy Rules</li>
             <li>{{ $data->title }}</li>
             <div>
              <h6>
                <strong>GCH RETAIL (M) SDN BHD</strong> is
                committed to continual improvement in health,
                safety and welfare of all its employees,
                customers, contractors and visitors and those
                under its influence in the neighborhood and
                community at large.
              </h6>
             <li>{!!$data->commitment!!}</li>
             <li>{{ $data->tagline}}</li>
         </ul>
         <p>{{ $data->company->company_name }}</p>
         <h4>{{ $data->employee->em_name }}</h4>
         <p>{{ $data->designation->ds_name }}</p>
         <p>{{ $data->created_at->format('y:m:d') }}</p>
     </div>
</body>
</html>



