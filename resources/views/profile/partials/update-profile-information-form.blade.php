
<section>

    <header class="mb-4">
        <h5 class="mb-1">
            Профіль клієнта
        </h5>

        <p class="text-muted mb-0">
            Обновити ім'я и email аккаунта
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
                <label class="form-label">ім'я</label>

                <input id="name"
                       name="name"
                       type="text"
                       class="form-control"
                       value="{{ old('name', $user->name) }}"
                       required>

                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
                <label class="form-label">Email</label>

                <input id="email"
                       name="email"
                       type="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}"
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
                        Лист відправлен
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
