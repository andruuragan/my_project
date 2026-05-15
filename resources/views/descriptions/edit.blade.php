@extends('layouts.main')

@section('content')
    <div class="container-1600">
    <div class="card shadow-sm p-3">

        <h5 class="mb-3">Редактирование</h5>

        <form action="{{ route('descriptions.update', $description->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NAME --}}
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $description->name) }}">
            </div>

            {{-- OVERVIEW --}}
            <div class="mb-3">
                <label class="form-label">Общее описание</label>
                <textarea name="overview" class="form-control rich-text" rows="3">{{ old('overview', $description->overview) }}</textarea>
            </div>

            {{-- ADVANTAGES --}}
            <div class="mb-3">
                <label class="form-label">Преимущества</label>
                <textarea name="advantages" class="form-control rich-text" rows="3">{{ old('advantages', $description->advantages) }}</textarea>
            </div>

            {{-- USAGE --}}
            <div class="mb-3">
                <label class="form-label">Применение</label>
                <textarea name="usage" class="form-control rich-text" rows="3">{{ old('usage', $description->usage) }}</textarea>
            </div>

            {{-- WHY CHOOSE US --}}
            <div class="mb-3">
                <label class="form-label">Почему выбирают нас</label>
                <textarea name="why_choose_us" class="form-control rich-text" rows="3">{{ old('why_choose_us', $description->why_choose_us) }}</textarea>
            </div>

            {{-- ADDITIONAL INFO --}}
            <div class="mb-3">
                <label class="form-label">Дополнительная информация</label>
                <textarea name="additional_info" class="form-control rich-text" rows="3">{{ old('additional_info', $description->additional_info) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">Обновить</button>
                <a href="{{ route('descriptions.index') }}" class="btn btn-secondary">Назад</a>
            </div>

        </form>

    </div>
    </div>

@endsection
