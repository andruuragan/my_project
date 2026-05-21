@extends('layouts.main')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">
                    👋 Ласкаво просимо, {{ auth()->user()->name }}
                </h3>

                <div class="text-muted">
                    Особистий кабінет клієнта
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                <i class="bi bi-gear"></i>
                Настройки
            </a>

        </div>

        {{-- CARDS --}}
        <div class="row g-3">

            {{-- PROFILE --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-person"></i>
                                </div>

                                <div>
                                    <h5 class="mb-0">Профіль</h5>
                                    <small class="text-muted">Особисті дані</small>
                                </div>
                            </div>

                            <p class="text-muted small mb-3">
                                Ім'я: {{ auth()->user()->name }}<br>
                                Email: {{ auth()->user()->email }}
                            </p>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary w-100 rounded-pill">
                            Відкрити профіль
                        </a>

                    </div>
                </div>
            </div>

            {{-- WISHLIST (Нова картка обраного) --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-heart-fill"></i>
                                </div>

                                <div>
                                    <h5 class="mb-0">Обране</h5>
                                    <small class="text-muted">Вподобані товари</small>
                                </div>
                            </div>

                            <p class="text-muted small mb-3">
                                Товари, які ви відклали для майбутніх покупок.
                            </p>
                        </div>

                        <a href="{{ route('profile.wishlist') }}" class="btn btn-sm btn-danger w-100 rounded-pill">
                            <i class="bi bi-heart-fill me-1"></i> Переглянути обране
                        </a>

                    </div>
                </div>
            </div>

            {{-- ORDERS --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-box text-dark"></i>
                                </div>

                                <div>
                                    <h5 class="mb-0">Замовлення</h5>
                                    <small class="text-muted">Історія покупок</small>
                                </div>
                            </div>

                            <p class="text-muted small mb-3">
                                Перегляд ваших поточних та минулих замовлень.
                            </p>
                        </div>

                        <a href="{{ route('profile.orders') }}" class="btn btn-sm btn-warning w-100 text-dark rounded-pill fw-medium">
                            Історія покупок
                        </a>

                    </div>
                </div>
            </div>

            {{-- SETTINGS --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-sliders"></i>
                                </div>

                                <div>
                                    <h5 class="mb-0">Настройки</h5>
                                    <small class="text-muted">Безпека</small>
                                </div>
                            </div>

                            <p class="text-muted small mb-3">
                                Зміна паролю, керування безпекою акаунта.
                            </p>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-dark w-100 rounded-pill">
                            Перейти
                        </a>

                    </div>
                </div>
            </div>

        </div>

        {{-- EXTRA BLOCK --}}
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h6 class="mb-1">Швидкі дії</h6>
                    <small class="text-muted">Управління акаунтом</small>
                </div>

                <div class="d-flex gap-2">

                    <!-- Кнопка швидкого переходу в обране -->
                    <a href="{{ route('profile.wishlist') }}" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-heart-fill"></i> Моє обране
                    </a>

                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-person-gear"></i> Профіль
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i> Вихід
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
@endsection
