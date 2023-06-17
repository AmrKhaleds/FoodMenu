    <section class="menu-3col-content">
        <div class="container">
            <section class="categories" id="categories" style="">
                <ul class="nav nav-pills" id="pills-tab" role="tablist" style="flex-wrap: nowrap;">
                    @foreach ($categories as $key => $category)
                        <li role="nav-link">
                            <a wire:click="category({{ $category->id }})">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
            <div class="row product tab-content">
                <div class="error-container" style="width: 100%;text-align: center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @isset($filteredProducts)
                    @foreach ($filteredProducts as $key => $category)
                        <div role="tabpanel" class="col-md-12 tab-pane fade {{ $key == 0 ? 'active show' : '' }}"
                            aria-labelledby="{{ \Str::snake($category->slug, '-') }}"
                            id="{{ \Str::snake($category->slug, '-') }}">
                            <!-- STARTERS -->
                            <div class="categ-name">
                                <h2>{{ $category->name }}</h2>
                                <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                                    alt="" title="" style="width: 100px" />
                            </div>
                            <div class="menu-holder row">
                                @foreach ($category->product as $product)
                                    @if ($product->status)
                                        <div class="menu-container offer-block-three col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-2">
                                            <div class="menu-image" style="position: relative;">
                                                {{-- <i class="far fa-heart heart-icon"></i> --}}
                                                @if ($product->offer)
                                                    <span class="sales">
                                                        {{ $product->offer->discount }}{{ $product->offer->discount_type == 'price' ? '-' : '%' }}
                                                    </span>
                                                @endif
                                                <img class="product-image"
                                                    src="{{ asset('storage/products/' . $product->photo) }}">
                                                @if($getContent->has($product->id))
                                                    <div class="quantity" style="transition: 0.2s ease-in-out">
                                                        <span class="increase" wire:click='increase({{ $product->id }})'>
                                                            <i class="bi bi-plus"></i>
                                                        </span>
                                                        <span class="quantity-counter">
                                                            <input type="text" class="counter-input" value="{{ $quantities[$product->id] ?? 1 }}" disabled>
                                                        </span>
                                                        <span class="decrease" wire:click='decrease({{ $product->id }})'>
                                                            <i class="bi bi-dash"></i>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="menu-post-desc" style="text-align: center;">
                                                <span class="menu-price" style="">{{ $product->name }}</span>
                                                <p class="menu-desc">{{ $product->desc }}</p>
                                                @if ($product->offer)
                                                <div class="offer" style="display: flex;justify-content: space-around; ">
                                                    <span class="menu-title" style="display: block;font-size: 18px">
                                                        <s>
                                                            {{ $product->price }}
                                                            EGP
                                                        </s>
                                                    </span>
                                                    <i class="bi bi-arrow-right"></i>
                                                    <span class="menu-title" style="display: block;font-size: 18px">
                                                        {{ $product->getDiscountPrice() }} EGP
                                                    </span>
                                                </div>
                                                @else
                                                    <span class="menu-title">
                                                        {{ $product->price }} EGP
                                                    </span>
                                                @endif
                                                <div class="menu-text">
                                                        {{-- {{ $item }} --}}
                                                        @if($getContent->has($product->id))
                                                            <button style="color: rgb(223, 78, 78);" wire:click='removeFromCart({{ $product->id }})' class="add-to-cart"> حذف من السلة
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        @else
                                                            <button wire:click='addToCart({{ $product->id }})' class="add-to-cart">اضف الى السلة
                                                                <i class="bi bi-cart"></i>
                                                            </button>
                                                        @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
        <a id="order" title="أضغط للطلب" href="{{ route('checkout') }}" style="cursor: pointer">
            <div class="total-cost">
                <span id="totalCost">{{ $subTotal }}</span> EGP : اطلب الأن
                <span>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="cartItemCount">{{ count($getContent) }}</span>
                </span>
            </div>
        </a>
        <div class="taps">
            <a href="{{ route('checkout') }}" class="taps" id="next" style="cursor: pointer">
                اطلب الأن
            </a>
        </div>
    </section>