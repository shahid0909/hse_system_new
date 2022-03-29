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
                  <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Rectified Workplace Inspection</h3>
                  </div>
                  <div class="card-body">
                    <div class="row align-item-center">
                      <div class="col-md-12">
                          <form id="basic-form" method="post" novalidate>
                              <div class="row g-3 col-md-8 align-items-center" style="margin: 0 auto;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="form-label">Find Inspection</label>
                                          <!-- <input type="text" class="form-control" required> -->
                                          <select name="depertment" id="depertment" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color);">
                                            <option value="">Select Inspection</option>
                                            <option value="">#001</option>
                                            <option value="">#002</option>
                                            <option value="">#003</option>
                                            <option value="">#004</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="admitdate" class="form-label">DATE RECTIFIED </label>
                                    <input
                                      type="date"
                                      class="form-control w-100"
                                      id="admitdate"
                                      required
                                    />
                                  </div>
                                <div class="col-md-12">
                                  <label for="formFileMultiple" class="form-label">
                                    TASK RECTIFIED WITH PICTURE</label
                                  >
                                  <input
                                    class="form-control"
                                    type="file"
                                    id="formFileMultiple"
                                    multiple
                                    required
                                  />
                                </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
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

  <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="../js/template.js"></script>
    <script>
      $(function () {
        // initialize after multiselect
        $("#basic-form").parsley();
      });
    </script>

@endsection
