@extends('layouts.app')
@section('style')
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')

        <div class="body d-flex py-3">
            <div class="container-xxl">
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Create Inspection</h3>
                        </div>
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form id="basic-form" method="post" enctype="multipart/form-data"
                                          @if(isset($data->id))
                                          action="{{ route('create_ispection.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('create_ispection.store') }}" novalidate>
                                        @endif
                                        @csrf
{{--@dd($data)--}}
                                        <div class="row g-3 col-md-8 align-items-center" style="margin: 0 auto;">
                                            <div class="col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="item" class="form-label"
                                                    >Inspection Title</label
                                                    >
                                                    <input type="text" class="form-control"  id="inspection_title" name="inspection_title"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Location</label>
                                                    <!-- <input type="text" class="form-control" required> -->
                                                    <select  name="location"  id="location"
                                                        class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color);">

                                                        <option value="">choose</option>
                                                        @foreach($country as $list)
                                                            <option value="{{$list->id}}"{{isset($data->location) && $data->location == $list->id ? 'selected': ''}}>{{$list->country}}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">PIC</label>
                                                    <!-- <input type="text" class="form-control" required> -->
                                                    <select  name="pic" id="pic"class="col-md-12"
                                                        style="padding: 10px; border-radius: 3px; border-color: var(--border-color); ">
                                                        <option value="">---Choose---</option>
                                                        @foreach($emp as $list)
                                                            <option value="{{$list->id}}" {{isset($data->pic) && $data->pic == $list->id ? 'selected' : '' }}>{{$list->em_name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">UNSAFE ACT/UNSAFE
                                                        CONDITION/HAZARDS/ISSUES </label>
                                                    <textarea class="form-control"
                                                              name="unsafe"
                                                              rows="5"
                                                              cols="30"
                                                              value="{{isset($data->unsafe) ? $data->unsafe:''}}"
                                                              required>{{isset($data->unsafe) ? $data->unsafe:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="text">CORRECTIVE ACTIONS TO BE
                                                        TAKEN</label>
                                                    <textarea
                                                        class="form-control"
                                                        rows="5"
                                                        cols="30"
                                                        name="text"
                                                        value="{{isset($data->text) ? $data->text:''}}"
                                                        required> {{isset($data->text) ? $data->text:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Justification</label>
                                                    <textarea
                                                        class="form-control"
                                                        name="Justification"
                                                        rows="5"
                                                        cols="30"
                                                        value="{{isset($data->Justification) ? $data->Justification:''}}"
                                                        required>{{isset($data->Justification) ? $data->Justification:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="admitdate" class="form-label">DATE IDENTIFIED </label>
                                                <input
                                                    type="date"
                                                    class="form-control w-100"
                                                    id="admitdate"
                                                    name="admitdate"
                                                    value="{{isset($data->admitdate) ? $data->admitdate:''}}"
                                                    required
                                                />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="targetdate" class="form-label">TARGET DATE</label>
                                                <input
                                                    type="date"
                                                    class="form-control w-100"
                                                    id="targetdate"
                                                    name="targetdate"
                                                    value="{{isset($data->targetdate) ? $data->targetdate:''}}"

                                                    required
                                                />
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           style="margin-bottom: 20px;">PRIORITY</label>
                                                    <br/>
                                                    <label class="fancy-radio" for="urgent">
                                                        <input type="radio" name="priority" id="urgent"
                                                               value="0" @if((isset($data->priority) == 0) or  old('priority')== 0) {{"checked"}} @endif>

                                                        <span
                                                            style="padding: 10px 10px; border-radius: 10px;  color: #ee1010; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px;"><i></i>Urgent</span>
                                                    </label>

                                                    <label class="fancy-radio" for="1_or_2_days">


                                                        <input type="radio" name="priority" id="1_or_2_days"
                                                               value="1" @if((isset($data->priority) == 1) or  old('priority')== 1) {{"checked"}} @endif>

                                                        <span
                                                            style="padding: 10px 10px; border-radius: 10px;  color: #d2fd12; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px"><i></i>1 or 2 days</span>
                                                    </label>


                                                    <label class="fancy-radio" for="1_week_more">


                                                        <input type="radio" name="priority" id="1_week_more"
                                                               value="2" @if((isset($data->priority)== 2) or  old('priority')== 2) {{"checked"}} @endif>

                                                        <span
                                                            style="padding: 10px 10px; border-radius: 10px;  color: #9510ee; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px"><i></i>1 week/more </span>
                                                    </label>
                                                    <p id="error-radio"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="image" class="form-label">
                                                    Inspection Picture</label
                                                >
                                                <input
                                                    class="form-control"
                                                    type="file"
                                                    id="image"
                                                    name="image"
                                                    value="{{isset($data->image) ? $data->image:''}}"


                                                />
                                            </div>
                                            @if(isset($data->id))
                                                <button type="submit" class="btn btn-primary col-md-5"
                                                        style="width: 420px;">Update

                                                </button>

                                            @else

                                                <button type="submit" class="btn btn-primary col-md-5"
                                                        style="width: 420px;">
                                                    Submit
                                                </button>
                                            @endif


                                            <a href="{{route('list_inspection.index')}}"
                                               class="btn btn-danger col-md-5  "
                                               style="margin-left: 25px; width: 420px; color: white; "> Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection

        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="../js/template.js"></script>

            <script>
                // project data table
                $(document).ready(function () {

                    $('.deleterow').on('click', function () {
                        var tablename = $(this).closest('table').DataTable();
                        tablename
                            .row($(this)
                                .parents('tr'))
                            .remove()
                            .draw();

                    });
                });
            </script>
            <script>
                $(function () {
                    // initialize after multiselect
                    $("#basic-form").parsley();
                });
            </script>
@endsection
