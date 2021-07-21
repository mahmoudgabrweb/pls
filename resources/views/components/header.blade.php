<!--header start-->
<header id="masthead" class="header ttm-header-style-classic">
    <!-- ttm-topbar-wrapper -->
    <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
        <div class="container-fluid">
            <div class="ttm-topbar-content row">
                <ul class="top-contact col-lg-7 col-md-7 col-sm-12">
                    <div class="row">
                        <li class="sitebranding col-lg-3 col-md-3 col-sm-12">
                            <a class="home-link" href="{{ url("/") }}" title="Pls-machines" rel="home">
                                <img id="logo-img" class="img-center" src="{{ asset("front/images/light-logo-img.png") }}"
                                    alt="logo-img">
                            </a>
                        </li>
                        <li class="seacrhingtab col-lg-9 col-md-9 col-sm-12">
                            <form action="" class="topsearching">
                                <input class="text-input" name="search" type="text"
                                    placeholder="إدخل كلمه البحث">
                            </form>
                        </li>
                    </div>
                </ul>
                <div class="topbar-right col-lg-5 col-md-5 col-sm-12">
                    <div class="ttm-social-links-wrapper list-inline">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="top-contact ttm-highlight">
                        <li class="list-inline-item"><strong><i class="fa fa-phone"></i></strong> <span
                                class="tel-no">0 (012) 456 7897</span></li>
                        <li class="list-inline-item"><strong><i class="ti ti-comment-alt"></i></strong> <span
                                class="tel-no">info@pls-machines.com</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- ttm-topbar-wrapper end -->
    <!-- ttm-header-wrap -->
    <div class="ttm-header-wrap">
        <!-- ttm-stickable-header-w -->
        <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
            <div id="site-header-menu" class="site-header-menu">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="container-fluid">
                        <!--site-navigation -->
                        <div id="site-navigation" class="site-navigation">
                            <div class="ttm-menu-toggle">
                                <input type="checkbox" id="menu-toggle-form" />
                                <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                    <span class="toggle-block toggle-blocks-1"></span>
                                    <span class="toggle-block toggle-blocks-2"></span>
                                    <span class="toggle-block toggle-blocks-3"></span>
                                </label>
                            </div>
                            <nav id="menu" class="menu">
                                <ul class="dropdown">
                                    <li class="active">
                                        <a href="{{ url("/") }}"><i class="fa fa-home"></i>
                                            الرئيسيه
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">الماكينات</a>
                                        <ul>
                                            <li><a href="{{ url("machines/new") }}">جديد</a>
                                                <ul>
                                                    @foreach ($new_machines as $id => $name)
                                                        <li><a href="{{ generateURL("machines", $id, $name) }}">{{ $name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{ url("machines/used") }}">مستعمل</a>
                                                <ul>
                                                    @foreach ($used_machines as $id => $name)
                                                        <li><a href="{{ generateURL("machines", $id, $name) }}">{{ $name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">الموردين</a>
                                        <ul>
                                            <li><a href="{{ url("supplies/new") }}">جديد</a>
                                                <ul>
                                                    @foreach ($new_supplies as $id => $name)
                                                        <li><a href="{{ generateURL("supplies", $id, $name) }}">{{ $name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{ url("supplies/used") }}">مستعمل</a>
                                                <ul>
                                                    @foreach ($used_supplies as $id => $name)
                                                        <li><a href="{{ generateURL("supplies", $id, $name) }}">{{ $name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url("materials") }}">الخامات</a></li>
                                    <li><a href="{{ url("engineers") }}">الفنيين</a></li>
                                    <li><a href="{{ url("about-us") }}">من نحن</a></li>
                                    <li><a href="{{ url("contact-us") }}">تواصل معانا</a></li>
                                </ul>
                            </nav>
                        </div><!-- site-navigation end-->
                        <!-- header-icins -->
                        <div class="ttm-header-icons ">
                            <div class="ttm-header-icon">
                                <div class="ttm-custombutton">
                                    <a href="#" data-toggle="modal" data-target="#login">دخول</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ttm-stickable-header-w end-->
    </div>
    <!--ttm-header-wrap end -->
</header>
<!--header end-->
