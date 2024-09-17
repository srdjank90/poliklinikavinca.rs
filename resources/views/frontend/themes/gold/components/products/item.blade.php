<div class="single_product">
    <div class="product_thumb">
        <a class="primary_img" href="{{ route('frontend.product', $product->slug) }}"><img
                src="{{ $storageUrl }}{{ $product->files[0]->path }}" alt="" /></a>
        @if (isset($product->files[1]))
            <a class="secondary_img" href="{{ route('frontend.product', $product->slug) }}"><img
                    src="{{ $storageUrl }}{{ $product->files[1]->path }}" alt="" /></a>
        @endif
    </div>
    <div class="product_content">
        <div class="tag_cate">
            @foreach ($product->categories as $index => $category)
                @if ($index > 0)
                    <span>{{ $category->name }}</span>
                @endif
            @endforeach
        </div>
        <h2><a href="{{ route('frontend.product', $product->slug) }}">{{ $product->name }}</a></h2>
        @if ($product->price_avans && $product->price_avans != 0)
            <span class="current_price">Već od {{ number_format($product->price_avans, 2, ',', '.') }}
                {{ $currency }}</span>
        @else
            <span class="current_price">Već od {{ number_format($product->price, 2, ',', '.') }}
                {{ $currency }}</span>
        @endif

        <div class="product_hover w-100">
            <div class="action_links">
                <ul>
                    <li class="add_to_cart d-none"><a href="javascript:void(0)" data-product="{{ $product }}"
                            class="add-to-cart" title="Dodaj u korpu">Dodaj u korpu</a></li>
                    <li class="w-100"><a href="{{ route('frontend.product', $product->slug) }}"
                            class="w-100">Detaljnije</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
