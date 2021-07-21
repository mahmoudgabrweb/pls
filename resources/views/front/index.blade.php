@extends('layouts.front')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach ($data['sliders'] as $one_slider)                            
                            <div class="item" style="background-image: url({{ Storage::url($one_slider->image) }}">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1">{{ $one_slider->title_ar }}</div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $one_slider->text_ar }}</span> </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /.item -->
                    </div>
                    <!-- /.owl-carousel --> 
                </div>
            </div>
        </div>
    </div>

    <!--site-main start-->
    <div class="site-main">

        <!--portfolio-section-->
        <section id="H-lastestproject" class="ttm-row scale-bg-top portfolio-section2">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <!-- section-title -->
                        <div class="section-title style2 clearfix">
                            <h2 class="title">أحدث الماكينات</h2>
                            <div class="heading-seperator"><span></span></div>
                        </div><!-- section-title end -->
                    </div>
                    <div class="col-lg-6 col-md-12 controllBTN">
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right" href="{{ url("machines") }}">الكل</a>
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right js-filter btn-2" data-machine="used">مستعمل</a>
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right js-filter activebtn btn-1" data-machine="new">جديد</a>
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0  new-filterable" data-machine="new">

                    @foreach ($data['new_machines'] as $one)                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <!-- featured-item -->
                            <div class="featured-item ttm-portfolio-view-topimage">
                                <div class="featured-portfolio-item ttm-item-view-topimage">
                                    <div class="featured-thumbnail">
                                        <a href="{{ generateURL("machines", $one->id, $one->name_ar) }}">
                                            <img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="content-post">
                                    <h2 class="title-post"><a href="{{ generateURL("machines", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                    <ul class='machine-info'>
                                        <li><i class='fa fa-money'></i> <span>السعر : </span>{{ $one->price }}</li>
                                        <li><i class='fa fa-map-marker'></i> <span> العنوان : </span>{{ $one->address_ar }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- featured-item end-->
                        </div>
                    @endforeach
                    
                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0  used-filterable is-hidden" data-machine="used">
                    
                    @foreach ($data['used_machines'] as $one)                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <!-- featured-item -->
                            <div class="featured-item ttm-portfolio-view-topimage">
                                <div class="featured-portfolio-item ttm-item-view-topimage">
                                    <div class="featured-thumbnail">
                                        <a href="{{ generateURL("machines", $one->id, $one->name_ar) }}"><img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"></a>
                                    </div>
                                </div>
                                <div class="content-post">
                                    <h2 class="title-post"><a href="{{ generateURL("machines", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                    <ul class='machine-info'>
                                        <li><i class='fa fa-money'></i> <span>السعر : </span>{{ $one->price }}</li>
                                        <li><i class='fa fa-map-marker'></i> <span> العنوان : </span>{{ $one->address_ar }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- featured-item end-->
                        </div>
                    @endforeach
                    
                </div><!-- row end -->
            </div>
        </section>
        <!--portfolio-section end-->

        <!--client logo start-->
        <section id="H-video" class="ttm-row bg-img2 res-1199-mt-0 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" row-title text-center res-991-pt-0">
                            <div class="ttm-video-btn btn-size-sm mb-55 mt-30">
                                <a class="ttm-play-btn ttm_prettyphoto" href="https://youtu.be/MdLVzXf7v5E"><span class="ttm-btn-play"><i class="fa fa-play"></i></span></a>
                            </div>
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <h2 class="title">حلول مميزه</h2>
                                <h2 class="title">جميع  <strong>الخامات </strong></h2>
                                <p>كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجمو مرجع شكلي لهذه الأحرف...</p>
                            </div><!-- section title end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--client logo end-->

        <!--portfolio-section-->
        <section id="H-lastestproject" class="ttm-row scale-bg-top portfolio-section2">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <!-- section-title -->
                        <div class="section-title style2 clearfix">
                            <h2 class="title">أحدث المستلزمات</h2>
                            <div class="heading-seperator"><span></span></div>
                        </div><!-- section-title end -->
                    </div>
                    <div class="col-lg-6 col-md-12 controllBTN">
                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right" href="{{ url("supplies") }}">الكل</a>
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right js-filter-two btn-two-2" data-supplier="used">مستعمل</a>
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right js-filter-two activebtn btn-two-1" data-supplier="new">جديد</a>
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0  new-filterable-two" data-supplier="new">
                    
                    @foreach ($data['new_supplies'] as $one)                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="featured-item ttm-portfolio-view-topimage">
                                <div class="featured-portfolio-item ttm-item-view-topimage">
                                    <div class="featured-thumbnail">
                                        <a href="{{ generateURL("supplies", $one->id, $one->name_ar) }}"><img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"></a>
                                    </div>
                                </div>
                                <div class="content-post">
                                    <h2 class="title-post"><a href="{{ generateURL("supplies", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                    <ul class='machine-info'>
                                        <li><i class='fa fa-money'></i> <span>السعر : </span>{{ $one->price }}</li>
                                        <li><i class='fa fa-map-marker'></i> <span> العنوان : </span>{{ $one->address_ar }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0  used-filterable-two is-hidden" data-supplier="used">
                    
                    @foreach ($data['used_supplies'] as $one)                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="featured-item ttm-portfolio-view-topimage">
                                <div class="featured-portfolio-item ttm-item-view-topimage">
                                    <div class="featured-thumbnail">
                                        <a href="{{ generateURL("supplies", $one->id, $one->name_ar) }}"><img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"></a>
                                    </div>
                                </div>
                                <div class="content-post">
                                    <h2 class="title-post"><a href="{{ generateURL("supplies", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                    <ul class='machine-info'>
                                        <li><i class='fa fa-money'></i> <span>السعر : </span>{{ $one->price }}</li>
                                        <li><i class='fa fa-map-marker'></i> <span> العنوان : </span>{{ $one->address_ar }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- row end -->
            </div>
        </section>
        <!--portfolio-section end-->

        <!--portfolio-section-->
        <section id="H-lastestmatrilas" class="ttm-row scale-bg-top portfolio-section2">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <!-- section-title -->
                        <div class="section-title style2 clearfix">
                            <h2 class="title">الخامات</h2>
                            <div class="heading-seperator"><span></span></div>
                        </div><!-- section-title end -->
                    </div>
                    <div class="col-lg-6 col-md-12 controllBTN">
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-20 mb-20 res-991-mt-0 float-right activebtn" href="{{ url("materials") }}">الكل</a>
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0">

                    @foreach ($data['materials'] as $one)                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="featured-item ttm-portfolio-view-topimage">
                                <div class="featured-portfolio-item ttm-item-view-topimage">
                                    <div class="featured-thumbnail">
                                        <a href="{{ generateURL("materials", $one->id, $one->name_ar) }}"><img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"></a>
                                    </div>
                                </div>
                                <div class="content-post">
                                    <h2 class="title-post"><a href="{{ generateURL("materials", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h2>
                                    <ul class='machine-info'>
                                        <li><i class='fa fa-money'></i> <span>السعر : </span>{{ $one->price }}</li>
                                        <li><i class='fa fa-map-marker'></i> <span> العنوان : </span>{{ $one->address_ar }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- row end -->
                <!-- row -->
            </div>
        </section>
        <!--portfolio-section end-->

        <!-- team-section -->
        <section id="h-ourTeams" class="ttm-row team-section ttm-bgcolor-white">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <!-- section-title -->
                        <div class="section-title style2 clearfix">
                            <h2 class="title">الفنيين والمهندسين</h2>
                            <div class="heading-seperator"><span></span></div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row">
                    <div class="wrap-team team2-slide owl-carousel">

                        @foreach ($data['engineers'] as $one)                            
                            <div class="featured-item ttm-team-view-topimage">
                                <div class="featured-team-item ttm-item-view-topimage"> 
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"> 
                                    </div> 
                                </div>
                                <div class="content-post content-team-post">
                                    <div class="content-post-desc">
                                        <h5 class="title-post"><a href="{{ generateURL("engineers", $one->id, $one->name_ar) }}">{{ $one->name_ar }}</a></h5>
                                        <p class="category">{{ $one->address_ar }}</p>
                                        <div class="star-ratings">
                                            <ul class="rating sub-menu">
                                                @for ($i = 0; $i < $one->rate; $i++)
                                                    <li class="active"><i class="fa fa-star"></i></li>                                                    
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!-- team-section -->

    </div><!--site-main end-->
@endsection