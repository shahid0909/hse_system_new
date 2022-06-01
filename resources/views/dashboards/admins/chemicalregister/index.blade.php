@extends('layouts.app')
@section('style')

    <link rel='stylesheet' href='https://code.jquery.com/jquery-3.5.1.js'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'>
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
        }

        .span {
            content: '*';
            color: red;
        }

        .form-control, .form-select {
            font-size: 11px;
            line-height: 15px;
        }

        .image-input {
            text-aling: center;
        }

        .image-input input {
            display: none;
        }

        .image-input label {
            display: block;
            color: #FFF;
            background: #000;
            padding: 0.3rem 0.6rem;
            font-size: 115%;
            cursor: pointer;
            border-radius: 5px;
            height: 2rem;
        }

        .image-input label i {
            font-size: 125%;
            margin-right: 0.3rem;
        }

        .image-input label:hover i {
            animation: shake 0.35s;
        }

        .image-input img {
            max-width: 224px;
            display: none;
            border-radius: 10px;
        }

        .image-input span {
            display: none;
            text-align: center;
            cursor: pointer;
        }

        @keyframes shake {
            0% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(10deg);
            }
            50% {
                transform: rotate(0deg);
            }
            75% {
                transform: rotate(-10deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

    </style>
    <!-- Body: Body -->
@endsection
@section('content')
    <!-- sidebar -->
    @include('dashboards.admins.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
    @include('dashboards.admins.partial.header')

    <!-- Body: Body -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>Chemical Register</b></h5>

                <div class="card-body">
                   @include('dashboards.admins.chemicalregister.form')
                </div>
            </div>

            <br>
            <br>
           @include('dashboards.admins.chemicalregister.list')

        </div>
    </div>



@endsection

@section('script')

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    setTimeout(function () {
        $('.response').fadeOut('fast');
    }, 5000);



    $(document).ready(function () {

        $('#chemical_id').on('change', function () {
            let id = $('#chemical_id').val();
            // alert(id);
            $.ajax({
                type: "POST",
                url: "chemical-register-data" + '/' + id,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function (res) {
                    let parsed_data = JSON.parse(res);
                    $('#physicalform').val(parsed_data[0].physicalform);
                    $('#cas_no').val(parsed_data[0].caseName);
                    $('#ingredient').val(parsed_data[0].ingredient);
                    $('#supplier').val(parsed_data[0].SupplierName);
                    $('#supplier_contact_no').val(parsed_data[0].contactNo);
                    $('#supplier_email').val(parsed_data[0].Email);
                    $('#supplier_address').val(parsed_data[0].Email);
                    $('#image-preview').attr('src', '/image/hazard/' + parsed_data[0].hazard_image);
                    $('.image-button').css('display', 'none');
                    $('.image-preview').css('display', 'block');
                    $('.change-image').css('display', 'block');
                }

            });
        });

    });


</script>
