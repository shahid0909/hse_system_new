<form method="POST" enctype="multipart/form-data"
      action="">

    @csrf
    <div class="row">

        <div class="col-md-3">
            <label><strong>Location Name<span class="span">*</span></strong></label>
            <input type="text"
                   value=""
                   class="form-control inpcol"
                   id="Location"
                   name="location"
                   placeholder="Plese Enter Location Name"
                   autocomplete="off"
                   required

            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Process Operation<span class="span">*</span></strong></label>
            <select
                class="select2 form-control inpcol "
                id="process_operation"
                name="process_operation"
                autocomplete="off"
                required >
                <option value="engineering">Engineering</option>
            </select>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-3">
            <label><strong>No. of Hazardous Chemical<span class="span">*</span></strong></label>
            <input type="text"
                   class=" form-control inpcol "
                   id="no_of_hazardous_chemical "
                   name="no_of_hazardous_chemical"
                   autocomplete="off"
                   placeholder="No of Hazardous Chemical"
                   required >

            <span class="text-danger"></span>
        </div>

        <div class="col-md-3">
            <label><strong>No. of Workers<span class="span">*</span></strong></label>
            <input type="text"
                   class=" form-control inpcol "
                   id="no_of_workers "
                   name="no_of_workers"
                   autocomplete="off"
                   placeholder="No. of Workers"
                   required >
            <span class="text-danger"></span>
        </div>

        <div class="col-md-3">
            <label><strong>Workers<span class="span">*</span></strong></label>
            <input
                class=" form-control inpcol "
                id="no_of_workers "
                name="no_of_workers"
                autocomplete="off"
                placeholder="No. of Workers"
                required >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Worker Gender</strong></label>
            <select
                class=" form-control inpcol "
                id="worker_gender "
                name="worker_gender">
                <option value="">---Choose---</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="custom">Custom</option>

            </select>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-3">
            <label><strong>Product Name<span class="span">*</span></strong></label>
            <input
                class=" form-control inpcol "
                id="product_name "
                name="product_name"
                autocomplete="off"
                placeholder="Enter Product Name"
                required >
            <span class="text-danger"></span>
        </div>

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
            <label><strong>Cas No. <span class="span">*</span></strong></label>
            <input type="text"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="cas_no"
                   name="cas_no"
                   placeholder="cas_no"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Ingredient <span class="span">*</span></strong></label>
            <input type="text"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="ingredient"
                   name="ingredient"
                   placeholder="Ingredient"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Supplier </strong></label>
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
        <div class="col-md-3">
            <label><strong>Supplier Contact no </strong></label>
            <input type="text"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="supplier_contact_no"
                   name="supplier_contact_no"
                   placeholder="supplier Contact No"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Supplier Email </strong></label>
            <input type="text"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="supplier_email"
                   name="supplier_email"
                   placeholder="supplier Email"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Supplier Address </strong></label>
            <input type="text"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="supplier_address"
                   name="supplier_address"
                   placeholder="supplier Address"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>No. of Workers Exposed </strong></label>
            <input type="number"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="no_of_workers_exposed"
                   name="no_of_workers_exposed"
                   placeholder="No. of Workers Exposed"
                   autocomplete="off"
                   required
                   readonly
            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>PPE <span class="span">*</span></strong></label>
            <select class="select2 form-control inpcol"
                    id="ppe_id"
                    name="ppe_id"
                    required>
                <option value="">---Choose---</option>
                @foreach($ppe as $list)
                    <option value="{{$list->id}}">{{$list->ppeName}}</option>

                @endforeach

            </select>
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Use Camical Type<span class="span">*</span></strong></label>
            <input type="number"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="used_camical_type"
                   name="used_camical_type"
                   placeholder="Enter Chemical Type"
                   autocomplete="off"
                   required

            >
            <span class="text-danger"></span>
        </div>
        <div class="col-md-3">
            <label><strong>Quantity (PER MONTH)<span class="span">*</span> </strong></label>
            <input type="number"
                   {{--                                       value="{{old('Chemical_Name', isset($data->Chemical_Name) ? $data->Chemical_Name:'') }}"--}}
                   class="form-control inpcol"
                   id="quentity_per_month"
                   name="quentity_per_month"
                   placeholder="Enter Quantity"
                   autocomplete="off"
                   required

            >
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
            <label><strong>MSDS (Y/N)<span class="span">*</span></strong></label>
            <div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msds_yn"
                           required id="msds_y" value="Y" checked
                        {{--                                               @if(isset($data->active_yn) && $data->active_yn == "Y") checked @endif--}}
                    />
                    <label class="form-check-label"
                           for="msds_y">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="msds_yn"
                           required id="msds_n" value="N"
                        {{--                                               @if(isset($data->active_yn) && $data->active_yn == "N") checked @endif--}}
                    />
                    <label class="form-check-label"
                           for="msds_n">In-Active</label>
                </div>
                <span class="text-danger"></span>
            </div>
        </div>
 <div class="col-md-3 mt-2">
            <label><strong>Label (Y/N)<span class="span">*</span></strong></label>
            <div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="label_yn"
                           required id="label_y" value="Y" checked
                        {{--                                               @if(isset($data->active_yn) && $data->active_yn == "Y") checked @endif--}}
                    />
                    <label class="form-check-label"
                           for="label_y">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="label_yn"
                           required id="label_n" value="N"
                        {{--                                               @if(isset($data->active_yn) && $data->active_yn == "N") checked @endif--}}
                    />
                    <label class="form-check-label"
                           for="label_n">In-Active</label>
                </div>
                <span class="text-danger"></span>
            </div>
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
