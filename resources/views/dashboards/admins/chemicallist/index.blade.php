@extends('layouts.app')
@section('style')
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

        <style>
            .inpcol {

                outline: 1px solid #5b998d;
            }

            .span {
                content: '*';
                color: red;
            }


        </style>
        <!-- Body: Body -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="card ">
                <h5 class="card-header bg-info-light"><b>Chemical Add</b></h5>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                          @if(isset($data->id))
                          action="{{ route('chemical.update', ['id' => $data->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('chemical.store')}}"">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>Chemical Name<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"
                                       class="form-control inpcol"
                                       id="Chemical Name"
                                       name="Chemical_Name"
                                       placeholder="Chemical_Name"
                                       autocomplete="off"
                                       required
                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3">
                                <label><strong>Product Code<span class="span">*</span></strong></label>
                                <input type="text"
                                       value="{{old('product_code', isset($data->product_code) ? $data->product_code:'') }}"
                                       class="form-control inpcol"
                                       id="product_code"
                                       name="product_code"
                                       placeholder="Product Code"
                                       autocomplete="off"
                                       required
                                >
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3">
                                <label><strong>Product Identifier</strong></label>
                                <input type="text"
                                       value="{{old('product_indentifier', isset($data->product_indentifier) ? $data->product_indentifier:'') }}"
                                       class="form-control inpcol"
                                       id="product_indentifier"
                                       name="product_indentifier"
                                       placeholder="Product Identifier"
                                       autocomplete="off"

                                >
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Cas<span class="span">*</span></strong></label>
                                <select class="form-control select2 inpcol"
                                        id="cas_id"
                                        name="cas_id[]" multiple
                                        required
                                >
                                    <option value="">---Choose---</option>
                                    <option value="">Select One</option>
                                    @foreach($case as $list)
                                        <option value="{{$list->id}}"
                                        @if(!empty($cas_id))
                                            @foreach($cas_id as $id)
                                                @if(isset($data->cas_id) && $list->id == $id) {{'selected="selected"'}} @endif
                                                @endforeach
                                            @endif >
                                            {{$list->caseName.'-'.$list->ingredient}}</option>
                                    @endforeach


                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Physical Form <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="physical_form_id"
                                        name="physical_form_id"
                                        required
                                >
                                    <option value="">---Choose---</option>
                                    @foreach($physicalForm as $list)
                                        <option
                                            value="{{$list->id}}" {{old('physical_form_id',isset($data->physical_form_id)) == $list->id ? 'selected' : '' }}>{{$list->physicalform}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Manufacture <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol js-states"
                                        id="manufacturer_id"
                                        name="manufacturer_id"
                                        required>
                                    <option value="">---Choose---</option>
                                    @foreach($manufacturer as $list)
                                        <option
                                            value="{{$list->id}}" {{old('manufacturer_id',isset($data->manufacturer_id)) == $list->id ? 'selected' : '' }}>{{$list->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>Supplier <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="supplier_id"
                                        name="supplier_id"
                                        required
                                >
                                    <option value="">---Choose---</option>
                                    @foreach($supplier as $list)
                                        <option
                                            value="{{$list->id}}" {{old('supplier_id',isset($data->supplier_id)) == $list->id ? 'selected' : '' }}>{{$list->SupplierName}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Health Hazard <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="hazard_id"
                                        name="hazard_id[]" multiple
                                        required
                                >
                                    <option value="">---Choose---</option>

                                    @foreach($healthHazards as $list)
                                        <option value="{{$list->id}}"
                                        @if(!empty($hazard_id))
                                            @foreach($hazard_id as $id)
                                                @if(isset($data->hazard_id) && $list->id == $id) {{'selected="selected"'}} @endif
                                                @endforeach
                                            @endif >
                                            {{$list->hazardName}}</option>
                                    @endforeach


                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label><strong>GHS label <span class="span">*</span></strong></label>
                                <select class="select2 form-control inpcol"
                                        id="ghs_label_id"
                                        name="ghs_label_id[]" multiple="multiple"
                                        required>
                                    <option value="">---Choose---</option>

                                    @foreach($ghsLabel as $list)
                                        <option value="{{$list->id}}"
                                        @if(!empty($ghs_label_id))
                                            @foreach($ghs_label_id as $id)
                                                @if(isset($data->ghs_label_id) && $list->id == $id) {{'selected="selected"'}} @endif
                                                @endforeach
                                            @endif >
                                            {{$list->ghsName}}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Chemical Image</strong></label>
                                <input type="file" class="form-control form-control-sm inpcol"
                                       id="che_image"
                                       name="che_image">

                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Status<span class="span">*</span></strong></label>
                                <div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active_yn"
                                               required id="active_y" value="Y" checked
                                               @if(isset($data->active_yn) && $data->active_yn == "Y") checked @endif
                                        />
                                        <label class="form-check-label"
                                               for="active_y">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active_yn"
                                               required id="active_n" value="N"
                                               @if(isset($data->active_yn) && $data->active_yn == "N") checked @endif
                                        />
                                        <label class="form-check-label"
                                               for="active_n">In-Active</label>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-md-3 mt-2">
                                <label><strong>Chemical SDS EN </strong></label>
                                <input type="file" class="form-control inpcol"
                                       id="che_sds_image"
                                       name="che_sds_image">

                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label><strong>Chemical SDS MY</strong></label>
                                <input type="file" class="form-control inpcol"
                                       id="che_sds_bn_image"
                                       name="che_sds_bn_image">

                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Remarks</strong></label>
                                <textarea class="form-control inpcol"
                                          name="remarks"
                                          id="remarks"
                                          placeholder="Remarks">{{isset($data->remarks)}}</textarea>
                            </div>

                        </div>
                        <br>
{{--                        <h5 class="card-header bg-info-light"><b>CAS Entry</b></h5>--}}
{{--                        <fieldset class="border p-1 mt-2 mb-1 mt-4 col-sm-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <label><strong>Cas<span class="span">*</span></strong></label>--}}
{{--                                    <select class="form-control select2 inpcol"--}}
{{--                                            id="cas_idd"--}}
{{--                                            name="cas_idd">--}}
{{--                                        <option value="">---Choose---</option>--}}
{{--                                        <option value="">Select One</option>--}}
{{--                                        @foreach($case as $list)--}}
{{--                                            <option value="{{$list->id}}">--}}
{{--                                                {{$list->caseName}}</option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}
{{--                                    <span class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <label><strong>Percent<span class="span">*</span></strong></label>--}}
{{--                                    <input type="number" name="percent" id="percent"--}}
{{--                                           class="inpcol form-control"--}}
{{--                                           placeholder="Enter Percent">--}}
{{--                                </div>--}}


{{--                                <div class="col-sm-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="seat_to1">&nbsp;</label><br/>--}}
{{--                                        <button type="button" id="append"--}}
{{--                                                class="btn btn-primary mb-1 add-row">--}}
{{--                                            ADD--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-12 mt-1">--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table table-sm table-striped table-bordered"--}}
{{--                                           id="table-operator">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th role="columnheader" scope="col"--}}
{{--                                                aria-colindex="1" class="text-center" width="2%">Action--}}
{{--                                            </th>--}}
{{--                                            <th role="columnheader" scope="col"--}}
{{--                                                aria-colindex="2" class="text-center" width="50%">Cas Name--}}

{{--                                            </th>--}}
{{--                                            <th role="columnheader" scope="col"--}}
{{--                                                aria-colindex="2" class="text-center" width="10%">Percent--}}
{{--                                            </th>--}}

{{--                                        </tr>--}}
{{--                                        </thead>--}}


{{--                                        <tbody role="rowgroup" id="comp_body">--}}

{{--                                        </tbody>--}}
{{--                                    </table>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 d-flex justify-content-start">--}}

{{--                                <button type="button"--}}
{{--                                        class="btn btn-primary mb-1 delete-row">--}}
{{--                                    Delete--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </fieldset>--}}
                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                @if(isset($data->id))
                                    <button type="submit" class="btn btn btn-primary shadow mr-1 me-1 mb-1 ">
                                        Update
                                    </button>
                                @else
                                    <button type="submit" class="btn btn btn-primary shadow mr-1 me-1 mb-1 ">
                                        Save
                                    </button>
                                @endif
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
                <h5 class="card-header bg-info-light"><b>Chemical List</b></h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="table-responsive">
                            <table id="dtBasicExample" class="table table-sm datatable mdl-data-table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Chemical name</th>
                                    <th>Product Code</th>
                                    <th>Product Identifire</th>
                                    <th>image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chemical as $key=>$list)
                                    <tr>
                                        <td>{{++$key}}.</td>
                                        <td style="padding-right: .5px;padding-left: 15px">{{$list->chemical_Name}}</td>
                                        <td style="padding-right: .5px;padding-left: 15px">{{$list->product_code}}</td>
                                        <td style="padding-right: .5px;padding-left: 15px">{{$list->product_indentifier}}</td>
                                        <td style="padding-right: .5px;padding-left: 15px"><img
                                                src="/image/chemical/chemicalimage/{{ $list->che_image }}"
                                                width="100px"></td>
                                        <td style="padding-right: .5px;padding-left: .5px;text-align: center;">

                                            <a href="{{route('chemical.edit', $list->id) }}" class="btn btn-primary"><i
                                                    class="icofont-edit"></i>
                                            </a>||<a href="{{route('chemical.destroy', $list->id) }}"
                                                     class="btn btn-danger"
                                                     onclick="return confirm('Are You Sure You Want To Delete This Chemical?')"><i
                                                    class="icofont-delete-alt"></i>
                                            </a>
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

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            // "scrollX": true
        });


        var dataArray = new Array();

        $(".add-row").on('click', function () {
            let cas_idd = $("#cas_idd option:selected").val();
            let cas = $("#cas_idd option:selected").text();
             let percent = $("#percent").val();


            if (cas_idd == '') {
                swal.fire('Select CAS.',
                    '',
                    'error')
            } else if(percent == ''){
                swal.fire('Select Percent.',
                    '',
                    'error')
            } else {
                let markup = "<tr role='row'>" +
                    "<td aria-colindex='1' role='cell' class='text-center'>" +
                    "<input type='checkbox' name='record' value='" + "" + "+" + "" + "'>" +
                    "<input type='hidden' name='tab_cas_id[]' value=''>" +
                    "<input type='hidden' name='tab_cas_idd[]' value='" + cas_idd + "'>" +
                    "<input type='hidden' name='tab_percent[]' value='" + percent + "'>" +
                    "</td><td aria-colindex='2' role='cell'>" + cas + "</td><td aria-colindex='2' role='cell'>" + percent + "</td></tr>";
                $("#cas_idd").val('');
                $("#percent").val('');
                $("#cas_idd").val('').trigger('change');
                $("#percent").val('').trigger('change');
                $("#table-operator tbody").append(markup);
            }


        })
    });


</script>
