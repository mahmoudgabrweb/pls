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
                            <span><span>تفاصيل الماكينة</span></span>
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
                <!-- row -->
                <div class="row ttm-sidebar-left">
                    <div class="col-lg-9 content-area">
                        <div class="row">

                        <div class="col-lg-12">
                            <div class="vehicle-detail-banner banner-content clearfix">
                                <div class="banner-slider">
                                    <div class="slider slider-for"  dir="rtl">
                                        
                                        @foreach ($details->gallery as $one)
                                            <div class="slider-banner-image">
                                                <img src="{{ Storage::url($one->image) }}" alt="Car-Image">
                                            </div>     
                                        @endforeach
                                        
                                        
                                    </div>
                                    <div class="slider slider-nav thumb-image" >

                                        @foreach ($details->gallery as $one)
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="{{ Storage::url($one->image) }}" alt="slider-img">
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-15 mb-15">
                                    <h3>تفاصيل الماكينة</h3>
                                    <p>{!! $details->description_ar !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="social-icons circle social-hover mt-30">
                                        <div class="ttm-social-share-title">مشاركة : </div>
                                        <ul class="list-inline">
                                            <li class="social-facebook"><a class="open_social" href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            {{-- <li class="social-linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> --}}
                                            <li class="social-whatsapp"><a class="open_social" href="https://wa.me/?text=http://jorenvanhocht.be"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ttm-portfolio-prev-next-buttons clearfix">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor float-right" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="ti ti-arrow-right"></i>Order Now</a>
                                    </div>
                                </div>  
                        </div>
                    </div>
                    <div class="col-lg-3 sidebar sidebar-left">
                            <div class="ttm-pf-single-detail-box">
                                <div class="ttm-pf-detailbox">
                                    <ul class="ttm-pf-detailbox-list">
                                        <li class="ttm-pf-details-date">
                                            <i class="ti-package"></i>
                                            <span class="ttm-pf-left-details">بلد المنشأ</span>
                                            <span class="ttm-pf-right-details">{{ $details->country->name_ar }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti-user"></i>
                                            <span class="ttm-pf-left-details">اسم التاجر</span>
                                            <span class="ttm-pf-right-details">{{ $details->user->first_name . " " . $details->user->last_name }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti ti-location-pin"></i>
                                            <span class="ttm-pf-left-details">العنوان</span>
                                            <span class="ttm-pf-right-details">{{ $details->address_ar }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti ti-timer"></i>
                                            <span class="ttm-pf-left-details">التصنيف</span>
                                            <span class="ttm-pf-right-details">{{ $details->mcategory->name_ar }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti ti-timer"></i>
                                            <span class="ttm-pf-left-details">السعر</span>
                                            <span class="ttm-pf-right-details">{{ $details->price }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti ti-timer"></i>
                                            <span class="ttm-pf-left-details">قدرة الماكينة</span>
                                            <span class="ttm-pf-right-details">{{ $details->machine_power }}</span>
                                        </li>
                                        <li class="ttm-pf-details-date">
                                            <i class="ti ti-timer"></i>
                                            <span class="ttm-pf-left-details">تاريخ الإنتاج</span>
                                            <span class="ttm-pf-right-details">{{ $details->production_date }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        
                        <aside class="widget widget_media_image">
                            <a href="#"><img class="img-fluid" src="{{ url("front/images/banner-image.jpg") }}" alt="banner-image"></a>
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
                </div><!-- row end -->
            </div>
        </section>
        <!-- ttm-sidebar end -->
        
    </div><!--site-main end-->    
@endsection

@section('scripts')
    <script>
        $(document).on("click", ".open_social", function(e) {
            e.preventDefault();
            let href = $(this).attr("href");
            window.open(href);
        });
    </script>
@endsection