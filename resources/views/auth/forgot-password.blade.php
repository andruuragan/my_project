@extends('layouts.main')

@section('title', 'Відновлення пароля')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body">

                    <h1 class="h3 mb-3">Відновлення пароля</h1>

                    <p class="text-muted">
                        Введіть email, який використовували при реєстрації.
                        Ми надішлемо посилання для скидання пароля.
                    </p>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                            >

                            @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">
                            Надіслати посилання
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection