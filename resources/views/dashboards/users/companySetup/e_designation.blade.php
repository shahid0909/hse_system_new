@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
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
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')

        <div class="body d-flex py-3">
            <div class="container-xxl">
              <div class="row align-items-center">
                <div class="border-0 mb-4">
                  <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                  >
                    <h3 class="fw-bold py-3 mb-0">Designation</h3>
                  </div>
                </div>
              </div>
              <!-- Row end  -->
              <div class="row clearfix g-3">
                <div class="col-lg-4">
                  <div class="card">
                    <div
                      class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                    >
                      <h6 class="mb-0 fw-bold">Designation Edit</h6>
                    </div>
                    <div class="card-body">
                      <form action='{{route('designation.update',['id'=>$designation->id])}}' method="put" enctype="multipart/form-data">
                      @csrf
                        <div class="row g-3 mb-3">
                          <div class="col-sm-12">
                            <label for="depone" class="form-label"
                              >Designation Name</label
                            >
                            <input type="text" class="form-control" id="depone"   name="ds_name"/>
                          </div>

                          <div class="col-sm-12">
                            <label for="depone" class="form-label">Rank</label>
                            <input type="text" class="form-control" id="depone"  name="ds_rank" />
                          </div>

                          <div class="col-sm-12">
                            <label for="depone" class="form-label">Status</label>
                            <select name="ds_status" id="" class="form-control">
                                <option value="#">Select</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                            </select>
                          </div>

                        </div>
                        <button type="submit" class="btn btn-primary">
                          Add Designation
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- Row End -->
            </div>
          </div>


        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script>
                // project data table
                $(document).ready(function () {
                    $("#myProjectTable")
                        .addClass("nowrap")
                        .dataTable({
                            responsive: true,
                            columnDefs: [{targets: [-1, -3], className: "dt-body-right"}],
                        });
                    $(".deleterow").on("click", function () {
                        var tablename = $(this).closest("table").DataTable();
                        tablename.row($(this).parents("tr")).remove().draw();
                    });
                });
            </script>

@endsection
