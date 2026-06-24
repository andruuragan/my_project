@extends('layouts.main')

@section('title', 'Створення нового пароля')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    
                    <h1 class="h3 mb-3">Встановлення нового пароля</h1>
                    
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" 
                                   class="form-control" 
                                   value="{{ old('email', $request->email) }}" 
                                   required autofocus>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Новий пароль</label>
                            <input type="password" id="password" name="password" 
                                   class="form-control" required>
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Підтвердження пароля</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Зберегти пароль
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection