<div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Auth
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ Auth::user()->name }} </p>
                        </a>
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ Auth::user()->email }} </p>
                        </a>
                    </li>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        meadical
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

{{--                    @can('Show-chart')--}}
                    <li class="nav-item">
                        <a href="{{route('chart')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> chart </p>
                        </a>
                    </li>
{{--                    @endcan--}}

                    @can('role-index')
                    <li class="nav-item">
                        <a href="{{route('roles.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                        </a>
                    </li>
                    @endcan

                    @can('user-index')
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    @endcan

                    @can('user-employee-all')
                        <li class="nav-item">
                            <a href="{{route('all_user')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create Users</p>
                            </a>
                        </li>

                    @endcan

                    <li class="nav-item">
                        @can('nuers-index')
                        <a href="{{route('all.nuers')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Nuers</p>
                            @endcan
                        </a>
                    </li>


                    @can('Clincs-index')

                    <li class="nav-item">
                        <a href="{{route('all.Clincs')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>clinics</p>
                        </a>
                    </li>
                    @endcan

                    @can('doctor-index')
                    <li class="nav-item">
                        <a href="{{route('all_doctor')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Doctor</p>
                        </a>
                    </li>
                    @endcan

                    @can('pharmese-index')
                    <li class="nav-item">
                        <a href="{{route('all.pharmese')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> pharmese </p>
                        </a>
                    </li>
                    @endcan


                    @can('Reservations-index')
                    <li class="nav-item">
                        <a href="{{route('Reservations.all')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Reservations </p>
                        </a>
                    </li>
                    @endcan





                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
