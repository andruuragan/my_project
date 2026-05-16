@extends('layouts.main')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="mb-0">
                ➕ Создать пользователя
            </h3>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Назад
            </a>

        </div>

        {{-- CARD --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('users.store') }}"
                      method="POST"
                      autocomplete="off">
                    @csrf

                    <div class="row g-3">

                        {{-- NAME --}}
                        <div class="col-md-6">
                            <label class="form-label">Имя</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   autocomplete="off"
                                   value="{{ old('name') }}"
                                   required>

                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div class="col-md-6">
                            <label class="form-label">Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   autocomplete="off"
                                   value="{{ old('email') }}"
                                   required>

                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- PHONE --}}
                        <div class="col-md-6">
                            <label class="form-label">Телефон</label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   inputmode="numeric"
                                   autocomplete="off"
                                   value="{{ old('phone') }}"
                                   oninput="this.value = this.value.replace(/[^0-9+]/g, '')">

                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ROLE --}}
                        <div class="col-md-6">
                            <label class="form-label">Роль</label>

                            <select name="role" class="form-select">
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>

                            @error('role')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-6">
                            <label class="form-label">Пароль</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   autocomplete="new-password"
                                   required>

                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- CONFIRM --}}
                        <div class="col-md-6">
                            <label class="form-label">Подтверждение пароля</label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   required>
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4 d-flex justify-content-end">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check2-circle"></i> Создать
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
