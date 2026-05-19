@extends('layouts.main')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">
                    👋 Добро пожаловать, {{ auth()->user()->name }}
                </h3>

                <div class="text-muted">
                    Личный кабинет пользователя
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
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                 style="width:50px;height:50px;">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <h5 class="mb-0">Профиль</h5>
                                <small class="text-muted">Личные данные</small>
                            </div>
                        </div>

                        <p class="text-muted mb-3">
                            Имя: {{ auth()->user()->name }}<br>
                            Email: {{ auth()->user()->email }}
                        </p>

                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">
                            Открыть профиль
                        </a>

                    </div>
                </div>
            </div>

            {{-- ORDERS (заготовка) --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                                 style="width:50px;height:50px;">
                                <i class="bi bi-box"></i>
                            </div>

                            <div>
                                <h5 class="mb-0">Заказы</h5>
                                <small class="text-muted">История покупок</small>

                            </div>
                        </div>

                        <a href="{{ route('profile.orders') }}" class="btn btn-primary">
                            Заказы (история покупок)
                        </a>

                    </div>
                </div>
            </div>

            {{-- SETTINGS --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                 style="width:50px;height:50px;">
                                <i class="bi bi-sliders"></i>
                            </div>

                            <div>
                                <h5 class="mb-0">Настройки</h5>
                                <small class="text-muted">Безопасность</small>
                            </div>
                        </div>

                        <p class="text-muted mb-3">
                            Пароль, email, аккаунт
                        </p>

                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-dark">
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
                    <h6 class="mb-1">Быстрые действия</h6>
                    <small class="text-muted">Управление аккаунтом</small>
                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-person-gear"></i> Профиль
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i> Выход
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
@endsection
