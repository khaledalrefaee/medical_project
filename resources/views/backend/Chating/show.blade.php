@extends('backend.index')
@section('content')


    <h3>Chat App - {{ $receiver->name }}</h3>





@livewire('chat-single', ['senderId' => $sender->id, 'receiverId' => $receiver->id])












@endsection
