<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        @php
        $usr = Auth::guard()->user();
        @endphp

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                @if ($usr->can('Admin.create') || $usr->can('Admin.view') ||  $usr->can('Admin.edit') ||  $usr->can('Admin.delete'))

                <li class="menu-title mt-2">User Module</li>


                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> User Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            @if ($usr->can('Admin.view'))
                            <li>
                                <a href="{{route('user.view')}}">User List</a>
                            </li>
                            @endif
                            @if ($usr->can('Admin.create'))
                            <li>
                                <a href="{{route('user.add')}}">User Add</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                @endif

                @if ($usr->can('Profile.view') ||  $usr->can('Profile.edit')  ||  $usr->can('Change_password.view') ||  $usr->can('Change_password.edit'))

                <li>
                    <a href="#sidebarCrm" data-toggle="collapse">
                        <i data-feather="user"></i>
                        <span> Profile Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            @if ($usr->can('Profile.view'))
                            <li>
                                <a href="{{route('profile.view')}}">My Profile</a>
                            </li>
                            @endif
                            @if ($usr->can('Change_password.view'))
                            <li>
                                <a href="{{route('change.password')}}">Change Password</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                @endif

                @if ($usr->can('Role.view') ||  $usr->can('Role.create') ||  $usr->can('Role.edit')  ||  $usr->can('Role.delete'))

                <li class="menu-title mt-2">Role & Permission</li>

                <li>
                    <a href="#role" data-toggle="collapse">
                        <i class="mdi mdi-security"></i>
                        <span> Role And Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="role">
                        <ul class="nav-second-level">
                            @if ($usr->can('Role.view'))
                            <li>
                                <a href="/admin/roles">Role View</a>
                            </li>
                            @endif
                            @if ($usr->can('Role.create'))
                            <li>
                                <a href="{{route('admin.roles.create')}}">Create Role</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                
                @endif

                @if ($usr->can('Type.view') ||  $usr->can('Institution.view')  ||  $usr->can('Passing.view') ||  $usr->can('Designation.view') ||  $usr->can('Country.view') ||  $usr->can('District.view') ||  $usr->can('Upazila.view'))

                <li class="menu-title mt-2">Setup Module</li>

                <li>
                    <a href="#system" data-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> System Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="system">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#system2" data-toggle="collapse">
                                    Result System <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('type.view')}}">Type</a>
                                        </li>
                                        <li>
                                            <a href="{{route('institution.view')}}">Institution</a>
                                        </li>
                                        <li>
                                            <a href="{{route('passing.view')}}">Passing Year</a>
                                        </li>
                                        <li>
                                            <a href="{{route('ds.view')}}">Designation</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#system3" data-toggle="collapse">
                                    Country <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('country.view')}}">Country</a>
                                        </li>
                                        <li>
                                            <a href="{{route('district.view')}}">District</a>
                                        </li>
                                        <li>
                                            <a href="{{route('up.view')}}">Upazila</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                @endif 
                
                <li>
                    <a href="#sidebarProjects" data-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> School Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('class.view')}}">Class</a>
                            </li>
                            <li>
                                <a href="{{route('session.view')}}">Session</a>
                            </li>
                            <li>
                                <a href="{{route('shift.view')}}">Shift</a>
                            </li>
                            <li>
                                <a href="{{route('group.view')}}">Group</a>
                            </li>
                            <li>
                                <a href="{{route('subject.view')}}">Subject</a>
                            </li>
                            <li>
                                <a href="{{route('syl.view')}}">Syllabus</a>
                            </li>
                            <li>
                                <a href="{{route('building.view')}}">Building</a>
                            </li>
                            <li>
                                <a href="{{route('floor.view')}}">Floor</a>
                            </li>
                            <li>
                                <a href="{{route('room.view')}}">Room</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTasks" data-toggle="collapse">
                        <i data-feather="clipboard"></i>
                        <span> Exam Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('exam.view')}}">Exam</a>
                            </li>
                            <li>
                                <a href="{{route('code.view')}}">Sort Code</a>
                            </li>
                            <li>
                                <a href="{{route('assign.view')}}">Exam Marks</a>
                            </li>
                            <li>
                                <a href="{{route('routine.view')}}">Exam Routine</a>
                            </li>
                            <li>
                                <a href="#system4" data-toggle="collapse">
                                    Marks Generate <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system4">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('marks.entry.add')}}">Marks Entry</a>
                                        </li>
                                        <li>
                                            <a href="{{route('marks.edit')}}">Edit Marks</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('view.grade')}}">Garde Marks</a>
                            </li>
                            <li>
                                <a href="{{route('admit.view')}}">Admit Card</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarContacts" data-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Library Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarContacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('publisher.view')}}">Publisher</a>
                            </li>
                            <li>
                                <a href="{{route('author.view')}}">Author</a>
                            </li>
                            <li>
                                <a href="{{route('bc.view')}}">Book Category</a>
                            </li>
                            <li>
                                <a href="{{route('book.view')}}">Book</a>
                            </li>
                            <li>
                                <a href="{{route('issue.view')}}">Book Issue</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTickets" data-toggle="collapse">
                        <i data-feather="grid"></i>
                        <span> Fee Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTickets">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('category.view')}}">Fee Category</a>
                            </li>
                            <li>
                                <a href="{{route('amount.view')}}">Fee Ammount</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">HR Module</li>

                <li>
                    <a href="#sidebarAuth" data-toggle="collapse">
                        <i data-feather="user-plus"></i>
                        <span> HR Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#system5" data-toggle="collapse">
                                    Teacher <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system5">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('teacher.add')}}">Teacher Registration</a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher.view')}}">Teacher List</a>
                                        </li>
                                        <li>
                                            <a href="{{route('salary.view')}}">Salary</a>
                                        </li>
                                        <li>
                                            <a href="{{route('attendance.view')}}">Attendance</a>
                                        </li>
                                        <li>
                                            <a href="{{route('leave.view')}}">Leave Application</a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher.salary.view')}}">Monthly Salary</a>
                                        </li>
                                        <li>
                                            <a href="{{route('teacher.card')}}">Id Card</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#system6" data-toggle="collapse">
                                    Employee <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system6">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('emp.add')}}">Employee Registration</a>
                                        </li>
                                        <li>
                                            <a href="{{route('emp.view')}}">Employee List</a>
                                        </li>
                                        <li>
                                            <a href="{{route('ems.view')}}">Salary</a>
                                        </li>
                                        <li>
                                            <a href="{{route('em.attendance.view')}}">Attendance</a>
                                        </li>
                                        <li>
                                            <a href="{{route('emp.leave.view')}}">Leave Application</a>
                                        </li>
                                        <li>
                                            <a href="{{route('employee.salary.view')}}">Monthly Salary</a>
                                        </li>
                                        <li>
                                            <a href="{{route('employee.card')}}">Id Card</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Student Module</li>

                <li>
                    <a href="#sidebarExpages" data-toggle="collapse">
                        <i data-feather="user-check"></i>
                        <span> Student Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('student.add')}}">Student Registration</a>
                            </li>
                            <li>
                                <a href="{{route('student.reg.view')}}">Student List</a>
                            </li>
                            <li>
                                <a href="{{route('roll.generate')}}">Roll Generate</a>
                            </li>
                            <li>
                                <a href="#system7" data-toggle="collapse">
                                    All Fee List <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="system7">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('registration.fee.view')}}">Registration Fee</a>
                                        </li>
                                        <li>
                                            <a href="{{route('monthly.fee.view')}}">Monthly Fee</a>
                                        </li>
                                        <li>
                                            <a href="{{route('exam.fee.view')}}">Exam Fee</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('student.card')}}">Id Card</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarLayouts" data-toggle="collapse">
                        <i data-feather="award"></i>
                        <span class="badge badge-info float-right">New</span>
                        <span> Certificate </span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('marksheet.view')}}">Marksheet</a>
                            </li>
                            <li>
                                <a href="{{route('testimonal.view')}}">Testimonal</a>
                            </li>
                            <li>
                                <a href="{{route('transfer.view')}}">Transfer Certificate</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#account" data-toggle="collapse">
                        <i class="mdi mdi-account-cash-outline"></i>
                        <span> Account Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('fee.view')}}">Student Fee</a>
                            </li>
                            <li>
                                <a href="{{route('th.salary.view')}}">Teacher Salary</a>
                            </li>
                            <li>
                                <a href="{{route('account.salary.view')}}">Employee Salary</a>
                            </li>
                            <li>
                                <a href="{{route('other.cost.view')}}">Others Cost</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#rp" data-toggle="collapse">
                        <i class="mdi mdi-account-cash-outline"></i>
                        <span> Report Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="rp">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('monthly.profit.view')}}">Total Profit</a>
                            </li>
                            <li>
                                <a href="#">Attendance Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#system123" data-toggle="collapse">
                        <i data-feather="settings"></i>
                        Settings <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="system123">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('setting.view')}}">Site Settings</a>
                            </li>
                            <li>
                                <a href="{{route('head.view')}}">Head Settings</a>
                            </li>
                        </ul>
                    </div>
                    </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>