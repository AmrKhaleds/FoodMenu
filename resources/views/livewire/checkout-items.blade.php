@if (count($items) > 0)
<div class=" col-md-4 ">
    <ul class="orderItems">
        @foreach ($items as $item)
            <li class="item">
                <div class="right">
                    <img class="cart-photo"
                        src="{{ asset('storage/products/' . $item['attributes']['photo']) }}"
                        alt="">
                </div>
                <div class="cart-info">
                    <span class="product-name">
                        {{ $item['name'] }}
                    </span>
                    <span class="product-price">
                        {{ $item['price'] }} EGP
                    </span>
                    <span class="product-quantity">
                        {{ $item['quantity'] }} وحدة
                    </span>
                </div>
                <button class="remove" wire:click='remove({{ $item['id'] }})'>x</button>
            </li>
        @endforeach
    </ul>
    <div style="text-align: center;margin-bottom: 20px;">
        <span>
            <span class="" id="totalCostCheckout"></span>{{ $total }} EGP
            <!-- <span class="menu-dots"></span> -->
            <span class="menu-price">إجمالى الطلبات</span>
        </span>
    </div>
</div>
@else
<div class="no-products orderItems col-md-12"
    style="width: 100%;color: rgb(253, 87, 87);text-align: center;margin-bottom: 20px;">
    <span>* لا يوجد منتجات فى السلة *</span>
    <br>
    <span>يرجى اختيار على الأقل منتج واحد لإكمال الطلب</span>
</div>
@endisset
