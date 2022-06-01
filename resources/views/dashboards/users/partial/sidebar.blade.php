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
                <a class="m-link {{ (request()->is('user/dashboard')) ? 'active':'' }}" href="{{route('user.dashboard')}}"
                ><i class="icofont-home fs-5"></i> <span>Dashboard</span></a
                >
            </li>


             <li class="collapsed">
                <a class="m-link  {{ (request()->is('department') or request()->is('designation') or request()->is('employee') or request()->is('com_profile')) ? 'active':'' }}"
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-product"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Company Profile Setup</span>
                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse {{ (request()->is('department') or request()->is('designation') or request()->is('employee') or request()->is('com_profile')) ? 'show':'' }}" id="menu-product">

                    <li>
                        <a class="ms-link {{ (request()->is('department')) ? 'active':'' }}" href="{{route('department.index')}}">Department Setup</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('designation')) ? 'active':'' }}" href="{{route('designation.index')}}">Designation Setup</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('employee')) ? 'active':'' }}" href="{{route('employee.index')}}">Employee Setup</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('com_profile')) ? 'active':'' }}" href="{{route('com_profile.index')}}">Company Profile</a>
                    </li>


                </ul>


            </li>



	<li>
                <a class="m-link {{ (request()->is('safety/policy') or request()->is('upload-policy')) ? 'active':'' }}"
" href="{{route('safety.policy-view')}}"
                ><i class="icofont-home fs-5"></i> <span>Safety Policy</span></a
                >
            </li>

<li class="collapsed">
                <a class="m-link   {{ (request()->is('safety_committee') or request()->is('safety_committee/chart') or request()->is('list-inspection') or request()->is('rectified-inspection')) ? 'active':'' }} "
                   data-bs-toggle="collapse"
                   data-bs-target="#Safety_Committee"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Safety Committee</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse {{ (request()->is('safety_committee') or request()->is('safety_committee/chart') or request()->is('list-inspection') or request()->is('rectified-inspection')) ? 'show':'' }} " id="Safety_Committee">

                    <li>
                        <a class="ms-link {{ (request()->is('safety_committee')) ? 'active':'' }}" href="{{route('safety_committee.index')}}">Safety Committee</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('safety_committee/chart')) ? 'active':'' }}" href="{{route('safety_committee.chart')}}">Safety Committee Chart</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('view-meeting')) ? 'active':'' }}" href="{{route('meeting.index')}}">Meeting Minutes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="m-link {{ (request()->is('safe-work-procedure')) ? 'active':'' }} " href="{{route('safe_work_procedure.index')}}"
                ><i class="icofont-home fs-5"></i> <span>Safe Work Procedure</span></a
                >
            </li>

        
            <li class="collapsed">
                <a class="m-link {{ (request()->is('workpalce_inspection') or request()->is('create_ispection') or request()->is('list-inspection') or request()->is('rectified-inspection')) ? 'active':'' }} "
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-Workplace"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Workplace Inspection</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse {{ (request()->is('workpalce_inspection') or request()->is('create_ispection') or request()->is('list-inspection') or request()->is('rectified-inspection')) ? 'show':'' }} " id="menu-Workplace">


   		 <li>
                        <a class="ms-link {{ (request()->is('workpalce_inspection')) ? 'active':'' }}" href="{{route('workinspection.index')}}">Dashboard</a>
                    </li>


                    <li>
                        <a class="ms-link {{ (request()->is('create_ispection')) ? 'active':'' }} " href="{{route('create_ispection.index')}}">Creat Inspection</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('list-inspection')) ? 'active':'' }}" href="{{route('list_inspection.index')}}">list of Inspection</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('rectified-inspection')) ? 'active':'' }}" href="{{route('rectified_inspection.index')}}">Rectified Inspection</a>
                    </li>


                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link  {{ (request()->is('accident-investigation') or request()->is('list-accident') or request()->is('accident-report')) ? 'active':'' }} "
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-Accident"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Accident investigation</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse {{ (request()->is('accident-investigation') or request()->is('list-accident') or request()->is('accident-report')) ? 'show':'' }} " id="menu-Accident">

                    <li>
                        <a class="ms-link {{ (request()->is('accident-investigation')) ? 'active':'' }} " href="{{route('accident_investigation.index')}}">Accident analysis</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('list-accident')) ? 'active':'' }} " href="{{route('accident_investigation.acci_list')}}">list of Accident</a>
                    </li>
                    <li>
                        <a class="ms-link {{ (request()->is('accident-report')) ? 'active':'' }} " href="{{route('accident_report.index')}}">Accident Report</a>
                    </li>



                </ul>
            </li>



            


          <li class="collapsed">
              <a
                class="m-link {{ (request()->is('hirarc') or request()->is('hirarc-data-list-view') or request()->is('h_hazard')) ? 'active':'' }}"
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
              <ul class="sub-menu collapse {{ (request()->is('hirarc') or request()->is('hirarc-data-list-view') or request()->is('h_hazard')) ? 'show':'' }} " id="customers-info">
                <li>
                  <a class="ms-link {{ (request()->is('hirarc')) ? 'active':'' }}" href="{{route('hirarc.index')}}">Add Hirarc</a>
                </li>

                   <li>
                  <a class="ms-link {{ (request()->is('hirarc-data-list-view')) ? 'active':'' }}" href="{{route('hirarc.listview')}}">Hirarc List</a>
                </li>

                 <li>
                  <a class="ms-link {{ (request()->is('h_hazard')) ? 'active':'' }}" href="{{route('h_hazard.index')}}">Hazard</a>
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
