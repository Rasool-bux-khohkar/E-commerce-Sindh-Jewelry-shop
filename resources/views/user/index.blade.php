@extends('../layout.master')

@section('content')

<div class="section imgBanners">
    <div class="container">
        <div class="imgBnrOuter">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2 heading-font">New Collections</h2>
                        <p>Modern and classic designs to suit every style.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 pl-0">
                    <div class="inner btmleft">
                        <a href="products?category_id=6">
                            <img data-src="{{ asset('user/assets/images/jewellery-collection1.jpg') }}" src="{{ asset('user/assets/images/collection/jewellery-collection1.jpg') }}" alt="" class="blur-up lazyload"/>
                            <span class="ttl">LAYERS OF DELICATE DESIRE</span>
                        </a>
                    </div>    	
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 pr-0">
                    <div class="inner center">
                        <a href="products?category_id=7">
                            <img data-src="{{ asset('user/assets/images/jewellery-collection2.jpg') }}" src="{{ asset('user/assets/images/collection/jewellery-collection2.jpg') }}" alt="" class="blur-up lazyload"/>
                            <span class="ttl">GIFT FOR HER</span>
                        </a>
                    </div>  
                    <div class="inner btmright mt-4">
                        <a href="products?category_id=4">
                            <img data-src="{{ asset('user/assets/images/jewellery-collection3.jpg') }}" src="{{ asset('user/assets/images/collection/jewellery-collection3.jpg') }}" alt="" class="blur-up lazyload"/>
                            <span class="ttl">FOR YOUR LOVED ONE</span>
                        </a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Small Banners-->

<!--Hot picks-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2 heading-font">Hot Pick</h2>
                    <p>Modern and classic designs to suit every style.</p>
                </div>
            </div>
        </div>
        <div class="productSlider-style2 grid-products">
            @foreach ($products as $product)
            <div class="col-12 item">
                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <a href="#" class="grid-view-item__link">
                        <!-- image -->
                        <img class="primary blur-up lazyload" data-src="{{ asset('img/'.$product->image_path) }}" src="{{ asset('img/'.$product->image_path) }}" alt="image" title="product">
                        <!-- End image -->
                        <!-- Hover image -->
                        @foreach ($product_images as $image)
                            @if($product->product_id == $image->product_id)
                                <img class="hover blur-up lazyload" data-src="{{ asset('img/'.$image->image_path) }}" src="{{ asset('img/'.$image->image_path) }}" alt="image" title="product" />
                                @break
                            @endif
                        @endforeach
                        <!-- End hover image -->
                    </a>
                    <!-- end product image -->
                    <!-- Start product button -->
                    <form class="variants add" action="#" onclick="window.location.href='{{ route('add-to-cart', $product->product_id) }}'"method="post">
                        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                    </form>
                    {{-- <div class="button-set">
                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                            <i class="icon anm anm-search-plus-r"></i>
                        </a>
                        <div class="wishlist-btn">
                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                <i class="icon anm anm-heart-l"></i>
                            </a>
                        </div>
                        <div class="compare-btn">
                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                <i class="icon anm anm-random-r"></i>
                            </a>
                        </div>
                    </div> --}}
                    <!-- end product button -->
                </div>
                <!-- end product image -->
                <!--start product details -->
                <div class="product-details text-center">
                    <!-- product name -->
                    <div class="product-name">
                        <a href="product-detail?product_id={{ $product->product_id }}">{{$product->title}}</a>
                    </div>
                    <!-- End product name -->
                    <!-- product price -->
                    <div class="product-price">
                        <span class="price">{{"Rs ".$product->price}}</span>
                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--End Hot picks-->

   <div class="section collection-box-style1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Trendy necklace</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            @foreach($trend_products as $trend_product)
                <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                    <div class="collection-grid-item">
                        <a href="product-detail?product_id={{ $trend_product->product_id }}" class="collection-grid-item__link">
                            <img data-src="{{ asset('img/'.$trend_product->image_path) }}" src="{{ asset('img/'.$trend_product->image_path) }}" alt="Hot" class="blur-up lazyload"/>
                        </a>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="{{ asset('user/assets/images/collection/jewellery-collection5.jpg') }}" src="assets/images/collection/jewellery-collection5.jpg" alt="Denim" class="blur-up lazyload"/>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="{{ asset('user/assets/images/collection/jewellery-collection6.jpg') }}" src="assets/images/collection/jewellery-collection6.jpg" alt="Summer" class="blur-up lazyload"/>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
   </div>

<!--Store Feature-->
<div class="store-feature section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="display-table store-info">
                    <li class="display-table-cell">
                        <i class="icon anm anm-truck-l"></i>
                        <h5>Free Shipping All Over Pakistan</h5>
                        {{-- <span class="sub-text">
                            Diam augue augue in fusce voluptatem
                        </span> --}}
                    </li>
                      <li class="display-table-cell">
                        <i class="icon anm anm-money-bill-ar"></i>
                        <h5>Money Back Guarantee</h5>
                        {{-- <span class="sub-text">
                            Use this text to display your store information
                        </span> --}}
                      </li>
                      <li class="display-table-cell">
                        <i class="icon anm anm-comments-l"></i>
                        <h5>24/7 Help Center</h5>
                        {{-- <span class="sub-text">
                            Use this text to display your store information
                        </span> --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Store Feature-->

<!--Hero Banner With Text-->
<div class="section hero hero--medium hero__overlay bg-size">
    <img class="bg-img" src="{{ asset('user/assets/images/jewellery-parallax.jpg') }}" alt="" />
    <div class="hero__inner">
        <div class="container">
            <div class="wrap-text right text-medium font-bold">
                <h2 class="h2 mega-title">MAKE IT PERSONAL</h2>
                <div class="rte-setting mega-subtitle">Make your jewels even more meaningful by <br> personalizing them with a name, monogram, coordinates, date,<br>  or a special message.</div>
                <a href="#" class="btn">personalize Now</a>
            </div>
        </div>
    </div>
</div>
<!--End Hero Banner With Text--> 

@endsection

