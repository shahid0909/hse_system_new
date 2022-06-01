@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
            text-transform: uppercase;
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
    @include('dashboards.admins.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.admins.partial.header')
        @if ($message = Session::get('success'))
            <div class="alert alert-success response">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>PPE Entry</b></h5>
                <div class="card-body">

                    <form name="casForm" id="casForm" method="post" enctype="multipart/form-data"
                          @if(isset($datas->id))
                          action="{{ route('l_ppe.update', ['id' => $datas->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('l_ppe.store')}}">
                        @endif
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>PPE Name<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('ppeName', isset($datas->ppeName) ? $datas->ppeName:'') }}"
                                       class="form-control inpcol"
                                       id="ppeName" required
                                       name="ppeName"
                                       placeholder="Enter PPE Name"
                                >
                                <span class="text-danger" id="name-error"></span>
                            </div>

                            {{--@dd($datas->image);--}}

                            <div class="col-md-6">
                                <label><strong>PPE Image<span class="span">*</span></strong></label>
                                <input type="file"
                                       value=""
                                       class="form-control inpcol"
                                       id="image"
                                       name="image"
                                       placeholder="Enter GHS Label Name Image"
                                       accept="image/png, image/jpeg,image/jpg">
                                @if(isset($datas->id))
                                    <img src="/image/ppe/{{ $datas->image }}" width="20px">@endif
                                <span class="text-danger" id="name-error">Only image formate jpg,jpeg,png</span>
                            </div>


                        </div>
                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                @if(isset($datas->id))
                                    <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                        Update
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                        Save
                                    </button>
                                @endif

                                <button type="reset" class="btn btn-outline shadow mb-1 btn-danger cursor-auto">
                                    Clear
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="card mb-5">
                <h5 class="card-header bg-info-light"><b>PPE Label List</b></h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table id="dtBasicExample" class="table table-sm datatable mdl-data-table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>PPE Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$list)
                                    <tr>
                                        <td>{{++$key}}.</td>
                                        <td style="padding-right: .5px;padding-left: 15px">{{$list->ppeName}}</td>
                                        <td style="padding-right: .5px;padding-left: 15px"><img
                                                src="/image/ppe/{{ $list->image }}" width="100px"></td>
                                        <td style="padding-right: .5px;padding-left: .5px;text-align: center;">

                                            <a href="{{route('l_ppe.edit', $list->id) }}" class="btn btn-primary"><i
                                                    class="icofont-edit"></i>
                                            </a>||<a href="{{route('l_ppe.destroy', $list->id) }}"
                                                     class="btn btn-danger"
                                                     onclick="return confirm('Are You Sure You Want To Delete This PPE?')"><i
                                                    class="icofont-delete-alt"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script type="text/javascript">

        setTimeout(function () {
            $('.response').fadeOut('fast');
        }, 5000);

        $(document).ready(function () {
            $('#dtBasicExample').DataTable();

        });


    </script>

@endsection
