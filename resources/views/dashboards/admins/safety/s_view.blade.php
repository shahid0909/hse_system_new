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
                   @if (isset($data->id))
                   <form action="{{ route('safety.modifystore', ['id' => $data->id]) }}"   enctype="multipart/form-data" method="POST">

                    @csrf
                    <input name="_method" type="hidden" value="PUT">

                    <div class="form-group">
                      <label >Safety Details</label>
                      <textarea name="s_head" id="" cols="65" rows="">{{  $data->s_head }}</textarea>
                    </div>
                    <div class="form-group">
                        <label >Modify Rules A</label>
                        <textarea name="rules_a" id="" cols="65" rows="">{{  $data->rules_a }}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Modify Rules B</label>
                        <textarea name="rules_b" id="" cols="65" rows="">{{  $data->rules_b }}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Modify Rules C</label>
                        <textarea name="rules_c" id="" cols="65" rows="">{{  $data->rules_c }}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Modify Rules D</label>
                        <textarea name="rules_d" id="" cols="65" rows="">{{  $data->rules_d }}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Modify Rules E</label>
                        <textarea name="rules_e" id="" cols="65" rows="">{{  $data->rules_e }}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Modify Rules F</label>
                        <textarea name="rules_f" id="" cols="65" rows="">{{  $data->rules_f }}</textarea>
                      </div>

                    <button type="submit" class="btn btn-primary">Click For Modify</button>
                  </form>
                       @else
                       @foreach ($safetys as  $safety)
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

                              <div>
                                <h6>
                                 {{ $safety->s_head}}

                                </h6>
                              </div>
                              <div class="mid">
                                <p>
                                    {{ $safety->rules_a}}
                                </p>
                                <ul>
                                  <li>
                                    {{ $safety->rules_b}}
                                  </li>
                                  <li>
                                    {{ $safety->rules_c}}
                                  </li>
                                  <li>
                                    {{ $safety->rules_d}}
                                  </li>
                                  <li>
                                    {{ $safety->rules_e}}
                                  </li>
                                  <li>
                                    {{ $safety->rules_f}}
                                  </li>
                                  <li>
                                    A safety culture to achieve an accident-free
                                    work environment.
                                  </li>
                                </ul>

                                <p style="text-align: center">Tag Line Here</p>
                              </div>
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
                      <div class="col-lg-12 text-end">
                        <button
                          type="button"
                          class="btn btn-outline-secondary btn-lg my-1"
                        >
                          <i class="fa fa-print"></i> upload
                        </button>
                        <a href="{{ route('safety.download',$safety->id) }}">
                            <button type="button" class="btn btn-primary btn-lg my-1">
                                <i class="fa fa-paper-plane-o"></i> Download
                              </button>
                        </a>
                        <a href="{{ route('safety.modify',$safety->id) }}">
                            <button type="button" class="btn btn-info btn-lg my-1">
                                <i class="fa fa-paper-plane-o"></i>Modify
                              </button>
                        </a>
                        <a href="{{ route('safety.destroy',$safety->id) }}">
                            <button type="button" class="btn btn-info btn-lg my-1">
                                <i class="fa fa-paper-plane-o"></i>Delete
                              </button>
                        </a>
                      </div>

                    </div>
                    @endforeach
                   @endif

                  </div>

                  <!-- Row end  -->
                </div>
              </div>
              <!-- Row end  -->
            </div>
          </div>




        @endsection
