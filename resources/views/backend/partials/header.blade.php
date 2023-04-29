
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon">
                <img src="{{asset('backend/img/logo/logo2.png')}}">
            </div>
            <div class="sidebar-brand-text mx-3">MedicalAdmin</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <br>
        @can('Map')
        <li class="nav-item">
            <a class="nav-link" href="{{route('map')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Map</span>
            </a>
        </li>
        @endcan

        @can('Show chart')
        <li class="nav-item">
            <a class="nav-link" href="{{route('chart')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
            </a>
        </li>
        @endcan

        @can('role-index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Role</span>
            </a>
        </li>
        @endcan
        @can('user all')
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users belong to the admin</span>
            </a>
        </li>
        @endcan

        @can('user employee all')
        <li class="nav-item">
            <a class="nav-link" href="{{route('all_user')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users</span>
            </a>
        </li>
        @endcan

        @can('nurse all')

        <li class="nav-item">
            <a class="nav-link" href="{{route('all.nuers')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>nurses</span>
            </a>
        </li>
        @endcan

        @can('clinic all')
            <li class="nav-item">
                <a class="nav-link" href="{{route('all.Clincs')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>clinics</span>
                </a>
            </li>
        @endcan

        @can('doctor all')
            <li class="nav-item">
                <a class="nav-link" href="{{route('all_doctor')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Doctor</span>
                </a>
            </li>
        @endcan

        @can('pharmacy all')
            <li class="nav-item">
                <a class="nav-link" href="{{url('all/pharmese')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>pharmacy</span>
                </a>
            </li>
        @endcan

        @can('Reservations all')
            <li class="nav-item">
                <a class="nav-link" href="{{route('Reservations.all')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reservations</span>
                </a>
            </li>
        @endcan

        @can('Show Deleted Reservations')
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.delete.Reservation')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Archived appointments</span>
                </a>
            </li>
        @endcan

        <hr class="sidebar-divider">

    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                               aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">{{Auth::User()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
            </br>
                    <a href="{{route('mail.create')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>  send mail
                        <span class="float-right text-muted text-sm"> </span>
                    </a>
                <a class="dropdown-item text-center small text-gray-500" href="{{route('see')}}">Read More Messages</a>

                </br>

                    @foreach (Auth::User()->notifications  as $notifications  )
                            <div class="dropdown-list-image mr-3">
{{--                                <img class="rounded-circle" src="" style="max-width: 60px" alt="">--}}
                                <span class="float-right text-sm {{ $notifications->read_at ? 'text-muted' : 'text-danger' }}"><i class="fas fa-star"></i></span>

                                <div>  {{ $notifications->data['message']}}  {{$notifications->data['user_created']}}</div>
                                <a href="{{route('mail.show',$notifications->data['mail_id'])}}" ><p class="text-sm">{{ $notifications->data['text']}}</p></a>
                                <div class="small text-gray-500">{{$notifications->created_at}}</div>
                                </div>
                        </a>
            </br>
                @endforeach
            </div>
        </li>






        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{asset('backend/img/boy.png')}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ Auth::user()->email }}


                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>


            <!-- Modal Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to logout?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                            <a href="{{route('Logout')}}" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
