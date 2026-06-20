@extends('layouts.main')

@section('content')

<div class="container-1600 py-4">

    <h2 class="mb-4">Порівняння товарів</h2>

    <div class="mb-4">
    <a href="{{ route('shop.index') }}"
       class="btn btn-outline-secondary">
        ← До каталогу
    </a>
</div>

    @if($products->isEmpty())
        <div class="alert alert-warning">
            Немає товарів для порівняння
        </div>
    @else

       <div class="table-responsive compare-table-wrapper">

    <table class="table compare-table align-middle">

        <tbody>

            {{-- Фото --}}
            <tr>
                <th>Фото</th>

                @foreach($products as $product)
                    <td>
                        <img src="{{ $product->image }}"
                             class="img-fluid compare-image">
                    </td>
                @endforeach
            </tr>

            {{-- Название --}}
            <tr>
                <th>Назва</th>

                @foreach($products as $product)
                    <td class="fw-semibold">
                        {{ $product->name }}
                    </td>
                @endforeach
            </tr>

            {{-- Цена --}}
            <tr>
                <th>Ціна</th>

                @foreach($products as $product)
                    <td class="text-warning fw-bold">
                        {{ number_format($product->price, 0, '.', ' ') }} грн
                    </td>
                @endforeach
            </tr>

            {{-- Диаметр --}}
            <tr>
                <th>Діаметр</th>

                @foreach($products as $product)
                    <td>{{ $product->diameter }}</td>
                @endforeach
            </tr>

            {{-- Толщина --}}
            <tr>
                <th>Товщина</th>

                @foreach($products as $product)
                    <td>{{ $product->thickness }}</td>
                @endforeach
            </tr>

            {{-- Марка стали --}}
            <tr>
                <th>Марка сталі</th>

                @foreach($products as $product)
                    <td>AISI {{ $product->grade }}</td>
                @endforeach
            </tr>

             {{-- Утеплення --}}
           <tr>
    <th>Утеплення</th>

    @foreach($products as $product)
        <td>
            @if($product->chimneyType === 'Термо')
                <i class="bi bi-check-lg text-success fs-5"></i>
            @else
                —
            @endif
        </td>
    @endforeach
</tr>

 {{-- Тип кожуха  --}}
          <tr>
    <th>Тип кожуха</th>

    @foreach($products as $product)
        <td>
           @php
    $casing = $product->casing;

    if ($casing === 'одностіннй') {
        echo '&mdash;'; // Теперь здесь точно длинное тире
    } elseif ($casing === 'н/н') {
        echo 'нержавійка (AISI 201)';
    } elseif ($casing === 'н/оц') {
        echo 'оцинковка';
    } else {
        // Если пришло что-то другое, но оно короткое (типа "-"), принудительно заменим
        echo ($casing === '-') ? '&mdash;' : $casing;
    }
@endphp
        </td>
    @endforeach
</tr>

            {{-- Кнопки --}}
            <tr>
                <th>Дії</th>

                @foreach($products as $product)
                   <td>
    <div class="compare-actions">

        @auth
           <button type="button"
        class="btn btn-orange add-to-cart-btn"
        data-id="{{ $product->id }}"
        data-url="{{ route('cart.add', $product->id) }}"
        data-image="{{ $product->image }}">
    Купити
</button>
        @endauth

        <button class="btn btn-outline-danger remove-compare"
                data-id="{{ $product->id }}">
            Видалити
        </button>

    </div>
</td>
                @endforeach
            </tr>

        </tbody>

    </table>

</div>

                  

    @endif

</div>

<style>
    .btn-orange {
    background-color: #d97706;
    border-color: #d97706;
    color: #fff;
}

.btn-orange:hover {
    background-color: #b45309;
    border-color: #b45309;
}

/* СТАТУС "В ПРОЦЕССЕ / ЛЕТИТ В КОРЗИНУ" */
.btn-loading {
    background-color: #16a34a !important;
    border-color: #16a34a !important;
    color: #fff !important;
    box-shadow: none !important;
}

/* УБИРАЕМ БЕЛЫЕ ОВЕРЛЕИ BOOTSTRAP */
.btn-loading:focus,
.btn-loading:active,
.btn-loading:hover {
    background-color: #16a34a !important;
    border-color: #16a34a !important;
    color: #fff !important;
    box-shadow: none !important;
}

//==========================
.compare-table-wrapper {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,.06);
}

.compare-table {
    min-width: 900px;
    margin: 0;
}

.compare-table th {
    width: 220px;
    background: #f8fafc;
    font-weight: 700;
    position: sticky;
    left: 0;
    z-index: 2;
}

.compare-table td,
.compare-table th {
    padding: 16px;
    text-align: center;
    vertical-align: middle;
}

.compare-table tr:nth-child(even) {
    background: #fafafa;
}

