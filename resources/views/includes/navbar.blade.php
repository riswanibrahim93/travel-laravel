<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
    <div class="container">
        <div class="navbar-header">
            <img class="icon" src="{{ url('/frontend/assets/img/icon.png') }}">
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a href="{{ route('home')}}" >Home</a>
                </li>
                <li>
                    <a href="#">Paket Travel</a>
                </li>
                <li class="dropdown">
                    <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bookmark"></i></i> Service
                    </a>
                    <ul class="dropdown-menu dropdown-primary">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                        </li>
                    </ul>
                </li>
                <li>
                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-fill" type="submit">
                                Logout
                            </button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary btn-fill">
                         Login
                        </a>
                    @endguest
                    
                </li>
            </ul>
        </div>
    </div>
</nav>