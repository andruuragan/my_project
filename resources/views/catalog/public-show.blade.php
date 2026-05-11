@extends('layouts.main')

@section('content')

    <h3 class="mb-3">{{ $catalog->name }}</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">




        <tr>
            <th>Тип</th>
            <td>{{ $catalog->type }}</td>
        </tr>

        <tr>
            <th>Толщина</th>
            <td>{{ $catalog->thickness }}</td>
        </tr>

        <tr>
            <th>Марка нерж.(AISI)</th>
            <td>{{ $catalog->grade }}</td>
        </tr>

        <tr>
            <th>Диаметр</th>
            <td>{{ $catalog->diameter }}</td>
        </tr>


        <tr>
            <th>Тип дымохода</th>
            <td>{{ $catalog->chimneyType }}</td>
        </tr>
        <tr>
            <th>Кожух</th>
            <td> {{ $catalog->casing == 'н' ? '-' : $catalog->casing }}</td>
        </tr>

        <tr>
            <th>Цена</th>
            <td>{{ number_format($catalog->price, 0, '.', ' ') }} грн</td>
        </tr>


        <tr>
            <th>Картинка</th>
            <td class="text-center">
                @if($catalog->image)
                    <img src="{{ asset('storage/' . $catalog->image) }}"
                         style="max-width:200px; max-height:120px; height:auto; object-fit:cover; border-radius:8px;">
                @else
                    <span class="text-muted">Нет изображения</span>
                @endif
            </td>
        </tr>
        </table>
    </div>

    <div class="description-content">

        @if(optional($catalog->description))

            @php $id = $catalog->id; @endphp

            <ul class="nav nav-tabs flex-wrap" role="tablist">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ov">
                        Огляд
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#adv">
                        Переваги
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#usage">
                        Застосування
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#why">
                        Чому обирають нас
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#extra">
                        Додаткова інформація
                    </button>
                </li>

            </ul>

            <div class="tab-content mt-3">

                <div class="tab-pane fade show active" id="ov">
                    {!! $catalog->description->overview ?? '-' !!}
                </div>

                <div class="tab-pane fade" id="adv">
                    {!! $catalog->description->advantages ?? '-' !!}
                </div>

                <div class="tab-pane fade" id="usage">
                    {!! $catalog->description->usage ?? '-' !!}
                </div>

                <div class="tab-pane fade" id="why">
                    {!! $catalog->description->why_choose_us ?? '-' !!}
                </div>

                <div class="tab-pane fade" id="extra">
                    {!! $catalog->description->additional_info ?? '-' !!}
                </div>

            </div>

        @endif

    </div>

    <div class="d-flex align-items-center gap-2 mt-3">

        <a href="{{ route('shop.index') }}"
           class="btn btn-outline-secondary btn-sm shadow-sm">

            <i class="bi bi-arrow-left"></i>

            Повернутись до каталогу

        </a>

    </div>

@endsection
