<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Gaming Blog Bootstarp Website Template | Home :: w3layouts</title>
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ URL::asset('js/jquery-1.11.0.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.mixitup.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {

                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                    );

                }

            };

            // Run the show!
            filterList.init();


        });
    </script>
</head>
<body>
<!-- Header Starts Here -->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="{{ route('main') }}"><img src="images/logo.png" alt=""></a>
        </div>
        <span class="menu"></span>
        <div class="navigation">
            <ul class="navig cl-effect-3" >
                <li>
                    <a href="{{ route('home')}}">Главная</a>
                </li>
                <li>
                    <a href="{{ route('games.list')}}">Игры</a>
                </li>
                <li>
                    @if (Route::has('login'))
                        <div class="authorization-block">
                            @auth
                                <a href="{{ url('/home') }}" class="authorization-block__link">Личный кабинет</a>
                                <a href="{{ route('logout') }}" class="authorization-block__link">Выйти</a>
                            @else
                                <a href="{{ route('login') }}" class="authorization-block__link">Вход</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </li>
            </ul>
            <form action="{{ route('search') }}" class="search-bar">
                <input type="text" placeholder="Search" required="" />
                <input type="submit" value="" />
            </form>
            <div class="clearfix"></div>
            <script>
                $( "span.menu" ).click(function() {
                    $( ".navigation" ).slideToggle( "slow", function() {
                        // Animation complete.
                    });
                });
            </script>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
