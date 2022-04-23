@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"/>
    <style>
        .inpcol{

            outline: 1px solid #5b998d;
        }

        .span{
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

        @if ($message = Session::get('success'))
            <div class="alert alert-success message">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
              <div class="row align-items-center">
                <div class="border-0 mb-4">
                  <div
                    class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                  >
                    <h3 class="fw-bold mb-0 py-3 pb-2">Safety Ploicy Template</h3>
                  </div>
                </div>
              </div>
              <!-- Row end  -->

              <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                  <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                      <div
                        class="card p-xl-5 p-lg-4 p-0"
                        style="
                          box-shadow: 0px 0px 5px 0px #ccc;
                          background-image: url('assets/images/bg-2.png');
                          background-size: 100% 100%;
                        "
                      >
                        <div class="card-body">
                          <div class="mb-3 pb-3 border-bottom text-center">
                            <h3><b> SAFETY & HEALTH POLICY</b></h3>
                          </div>

                          <div class="row mb-4">
                            <div class="col-sm-12">

                                <form action="{{ route('safety.store') }}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                <ul class="bg bg-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                   @endforeach

                                </ul>

                                    <div class="form-group">
                                      <label >Title</label>
                                      <textarea name="title" id="" cols="65" rows="">{{ old('title') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label >Commitment</label>
                                        <textarea id="summernote" name="commitment" value="{{ old('commitment') }}"></textarea>
                                      </div>

                                    <div class="form-group">
                                        <label >Tagline</label>
                                        <select
                                            name="tagline"
                                            id="depertment"
                                            class="col-md-12"
                                            style=" padding: 10px; border-radius: 3px; border-color: var(--border-color);>



                                        <option value="SAFETY AND HEALTH IS EVERYONE'S BUSINESS">
                                            SAFETY AND HEALTH IS EVERYONE'S BUSINESS
                                        </option>
                                        <option value="Zero injuries does not indicate the presence
                                                of safety.">
                                            Zero injuries does not indicate the presence
                                            of safety.
                                        </option>

                                            <option value="Zero injuries does not indicate the presence
                                                of safety.">
                                                Zero injuries does not indicate the presence
                                                of safety.
                                            </option>
                                            <option value="Never take safety for granted.">
                                                Never take safety for granted.
                                            </option>
                                            <option value="Safety first, to last in life.">
                                                Safety first, to last in life.
                                            </option>
                                        </select>
                                      </div>


                                    <button type="submit" class="btn btn-primary">Create</button>
                                  </form>
                            </div>
                          </div>
                          <!-- Row end  -->
                          <div class="row">
                            <div class="col-lg-12">
                              <h6>Miss Vimala</h6>
                              <p class="text-muted">Chief Executive Officer</p>
                            </div>
                          </div>
                          <!-- Row end  -->
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- Row end  -->
                </div>
              </div>
              <!-- Row end  -->
            </div>
          </div>

        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();
                });</script>
            <script>

@endsection
