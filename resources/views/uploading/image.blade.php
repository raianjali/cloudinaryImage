<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    form {
      background: #f5f5f5;
      padding: 20px;
      border-radius: 10px;
    }

    input[type="submit"] {
      background: #0098cb;
      border: 0px;
      border-radius: 10px;
      color: white;
      padding: 10px;
      cursor: pointer;
    }
    </style>
  </head>

  <body>
    <a href="{{ url('/') }}">Home</a>
    <div class="flex-center position-ref full-height">
      @if (Route::has('login'))
      <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
      </div>
      @endif

      <div class="content">
        <!-- <div class="title m-b-md"> -->
        <h1>Image Upload</h1>

        <form action="{{URL::to('upload')}}" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="file" id="file">
          <input type="submit" value="Upload" name="submit">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
        </form>
        <!-- </div> -->
      </div>
    </div>
  </body>

</html>