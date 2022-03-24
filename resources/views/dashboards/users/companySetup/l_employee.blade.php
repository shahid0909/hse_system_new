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

    <body>
    <div id="ebazar-layout" class="theme-blue">
      <!-- sidebar -->


      <!-- main body area -->
      <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        <div class="header">
          <nav class="navbar py-4">
            <div class="container-xxl">
              

              <!-- menu toggler -->
              <button
                class="navbar-toggler p-0 border-0 menu-toggle order-3"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainHeader"
              >
                <span class="fa fa-bars"></span>
              </button>
            </div>
          </nav>
        </div>

        <!-- Body: Body -->
        <div class="body d-flex py-lg-3 py-md-2">
          <div class="container-xxl">
            <div class="row align-items-center">
              <div class="border-0 mb-4">
                <div
                  class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                >
                  <h3 class="fw-bold mb-0">Employees Information</h3>
                  <div class="col-auto d-flex w-sm-100">
                    <button
                      type="button"
                      class="btn btn-primary btn-set-task w-sm-100"
                      data-bs-toggle="modal"
                      data-bs-target="#expadd"
                    >
                      <i class="icofont-plus-circle me-2 fs-6"></i>Add Employees
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end  -->
            <div class="row clearfix g-3">
              <div class="col-sm-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <table
                      id="myProjectTable"
                      class="table table-hover align-middle mb-0"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>IC/PASSPORT NO.</th>
                          <th>Mail</th>
                          <th>Phone</th>
                          <th>Country</th>
                          <th>Date Of Joining</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>#CS-00002</strong></td>
                          <td>
                            <a href="employee-detail.html">
                              <img
                                class="avatar rounded"
                                src="{{asset('assets/images/xs/avatar1.svg')}}"
                                alt=""
                              />
                              <span class="fw-bold ms-1">Joan Dyer</span>
                            </a>
                          </td>
                          <td>GENERAL MANAGER</td>
                          <td>FOOD</td>
                          <td>880807-56-5116</td>
                          <td>JoanDyer@gmail.com</td>
                          <td>202-555-0983</td>
                          <td>Bangladesh</td>
                          <td>18-02-2022</td>
                          <td>
                            <div
                              class="btn-group"
                              role="group"
                              aria-label="Basic outlined example"
                            >
                              <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#expedit"
                              >
                                <i class="icofont-edit text-success"></i>
                              </button>
                              <button
                                type="button"
                                class="btn btn-outline-secondary deleterow"
                              >
                                <i class="icofont-ui-delete text-danger"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>#CS-00002</strong></td>
                          <td>
                            <a href="employee-detail.html">
                              <img
                                class="avatar rounded"
                                src="{{asset('assets/images/xs/avatar1.svg')}}"
                                alt=""
                              />
                              <span class="fw-bold ms-1">Joan Dyer</span>
                            </a>
                          </td>
                          <td>GENERAL MANAGER</td>
                          <td>FOOD</td>
                          <td>880807-56-5116</td>
                          <td>JoanDyer@gmail.com</td>
                          <td>202-555-0983</td>
                          <td>Bangladesh</td>
                          <td>18-02-2022</td>
                          <td>
                            <div
                              class="btn-group"
                              role="group"
                              aria-label="Basic outlined example"
                            >
                              <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#expedit"
                              >
                                <i class="icofont-edit text-success"></i>
                              </button>
                              <button
                                type="button"
                                class="btn btn-outline-secondary deleterow"
                              >
                                <i class="icofont-ui-delete text-danger"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>#CS-00002</strong></td>
                          <td>
                            <a href="employee-detail.html">
                              <img
                                class="avatar rounded"
                                src="{{asset('assets/images/xs/avatar1.svg')}}"
                                alt=""
                              />
                              <span class="fw-bold ms-1">Joan Dyer</span>
                            </a>
                          </td>
                          <td>GENERAL MANAGER</td>
                          <td>FOOD</td>
                          <td>880807-56-5116</td>
                          <td>JoanDyer@gmail.com</td>
                          <td>202-555-0983</td>
                          <td>Bangladesh</td>
                          <td>18-02-2022</td>
                          <td>
                            <div
                              class="btn-group"
                              role="group"
                              aria-label="Basic outlined example"
                            >
                              <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#expedit"
                              >
                                <i class="icofont-edit text-success"></i>
                              </button>
                              <button
                                type="button"
                                class="btn btn-outline-secondary deleterow"
                              >
                                <i class="icofont-ui-delete text-danger"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row End -->
          </div>
        </div>

        <!-- Modal Custom Settings-->
        <div
          class="modal fade right"
          id="Settingmodal"
          tabindex="-1"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Custom Settings</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body custom_setting">
                <!-- Settings: Color -->
                <div class="setting-theme pb-3">
                  <h6 class="card-title mb-2 fs-6 d-flex align-items-center">
                    <i class="icofont-color-bucket fs-4 me-2 text-primary"></i
                    >Template Color Settings
                  </h6>
                  <ul
                    class="list-unstyled row row-cols-3 g-2 choose-skin mb-2 mt-2"
                  >
                    <li data-theme="indigo"><div class="indigo"></div></li>
                    <li data-theme="tradewind">
                      <div class="tradewind"></div>
                    </li>
                    <li data-theme="monalisa"><div class="monalisa"></div></li>
                    <li data-theme="blue" class="active">
                      <div class="blue"></div>
                    </li>
                    <li data-theme="cyan"><div class="cyan"></div></li>
                    <li data-theme="green"><div class="green"></div></li>
                    <li data-theme="orange"><div class="orange"></div></li>
                    <li data-theme="blush"><div class="blush"></div></li>
                    <li data-theme="red"><div class="red"></div></li>
                  </ul>
                </div>
                <div class="sidebar-gradient py-3">
                  <h6 class="card-title mb-2 fs-6 d-flex align-items-center">
                    <i class="icofont-paint fs-4 me-2 text-primary"></i>Sidebar
                    Gradient
                  </h6>
                  <div class="form-check form-switch gradient-switch pt-2 mb-2">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="CheckGradient"
                    />
                    <label class="form-check-label" for="CheckGradient"
                      >Enable Gradient! ( Sidebar )</label
                    >
                  </div>
                </div>
                <!-- Settings: Template dynamics -->
                <div class="dynamic-block py-3">
                  <ul class="list-unstyled choose-skin mb-2 mt-1">
                    <li data-theme="dynamic">
                      <div class="dynamic">
                        <i class="icofont-paint me-2"></i> Click to Dyanmic
                        Setting
                      </div>
                    </li>
                  </ul>
                  <div class="dt-setting">
                    <ul class="list-group list-unstyled mt-1">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label>Primary Color</label>
                        <button
                          id="primaryColorPicker"
                          class="btn bg-primary avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label>Secondary Color</label>
                        <button
                          id="secondaryColorPicker"
                          class="btn bg-secondary avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label class="text-muted">Chart Color 1</label>
                        <button
                          id="chartColorPicker1"
                          class="btn chart-color1 avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label class="text-muted">Chart Color 2</label>
                        <button
                          id="chartColorPicker2"
                          class="btn chart-color2 avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label class="text-muted">Chart Color 3</label>
                        <button
                          id="chartColorPicker3"
                          class="btn chart-color3 avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label class="text-muted">Chart Color 4</label>
                        <button
                          id="chartColorPicker4"
                          class="btn chart-color4 avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center py-1 px-2"
                      >
                        <label class="text-muted">Chart Color 5</label>
                        <button
                          id="chartColorPicker5"
                          class="btn chart-color5 avatar xs border-0 rounded-0"
                        ></button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Settings: Font -->
                <div class="setting-font py-3">
                  <h6 class="card-title mb-2 fs-6 d-flex align-items-center">
                    <i class="icofont-font fs-4 me-2 text-primary"></i> Font
                    Settings
                  </h6>
                  <ul class="list-group font_setting mt-1">
                    <li class="list-group-item py-1 px-2">
                      <div class="form-check mb-0">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="font"
                          id="font-poppins"
                          value="font-poppins"
                        />
                        <label class="form-check-label" for="font-poppins">
                          Poppins Google Font
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item py-1 px-2">
                      <div class="form-check mb-0">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="font"
                          id="font-opensans"
                          value="font-opensans"
                          checked=""
                        />
                        <label class="form-check-label" for="font-opensans">
                          Open Sans Google Font
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item py-1 px-2">
                      <div class="form-check mb-0">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="font"
                          id="font-montserrat"
                          value="font-montserrat"
                        />
                        <label class="form-check-label" for="font-montserrat">
                          Montserrat Google Font
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item py-1 px-2">
                      <div class="form-check mb-0">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="font"
                          id="font-mukta"
                          value="font-mukta"
                        />
                        <label class="form-check-label" for="font-mukta">
                          Mukta Google Font
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- Settings: Light/dark -->
                <div class="setting-mode py-3">
                  <h6 class="card-title mb-2 fs-6 d-flex align-items-center">
                    <i class="icofont-layout fs-4 me-2 text-primary"></i
                    >Contrast Layout
                  </h6>
                  <ul class="list-group list-unstyled mb-0 mt-1">
                    <li
                      class="list-group-item d-flex align-items-center py-1 px-2"
                    >
                      <div class="form-check form-switch theme-switch mb-0">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="theme-switch"
                        />
                        <label class="form-check-label" for="theme-switch"
                          >Enable Dark Mode!</label
                        >
                      </div>
                    </li>
                    <li
                      class="list-group-item d-flex align-items-center py-1 px-2"
                    >
                      <div
                        class="form-check form-switch theme-high-contrast mb-0"
                      >
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="theme-high-contrast"
                        />
                        <label
                          class="form-check-label"
                          for="theme-high-contrast"
                          >Enable High Contrast</label
                        >
                      </div>
                    </li>
                    <li
                      class="list-group-item d-flex align-items-center py-1 px-2"
                    >
                      <div class="form-check form-switch theme-rtl mb-0">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="theme-rtl"
                        />
                        <label class="form-check-label" for="theme-rtl"
                          >Enable RTL Mode!</label
                        >
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="modal-footer justify-content-start">
                <button
                  type="button"
                  class="btn btn-white border lift"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary lift">
                  Save Changes
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Add Employees -->
        <div class="modal fade" id="expadd" tabindex="-1" aria-hidden="true">
          <div
            class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable"
          >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-bold" id="expaddLabel">
                  Add Employees
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="deadline-form">
                  <form>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-12">
                        <label for="item" class="form-label"
                          >Employees Name</label
                        >
                        <input type="text" class="form-control" name="em_name" />
                      </div>
                      <div class="col-sm-12">
                        <label for="item" class="form-label"
                          >Employees Designation</label
                        >
                        <input type="text" class="form-control" name="em_designation" />
                      </div>
                      <div class="col-sm-12">
                        <label for="item" class="form-label"
                          >Employees Department</label
                        >
                        <input type="text" class="form-control" name="em_department" />
                      </div>
                      <div class="col-sm-12">
                        <label for="item" class="form-label"
                          >Employees IC/Passport No</label
                        >
                        <input type="text" class="form-control" name="em_ic_passport_no" />
                      </div>
                      <div class="col-sm-12">
                        <label for="taxtno" class="form-label"
                          >Employees Profile</label
                        >
                        <input type="File" class="form-control" name="em_profile" />
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label for="depone" class="form-label">Country</label>
                        <input type="text" class="form-control" name="em_country" />
                      </div>
                      <div class="col-sm-6">
                        <label for="abc" class="form-label"
                          >Employees Register date</label
                        >
                        <input
                          type="date"
                          class="form-control w-100"
                          name="em_j_date"
                        />
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label for="abc11" class="form-label">Mail</label>
                        <input type="text" class="form-control" name="em_mail" />
                      </div>
                      <div class="col-sm-6">
                        <label for="abc111" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="em_phone" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Done
                </button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Edit Employees -->
        <div class="modal fade" id="expedit" tabindex="-1" aria-hidden="true">
          <div
            class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable"
          >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-bold" id="expeditLabel">
                  Edit Employees
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="deadline-form">
                  <form>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-12">
                        <label for="item1" class="form-label"
                          >Employees Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="item1"
                          value="Cloth"
                        />
                      </div>
                      <div class="col-sm-12">
                        <label for="taxtno1" class="form-label"
                          >Employees Profile</label
                        >
                        <input type="file" class="form-control" id="taxtno1" />
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label class="form-label">Country</label>
                        <input
                          type="text"
                          class="form-control"
                          value="South Africa"
                        />
                      </div>
                      <div class="col-sm-6">
                        <label for="abc1" class="form-label"
                          >Employees Register date</label
                        >
                        <input
                          type="date"
                          class="form-control w-100"
                          id="abc1"
                          value="2021-03-12"
                        />
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label for="mailid" class="form-label">Mail</label>
                        <input
                          type="text"
                          class="form-control"
                          id="mailid"
                          value="PhilGlover@gmail.com"
                        />
                      </div>
                      <div class="col-sm-6">
                        <label for="phoneid" class="form-label">Phone</label>
                        <input
                          type="text"
                          class="form-control"
                          id="phoneid"
                          value="843-555-0175"
                        />
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label class="form-label">Total Order</label>
                        <input type="text" class="form-control" value="18" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Done
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="{{asset('../js/template.js')}}"></script>
  </body>
        @endsection

        @section('script')

            <script>
            // project data table
              $(document).ready(function () {
                $("#myProjectTable")
                  .addClass("nowrap")
                  .dataTable({
                    responsive: true,
                    columnDefs: [{ targets: [-1, -3], className: "dt-body-right" }],
                  });
                $(".deleterow").on("click", function () {
                  var tablename = $(this).closest("table").DataTable();
                  tablename.row($(this).parents("tr")).remove().draw();
                });
              });
                $(document).ready(function() {
                    $('#country').on('change', function() {
                        let country_id = this.value;
                        $("#state").html('');
                        $.ajax({
                            url:"{{url('user/get-states-by-country')}}",
                            type: "POST",
                            data: {
                                country_id: country_id,
                                _token: '{{csrf_token()}}'
                            },
                            dataType : 'json',
                            success: function(result){
                                $('#state').html('<option value="">Select State</option>');
                                $.each(result.states,function(key,value){
                                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                                });
                                $('#city-dropdown').html('<option value="">Select State First</option>');
                            }
                        });
                    });
                    $('#state').on('change', function() {
                        let state_id = this.value;
                        $("#city-dropdown").html('');
                        $.ajax({
                            url:"{{url('get-cities-by-state')}}",
                            type: "POST",
                            data: {
                                state_id: state_id,
                                _token: '{{csrf_token()}}'
                            },
                            dataType : 'json',
                            success: function(result){
                                $('#city-dropdown').html('<option value="">Select City</option>');
                                $.each(result.cities,function(key,value){
                                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                                });
                            }
                        });
                    });
                });
            </script>
@endsection