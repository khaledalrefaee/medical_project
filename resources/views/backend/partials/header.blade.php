<style>
    ul.list-group {
        max-height: 400px;
        overflow-y: scroll;
    }
</style>

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
                    <a href="{{route('see')}}" class="dropdown-item dropdown-footer">See All Messages</a>
<hr>

                    <ul class="list-group">
                    <!-- Message Start -->
                    @foreach (Auth::User()->notifications  as $notifications  )
                    <div class="media">
                        <img src="{{asset('back/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h5 class="dropdown-item-title">
                                {{ $notifications->data['message']}}  {{$notifications->data['user_created']}}
                                <span class="float-right text-sm {{ $notifications->read_at ? 'text-muted' : 'text-danger' }}"><i class="fas fa-star"></i></span>
                            </h5>
                            <a href="{{route('mail.show',$notifications->data['mail_id'])}}" ><p class="text-sm">{{ $notifications->data['text']}}</p></a>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$notifications->created_at}}</p>
                        </div>
                    </div>
                        <hr>

                    @endforeach
                    </ul>
                    <!-- Message End -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>

    </ul>
</nav>


