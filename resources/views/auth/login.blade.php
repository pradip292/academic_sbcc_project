<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sanjivani College of Engineering,Kopargaon</title>
    <link rel="stylesheet" href="{{ asset('assets/custom/css/style.css') }}">
  </head>
  <body>
    <div class="center">
      <h1>LOGIN</h1>
      <form method="post" action="/do-login" enctype="multipart/form-data">
        @csrf
        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
       <br>

        <input type="submit" value="Login">
        <br>
        
      </form>
    </div>

  </body>
</html>
