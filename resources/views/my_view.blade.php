<div class="notification">
    <h2>{{$greeting}}</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="subject">Subject:</label>
          {{$subject}}
      </div>
      <div class="form-group">
        <label for="message">code: {{ $otp->token }}</label>
  
  
      </div>
  
  
    </form>
  </div>
  
  <style>
  .notification {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
  }
  
  .notification h2 {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .notification form {
    display: flex;
    flex-direction: column;
  }
  
  .notification .form-group {
    margin-bottom: 20px;
  }
  
  .notification label {
    display: block;
    font-size: 16px;
    margin-bottom: 5px;
  }
  
  .notification input[type="text"],
  .notification textarea {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fff;
    width: 100%;
    height: 100px;
    resize: none;
  }
  
  .notification button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
  }</style>
  