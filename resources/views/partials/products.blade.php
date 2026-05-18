<div id="productsWrapper">
<div class="row">

    @forelse($catalogs as $catalog)

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

            <div class="card product-card shadow-sm h-100">

                <div class="position-relative product-image-wrapper">

                    <img src="{{ Storage::url($catalog->image) }}"
                         class="card-img-top product-image"
                         alt="{{ $catalog->name }}"
                         loading="lazy">

                    <div class="product-icons">

                        <button type="button" class="icon-btn wishlist-btn">
                            <i class="bi bi-heart"></i>
                        </button>

                        <div class="right-icons">

                            <button type="button"
                                    class="icon-btn open-image"
                                    data-image="{{ Storage::url($catalog->image) }}">
                                <i class="bi bi-search"></i>
                            </button>

                            <a href="{{ route('catalog.public.show', $catalog->id) }}"
                               class="icon-btn">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body d-flex flex-column">

                    <h6 class="product-title">{{ $catalog->name }}</h6>

                    <div class="product-specs">
                        Ø{{ $catalog->diameter }} • {{ $catalog->thickness }} • AISI {{ $catalog->grade }}
                    </div>

                    <div class="product-price price-divider">
                        <span class="item-price" data-price="{{ $catalog->price }}">
                            {{ number_format($catalog->price, 0, '.', ' ') }}
                        </span>
                        грн
                    </div>

                    <div class="total-price mb-2">
                        <span class="text-muted">Сума:</span>
                        <strong class="total-sum">
                            {{ number_format($catalog->price, 0, '.', ' ') }}
                        </strong>
                        грн
                    </div>

                    <form class="add-to-cart-form"
                          action="{{ route('cart.add', $catalog->id) }}"
                          method="POST">
                        @csrf

                        <div class="quantity-box">

                            <button type="button" class="qty-btn minus">−</button>

                            <input type="number"
                                   name="qty"
                                   value="1"
                                   min="1"
                                   class="qty-input qty-value">

                            <button type="button" class="qty-btn plus">+</button>

                        </div>

                        <button class="add-cart-btn mt-3">
                            У кошик
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty
        <div class="col-12 text-center">
            <p>Товари не знайдені</p>
        </div>
    @endforelse

</div>



<div class="d-flex justify-content-center mt-4">
    {{ $catalogs->links() }}
</div>


</div>
