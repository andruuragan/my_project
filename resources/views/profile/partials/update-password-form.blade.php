<section>

    <header class="mb-4">
        <h5 class="mb-1">
            Зміна пароля
        </h5>

        <p class="text-muted mb-0">
            Використовуйте надійний пароль для безпеки облікового запису
        </p>
    </header>

    <form method="post"
          action="{{ route('password.update') }}">

        @csrf
        @method('put')

        <div class="row g-3">

            {{-- CURRENT PASSWORD --}}
            <div class="col-md-4">
                <!-- Добавляем for="current_password" -->
                <label class="form-label" for="current_password">Поточний пароль</label>

                <!-- Добавляем id="current_password" в сам инпут -->
                <input type="password" id="current_password" name="current_password"
                       class="form-control"
                       autocomplete="current-password">

                @error('current_password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- NEW PASSWORD --}}
            <div class="col-md-4">
                <!-- Добавляем for="new_password" -->
                <label class="form-label" for="new_password">Новий пароль</label>

                <!-- Добавляем id="new_password" в инпут нового пароля -->
                <input type="password" id="new_password" name="password"
                       class="form-control"
                       autocomplete="new-password">

                @error('password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="col-md-4">
                <!-- Добавляем for="password_confirmation" -->
                <label class="form-label" for="password_confirmation">Підтвердження</label>

                <!-- Добавляем id="password_confirmation" в инпут подтверждения пароля -->
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-control"
                       autocomplete="new-password">

                @error('password_confirmation', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        {{-- BUTTON + STATUS --}}
        <div class="mt-4 d-flex justify-content-between align-items-center">

            <button type="submit" class="btn btn-primary">
                Зберегти пароль
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success">
                    ✔ Пароль оновлено
                </span>
            @endif

        </div>

    </form>

</section>
