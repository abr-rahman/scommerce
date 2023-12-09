<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle', config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/fave-logo.jpg.png') }}">

    @include('frontend.layouts.partials._stylesheet')

    @vite(['resources/css/app.css'])
    @stack('css')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .ui-menu{
            z-index: 3500 !important;
        }
    </style>
</head>

<body class="font-Exo font-light">
    <!-- nav-bar start -->
    <div class="h-full w-full sticky top-0 z-[990]">
        <!-- Code block starts -->
        @include('frontend.layouts.partials._top-navbar')
        @include('frontend.layouts.partials.nav-icon')
        <!-- Code block ends -->
    </div>
    @include('frontend.layouts.partials._mobile-nav')
    <!-- nav-bar end -->

    @yield('section')

    <!-- footer -->
    @include('frontend.layouts.partials._footer')

    <form id="deleted_form" method="post">
        @csrf
        @method('DELETE')
    </form>

    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "129328763605649");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
    @include('frontend.layouts.partials._javascript')
    @stack('js')


    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            url: "{{ route('search.result') }}",
            method:'GET',
            success:function(data){
                startAutoComplete(data);
            },
        });

        function startAutoComplete(availableTags) {
            $( "#search_product" ).autocomplete({
                source: availableTags
            });
        }
  </script>
</body>

</html>
