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
                        meadical
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('all.role')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all_user')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('all.nuers')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Nuers</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('all.Clincs')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>clinics</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all_doctoer')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Doctoer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all_Details')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Details Doctoer</p>
                        </a>
                    </li>




                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
