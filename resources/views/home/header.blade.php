<header class="header_section" style="background: linear-gradient(45deg, #000000, #362819); color: #fff; padding: 20px 0;">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
                <img width="250" src="images/b2.png" alt="#" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" style=""> <span class="nav-label">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="" >About</a></li>
                            <li><a href="" style="">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" target="_blank" style="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="">Contact</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit" style="">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <x-app-layout></x-app-layout>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn " id="loginbtn"  href="{{ route('login') }}" style="background-color: #866C35; color: #fff; margin-left: 50px;">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-successful" href="{{ route('register') }}" style="background-color: #866C35; color: #fff; margin-left: 10px;">REGISTER</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            
            </div>
        </nav>
    </div>
</header>
