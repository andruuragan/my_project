
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
                <label class="form-label" for="name">Ім'я</label>
                <input type="text" id="name" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $user->name) }}"
                       autocomplete="name"
                       required>

                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
                <label class="form-label" for="register_email">Email</label>
                <input type="email" id="register_email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $user->email) }}"
                       autocomplete="email"
                       required>

                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- PHONE (Новое поле телефона) --}}
            <div class="col-12">
                <label class="form-label" for="phone">Номер телефону</label>
                <input type="text" id="phone" name="phone"
       class="form-control @error('phone') is-invalid @enderror"
       value="{{ old('phone', $user->phone) }}"
       placeholder="+38 (000) 000-00-00"
       autocomplete="tel"
       required>

                @error('phone')
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
                    ✔ Збережено
                </span>
            @endif
        </div>

    </form>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const profileForm = document.querySelector('form[action="{{ route('profile.update') }}"]');
    
    if (profileForm) {
        profileForm.addEventListener('submit', function (e) {
            const mask = window.profilePhoneMaskInstance;
            
            // Якщо маска існує і не заповнена повністю — блокуємо відправку
            if (mask && !mask.masked.isComplete) {
                e.preventDefault(); // Зупиняємо відправку
                
                // Візуально показуємо помилку
                const phoneInput = document.getElementById('phone');
                phoneInput.classList.add('is-invalid');
                
                alert('Будь ласка, введіть повний номер телефону у форматі +38 (0XX) XXX-XX-XX');
                return false;
            }
        });
    }
});
</script>
</section>
