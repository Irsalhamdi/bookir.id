@php
    $hot_deals = App\Models\Product::where('hot_deals', '1')->where('discount', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
@endphp

    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
        <h3 class="section-title">hot deals</h3>
        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            @foreach ($hot_deals as $hot_deal)
                    
            <div class="item">
                <div class="products">

                    <div class="hot-deal-wrapper">

                        <div class="image"> 
                            <img src="{{ asset($hot_deal->thumbnail) }}">
                        </div>

                        @php
                        $amount = $hot_deal->price - $hot_deal->discount;
                        $discount = ($amount / $hot_deal->price) * 100;
                        @endphp

                        @if ($hot_deal->discount == NULL)
                            <div class="tag new">
                            <span>new</span>
                            </div>
                        @else
                            <div class="sale-offer-tag">
                            <span>{{ round($discount) }}%<br>off</span>
                            </div>
                        @endif

                        <div class="timing-wrapper">
                        <div class="box-wrapper">
                            <div class="date box"> 
                            <span class="key">120</span> <span class="value">DAYS</span> 
                            </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="hour box"> 
                            <span class="key">20</span> <span class="value">HRS</span>
                            </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="minutes box"> 
                            <span class="key">36</span> <span class="value">MINS</span>
                            </div>
                        </div>
                        <div class="box-wrapper hidden-md">
                            <div class="seconds box"> 
                            <span class="key">60</span> <span class="value">SEC</span> 
                            </div>
                        </div>
                        </div>

                    </div>
                    
                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                        <a href="{{ route('product.details', $hot_deal->id) }}">
                        {{ $hot_deal->name }}
                        </a>
                    </h3>
                        <div class="rating rateit-small"></div>
                        @if ($hot_deal->discount == NULL)
                        <span class="price"> ${{ $hot_deal->price }} </span>                         
                        @endif
                        <div class="product-price"> 
                        <span class="price"> ${{ $hot_deal->discount }} </span>  
                        <span class="price-before-discount">${{ $hot_deal->price }}</span>
                        </div>
                    </div>

                    </div>
                </div>

            @endforeach

        </div>
    </div>