.compare-image {
    max-height: 120px;
    object-fit: contain;
}
.compare-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
}

.compare-actions .btn {
    width: 120px;
}
@media (max-width: 768px) {
    .compare-table {
        min-width: 600px; /* Уменьшаем минимальную ширину, чтобы она влезала */
    }
    .compare-table th {
        width: 120px; /* Узкие заголовки на мобильных */
        font-size: 14px;
    }
    .compare-table td {
        font-size: 13px;
        padding: 10px;
    }
    .compare-image {
        max-height: 80px; /* Уменьшаем фото */
    }
    .compare-actions .btn {
        width: 90px; /* Кнопки поменьше */
        font-size: 12px;
    }
}
</style>
<script>

    function animateFlyToCart(imgElement) {
    if (!imgElement) return;

    const cartBtn =
        document.getElementById('main-nav-cart') ||
        document.querySelector('.cart-btn') ||
        document.getElementById('cartBtnContainer') ||
        document.querySelector('[href*="cart"]') ||
        document.querySelector('.bi-cart3')?.closest('a');

    const imgRect = imgElement.getBoundingClientRect();

    const cartRect = cartBtn
        ? cartBtn.getBoundingClientRect()
        : { left: window.innerWidth - 60, top: 20, width: 40, height: 40 };

    const clone = imgElement.cloneNode(true);

    clone.style.position = 'fixed';
    clone.style.zIndex = '99999';
    clone.style.pointerEvents = 'none';
    clone.style.objectFit = 'contain';
    clone.style.background = '#fff';
    clone.style.borderRadius = '12px';
    clone.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
    clone.style.transition = 'transform 0.85s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.85s ease';

    clone.style.left = `${imgRect.left}px`;
    clone.style.top = `${imgRect.top}px`;
    clone.style.width = `${imgRect.width}px`;
    clone.style.height = `${imgRect.height}px`;

    document.body.appendChild(clone);

    requestAnimationFrame(() => {
        const mobile = window.innerWidth < 992;

        const mobileOffsetX = mobile ? 370 : 0;
        const mobileOffsetY = mobile ? 65 : 0;

       const offsetX = -100; // левее


const targetX =
    cartRect.left +
    cartRect.width / 2 -
    (imgRect.width * 0.1) / 2 +
    mobileOffsetX +
    offsetX;

       const offsetY = mobileOffsetY - 70; // поднимаем вверх

const targetY =
    cartRect.top +
    cartRect.height / 2 -
    (imgRect.height * 0.1) / 2 +
    offsetY;

        clone.style.transform =
            `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.1)`;

        clone.style.opacity = '0.1';
    });

    setTimeout(() => {
        clone.remove();

        if (cartBtn) {
            cartBtn.style.transition = 'transform 0.15s ease';
            cartBtn.style.transform = 'scale(1.2)';

            setTimeout(() => {
                cartBtn.style.transform = 'none';
            }, 150);
        }
    }, 850);
}

document.addEventListener('DOMContentLoaded', function () {

    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.remove-compare');
        if (!btn) return;

        let list = JSON.parse(localStorage.getItem('compareList') || '[]')
            .map(String);

        const id = String(btn.dataset.id);

        list = list.filter(x => x !== id);

        localStorage.setItem('compareList', JSON.stringify(list));

        // можно без reload (лучше UX)
        window.location.href = '/compare?ids=' + list.join(',');
    });

});
document.addEventListener('click', function (e) {

    const btn = e.target.closest('.add-to-cart-btn');
    if (!btn) return;

    const url = btn.dataset.url;

    // картинка ДО запроса
  const currentTd = btn.closest('td');

const columnIndex = currentTd.cellIndex;

const imageRow = document.querySelector('.compare-table tbody tr:first-child');

const productImg = imageRow.cells[columnIndex]?.querySelector('img');

if (productImg) {
    animateFlyToCart(productImg);
}
    // 🔥 состояние загрузки
    btn.classList.add('btn-loading');
    btn.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({ qty: 1 })
    })
    .then(res => {
        if (!res.ok) throw new Error('Server error');
        return res.json();
    })
    .then(data => {

        btn.textContent = 'У кошику';

        // 🔥 оновлення лічильників
        ['cartCountMobile','cartCountDesktop','cartCount']
        .forEach(id => {
            const el = document.getElementById(id);
            if (el) el.textContent = data.count;
        });

        ['cartTotalMobile','cartTotalDesktop','cartTotalNav']
        .forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = new Intl.NumberFormat('uk-UA').format(data.total);
            }
        });
    })
    .catch(() => {
        alert('Помилка додавання в кошик');
    })
    .finally(() => {
        btn.classList.remove('btn-loading'); // 🔥 ВАЖЛИВО
        btn.disabled = false;
    });

});
</script>
@endsection
