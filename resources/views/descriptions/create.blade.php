@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-3">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Создать описание</h5>

            <a href="{{ route('descriptions.index') }}" class="btn btn-secondary btn-sm">
                Назад
            </a>
        </div>

        <form action="{{ route('descriptions.store') }}" method="POST">
            @csrf

            {{-- NAME --}}
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Например: Дымоход из нержавейки"
                       value="{{ old('name') }}">
                @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- OVERVIEW --}}
            <div class="mb-3">
                <label class="form-label">Общее описание</label>
                <textarea name="overview" class="form-control rich-text" rows="3">{{ old('overview') }}</textarea>
            </div>

            {{-- ADVANTAGES --}}
            <div class="mb-3">
                <label class="form-label">Преимущества</label>
                <textarea name="advantages" class="form-control rich-text" rows="3">{{ old('advantages') }}</textarea>
            </div>

            {{-- USAGE --}}
            <div class="mb-3">
                <label class="form-label">Применение</label>
                <textarea name="usage" class="form-control rich-text" rows="3">{{ old('usage') }}</textarea>
            </div>

            {{-- WHY CHOOSE US --}}
            <div class="mb-3">
                <label class="form-label">Почему выбирают нас</label>
                <textarea name="why_choose_us" class="form-control rich-text" rows="3">{{ old('why_choose_us') }}</textarea>
            </div>

            {{-- ADDITIONAL INFO --}}
            <div class="mb-3">
                <label class="form-label">Дополнительная информация</label>
                <textarea name="additional_info" class="form-control rich-text" rows="3">{{ old('additional_info') }}</textarea>
            </div>

            {{-- BUTTONS --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>

                <a href="{{ route('descriptions.index') }}" class="btn btn-outline-secondary">
                    Отмена
                </a>
            </div>

        </form>

    </div>

@endsection
