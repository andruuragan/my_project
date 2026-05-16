<section>

    <header class="mb-4">
        <h5 class="mb-1">
            Смена пароля
        </h5>

        <p class="text-muted mb-0">
            Используйте надёжный пароль для безопасности аккаунта
        </p>
    </header>

    <form method="post"
          action="{{ route('password.update') }}">

        @csrf
        @method('put')

        <div class="row g-3">

            {{-- CURRENT PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label">Текущий пароль</label>

                <input id="update_password_current_password"
                       name="current_password"
                       type="password"
                       class="form-control"
                       autocomplete="current-password">

                @error('current_password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- NEW PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label">Новый пароль</label>

                <input id="update_password_password"
                       name="password"
                       type="password"
                       class="form-control"
                       autocomplete="new-password">

                @error('password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label">Подтверждение</label>

                <input id="update_password_password_confirmation"
                       name="password_confirmation"
                       type="password"
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
                Сохранить пароль
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success">
                    ✔ Пароль обновлён
                </span>
            @endif

        </div>

    </form>

</section>
