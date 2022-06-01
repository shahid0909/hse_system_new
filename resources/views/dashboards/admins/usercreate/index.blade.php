@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
            /*text-transform:uppercase;*/
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

        .warning-info-icon {
            font-weight: 900;
            display: inline-block;
            width: 10px;
            height: 10px;
            color: #e74c3c;
            position: absolute;
            top: 74%;
            right: 6%;
        }

        .success-info-icon {
            font-weight: 900;
            display: inline-block;
            width: 10px;
            height: 10px;
            color: #6ae73c;
            position: absolute;
            top: 74%;
            right: 6%;
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>User Registration</b></h5>
                <div class="card-body">

                    <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('usercreate.store') }}">
                        @csrf
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">{{ __('Name') }}<span style="color: #ff0000">*</span></label>
                                <input type="text"
                                       class="form-control inpcol @error('name') is-invalid @enderror"
                                       placeholder="John"
                                       id="name"
                                       name="name" value="{{ old('name') }}" required autocomplete="off" autofocus
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">{{ __('Email Address') }}<span style="color: #ff0000">*</span></label>
                                <input type="email"
                                       id="email"
                                       class="form-control inpcol @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="off"
                                       placeholder="name@example.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">User Role<span style="color: #ff0000">*</span></label>
                                <select class="form-control inpcol" name="role" id="role">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                @error('user_role')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">Company<span style="color: #ff0000">*</span></label>
                                <select class="form-control inpcol" name="company" id="company">
                                   <option value="">---Choose---</option>
                                    @foreach($company as $values)
                                    <option value="{{$values->id}}">{{$values->company_name}} </option>
                                    @endforeach
                                </select>
                                @error('user_role')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label" for="password">{{ __('Password') }}<span style="color: #ff0000">*</span></label>
                                <input type="password"
                                       id="password"
                                       class="form-control inpcol @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="off"
                                       placeholder="8+ characters required">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">{{ __('Confirm Password') }}<span style="color: #ff0000">*</span></label>
                                <input type="password"
                                       id="confirm_password"
                                       class="form-control inpcol"
                                       name="confirm_password" required autocomplete="off"
                                       placeholder="8+ characters required">
                                <i class="icofont-warning warning-info-icon" data-toggle="tooltip" data-placement="top" title="Tooltip on top" style="display: none"></i>
                                <i class="icofont-tick-mark success-info-icon" style="display: none"></i>
                            </div>
                        </div>
                        {{--                                <div class="col-12">--}}
                        {{--                                    <div class="form-check">--}}
                        {{--                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
                        {{--                                        <label class="form-check-label" for="flexCheckDefault">--}}
                        {{--                                            I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>--}}
                        {{--                                        </label>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit"
                                    class="btn btn-lg btn-block btn-light lift text-uppercase btn-primary">{{ __('Save') }}</button>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>




@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            {{--$('.datatable').DataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    ajax: {--}}
            {{--        url: "{{ route('l_cas.datatable') }}",--}}
            {{--        type: 'GET',--}}
            {{--        'headers': {--}}
            {{--            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
            {{--        }--}}
            {{--    },--}}
            {{--    "columns": [--}}
            {{--        {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},--}}
            {{--        {"data": "caseName"},--}}
            {{--        {"data": "status"},--}}
            {{--        {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--    ],--}}
            {{--    language: {--}}
            {{--        paginate: {--}}
            {{--            next: '<i class="bx bx-chevron-right">',--}}
            {{--            previous: '<i class="bx bx-chevron-left">'--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
            $("#confirm_password").on('keyup', function() {
                var password = $("#password").val();
                var confirmPassword = $("#confirm_password").val();
                if (password != confirmPassword){
                    $("#confirm_password").css("outline", "1px solid #db0808");
                    $(".warning-info-icon").css("display", "block");
                    // $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
                }
                else{
                    $(".success-info-icon").css("display", "block");
                    $(".warning-info-icon").css("display", "none");
                    $("#confirm_password").css("outline", "1px solid #64c533");
                    // $("#CheckPasswordMatch").html("Password match !").css("color", "green");
                }
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });


    </script>

@endsection
