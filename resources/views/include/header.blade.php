<div class="search">
    <div class="search__form">
        <form class="search-bar__form" action="#">
            <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
            <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
        </form>
        <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
    </div>
</div>
<!--End Search Form Drawer-->
<!--Top Header-->
<div class="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                {{-- <div class="currency-picker">
                    <span class="selected-currency">USD</span>
                    <ul id="currencies">
                        <li data-currency="INR" class="">INR</li>
                        <li data-currency="GBP" class="">GBP</li>
                        <li data-currency="CAD" class="">CAD</li>
                        <li data-currency="USD" class="selected">USD</li>
                        <li data-currency="AUD" class="">AUD</li>
                        <li data-currency="EUR" class="">EUR</li>
                        <li data-currency="JPY" class="">JPY</li>
                    </ul>
                </div>
                <div class="language-dropdown">
                    <span class="language-dd">English</span>
                    <ul id="language">
                        <li class="">German</li>
                        <li class="">French</li>
                    </ul>
                </div> --}}
                <p class="phone-no"><i class="anm anm-phone-s"></i> +92 (301) 3999849</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                <div class="text-center"><p class="top-header_middle-text"> All over Pakistan Express Shipping</p></div>
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline">
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Create Account</a></li>
                    {{-- <li><a href="wishlist.html">Wishlist</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Top Header-->
<!--Header-->
<div class="header-wrap animated d-flex">
    <div class="container-fluid">        
        <div class="row align-items-center">
            <!--Desktop Logo-->
                {{-- col-md-1 col-lg-1 --}}
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="/">
                    <img src="{{ asset('user/assets/images/Photo_1637504990619.png') }}" alt="Sindh Jewellers Shop Logo" title="Sindh Jewellers Shop Logo" />
                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                  <ul id="siteNav" class="site-nav medium center hidearrow">
                    @foreach ($categories as $value)  
                      <li class="lvl1 parent dropdown"><a href="#">{{ $value->category }} <i class="anm anm-angle-down-l"></i></a>
                        <ul class="dropdown">
                          @foreach ($subcategory as $sub)
                          @if($value->id == $sub->parent_category_id)
                          <li><a href="products?category_id={{ $sub->id}}" class="site-nav">{{ $sub->category }}</a></li>
                          @endif
                          @endforeach
                        </ul>
                      </li>
                    @endforeach
                  </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('user/assets/images/Photo_1637504990619.png') }}" alt="Sindh Jewellers Shop Logo" title="Sindh Jewellers Shop Logo" />
                    </a>
                </div>
            </div>
                @php 
                    $total = 0;
                    $charges = 0; 
                @endphp
                @if(session('cart'))
            <div class="col-6 col-sm-3 col-md-3 col-lg-2">
                <div class="site-cart">
                    <a href="#;" class="site-header__cart" title="Cart">
                        <i class="icon anm anm-bag-l"></i>
                        <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{ count((array) session('cart')) }}</span>
                    </a>
                    <!--Minicart Popup-->
                    <div id="header-cart" class="block block-cart">
                        <ul class="mini-products-list"> 
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'];
                                    $charges += $details['shipping_charges']; 
                                @endphp
                            <li class="item">
                                <a class="product-image" href="#">
                                    <img src="{{ asset('img/'.$details['image']) }}" alt="Product image" title="" />
                                </a>
                                <div class="product-details">
                                    <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                    <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                    <a class="pName" href="cart">{{ $details['name'] }}</a>
                                    <div class="variant-cart">{{ $details['shipping_charges'] }}</div>
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <span class="label">Qty:</span>
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="{{ $details['quantity']}}" class="product-form__input qty">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="priceRow">
                                        <div class="product-price">
                                            <span class="money">{{ "RS. ".$details['price'] * $details['quantity'] }}</span>
                                        </div>
                                     </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="total">
                            <div class="total-in">
                                <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">{{ 'RS. '.$total }}</span></span>
                            </div>
                             <div class="buttonSet text-center">
                                <a href="cart" class="btn btn-secondary btn--small">View Cart</a>
                                <a href="checkout" class="btn btn-secondary btn--small">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!--End Minicart Popup-->
                </div>
                <div class="site-header__search">
                    <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!--End Header-->
<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
    <ul id="MobileNav" class="mobile-nav">
      @foreach ($categories as $value)
          <li class="lvl1 parent megamenu"><a href="#">{{ $value->category }} <i class="anm anm-plus-l"></i></a>
      <ul>
        @foreach ($subcategory as $sub)
          @if($value->id == $sub->parent_category_id)
          <li><a href="products?category_id={{ $sub->id}}" class="site-nav">{{ $sub->category }}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
    @endforeach
  </ul>
</div>