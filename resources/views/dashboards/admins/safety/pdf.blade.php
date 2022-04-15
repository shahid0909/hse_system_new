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
       font-size: 25px;
          list-style: none;

      }
    </style>
</head>
<body>

    <div class="wrap">
             <ul class="text-size" style="width: 100%;word-spacing:5px">
           <li style="text-align: center;font-size: 40px;">Safety Policy Rules</li>
             <li>{{ $data->title }}</li>
             <li>{!!$data->commitment!!}</li>
             <li>{{ $data->tagline}}</li>
                 <li>
                     A safety culture to achieve an accident-free
                     work environment.
                 </li>
                 <p style="text-align: center">Tag Line Here</p>

         </ul>
         <h4>Miss Vimala</h4>
         <p>Chief Executive Officer</p>
     </div>
</body>
</html>



