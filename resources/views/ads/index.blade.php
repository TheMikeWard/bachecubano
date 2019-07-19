@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="h2 text-white">{{ isset($sub_category->name) ? $sub_category->name : $super_category->name }}</h1>
                    <h2 class="h6 text-white">{{ isset($sub_category->description) ? $sub_category->description : $super_category->description }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!--
    <ol class="breadcrumb">
    <li><a href="#">Home /</a></li>
    <li class="current">Listing</li>
    </ol>
-->

<!-- Main container Start -->
<div class="main-container section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-xs-12 page-sidebar">
                <aside>
                    <!-- Searcg Widget -->
                    <div class="widget_search">
                        <form role="search" id="search-form">
                            <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">
                            <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                        </form>
                    </div>
                    <!-- Categories Widget -->
                    <div class="widget categories">
                        <h4 class="widget-title">All Categories</h4>
                        <ul class="categories-list">
                            <li>
                                <a href="#">
                                    <i class="lni-dinner"></i>
                                    Hotel & Travels <span class="category-counter">(5)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-control-panel"></i>
                                    Services <span class="category-counter">(8)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-github"></i>
                                    Pets <span class="category-counter">(2)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-coffee-cup"></i>
                                    Restaurants <span class="category-counter">(3)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-home"></i>
                                    Real Estate <span class="category-counter">(4)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-pencil"></i>
                                    Jobs <span class="category-counter">(5)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni-display"></i>
                                    Electronics <span class="category-counter">(9)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Advertisement</h4>
                        <div class="add-box">
                            <img class="img-fluid" src="assets/img/img1.jpg" alt="">
                        </div>
                    </div>
                    {{ dump($sub_category) }}
                    {{ dump($ads) }}
                </aside>
            </div>
            <div class="col-lg-10 col-md-12 col-xs-12 page-content">
                <!-- Product filter Start -->
                <div class="product-filter">
                    <div class="short-name">
                        <span>Showing (1 - 12 products of 7371 products)</span>
                    </div>
                    <div class="Show-item">
                        <span>Show Items</span>
                        <form class="woocommerce-ordering" method="post">
                            <label>
                                <select name="order" class="orderby">
                                    <option selected="selected" value="menu-order">49 items</option>
                                    <option value="popularity">popularity</option>
                                    <option value="popularity">Average ration</option>
                                    <option value="popularity">newness</option>
                                    <option value="popularity">price</option>
                                </select>
                            </label>
                        </form>
                    </div>
                </div>
                <!-- Product filter End -->

                <!-- Adds wrapper Start -->
                <div class="adds-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show">
                            <div class="row">
                                @if($ads)
                                @foreach($ads as $ad)
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <div class="featured-box">
                                        <figure>
                                            <div class="icon">
                                                <i class="lni-heart"></i>
                                            </div>
                                            <a href="#"><img class="img-fluid" src="{{ ad_image_url($ad) }}" alt=""></a>
                                        </figure>
                                        <div class="feature-content">
                                            <div class="product">
                                                <a href="{{ ad_category_url($ad) }}"><i class="lni-{{ $ad->category->icon }}"></i> {{ $ad->category->description->name }}</a>
                                            </div>
                                            <h4><a href="{{ ad_url($ad) }}">{{ $ad->description->title }}</a></h4>
                                            <span>@if($ad->updated_at != null) {{ $ad->updated_at->diffForHumans() }} @endif</span>
                                            <ul class="address">
                                                <li>
                                                    <a href="#"><i class="lni-map-marker"></i> Avenue C, US</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="lni-user"></i> Maria Barlow</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="lni-package"></i> Used</a>
                                                </li>
                                            </ul>
                                            <div class="listing-bottom">
                                                <h3 class="price float-left">{{ ad_price($ad) }}</h3>
                                                <a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verificado</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!--<div id="list-view" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="featured-box">
                                        <figure>
                                            <div class="icon">
                                                <i class="lni-heart"></i>
                                            </div>
                                            <a href="#"><img class="img-fluid" src="assets/img/featured/img5.jpg" alt=""></a>
                                        </figure>
                                        <div class="feature-content">
                                            <div class="product">
                                                <a href="#"><i class="lni-folder"></i> Apple</a>
                                            </div>
                                            <h4><a href="ads-details.html">Apple Macbook Pro 13 Inch</a></h4>
                                            <span>Last Updated: 4 hours ago</span>
                                            <ul class="address">
                                                <li>
                                                    <a href="#"><i class="lni-map-marker"></i>Louis, Missouri, US</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="lni-alarm-clock"></i> May 18, 2018</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="lni-user"></i> Will Ernest</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="lni-package"></i> Brand New</a>
                                                </li>
                                            </ul>
                                            <div class="listing-bottom">
                                                <h3 class="price float-left">$450.00</h3>
                                                <a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i>
                                                    Verified Ad</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!-- Adds wrapper End -->

                <!-- Start Pagination -->
                <div class="pagination-bar">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- End Pagination -->

            </div>
        </div>
    </div>
</div>
<!-- Main container End -->

@push('script')
<script>
</script>
@endpush

@endsection