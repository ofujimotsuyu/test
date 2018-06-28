<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>御富士も梅雨</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    </head>
    <body>
        <div style='overflow: hidden;'>
        @if (Auth::check())
            @include('commons.navbar')
            @include('commons.slider')
            <div class="row" id="icon-group">
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="http://www.ntv.co.jp/zip/"><img class="icon" src="images/icon.png" alt=""></a>
                <p>Jits-News</p>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="{{ route('cafe.get') }}"><img class="icon" src="images/icon1.png" alt=""></a>
                <p>Cafe-Minami</p>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="#"><img class="icon" src="images/icon2.png" alt=""></a>
                <p>Yunoki-Sports</p>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="{{ route('taka.taka') }}"><img class="icon" src="images/icon3.png" alt=""></a>
                <p>Weather-Funami</p>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="#"><img class="icon" src="images/icon4.png" alt=""></a>
                <p>おジャ魔女メグミ</p>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-2">
                <a href="{{ route('test') }}"><img class="icon" src="images/icon5.png" alt=""></a>
                <p>御富士掲示板</p>
              </div>
            </div>
            
            <div class="contents-img">
                <div class="topimg row">
                    <div class="column col-xs-12 caption">
                        <a href="http://www.ntv.co.jp/zip/"><span class="text"><p>Jits-News</p></span><img src="images/tara0.jpg"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="column col-xs-12 caption">
                        <a href="{{ route('cafe.get') }}"><span class="text"><p>Cafe-Minami</p></span><img src="images/tara1.jpg"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="column col-xs-12 caption">
                        <a href="#"><span class="text"><p>Yunoki-Sports</p></span><img src="images/tara3.jpg"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="column col-xs-12 caption">
                        <a href="{{ route('taka.taka') }}"><span class="text"><p>Weather-Funami</p></span><img src="images/tara4.jpg"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="column col-xs-12 caption">
                        <a href="#"><span class="text"><p>おジャ魔女メグミ</p></span><img src="images/tara2.jpg"></a>
                    </div>
                </div>
            </div>
            
            @include('commons.footer')
        
        @else
            <div class="welcome text-center">
                <img class="con" src="images/content3.jpg" alt="">
                <p class="titletitle">
                    Welcome to the OFUJI-BOARD
                </p>
                <p class="login">
                    {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-default']) !!}
                    {!! link_to_route('login', 'Log in now!', null, ['class' => 'btn btn-lg btn-default']) !!}
                </p>
            </div>
            <div>

            </div>
        @endif
        </div>
    </body>
</html>
    