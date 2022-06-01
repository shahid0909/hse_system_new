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
                <a class="m-link active" href="{{route('admin.dashboard')}}"
                ><i class="icofont-home fs-5"></i> <span>Dashboard</span></a
                >
            </li>
            <li>
                <a class="m-link active" href="{{route('usercreate.index')}}"
                ><i class="icofont-ui-user fs-5"></i> <span>User</span></a>

            </li>

            <li class="collapsed">
                <a class="m-link  active"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu-product"
                    href="#" >
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Chamical Inventory</span>
                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="menu-product">

                    <li class="collapsed">
                        <a class="m-link active "
                            id="m-link"
                            data-bs-toggle="collapse"
                            data-bs-target="#menu-setup"
                            href="#"
                        >
                            <i class="icofont-gears fs-5"></i>
                            <span>Setup</span>
                            <span
                                class="arrow icofont-rounded-down ms-auto text-end fs-5"
                            ></span
                            ></a>

                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-setup">

                            <li>
                                <a class="ms-link active" href="{{route('l_manufacturer.index')}}">Manufacturer Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_supplier.index')}}">Supplier Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_cas.index')}}">CAS Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_physical_form.index')}}">Physical Form Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_ghs_label.index')}}">GHS Label Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_hazard.index')}}">Health Hazard Entry</a>
                            </li>
                            <li>
                                <a class="ms-link" href="{{route('l_ppe.index')}}">PPE Entry</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a class="ms-link" href="{{route('chemical.index')}}">Chemical Add</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('chemical_listing.index')}}">Chemical Listing</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('chemical_register.index')}}">Chemical Register</a>
                    </li>

                </ul>
            </li>
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
