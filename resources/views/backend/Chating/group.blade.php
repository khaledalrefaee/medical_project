@extends('backend.index')
@section('content')
    <html>
    <head>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    </html>
    <livewire:chat-group />

    <script>

        function scrollDown() {
            document.getElementById('chat').scrollTop =  document.getElementById('chat').scrollHeight
        }

        setInterval(scrollDown, 1000);
    </script>

@endsection
