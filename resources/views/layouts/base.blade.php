<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FIFO </title>

        <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link href="{{asset('css/grayscale.min.css')}}" rel="stylesheet">

    </head>
    <body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-bottom" id="mainNav" style="display: block; box-shadow: 10px 5px 10px 8px #888888" ><!--  style="top: 83vh" !-->
    <div class="container" >
      <a class="navbar-brand" href="{{route('user.home')}}">FIFO</a>
      <div class="small text-black-50">
      FIFO. Find and Found
    </div>
    @if (Route::has('login'))
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas <fa-></fa->bars"></i>
      </button>
      @auth
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item Notifications">
            <a class="nav-link js-scroll-trigger " href="{{route('users.Notifications')}}">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="background-color: red;" href="{{route('users.found')}}">Found!!</a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('items.index')}}">item</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('user.categories.index') }}">Categories</a>
          </li>
        <li class="nav-item">
            <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a> -->
            <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            <!-- </div> -->
        </li>
            
          @else
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
          </li>
         @endauth
        </ul>
      </div>
         @endif
    </div>
    
  </nav>

  <!-- Header -->
  @yield('content')
  

  <script src="{{asset('jquery/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('js/grayscale.min.js')}}"></script>
  <script type="text/JavaScript">
    function check(){
      $.ajax({
        url:'{{route('users.checkNotifications')}}',
        type:'GET',
        dataType:'JSON',
        data:{

        },
        success:function(data){
          $('.Notifications').html('<li class="nav-item Notifications"><a class="nav-link js-scroll-trigger" href="{{route('users.Notifications')}}" >Notifications '+data[0].count +'</a></li>')
        },
        complete: function() {
      // Schedule the next request when the current one's complete
        setTimeout(check, 5000);
        }
      })
    }
    
  </script>
  <script>
    $(document).ready(function() {
  // run the first time; all subsequent calls will take care of themselves
      // alert('lol');
      setTimeout(check, 2000);
    });
  </script>
  </body>
</html>