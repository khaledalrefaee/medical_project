<div class="chat-container" wire:poll>

    <div class="messages-container" id="chat">
        <div id="chat" class="messages">
            @foreach ($messages as $message)
                <div class="message @if ($message->sender_id == auth()->id()) sent @else received @endif">
                    <div class="message-content">{{ $message->message }}</div>
                </div>
            @endforeach
        </div>
        <div class="input-container">
            <form wire:submit.prevent="sendMessage">
                <input type="text" wire:model="message" placeholder="Write your message here" class="message-input">
                <button type="submit" class="send-button">send</button>
            </form>
        </div>
</div>



<style>
    .chat-container {
        height: 400px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ccc;
    }

    .input-container {
        text-align: center;
    }

    .messages-container {
        height: 100%;
        overflow-y: scroll;
    }

    .messages {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .message {
        display: inline-block;
        max-width: 80%;
        padding: 10px;
        border-radius: 8px;
        font-size: 14px;
    }

    .sent {
        background-color: #4CAF50;
        color: #fff;
        align-self: flex-end;
    }

    .received {
        background-color: #f1f1f1;

    }

    .message-content {
        padding: 5px;
    }

    .message-input {
        width: 80%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .send-button {
        padding: 5px 10px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
</style>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // إعادة تحميل الصفحة بعد إرسال الرسالة
        Livewire.on('messageSent', function () {
            Livewire.emit('scrollDown');
        });



    </script>

    <script>
        function scrollDown() {
            document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;
        }

        setInterval(scrollDown, 1000);
    </script>

