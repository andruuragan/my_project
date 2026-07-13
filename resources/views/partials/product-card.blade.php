 <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card product-card shadow-sm h-100 border-0 rounded-4 overflow-hidden position-relative bg-white">

                    {{-- ЗОБРАЖЕННЯ ТА КНОПКИ ВЕРХУ --}}
                    <div class="position-relative product-image-wrapper bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                        
                        {{-- ВИПРАВЛЕНО: Перевірка на наявність картинки --}}
                        <img src="{{ $catalog->image ? asset($catalog->image) : asset('images/no-image.svg') }}"
     width="600"
     height="600"
     class="product-image"
     alt="{{ $catalog->name }}"
     loading="lazy"
     decoding="async"
     style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                        <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                          <div class="left-icons d-flex flex-column gap-2">

    {{-- wishlist (оставляем как есть с auth внутри) --}}
    @auth
        <button type="button"
                class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                data-id="{{ $catalog->id }}">
            @if(Auth::user()->wishlists->contains($catalog->id))
                <i class="bi bi-heart-fill text-danger"></i>
            @else
                <i class="bi bi-heart text-muted"></i>
            @endif
        </button>
    @else
        <button type="button"
                class="icon-btn guest-wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                data-bs-toggle="modal"
                data-bs-target="#loginModal">
            <i class="bi bi-heart text-muted"></i>
        </button>
    @endauth


    {{-- ✅ СРАВНЕНИЕ ВСЕГДА ВИДИМО --}}
   <button type="button"
    class="icon-btn compare-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
    data-id="{{ $catalog->id }}"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    data-bs-custom-class="custom-orange-tooltip"
    data-bs-title="Порівняти"
    style="width:36px;height:36px;">

    <svg xmlns="http://www.w3.org/2000/svg"
         width="18"
         height="18"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round">
      <path d="m16 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="m2 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="M7 21h10"/>
      <path d="M12 3v18"/>
      <path d="M3 7h18"/>
      <path d="M16 7a4 4 0 0 0-8 0"/>
    </svg>

</button>

</div>
                            

                           {{-- Змінено: flex-column для вертикального стеку --}}
<div class="right-icons d-flex flex-column gap-2">
    
    {{-- Кнопка "Детальніше" тепер ПЕРША --}}
    <a href="{{ route('catalog.public.show', $catalog->id) }}"
       class="icon-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
       data-bs-toggle="tooltip"
       data-bs-placement="left"
       data-bs-custom-class="custom-orange-tooltip"
       data-bs-title="Детальніше про товар"
       style="width: 36px; height: 36px;">
        <i class="bi bi-box-arrow-up-right text-muted"></i>
    </a>

    {{-- Кнопка "Лупа" тепер ДРУГА (під нею) --}}
    <button type="button"
            class="icon-btn open-image rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
            data-bs-toggle="tooltip"
            data-bs-placement="left"
            data-bs-custom-class="custom-orange-tooltip"
            data-bs-title="Збільшити фото"
            style="width: 36px; height: 36px;"
            data-image="{{ $catalog->image ? asset($catalog->image) : asset('images/no-image.svg') }}">
        <i class="bi bi-search text-muted"></i>
    </button>
</div>
                        </div>
                    </div>

                    {{-- ОПИС ТА ХАРАКТЕРИСТИКИ --}}
                    <div class="card-body d-flex flex-column p-3">
                        <h6 class="mb-2">
    <a href="{{ route('catalog.public.show', $catalog->id) }}" 
       class="product-title-link fw-semibold text-decoration-none" 
       style="display: block; line-height: 1.3;">
        {{ $catalog->name }}
    </a>
</h6>

                        <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.08) 20%, rgba(0,0,0,0.08) 80%, rgba(0,0,0,0));"></div>

                        <div class="product-specs d-flex flex-wrap gap-2 mt-2 mb-3">
      @if(!empty($catalog->diameter) && $catalog->diameter != 0)
    <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill">
        @if($catalog->type !== 'Труба овальна')
            Ø
        @endif
        {{ $catalog->diameter }}
    </span>
@endif
        <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill">{{ $catalog->thickness }}</span>
        <span class="badge bg-warning text-white border-0 rounded-pill">AISI {{ $catalog->grade }}</span>
    </div>
                        {{-- ЦІНА --}}
                        <div class="mt-auto pt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="price-badge px-3 py-1 rounded-3 d-inline-flex align-items-baseline">
                                    <span class="fs-4 fw-bold item-price" data-price="{{ $catalog->price }}">
                                        {{ number_format($catalog->price, 0, '.', ' ') }}
                                    </span>
                                    <span class="currency-label fw-bold ms-1">₴</span>
                                </div>
                            </div>

                            <div class="total-price-box mb-2" style="font-size: 0.82rem; height: 18px; opacity: 0; transition: opacity 0.2s ease;">
                                <span class="text-muted">Разом:</span>
                                <strong class="total-sum text-muted-dark">{{ number_format($catalog->price, 0, '.', ' ') }}</strong>
                                <span class="fw-medium text-muted-dark">₴</span>
                            </div>
                        </div>

                        {{-- КНОПКА КУПИТИ / КІЛЬКІСТЬ --}}
                        <form class="add-to-cart-form" action="{{ route('cart.add', $catalog->id) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center justify-content-between gap-2 mt-1">
                                <div class="input-group rounded-pill border border-secondary-subtle overflow-hidden bg-light custom-qty-group" style="width: 105px; height: 40px;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn minus" style="width: 34px;">−</button>
                                    <input type="number"
                                           name="qty"
                                           value="1"
                                           min="1"
                                           class="form-control border-0 text-center p-0 fw-bold qty-input qty-value bg-transparent"
                                           style="pointer-events: none; font-size: 0.95rem; -moz-appearance: textfield;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn plus" style="width: 34px;">+</button>
                                </div>

                                @auth
                                    <button type="submit" 
                                            class="btn-cart-circle add-cart-btn shadow-sm d-flex align-items-center justify-content-center" 
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            data-bs-custom-class="custom-orange-tooltip"
                                            data-bs-title="Додати у кошик">
                                        <i class="bi bi-cart3 fs-5"></i>
                                    </button>
                                @else
                                    <div data-bs-toggle="tooltip"
                                         data-bs-placement="top"
                                         data-bs-custom-class="custom-orange-tooltip"
                                         data-bs-title="Авторизуйтесь для додавання товару"
                                         style="width: 44px; height: 44px;">
                                        <button type="button" 
                                                class="btn-cart-circle add-cart-btn shadow-sm d-flex align-items-center justify-content-center" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                            <i class="bi bi-cart3 fs-5"></i>
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        