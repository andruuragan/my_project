
<section>

    <header class="mb-4">
        <h5 class="mb-1">
            Профіль клієнта
        </h5>

        <p class="text-muted mb-0">
            Обновити ім'я и email облікового запису
        </p>
    </header>

    {{-- VERIFY EMAIL --}}
    <form id="send-verification"
          method="post"
          action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- UPDATE FORM --}}
    <form method="post"
          action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="row g-3">

            {{-- NAME --}}
            <div class="col-md-6">
                <!-- Добавляем for="name" -->
                <label class="form-label" for="name">Ім'я</label>

                <!-- Добавляем id="name" в сам инпут имени -->
                <input type="text" id="name" name="name"
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
                <!-- Добавляем for="register_email" -->
                <label class="form-label" for="register_email">Email</label>

                <!-- Добавляем id="register_email" в инпут -->
                <input type="email" id="register_email" name="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}"
                       autocomplete="email"
                       required>

                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        {{-- VERIFY INFO --}}
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning mt-4">

                <div class="mb-2">
                    Email не підтверджено.
                </div>

                <button form="send-verification"
                        class="btn btn-link p-0">

                    Надіслати листа підтвердження
                </button>

                @if (session('status') === 'verification-link-sent')
                    <div class="text-success mt-2">
                        Лист відправлений
                    </div>
                @endif

            </div>
        @endif

        {{-- BUTTON --}}
        <div class="mt-4 d-flex justify-content-between align-items-center">

            <button type="submit" class="btn btn-primary">
                Зберегти
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-success">
                    ✔ Збереженно
                </span>
            @endif

        </div>

    </form>

</section>
