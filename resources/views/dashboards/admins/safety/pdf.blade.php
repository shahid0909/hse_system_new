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
       background-color: azure;
        list-style: none;
       border: 2px dotted gray;
      }
    </style>
</head>
<body>
     
    <div class="wrap">
             <ul class="text-size" style="width: 100%;word-spacing:5px">
           <li style="text-align: center;font-size: 40px;">Safety Policy Rules</li>
             <li>{{ $data->s_head }}</li>
             <li>{{ $data->rules_a}}</li>
             <li>{{ $data->rules_b}}</li>
             <li>{{ $data->rules_c}}</li>
             <li>{{ $data->rules_d}}</li>
             <li>{{ $data->rules_e}}</li>
             <li>{{ $data->rules_f}}</li>
         </ul>
         <h4>Miss Vimala</h4>
         <p>Chief Executive Officer</p>
     </div>
</body>
</html>



