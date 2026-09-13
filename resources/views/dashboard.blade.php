@extends('layouts.main')

@section('content')

    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">
                    👋 {{ __('dashboard.welcome') }}, {{ auth()->user()->name }}
                </h3>

                <div class="text-muted">
                    {{ __('dashboard.account') }}
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                <i class="bi bi-gear"></i>
                {{ __('dashboard.settings') }}
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
                                    <h5 class="mb-0">{{ __('dashboard.profile') }}</h5>
                                    <small class="text-muted">{{ __('dashboard.personal_data') }}</small>
                                </div>

                            </div>

                            <p class="text-muted small mb-3">
                                {{ __('dashboard.name') }}: {{ auth()->user()->name }}<br>
                                Email: {{ auth()->user()->email }}
                            </p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="btn btn-sm btn-primary w-100 rounded-pill">
                            {{ __('dashboard.open_profile') }}
                        </a>

                    </div>
                </div>
            </div>

            {{-- WISHLIST --}}
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
                                    <h5 class="mb-0">{{ __('dashboard.wishlist') }}</h5>
                                    <small class="text-muted">{{ __('dashboard.favorite_products') }}</small>
                                </div>

                            </div>

                            <p class="text-muted small mb-3">
                                {{ __('dashboard.wishlist_description') }}
                            </p>
                        </div>

                        <a href="{{ route('profile.wishlist') }}"
                           class="btn btn-sm btn-danger w-100 rounded-pill">
                            <i class="bi bi-heart-fill me-1"></i>
                            {{ __('dashboard.view_wishlist') }}
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
                                    <h5 class="mb-0">{{ __('dashboard.orders') }}</h5>
                                    <small class="text-muted">{{ __('dashboard.purchase_history') }}</small>
                                </div>

                            </div>

                            <p class="text-muted small mb-3">
                                {{ __('dashboard.orders_description') }}
                            </p>
                        </div>

                        <a href="{{ route('profile.orders') }}"
                           class="btn btn-sm btn-warning w-100 text-dark rounded-pill fw-medium">
                            {{ __('dashboard.purchase_history') }}
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
                                    <h5 class="mb-0">{{ __('dashboard.settings') }}</h5>
                                    <small class="text-muted">{{ __('dashboard.security') }}</small>
                                </div>

                            </div>

                            <p class="text-muted small mb-3">
                                {{ __('dashboard.settings_description') }}
                            </p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="btn btn-sm btn-dark w-100 rounded-pill">
                            {{ __('dashboard.go_to') }}
                        </a>

                    </div>
                </div>
            </div>

        </div>

        {{-- EXTRA BLOCK --}}
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h6 class="mb-1">{{ __('dashboard.quick_actions') }}</h6>
                    <small class="text-muted">{{ __('dashboard.account_management') }}</small>
                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('profile.wishlist') }}"
                       class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-heart-fill"></i>
                        {{ __('dashboard.my_wishlist') }}
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-person-gear"></i>
                        {{ __('dashboard.profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i>
                            {{ __('dashboard.logout') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection