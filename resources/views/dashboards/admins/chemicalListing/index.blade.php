@extends('layouts.app')
@section('style')
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
                <h5 class="card-header bg-info-light"><b>Chemical Listing</b></h5>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                     action="{{route('chemical_listing.store')}}">

                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>Chemical Name<span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="chemical_id"
                                        name="chemical_id"
                                        required
                                >
                                    <option value="">---Choose Chemical---</option>
                                    @foreach($chemicals as $list)
                                        <option
                                            value="{{$list->id}}"
                                            {{--                                            {{old('physical_form_id',isset($data->physical_form_id)) == $list->id ? 'selected' : '' }}--}}
                                        >{{$list->chemical_Name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Physical Form<span class="span">*</span></strong></label>
                                <input type="text"
                                       value=""
                                       class="form-control inpcol"
                                       id="physicalform"
                                       name="physicalform"
                                       placeholder="Chemical_Name"
                                       autocomplete="off"
                                       required
                                       readonly
                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3">
                                <label><strong>Manufacture <span class="span">*</span></strong></label>
                                <input type="text"
                                       {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                                       class="form-control inpcol"
                                       id="manufacture"
                                       name="manufacture"
                                       placeholder="Manufacture"
                                       autocomplete="off"
                                       required
                                       readonly
                                >
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Supplier <span class="span">*</span></strong></label>
                                <input type="text"
                                       {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                                       class="form-control inpcol"
                                       id="supplier"
                                       name="supplier"
                                       placeholder="Supplier"
                                       autocomplete="off"
                                       required
                                       readonly
                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>PPE <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="ppe_id"
                                        name="ppe_id"
                                        required>
                                    <option value="">---Choqqqqqqqqqose---</option>
                                @foreach($ppe as $list)
                                    <option value="{{$list->id}}">{{$list->ppeName}}</option>

                                    @endforeach

                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Usage</strong></label>
                                <input type="text"
                                       {{--                                       value="{{old('product_indentifier', isset($data->product_indentifier) ? $data->product_indentifier:'') }}"--}}
                                       class="form-control inpcol"
                                       id="usage"
                                       name="usage"
                                       placeholder="Product Identifier"
                                       autocomplete="off"

                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Employee</strong></label>
                                <input type="text"
                                       {{--                                       value="{{old('product_indentifier', isset($data->product_indentifier) ? $data->product_indentifier:'') }}"--}}
                                       class="form-control inpcol"
                                       id="employee"
                                       name="employee"
                                       placeholder="Enter Employee"
                                       autocomplete="off"

                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>No. of Employees</strong></label>
                                <input type="number"
                                       {{--                                       value="{{old('product_indentifier', isset($data->product_indentifier) ? $data->product_indentifier:'') }}"--}}
                                       class="form-control inpcol"
                                       id="no_of_emplyees"
                                       name="no_of_emplyees"
                                       placeholder="No. of Employees exposed to the chemical."
                                       autocomplete="off"

                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Quantity used</strong></label>
                                <input type="number"
                                       {{--                                       value="{{old('product_indentifier', isset($data->product_indentifier) ? $data->product_indentifier:'') }}"--}}
                                       class="form-control inpcol"
                                       id="quantity"
                                       name="quantity"
                                       placeholder="Quantity used (per Month/Year)"
                                       autocomplete="off"

                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Language of SDS <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="lang"
                                        name="lang"
                                        required
                                >
                                    <option value="">---Choose---</option>
                                    <option value="Eng"> Eng</option>
                                    <option value="BM"> BM</option>
                                    <option value="Both"> Both</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>SDS (Y/N)<span class="span">*</span></strong></label>
                                <div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active_yn"
                                               required id="active_y" value="Y" checked
                                            {{--                                               @if(isset($data->active_yn) && $data->active_yn == "Y") checked @endif--}}
                                        />
                                        <label class="form-check-label"
                                               for="active_y">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active_yn"
                                               required id="active_n" value="N"
                                            {{--                                               @if(isset($data->active_yn) && $data->active_yn == "N") checked @endif--}}
                                        />
                                        <label class="form-check-label"
                                               for="active_n">In-Active</label>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>SDS Issue Date <span class="span">*</span></strong></label>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='date' id="sds_issue_date" name="sds_issue_date"
                                               class="form-control"/>
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>SDS Link <span class="span">*</span></strong></label>
                                <input type="text" class="form-control form-control-sm inpcol"
                                       id="sds_link"
                                       name="sds_link">
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Remark </strong></label>
                                <input type="text" class="form-control form-control-sm inpcol"
                                       id="remark"
                                       name="remark">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Signal Word</strong></label>
                                <input type="text" class="form-control form-control-sm inpcol"
                                       id="signal_word"
                                       name="signal_word">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-1">
                                <label><strong>Hazard Pictrogram</strong></label>
                                <div class="image-input">
{{--                                    <input type="file" accept="image/*" id="imageInput">--}}
                                    <label for="imageInput" class="image-button"><i class="far fa-image"></i> Choose
                                        image</label>
                                    <img src="" class="image-preview" id="image-preview">
{{--                                    <span class="change-image">Choose different image</span>--}}
                                </div>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                        <br>

                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                {{--                                @if(isset($data->id))--}}
                                {{--                                    <button type="submit" class="btn btn btn-primary shadow mr-1 me-1 mb-1 ">--}}
                                {{--                                        Update--}}
                                {{--                                    </button>--}}
                                {{--                                @else--}}
                                <button type="submit" class="btn btn btn-primary shadow mr-1 me-1 mb-1 ">
                                    Save
                                </button>
                                {{--                                @endif--}}
                                <button type="reset" class="btn btn btn-outline shadow mb-1 btn-danger">
                                    Clear
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <br>
            <br>
            <div class="card mb-5">
                <h5 class="card-header bg-info-light">Chemical Listing List</h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table class="table table-sm datatable mdl-data-table display">
                                <thead>
                                <tr>
{{--                                    <th></th>--}}
                                    <th>SL</th>
                                    <th>Chemical Name</th>
                                    <th>Manufacture </th>
                                    <th>Supplier </th>
                                    <th>PPE</th>
                                    <th>Usage</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

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

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    setTimeout(function () {
        $('.response').fadeOut('fast');
    }, 5000);


    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
            '</table>';
    }

    $(document).ready(function () {

        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('chemical_listing.datatable') }}",
                type: 'GET',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            "columns": [

                {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                {"data": "chemical.chemical_Name"},
                {"data": "chemical.manufacturer.name"},
                {"data": "chemical.supplier.SupplierName"},
                {"data": "ppe.ppeName"},
                {"data": "usage"},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                paginate: {
                    next: '<i class="bx bx-chevron-right">',
                    previous: '<i class="bx bx-chevron-left">'
                }
            }
        });
        $('.datatable tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );




        $('#imageInput').on('change', function () {
            $input = $(this);
            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function (data) {
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        $('.change-image').on('click', function () {
            $control = $(this);
            $('#imageInput').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'block');
        });

        $('#chemical_id').on('change', function () {
            let id = $('#chemical_id').val()
            // alert(id);
            $.ajax({
                type: "POST",
                url: "chemical-data" + '/' + id,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function (res) {
                    let parsed_data = JSON.parse(res);
                    $('#physicalform').val(parsed_data[0].physicalform);
                    $('#manufacture').val(parsed_data[0].manufacture);
                    $('#supplier').val(parsed_data[0].SupplierName);
                    $('#image-preview').attr('src', '/image/hazard/' + parsed_data[0].hazard_image);
                    $('.image-button').css('display', 'none');
                    $('.image-preview').css('display', 'block');
                    $('.change-image').css('display', 'block');
                }

            });
        });
        // $('#dtBasicExample').DataTable({
        //     // "scrollX": true
        // });


        // var dataArray = new Array();
        //
        // $(".add-row").on('click', function () {
        //     let cas_idd = $("#cas_idd option:selected").val();
        //     let cas = $("#cas_idd option:selected").text();
        //      let percent = $("#percent").val();
        //
        //
        //     if (cas_idd == '') {
        //         swal.fire('Select CAS.',
        //             '',
        //             'error')
        //     } else if(percent == ''){
        //         swal.fire('Select Percent.',
        //             '',
        //             'error')
        //     } else {
        //         let markup = "<tr role='row'>" +
        //             "<td aria-colindex='1' role='cell' class='text-center'>" +
        //             "<input type='checkbox' name='record' value='" + "" + "+" + "" + "'>" +
        //             "<input type='hidden' name='tab_cas_id[]' value=''>" +
        //             "<input type='hidden' name='tab_cas_idd[]' value='" + cas_idd + "'>" +
        //             "<input type='hidden' name='tab_percent[]' value='" + percent + "'>" +
        //             "</td><td aria-colindex='2' role='cell'>" + cas + "</td><td aria-colindex='2' role='cell'>" + percent + "</td></tr>";
        //         $("#cas_idd").val('');
        //         $("#percent").val('');
        //         $("#cas_idd").val('').trigger('change');
        //         $("#percent").val('').trigger('change');
        //         $("#table-operator tbody").append(markup);
        //     }
        //
        //
        // })
    });


</script>
