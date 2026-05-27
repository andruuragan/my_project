@extends('layouts.main')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="mb-0">
                ✏️ Редагування  облікового запису #{{ $user->id }}
            </h3>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Назад
            </a>

        </div>

        {{-- CARD --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('users.update', $user) }}"
                      method="POST"
                      autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        {{-- NAME --}}
                        <div class="col-md-6">
                           <label class="form-label" for="name">Ім'я</label>
<input type="text"
       name="name"
       id="name" {{-- id має точно збігатися з for у лейблі --}}
       class="form-control"
       value="{{ old('name', $user->name) }}"
       autocomplete="name"
       required>

                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>

<input type="email"
       name="email"
       id="email"
       class="form-control"
       value="{{ old('email', $user->email) }}"
       autocomplete="email"
       required>

                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- PHONE --}}
                        <div class="col-md-6">
                            <label class="form-label" for="phone">Телефон</label>

<input type="text"
       name="phone"
       id="phone"
       class="form-control"
       value="{{ old('phone', $user->phone) }}"
       inputmode="numeric"
       oninput="this.value=this.value.replace(/[^0-9+]/g,'')"
       autocomplete="tel"
       required>

                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ROLE --}}
                        <div class="col-md-6">
                            <label class="form-label" for="role">Роль</label>
                            <select name="role" 
        id="role" {{-- Додано id для зв'язку з label --}}
        class="form-select" 
        required>
                                <option value="user"
                                    {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                    User
                                </option>

                                <option value="admin"
                                    {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                            </select>

                            @error('role')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-6">
                            <label class="form-label" for="password">
    Пароль (залиш пустим якщо не міняти)
</label>

                            <input type="password"
                                   name="password"
                                   id="password" 
                                   class="form-control">

                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- CONFIRM --}}
                        <div class="col-md-6">
    <label class="form-label" for="password_confirmation">Підтвердження пароля</label>

    <input type="password"
           name="password_confirmation"
           id="password_confirmation" {{-- Додано id для зв'язку з label --}}
           class="form-control"
           autocomplete="new-password" {{-- Браузер розуміє, що це пара для нового пароля --}}
           placeholder="••••••••">
</div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="mt-4 d-flex justify-content-end gap-2">

                        <a href="{{ route('users.index') }}"
                           class="btn btn-secondary">
                            Відміна
                        </a>

                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check2-circle"></i> Зберегти
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
