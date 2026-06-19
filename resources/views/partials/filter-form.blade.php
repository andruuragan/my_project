 <form class="filter-form" id="mainFilterForm" method="GET" action="{{ route('shop.index') }}">

                        <div class="mb-3">
                            <label class="form-label" for="element_name">Назва елемента</label>
                            <input type="text"
                                   id="element_name"
                                   name="name"
                                   value="{{ request('name') }}"
                                   class="form-control"
                                   autocomplete="off">
                        </div>

                        {{-- TYPE --}}
                        @php
                            $types = [
                                'Труба', 'Коліно 45°', 'Коліно 90°', 'Трійник 90°', 'Трійник 45°',
                                'Волпер', 'Грибок', 'Іскрогасник', 'Регулятор тяги(Кагла)', 'Лійка',
                                'Окапник', 'Закінчення димоходу', 'Переход', 'Радіатор', 'Ревізія',
                                'Розета', 'Сітка', 'Скоба', 'Криза', 'Кронштейн',
                                'Розвантажувальна підставка', 'Обжимний хомут', 'Хомут під розтяжки',
                                'Стіновий хомут', 'Монтажний хомут', 'Конус', 'Термоґрибок', 'Дека',
                                'Заглушка', 'Старт-сендвіч', 'Труба-подовжувач', 'Прохід', 'Відображувач', 'Труба овальна'
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-element_type">Назва(список)</label>
                            <select id="filter-element_type" name="type" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($types as $type)
                                    <option value="{{ $type }}" @selected(request('type') == $type)>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- DIAMETER --}}
                        @php
                            $diameters = [
                                '100', '110', '120', '125', '130', '140', '150', '160', '170', '180',
                                '190', '200', '210', '220', '230', '240', '250', '260', '270', '280',
                                '290', '300', '310', '320', '330', '350', '360', '370', '380', '400',
                                '420', '450', '460', '500', '520', '860',
                                '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460',
                                '500/560', '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300', '100х200',
                                 '110х220', '110х230', '110х240', '120х220', '120х230', '120х240'
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-element_diameter">Діаметр(розмір)</label>
                            <select id="filter-element_diameter" name="diameter" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($diameters as $d)
                                    <option value="{{ $d }}" @selected(request('diameter') == $d)>
                                        {{ $d }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- THICKNESS --}}
                        @php
                            $thicknesses = ['0,5 мм', '0,8 мм', '1 мм', '2 мм'];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-thickness">Товщина нерж.</label>
                            <select id="filter-thickness" name="thickness" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($thicknesses as $t)
                                    <option value="{{ $t }}" @selected(request('thickness') == $t)>
                                        {{ $t }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- GRADE --}}
                        @php
                            $grades = [
                                '304' => '304 AISI',
                                '321' => '321 AISI',
                                '201' => '201 AISI',
                                '430' => '430 AISI',
                            ];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-grade">Марка нерж.</label>
                            <select id="filter-grade" name="grade" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($grades as $value => $label)
                                    <option value="{{ $value }}" @selected(request('grade') == $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CHIMNEY TYPE --}}
                        @php
                            $chimneyTypes = ['Одностінний', 'Термо'];
                        @endphp

                        <div class="mb-3" x-ignore>
                            <label class="form-label" for="filter-chimneyType">Тип димохода</label>
                            <select id="filter-chimneyType" name="chimneyType" class="js-choice" autocomplete="off">
                                <option value="">Все</option>
                                @foreach($chimneyTypes as $type)
                                    <option value="{{ $type }}" @selected(request('chimneyType') == $type)>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CASING --}}
@php
    // Ключ - то, что уходит в базу/фильтр, Значение - то, что видит юзер
    $casings = [
        'н/н'  => 'нержавійка (AISI 201)',
        'н/оц' => 'оцинковка'
    ];
@endphp

<div class="mb-3" x-ignore>
    <label class="form-label" for="filter-casing">Кожух</label>
    <select id="filter-casing" name="casing" class="js-choice" autocomplete="off">
        <option value="">Все</option>
        @foreach($casings as $value => $label)
            <option value="{{ $value }}" @selected(request('casing') == $value)>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>

                        {{-- PRICE --}}
                        <div class="mb-3">
                            <label class="form-label" for="price_to">Ціна до</label>
                            <input type="number"
                                   id="price_to"
                                   name="price_to"
                                   value="{{ request('price_to') }}"
                                   class="form-control"
                                   autocomplete="off">
                        </div>


                        

                        <div class="d-flex flex-column gap-2 mt-3">
                            <a href="{{ route('shop.index') }}" class="filter-reset-btn text-center py-2 btn btn-outline-secondary rounded-pill w-100">
                                Скинути
                            </a>
                            <button class="filter-btn rounded-pill w-100" type="submit">
                                Застосувати
                            </button>
                        </div>

                    </form>
 