<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    @include('website.includes.css')
    @yield('css')
    <title>
        @yield('title')
    </title>
</head>

<body class="presentation-page">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav
                class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder ms-sm-3"
                       href="" rel="tooltip"
                       title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        Soft UI Design System
                    </a>
                    <div class="collapse navbar-collapse " id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ">
                            <li class="nav-item my-auto ms-3 ms-lg-0">
                                <a class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-1 mt-2 mt-md-0 "
                                   href="{{route('login')}}">
                                    <span class="nav-link-text ms-1">Login</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @yield('navbar')
            </nav>
        </div>
    </div>
</div>
@include('website.includes.aside')
@yield('content')
@include('website.includes.footer')
<!--   Core JS Files   -->
@include('website.includes.js')
</body>

</html>
