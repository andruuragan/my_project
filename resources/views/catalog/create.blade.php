@extends('layouts.main')
@section('content')
<div class="container-1600">
    <div class="card p-3 mb-4 shadow-sm">
        <h5>Створити товар</h5>

        <form action="{{ route('catalog.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Назва</span>
                        <input type="text" 
                               id="element_name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               class="form-control" 
                               placeholder="Назва"
                               autocomplete="off">
                    </label>
                </div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_type">
        <span class="d-block mb-2">Тип</span>
        <select id="element_type" name="type" class="form-select" autocomplete="off">
            <option value="">Все</option>
            @php
                $types = [
                    'Труба', 'Труба овальна','Коліно 45°', 'Коліно 90°', 'Трійник 90°', 'Трійник 45°',
                    'Волпер', 'Грибок', 'Іскрогасник', 'Регулятор тяги(Кагла)', 'Лійка',
                    'Окапник', 'Закінчення димоходу', 'Перехід', 'Радіатор', 'Ревізія',
                    'Розета', 'Сітка', 'Скоба', 'Криза', 'Кронштейн',
                    'Розвантажувальна підставка', 'Обжимний хомут', 'Хомут під розтяжки',
                    'Стіновий хомут', 'Монтажний хомут', 'Конус', 'Термоґрибок',
                    'Дека', 'Заглушка', 'Старт-сендвіч', 'Труба-подовжувач', 'Прохід', 'Відображувач'
                ];
            @endphp
            @foreach($types as $type)
                <option value="{{ $type }}" @selected(old('type') == $type)>{{ $type }}</option>
            @endforeach
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_thickness">
        <span class="d-block mb-2">Товщина нерж.</span>
        <select id="element_thickness" name="thickness" class="form-select" autocomplete="off">
            <option value="">Оберіть товщину</option>
            @php
                // Убрали лишний пробел у '0,5' для чистоты данных
                $thicknesses = ['0,5', '0,8', '1', '2'];
            @endphp
            @foreach($thicknesses as $t)
                @php
                    // Создаем готовую строку, например: "1 мм"
                    $fullValue = trim($t) . ' мм';
                @endphp
                <option value="{{ $fullValue }}" @selected(old('thickness') == $fullValue)>
                    {{ $fullValue }}
                </option>
            @endforeach
        </select>
    </label>
</div>

               <div class="col-md-6">
    <label class="form-label w-100" for="element_grade">
        <span class="d-block mb-2">Марка нерж.</span>
        <select id="element_grade" name="grade" class="form-select" autocomplete="off">
            <option value="">Оберіть марку стали</option>
            @php
                $grades = ['304', '321', '201', '430'];
            @endphp
            @foreach($grades as $g)
                <option value="{{ $g }}" @selected(old('grade') == $g)>{{ $g }} AISI</option>
            @endforeach
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_diameter">
        <span class="d-block mb-2">Діаметр(розмір)</span>
        <select id="element_diameter" name="diameter" class="form-select" autocomplete="off">
            <option value="">Оберіть діаметр(розмір)</option>
            @php
                $diameters = ['0','100', '110', '120', '125', '130', '140', '150', '160', '170', '180',
                                '190', '200', '210', '220', '230', '240', '250', '260', '270', '280',
                                '290', '300', '310', '320', '330', '350', '360', '370', '380', '400',
                                '420', '450', '460', '500', '520', '860',
                                '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460', '450/520',
                                '500/560', '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300', '100х200',
                                 '110х220', '110х230', '110х240', '120х220', '120х230', '120х240'];
            @endphp
            @foreach($diameters as $d)
                <option value="{{ $d }}" @selected(old('diameter') == $d)>{{ $d }}</option>
            @endforeach
        </select>
    </label>
</div>

               <div class="col-md-6">
    <label class="form-label w-100" for="element_chimneyType">
        <span class="d-block mb-2">Тип димохода</span>
        <select id="element_chimneyType" name="chimneyType" class="form-select" autocomplete="off">
            <option value="">Оберіть тип димохода</option>
            @php
                $chimneyTypes = [
                    'Одностінний' => 'Одностінний',
                    'Термо' => 'Термо'
                ];
            @endphp
            @foreach($chimneyTypes as $value => $label)
                <option value="{{ $value }}" @selected(old('chimneyType') == $value)>{{ $label }}</option>
            @endforeach
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_casing">
        <span class="d-block mb-2">Кожух</span>
        <select id="element_casing" name="casing" class="form-select" autocomplete="off">
            <option value="">Оберіть кожух</option>
            @php
                $casings = [
                    'н/н' => 'Нержавійка',
                    'н/оц' => 'Оцинковка',
                    '-' => 'Немає (одностінний)'
                ];
            @endphp
            @foreach($casings as $value => $label)
                <option value="{{ $value }}" @selected(old('casing') == $value)>{{ $label }}</option>
            @endforeach
        </select>
    </label>
</div>

                <div class="col-md-6">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Ціна</span>
                        <input type="number" 
                               id="element_price" 
                               name="price" 
                               value="{{ old('price') }}"
                               step="0.01"
                               class="form-control" 
                               placeholder="Ціна"
                               autocomplete="off">
                    </label>
                </div>

                <div class="col-md-12">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Картинка</span>
                        <input type="file" id="element_image" name="image" class="form-control">
                    </label>
                </div>

                <div class="col-md-12">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Опис</span>
                        <select id="element_description" name="description_id" class="form-control">
                            <option value="">Без опису</option>
                            @foreach($descriptions as $description)
                                <option value="{{ $description->id }}" @selected(old('description_id') == $description->id)>
                                    {{ $description->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>

            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Back</a>
            </div>

        </form>
    </div>
</div>


@endsection