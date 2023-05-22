<div wire:poll>
    <div class="container">
        <h3 class=" text-center">


                my clinic
        </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                    @forelse ($messages as $message)

                        @if ($message->user->name == auth()->user()->name)
                            <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> No previous messages</h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                       class="write_msg" placeholder="Type your message " />
                                <button class="msg_send_btn" type="submit">send</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <div class="d-flex justify-content-center mb-3">
                @if (auth()->user()->email == 'admin@gmail.com')
                    <a class="btn btn-primary" href="{{ url('delete_chat') }}">Delete All Messages</a>
                @endif
            </div>
        </div>
    </div>
</div>
