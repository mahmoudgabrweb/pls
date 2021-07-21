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
                                <a title="Homepage" href="{{ url("/") }}"><i class="fa fa-home"></i>&nbsp;&nbsp;الرئيسيه</a>
                            </span>
                            <span class="ttm-bread-sep"> &nbsp; ⁄ &nbsp;</span>
                            <span><span>الفنيين</span></span>
                        </div>  
                    </div>
                </div>  
            </div>
        </div>                    
    </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">

        <!-- ttm-sidebar -->
        <section id="ourTeams-data" class="ttm-sidebar ttm-bgcolor-grey team-section clearfix">
            <div class="container-fluid">
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0 wrap-team">

                    @foreach ($records as $one)                        
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="featured-item ttm-team-view-topimage">
                                <div class="featured-team-item ttm-item-view-topimage"> 
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="{{ Storage::url($one->image) }}" alt="{{ $one->name_ar }}"> 
                                    </div> 
                                </div>
                                <div class="content-post content-team-post">
                                    <div class="content-post-desc">
                                        <h5 class="title-post"><a href="javascript:;">{{ $one->name_ar }}</a></h5>
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
                        </div>
                    @endforeach

                </div><!-- row end -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        {{ $records->links() }}
                    </div>
                </div>
            </div>
        </section>
        <!-- ttm-sidebar end -->
        
    </div><!--site-main end-->    
@endsection