@extends('layouts.front')
@section('content')
        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="section-overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box">
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url("/") }}"><i class="fa fa-home"></i>&nbsp;&nbsp;الرئيسية</a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; ⁄ &nbsp;</span>
                                <span><span>الماكينات</span></span>
                            </div>  
                        </div>
                    </div>  
                </div>
            </div>                    
        </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">

        <!-- ttm-sidebar -->
        <section class="ttm-sidebar ttm-bgcolor-grey clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 sidebar sidebar-left">
                        <form class="" method="get">
                            <aside class="widget filter-widget">
                                <h3 class="widget-title">Filter By Category</h3>      
                                <div class="filter-widget-wrapper">
                                    <div class="checkbox"><label><input type="checkbox" rel="category-one"/> Category One</label></div>
                                    <div class="checkbox"><label><input type="checkbox" rel="category-two"/> Category Two</label></div>
                                    <div class="checkbox"><label><input type="checkbox" rel="category-three"/> Category Three</label></div>
                                    <div class="checkbox"><label><input type="checkbox" rel="category-four"/> Category Four</label></div>
                                    <div class="checkbox"><label><input type="checkbox" rel="category-five"/> Category Five</label></div>
                                </div>
                            </aside>
                            <aside class="widget price-widget">
                                <h3 class="widget-title">Filter By Price</h3>      
                                <div class="orderby">
                                    <select name="orderby" class="select2-hidden-accessible">
                                        <option value="0" selected="selected">Default Price</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                        <option value="1">10000 LE : 1000000 LE</option>
                                    </select>
                                </div>
                            </aside>
                        </form>
                        <aside class="widget widget_media_image">
                            <a href="#"><img class="img-fluid" src="./assets/images/banner-image.jpg" alt="banner-image"></a>
                        </aside>
                        <aside class="widget contact-widget">
                            <h3 class="widget-title">Get in touch</h3>      
                            <ul class="contact-widget-wrapper">
                                <li><i class="ti ti-mobile"></i>(+01) 123 456 7890</li>
                                <li><i class="ti ti-comment"></i><a href="mailto:info@plsmachines.com" target="_blank">info@plsmachines.com</a></li>
                                <li><i class="ti ti-world"></i><a href="http://www.plsmachines.com/" target="_blank">http://www.plsmachines.com</a>
                                </li>
                                <li><i class="ti ti-location-pin"></i>Evanto HQ 24 Fifth st.,cairo, Egypt</li>
                                <li><i class="ti ti-alarm-clock"></i>Mon to Sat - 9:00am to 6:00pm <br>(Sunday Closed)</li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-10">
                        <!-- row -->
                        <div class="row pt-10 pl-5 pr-5 res-991-mt-0" >

                            @foreach ($records as $one)                                
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="featured-item ttm-portfolio-view-topimage">
                                        <div class="featured-portfolio-item ttm-item-view-topimage">
                                            <div class="featured-thumbnail">
                                                <a href="{{ generateURL("materials", $one->id, $one->name_ar) }}"> <img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"></a>
                                            </div>
                                        </div>
                                        <div class="content-post">
                                            <h2 class="title-post"><a href="{{ generateURL("materials", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                            <ul class='machine-info'>
                                                <li><i class='fa fa-money'></i> <span>السعر :</span>{{ $one->price }}</li>
                                                <li><i class='fa fa-map-marker'></i> <span> العنوان :</span>{{ $one->address_ar }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="col-lg-12 text-center">
                                {{ $records->links() }}
                            </div>
                        </div><!-- row end -->
                    </div>
                </div>
            </div>
        </section>
    </div><!--site-main end-->
@endsection