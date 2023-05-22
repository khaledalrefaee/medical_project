@extends('backend.index')
@section('content')
<html>
<head>
    <title></title>
    <style>
        .chat-container {
    max-width: 500px;
    margin: 0 auto;
}

#chat-messages {
    margin-bottom: 20px;
}

.message {
    background-color: #f2f2f2;
    padding: 10px;
    margin-bottom: 10px;
}

.sender {
    font-weight: bold;
}

.message-text {
    margin: 0;
}

#chat-form {
    display: flex;
    align-items: center;
}

#message {
    flex-grow: 1;
    margin-right: 10px;
}



</style>
</head>
<div class="chat-container">
    <h3>Chat App - {{ $receiver->name }}</h3>
    <div id="chat-messages" style="height: 300px; overflow-y: auto;">
        @if($messages->isEmpty())
            <h5 style="text-align: center;color:red">No previous messages</h5>
        @else
            @foreach($messages as $message)
                <div class="message">
                    @if($message->sender_id === Auth::user()->id)
                        <p class="sender">You:</p>
                    @else
                        <p class="sender">{{ $message->sender->name }}:</p>
                    @endif
                    <p class="message-text">{{ $message->message }}</p>
                    <br>
                    <p class="sender">{{ $message->created_at->diffForHumans(null, false, false) }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <form id="chat-form" style="position: sticky; bottom: 0; background-color: #f1f1f1; padding: 10px;">
        <div class="input-group">
            <textarea name="message" id="message" class="form-control" placeholder="Type your message" rows="2"></textarea>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>








    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
      // تهيئة Pusher باستخدام المفتاح والتكوين المناسبين
      const pusher = new Pusher('3f2538fb28a2e34c8719', {
          cluster: 'ap2',
          encrypted: true
      });

      // الاشتراك في قناة الدردشة
      const channel = pusher.subscribe('chat-channel');

      // استماع لحدث إرسال الرسالة
      channel.bind('message-sent', data => {
          // إنشاء عنصر فرعي p لعرض الرسالة
          const messageElement = document.createElement('p');
          messageElement.innerText = data.message;

          // إضافة الرسالة إلى عنصر div الذي يحمل معرف "chat-messages"
          const chatMessages = document.getElementById('chat-messages');
          chatMessages.appendChild(messageElement);
      });


      // استماع لحدث إرسال الرسالة عبر النموذج
      const chatForm = document.getElementById('chat-form');
      const chatMessage = document.getElementById('message');
      chatForm.addEventListener('submit', function(event) {
          event.preventDefault(); // منع السلوك الافتراضي للنموذج

          // جمع البيانات من حقل الرسالة
          const message = chatMessage.value;
          chatMessage.value = '';

          // إرسال البيانات كجسون في طلب POST إلى عنوان URL المحدد
          fetch('{{ route("chat.send") }}', {
              method: 'POST',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                  receiver_id: {{ $receiver->id }},
                  message: message
              })
          })
          .then(response => response.json())
          .then(data => console.log(data))
          .catch(error => console.error(error));
      });


  </script>
  <script>
  // استدعاء الوظيفة التالية عند تحديث رسائل الدردشة
function scrollToBottom() {
  const chatMessages = document.getElementById('chat-messages');
  chatMessages.scrollTop = chatMessages.scrollHeight;
}

// استدعاء الوظيفة بعد تحميل الصفحة أو تحديث رسائل الدردشة
window.onload = scrollToBottom;
</script>


<script>
    // تحديث الصفحة كل 5 ثوانٍ
    setInterval(function() {
      location.reload();
    }, 20000); // 5000 ميلي ثانية تعادل 5 ثوانٍ
  </script>

</body>
</html>

@endsection
