@extends('layouts.main')

@section('content')
    <div class="container-1600">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Контакти</h1>
            <div class="mx-auto bg-warning rounded" style="width:70px;height:4px;"></div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-4 p-lg-5">
                <div class="row gy-5">
                    
                    <div class="col-lg-6">
                        <h4 class="mb-4">Наші координати</h4>
                        <div class="row gy-4">
                            @php
                                $contacts = [
    ['icon' => 'building-fill', 'title' => 'Назва компанії', 'text' => 'Центр Комплектації Димарів'],
    ['icon' => 'person-fill', 'title' => 'Контактна особа', 'text' => 'Ваше ім\'y'],
    ['icon' => 'geo-alt-fill', 'title' => 'Адреса', 'text' => 'м. Харків, вул. Прикладна, 1'],
    
    // Оновлений телефон: додано href для клікабельності
    ['icon' => 'telephone-fill', 'title' => 'Телефон', 'text' => '+38 (012) 123-45-67<br>+38 (012) 123-45-67', 'is_link' => true, 'href' => 'tel:+380121234567'],
    
    ['icon' => 'envelope-fill', 'title' => 'Email', 'text' => 'dymsystems@ukr.net<br>dymsystems.shop@gmail.com', 'is_link' => true, 'href' => 'mailto:dymsystems@ukr.net'],
    ['icon' => 'globe2', 'title' => 'Сайт', 'text' => 'www.dymsystems.pp.ua', 'is_link' => true, 'href' => '/'],
    ['icon' => 'clock-fill', 'title' => 'Графік роботи', 'text' => 'Пн–Пт: 09:00 – 18:00<br>Сб–Нд: вихідний']
];
                            @endphp

                            @foreach($contacts as $item)
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-{{ $item['icon'] }} text-warning fs-4 me-3"></i>
                                        <span class="fw-semibold">{{ $item['title'] }}</span>
                                    </div>
                                    <div class="text-muted ps-5">
    @if(isset($item['is_link']) && !empty($item['href']))
        <a href="{{ $item['href'] }}" class="text-decoration-none text-muted">
            {!! $item['text'] !!}
        </a>
    @else
        {!! $item['text'] !!}
    @endif
</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-light p-4 p-lg-5 rounded-4 h-100">
                            <h4 class="mb-4">Якщо у вас виникли питання — заповніть, будь-ласка, форму і ми зв'яжемося з вами.</h4>
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input
    type="text"
    name="name"
    class="form-control form-control-lg"
    placeholder="Ваше ім'я"
    autocomplete="name"
    required
>

                                </div>
                                <div class="mb-3">
                                    <input
    type="email"
    name="email"
    class="form-control form-control-lg"
    placeholder="Email"
    autocomplete="email"
    required
>
                                </div>
                                <div class="mb-3">
                                    
                                    <input 
    type="tel" 
    name="phone" 
    id="phone" 
    class="form-control form-control-lg"
    placeholder="+38 (___) ___-__-__" 
    autocomplete="tel" 
    required>
                                </div>
                                <div class="mb-4">
                                    <textarea name="message" class="form-control form-control-lg" rows="4" placeholder="Ваше повідомлення"></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold">Відправити повідомлення</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
