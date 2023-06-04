@extends('backend.index')
@section('content')
<html>
<head>
  <style>
      .container {
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
          background-color: #f1f1f1;
          border-radius: 5px;
      }

      h1 {
          margin-bottom: 20px;
          text-align: center;
      }

      .discussion-list {
          margin-top: 20px;
      }

      .discussion {
          display: flex;
          align-items: center;
          margin-bottom: 10px;
          padding: 10px;
          background-color: #fff;
          border-radius: 5px;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .profile {
          margin-right: 10px;
          position: relative;
      }

      .photo {
          max-width: 60px;
      }

      .status {
          width: 10px;
          height: 10px;
          border-radius: 50%;
          position: absolute;
          bottom: 0;
          right: 0;
      }

      .online {
          background-color: green;
      }
      .offline {
          background-color: red;
      }
      .name {
          font-weight: bold;
          margin: 0;
      }

      .desc-contact {
          flex-grow: 1;
      }

  </style>

</head>
<body>
<div class="container">
    <h1>Chat</h1>
    <a href="{{ url('/group/chat') }}">
        <h1>Group Chat</h1>
    </a>

    <div class="discussion-list">
        @foreach($users as $user)
            <div class="discussion">
                <div class="profile">
                    <img class="photo" src="{{ asset('backend/img/man.png') }}" alt="">
                    @if($user->sessions()->exists())
                        <div class="status online"></div>
                    @else
                        <div class="status offline"></div>
                    @endif
                </div>
                <div class="desc-contact">

                    <a href="{{ route('chat.show', ['senderId' => auth()->id(), 'receiverId' => $user->id]) }}">
                        <p class="name">{{ $user->name }}</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>





</html>
<script>
    // تحديث الصفحة كل 5 ثوانٍ
    setInterval(function() {
      location.reload();
    }, 15000); // 5000 ميلي ثانية تعادل 5 ثوانٍ
  </script>
@endsection
