<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('Logout')}}" class="nav-link">logout</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <ul class="dropdown-menu">
            <li class="head text-light bg-dark">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <span>Notifications {{Auth::User()->unreadNotifications->count()}}</span>
                        <a href="" class="float-right text-light">mark as read </a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{Auth::User()->unreadNotifications->count() }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <a href="{{route('mail.create')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>  send mail
                        <span class="float-right text-muted text-sm"> </span>
                    </a>
                <hr>


                    <!-- Message Start -->
                    @foreach (Auth::User()->unreadNotifications as $notifications  )
                    <div class="media">
                        <img src="{{asset('back/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h5 class="dropdown-item-title">
                                {{ $notifications->data['message']}}  {{$notifications->data['user_created']}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h5>
                            <a href="{{route('mail.show',$notifications->data['mail_id'])}}" ><p class="text-sm">{{ $notifications->data['text']}}</p></a>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$notifications->created_at}}</p>
                        </div>
                    </div>
                        <hr>
                    @endforeach
                    <a href="{{route('see')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                    <!-- Message End -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="{{url('notifications')}}">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>


            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">1</span>
                <div class="dropdown-divider"></div>
                <a href="{{route('mail.create')}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>  send mail
                    <span class="float-right text-muted text-sm"> </span>
                </a>
                <hr>
                @foreach (Auth::User()->unreadNotifications as $notifications  )
                    <i class="fas fa-file mr-2"></i> {{ $notifications->data['message']}} from {{$notifications->data['user_created']}}
<hr>
                    <a href="" class="dropdown-item">{{ $notifications->data['text']}}</a>

                        <span class="float-right text-muted text-sm">{{$notifications->created_at}}</span>
                    <hr>
                @endforeach
                <a href="#" class="dropdown-item">
                    <span class="float-right text-muted text-sm"></span>
                </a>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>

