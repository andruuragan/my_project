<section>

    <header class="mb-4">
        <h5 class="mb-1">
            {{ __('profile.change_password') }}
        </h5>

        <p class="text-muted mb-0">
            {{ __('profile.password_security_text') }}
        </p>
    </header>

    <form method="post"
          action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="row g-3">

            {{-- CURRENT PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label" for="current_password">
                    {{ __('profile.current_password') }}
                </label>

                <input type="password" id="current_password" name="current_password"
                       class="form-control"
                       autocomplete="current-password">

                @error('current_password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- NEW PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label" for="new_password">
                    {{ __('profile.new_password') }}
                </label>

                <input type="password" id="new_password" name="password"
                       class="form-control"
                       autocomplete="new-password">

                @error('password', 'updatePassword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="col-md-4">
                <label class="form-label" for="password_confirmation">
                    {{ __('profile.password_confirmation') }}
                </label>

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
                {{ __('profile.save_password') }}
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success">
                    ✔ {{ __('profile.password_updated') }}
                </span>
            @endif

        </div>

    </form>

</section>
