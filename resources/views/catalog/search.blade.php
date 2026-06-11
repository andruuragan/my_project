@extends('layouts.main')

@section('content')
    <div class="container-1600">
    <div class="card p-3 mb-4 shadow-sm">
        <h5 class="mb-3">Фильтр товаров</h5>
        <form method="GET" action="{{ route('catalog.search') }}">

            <div class="row g-3">


                <div class="col-md-3" >
                    <input type="text" name="name" placeholder="Название" class="form-control mb-2">

                    <select name="type" class="form-control mb-2">
                        <option value="">Тип элемента (все)</option>
                        <option value="Труба">Труба</option>
                        <option value="Коліно 45°">Коліно 45°</option>
                        <option value="Коліно 90°">Коліно 90°</option>
                        <option value="Трійник 90°">Трійник 90°</option>
                        <option value="Трійник 45°">Трійник 45°</option>
                        <option value="Вольпер">Вольпер</option>
                        <option value="Грибок">Грибок</option>
                        <option value="Іскрогасник">Іскрогасник</option>
                        <option value="Регулятор тяги(Кагла)">Регулятор тяги(Кагла)</option>
                        <option value="Лійка">Лійка</option>
                        <option value="Окапник">Окапник</option>
                        <option value="Закінчення димоходу">Закінчення димоходу</option>
                        <option value="Перехід">Перехід</option>
                        <option value="Радіатор">Радіатор</option>
                        <option value="Ревізія">Ревізія</option>
                        <option value="Розета">Розета</option>
                        <option value="Сітка">Сітка</option>
                        <option value="Скоба">Скоба</option>
                        <option value="Криза">Криза</option>
                        <option value="Кронштейн">Кронштейн</option>
                        <option value="Розвантажувальна підставка">Розвантажувальна підставка</option>
                        <option value="Обжимний хомут">Обжимний хомут</option>
                        <option value="Хомут під розтяжки">Хомут під розтяжки</option>
                        <option value="Стіновий хомут">Стіновий хомут</option>
                        <option value="Монтажний хомут">Монтажний хомут</option>
                        <option value="Конус">Конус</option>
                        <option value="Термоґрибок">Термоґрибок</option>
                        <option value="Дека">Дека</option>
                        <option value="Заглушка">Заглушка</option>
                        <option value="Старт-сендвіч">Старт-сендвіч</option>
                        <option value="Труба-подовжувач">Труба-подовжувач</option>
                        <option value="Прохід">Прохід</option>
                        <option value="Відображувач">Відображувач</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="diameter" class="form-control mb-2">
                        <option value="">Диаметр (все)</option>
                        <option value="100">100</option>
                        <option value="110">110</option>
                        <option value="120">120</option>
                        <option value="125">125</option>
                        <option value="130">130</option>
                        <option value="140">140</option>
                        <option value="150">150</option>
                        <option value="160">160</option>
                        <option value="170">170</option>
                        <option value="180">180</option>
                        <option value="190">190</option>
                        <option value="200">200</option>
                        <option value="210">210</option>
                        <option value="220">220</option>
                        <option value="230">230</option>
                        <option value="240">240</option>
                        <option value="250">250</option>
                        <option value="260">260</option>
                        <option value="270">270</option>
                        <option value="280">280</option>
                        <option value="290">290</option>
                        <option value="300">300</option>
                        <option value="310">310</option>
                        <option value="320">320</option>
                        <option value="330">330</option>
                        <option value="350">350</option>
                        <option value="360">360</option>
                        <option value="370">370</option>
                        <option value="380">380</option>
                        <option value="400">400</option>
                        <option value="420">420</option>
                        <option value="450">450</option>
                        <option value="460">460</option>
                        <option value="500">500</option>
                        <option value="520">520</option>
                        <option value="860">860</option>
                        <option value="100/160">100/160</option>
                        <option value="110/180">110/180</option>
                        <option value="120/180">120/180</option>
                        <option value="130/200">130/200</option>
                        <option value="140/200">140/200</option>
                        <option value="150/220">150/220</option>
                        <option value="160/220">160/220</option>
                        <option value="180/250">180/250</option>
                        <option value="200/260">200/260</option>
                        <option value="220/280">220/280</option>
                        <option value="230/300">230/300</option>
                        <option value="250/320">250/320</option>
                        <option value="300/360">300/360</option>
                        <option value="350/420">350/420</option>
                        <option value="400/460">400/460</option>
                        <option value="500/560">500/560</option>
                        <option value="100/200">100/200</option>
                        <option value="120/220">120/220</option>
                        <option value="130/230">130/230</option>
                        <option value="140/240">140/240</option>
                        <option value="150/250">150/250</option>
                        <option value="160/260">160/260</option>
                        <option value="180/280">180/280</option>
                        <option value="200/300">200/300</option>
                    </select>

                    <select name="thickness" class="form-control mb-2">
                        <option value="">Толщина (все)</option>
                        <option value="0,5 мм">0,5 мм</option>
                        <option value="0,8 мм">0,8 мм</option>
                        <option value="1 мм">1 мм</option>
                        <option value="2 мм">2 мм</option>

                    </select>
                </div>


                <div class="col-md-3">

                    <select name="grade" class="form-control mb-2">
                        <option value="">Марка нерж. (все)</option>
                        <option value="304">304 AISI</option>
                        <option value="321">321 AISI</option>
                        <option value="201">201 AISI</option>
                        <option value="430">430 AISI</option>

                    </select>

                    <select name="chimneyType" class="form-control mb-2">
                        <option value="">Тип дымохода (все)</option>
                        <option value="Одностінний">Одностінний</option>
                        <option value="Термо">Термо</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <select name="casing" class="form-control mb-2">
                        <option value="">Кожух (все)</option>
                        <option value="н/н">н/н</option>
                        <option value="н/оц">н/оц</option>

                    </select>

                    <input type="number" name="price_to" placeholder="Цена до" class="form-control mb-2">
                </div>
        </div>

            <div class="d-flex flex-wrap gap-2 mt-3">
                <button class="btn btn-primary btn-icon">
                    <i class="bi bi-search"></i> Найти
                </button>
                <a href="{{ route('catalog.search') }}" class="btn btn-outline-danger btn-icon">Сброс</a>
                <a href="{{ route('catalog.index') }}" class="btn btn-secondary btn-icon">
                    <i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>

    <p>Найдено товаров: {{ $items->total() }}</p>
    <table class="table table-bordered">
        <tr>
            <th>Название</th>
            <th>Тип</th>
            <th>Толщина</th>
            <th>Марка нерж.(AISI)</th>
            <th>Диаметр</th>
            <th>Тип дымохода</th>
            <th>Кожух</th>
            <th>Картинка</th>
            <th>Цена</th>
        </tr>

        @foreach($items as $item)
            <tr>
                <td>
                    <a href="{{ route('admin.catalog.show', $item->id) }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->thickness }}</td>
                <td>{{ $item->grade }}</td>
                <td>{{ $item->diameter }}</td>
                <td>{{ $item->chimneyType }}</td>
                <td>{{ $item->casing == 'н' ? '-' : $item->casing }}</td>
                <td>@if($item->image)
                        <img src="{{ asset($item->image) }}"
                             style="width: 60px; height: 60px; object-fit: cover;">
                    @else
                        -
                    @endif</td>
                <td>{{ $item->price }}</td>
            </tr>
        @endforeach
    </table>
    {{$items->withQueryString()->links()}}
    </div>
@endsection
