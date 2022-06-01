@extends('layouts.app')

@section('content')
        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="index.html" class="mb-0 brand-icon">
            <span class="logo-icon">
              <i class="fa fa-book fs-4"></i>
            </span>
                    <span class="logo-text">HSE SYSTEM</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li>
                        <a class="m-link active" href="index.html"
                        ><i class="icofont-home fs-5"></i> <span>Dashboard</span></a
                        >
                    </li>
                    <li>
                        <a class="m-link" href="index.html"
                        ><i class="fa fa-file-text-o fs-5"></i>
                            <span>Safety Policy</span></a
                        >
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-product"
                            href="#"
                        >
                            <i class="icofont-users-alt-2 fs-5"></i>
                            <span>Safety & Health Committee</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-product">
                            <li>
                                <a class="ms-link" href="product-grid.html">Product Grid</a>
                            </li>
                            <li>
                                <a class="ms-link" href="product-list.html">Product List</a>
                            </li>
                            <li>
                                <a class="ms-link" href="product-edit.html">Product Edit</a>
                            </li>
                            <li>
                                <a class="ms-link" href="product-detail.html"
                                >Product Details</a
                                >
                            </li>
                            <li>
                                <a class="ms-link" href="product-add.html">Product Add</a>
                            </li>
                            <li>
                                <a class="ms-link" href="product-cart.html">Shopping Cart</a>
                            </li>
                            <li><a class="ms-link" href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#categories"
                            href="#"
                        >
                            <i class="icofont-chart-flow fs-5"></i>
                            <span>Accident Notification</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="categories">
                            <li>
                                <a class="ms-link" href="categorie-list.html"
                                >Categories List</a
                                >
                            </li>
                            <li>
                                <a class="ms-link" href="categories-edit.html"
                                >Categories Edit</a
                                >
                            </li>
                            <li>
                                <a class="ms-link" href="categories-add.html"
                                >Categories Add</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-order"
                            href="#"
                        >
                            <i class="icofont-notepad fs-5"></i>
                            <span>Safe Work Procedure</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li>
                                <a class="ms-link" href="order-list.html">Orders List</a>
                            </li>
                            <li>
                                <a class="ms-link" href="order-details.html">Order Details</a>
                            </li>
                            <li>
                                <a class="ms-link" href="order-invoices.html"
                                >Order Invoices</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#customers-info"
                            href="#"
                        >
                            <i class="icofont-funky-man fs-5"></i> <span>HIRARC</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="customers-info">
                            <li>
                                <a class="ms-link" href="customers.html">Customers List</a>
                            </li>
                            <li>
                                <a class="ms-link" href="customer-detail.html"
                                >Customers Details</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-sale"
                            href="#"
                        >
                            <i class="icofont-sale-discount fs-5"></i>
                            <span>Chemical Management</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-sale">
                            <li>
                                <a class="ms-link" href="coupons-list.html">Coupons List</a>
                            </li>
                            <li>
                                <a class="ms-link" href="coupon-add.html">Coupons Add</a>
                            </li>
                            <li>
                                <a class="ms-link" href="coupon-edit.html">Coupons Edit</a>
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-inventory"
                            href="#"
                        >
                            <i class="icofont-chart-histogram fs-5"></i>
                            <span>Contractor Safety Management</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-inventory">
                            <li>
                                <a class="ms-link" href="inventory-info.html">Stock List</a>
                            </li>
                            <li><a class="ms-link" href="purchase.html">Purchase</a></li>
                            <li><a class="ms-link" href="supplier.html">Supplier</a></li>
                            <li><a class="ms-link" href="returns.html">Returns</a></li>
                            <li>
                                <a class="ms-link" href="department.html">Department</a>
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-Componentsone"
                            href="#"
                        ><i class="icofont-ui-calculator"></i> <span>PPE Program</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-Componentsone">
                            <li><a class="ms-link" href="invoices.html">Invoices </a></li>
                            <li><a class="ms-link" href="expenses.html">Expenses </a></li>
                            <li>
                                <a class="ms-link" href="salaryslip.html">Salary Slip </a>
                            </li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a
                            class="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#app"
                            href="#"
                        >
                            <i class="icofont-code-alt fs-5"></i>
                            <span>Assessment / Monitoring</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="app">
                            <li><a class="ms-link" href="calendar.html">Calandar</a></li>
                            <li><a class="ms-link" href="chat.html"> Chat App</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="m-link" href="store-locator.html"
                        ><i class="icofont-focus fs-5"></i> <span>Training</span></a
                        >
                    </li>
                    <!-- <li>
                      <a class="m-link" href="ui-elements/ui-alerts.html"
                        ><i class="icofont-paint fs-5"></i>
                        <span>UI Components</span></a
                      >
                    </li> -->
                    <!-- <li class="collapsed">
                      <a
                        class="m-link"
                        data-bs-toggle="collapse"
                        data-bs-target="#page"
                        href="#"
                      >
                        <i class="icofont-page fs-5"></i> <span>Other Pages</span>
                        <span
                          class="arrow icofont-rounded-down ms-auto text-end fs-5"
                        ></span
                      ></a>
                      <ul class="sub-menu collapse" id="page">
                        <li>
                          <a class="ms-link" href="admin-profile.html">Profile Page</a>
                        </li>
                        <li>
                          <a class="ms-link" href="purchase-plan.html"
                            >Price Plan Example</a
                          >
                        </li>
                        <li>
                          <a class="ms-link" href="charts.html">Charts Example</a>
                        </li>
                        <li><a class="ms-link" href="table.html">Table Example</a></li>
                        <li><a class="ms-link" href="forms.html">Forms Example</a></li>
                        <li><a class="ms-link" href="icon.html">Icons</a></li>
                        <li><a class="ms-link" href="contact.html">Contact Us</a></li>
                      </ul>
                    </li> -->
                </ul>
                <!-- Menu: menu collepce btn -->
                <button
                    type="button"
                    class="btn btn-link sidebar-mini-btn text-light"
                >
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">
                        <!-- header rightbar icon -->
                        <div
                            class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1"
                        >
                            <!-- <div class="dropdown zindex-popover">
                              <a
                                class="nav-link dropdown-toggle pulse"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                              >
                                <img src="assets/images/flag/GB.png" alt="" />
                              </a>
                              <div
                                class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3"
                              >
                                <div class="card border-0">
                                  <ul class="list-unstyled py-2 px-3">
                                    <li>
                                      <a href="#" class=""
                                        ><img src="assets/images/flag/GB.png" alt="" />
                                        English</a
                                      >
                                    </li>
                                    <li>
                                      <a href="#" class=""
                                        ><img src="assets/images/flag/DE.png" alt="" />
                                        German</a
                                      >
                                    </li>
                                    <li>
                                      <a href="#" class=""
                                        ><img src="assets/images/flag/FR.png" alt="" />
                                        French</a
                                      >
                                    </li>
                                    <li>
                                      <a href="#" class=""
                                        ><img src="assets/images/flag/IT.png" alt="" />
                                        Italian</a
                                      >
                                    </li>
                                    <li>
                                      <a href="#" class=""
                                        ><img src="assets/images/flag/RU.png" alt="" />
                                        Russian</a
                                      >
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div> -->
                            <div class="dropdown notifications">
                                <a
                                    class="nav-link dropdown-toggle pulse"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                >
                                    <i class="icofont-alarm fs-5"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                                <div
                                    id="NotificationsDiv"
                                    class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3"
                                >
                                    <div class="card border-0 w380">
                                        <div class="card-header border-0 p-3">
                                            <h5
                                                class="mb-0 font-weight-light d-flex justify-content-between"
                                            >
                                                <span>Notifications</span>
                                                <span class="badge text-white">06</span>
                                            </h5>
                                        </div>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane fade show active">
                                                <ul class="list-unstyled list mb-0">
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img
                                                                class="avatar rounded-circle"
                                                                src="assets/images/xs/avatar1.svg"
                                                                alt=""
                                                            />
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Chloe Walkerr</span
                                    >
                                                                    <small>2MIN</small>
                                                                </p>
                                                                <span class=""
                                                                >Added New Product 2021-07-15
                                    <span class="badge bg-success"
                                    >Add</span
                                    ></span
                                                                >
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <div class="avatar rounded-circle no-thumbnail">
                                                                AH
                                                            </div>
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Alan Hill</span
                                    >
                                                                    <small>13MIN</small>
                                                                </p>
                                                                <span class="">Invoice generator </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img
                                                                class="avatar rounded-circle"
                                                                src="assets/images/xs/avatar3.svg"
                                                                alt=""
                                                            />
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Melanie Oliver</span
                                    >
                                                                    <small>1HR</small>
                                                                </p>
                                                                <span class="">Orader Return RT-00004</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img
                                                                class="avatar rounded-circle"
                                                                src="assets/images/xs/avatar5.svg"
                                                                alt=""
                                                            />
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Boris Hart</span
                                    >
                                                                    <small>13MIN</small>
                                                                </p>
                                                                <span class=""
                                                                >Product Order to Toyseller</span
                                                                >
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img
                                                                class="avatar rounded-circle"
                                                                src="assets/images/xs/avatar6.svg"
                                                                alt=""
                                                            />
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Alan Lambert</span
                                    >
                                                                    <small>1HR</small>
                                                                </p>
                                                                <span class="">Leave Apply</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img
                                                                class="avatar rounded-circle"
                                                                src="assets/images/xs/avatar7.svg"
                                                                alt=""
                                                            />
                                                            <div class="flex-fill ms-2">
                                                                <p
                                                                    class="d-flex justify-content-between mb-0"
                                                                >
                                    <span class="font-weight-bold"
                                    >Zoe Wright</span
                                    >
                                                                    <small class="">1DAY</small>
                                                                </p>
                                                                <span class=""
                                                                >Product Stoke Entry Updated</span
                                                                >
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a class="card-footer text-center border-top-0" href="#">
                                            View all notifications</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <div
                                class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover"
                            >
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm">
                                        <span class="font-weight-bold">{{ $user->name }}</span>
                                    </p>
                                    <small>Admin Profile</small>
                                </div>
                                <a
                                    class="nav-link dropdown-toggle pulse p-0"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    data-bs-display="static"
                                >
                                    <img
                                        class="avatar lg rounded-circle img-thumbnail"
                                        src="assets/images/profile_av.svg"
                                        alt="profile"
                                    />
                                </a>
                                <div
                                    class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0"
                                >
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img
                                                    class="avatar rounded-circle"
                                                    src="assets/images/profile_av.svg"
                                                    alt="profile"
                                                />
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">Vimala</span>
                                                    </p>
                                                    <small class="">vimala@gmail.com</small>
                                                </div>
                                            </div>

                                            <div><hr class="dropdown-divider border-dark" /></div>
                                        </div>
                                        <div class="list-group m-2">
                                            <a
                                                href="admin-profile.html"
                                                class="list-group-item list-group-item-action border-0"
                                            ><i class="icofont-ui-user fs-5 me-3"></i>Profile
                                                Page</a
                                            >
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                               class="list-group-item list-group-item-action border-0"
                                            ><i class="icofont-logout fs-5 me-3"></i>{{ __('Sign-out') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- menu toggler -->
                        <button
                            class="navbar-toggler p-0 border-0 menu-toggle order-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#mainHeader"
                        >
                            <span class="fa fa-bars"></span>
                        </button>

                        <!-- main menu Search-->
                        <div
                            class="order-0 col-lg-10 col-md-4 col-sm-12 col-12 mb-3 mb-md-0"
                        >
                            <div
                                class="marquee"
                                style="
                    background-color: #315948;
                    height: 50px;
                    border-radius: 20px;
                    width: 95%;
                  "
                            >
                                <marquee>
                                    <p
                                        style="
                        line-height: 50px;
                        color: white;
                        font-size: 20px;
                        font-weight: 500;
                      "
                                    >
                                        Welcome TO My SDS Online
                                    </p>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div
                        class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4"
                    >
                        <div class="col">
                            <div class="alert-success alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="avatar rounded no-thumbnail bg-success text-light"
                                    >
                                        <i class="fa fa-user fa-lg"></i>
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Registered Clients</div>
                                        <span class="small">18,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-danger alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="avatar rounded no-thumbnail bg-danger text-light"
                                    >
                                        <i class="fa fa-credit-card fa-lg"></i>
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Pending Clients</div>
                                        <span class="small">$11,024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-warning alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="avatar rounded no-thumbnail bg-warning text-light"
                                    >
                                        <i class="fa fa-smile-o fa-lg"></i>
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Total Chemical</div>
                                        <span class="small">8,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-info alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-info text-light">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">Total Training</div>
                                        <span class="small">8,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end  -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div
                                    class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0"
                                >
                                    <h6 class="m-0 fw-bold">Recent Applications</h6>
                                </div>
                                <div class="card-body">
                                    <table
                                        id="myDataTable"
                                        class="table table-hover align-middle mb-0"
                                        style="width: 100%"
                                    >
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Lavel</th>
                                            <th>Customer Name</th>
                                            <th>Industry Type</th>
                                            <th>COMPANY ROC</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>#78414</strong></td>
                                            <td><span> 01 </span></td>
                                            <td>La Meridian</td>
                                            <td>Resturent</td>
                                            <td>420</td>
                                            <td>
                                                <span class="badge bg-warning">Progress</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#58414</strong></td>
                                            <td><span>02 </span></td>
                                            <td>Brian</td>
                                            <td>industry</td>
                                            <td>220</td>
                                            <td>
                                                <span class="badge bg-success">Complited</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#78414</strong></td>
                                            <td><span> 01 </span></td>
                                            <td>La Meridian</td>
                                            <td>Resturent</td>
                                            <td>420</td>
                                            <td>
                                                <span class="badge bg-warning">Progress</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#58414</strong></td>
                                            <td><span>02 </span></td>
                                            <td>Brian</td>
                                            <td>industry</td>
                                            <td>220</td>
                                            <td>
                                                <span class="badge bg-success">Complited</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#78414</strong></td>
                                            <td><span> 01 </span></td>
                                            <td>La Meridian</td>
                                            <td>Resturent</td>
                                            <td>420</td>
                                            <td>
                                                <span class="badge bg-warning">Progress</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#58414</strong></td>
                                            <td><span>02 </span></td>
                                            <td>Brian</td>
                                            <td>industry</td>
                                            <td>220</td>
                                            <td>
                                                <span class="badge bg-success">Complited</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end  -->
                </div>
            </div>
        </div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
