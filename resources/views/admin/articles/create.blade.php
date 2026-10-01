@extends('layouts.main')

@section('content')
    <div class="container-1600">

        @php
            $isRu = app()->getLocale() === 'ru';
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>{{ $isRu ? 'Создание статьи' : 'Створення статті' }}</h4>

            <a href="{{ route('articles.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                {{ $isRu ? 'Назад' : 'Назад' }}
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('articles.store') }}"
      method="POST"
      enctype="multipart/form-data">
            @csrf

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    {{-- Название --}}
                    <div class="row g-4">

                        <div class="col-12 col-lg-6">
                            <label for="title" class="form-label fw-semibold">
                                Назва українською
                            </label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   value="{{ old('title') }}"
                                   required>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="title_ru" class="form-label fw-semibold">
                                Название на русском
                            </label>

                            <input type="text"
                                   name="title_ru"
                                   id="title_ru"
                                   class="form-control"
                                   value="{{ old('title_ru') }}">
                        </div>

                        {{-- Slug --}}
                        <div class="col-12">
                            <label for="slug" class="form-label fw-semibold">
                                Slug
                            </label>

                           <input type="text"
       name="slug"
       id="slug"
       class="form-control"
       value="{{ old('slug') }}"
       placeholder="napryklad-yak-vybraty-dymokhid"
       required>

       
                            
                            <small class="text-muted">
                                {{ $isRu
                                    ? 'Уникальный адрес статьи. Например: kak-vybrat-dymokhod.'
                                    : 'Унікальна адреса статті. Наприклад: yak-vybraty-dymokhid.' }}
                            </small>
                        </div>

                       <div class="col-12">
    <label for="image" class="form-label fw-semibold">
        Головне зображення
    </label>

    <input type="file"
           name="image"
           id="image"
           class="form-control"
           accept="image/jpeg,image/png,image/webp">

    <div class="form-text">
        JPG, PNG або WebP.
    </div>
</div>

                        {{-- Краткое описание --}}
                        <div class="col-12 col-lg-6">
                            <label for="excerpt" class="form-label fw-semibold">
                                Короткий опис українською
                            </label>

                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="5">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="excerpt_ru" class="form-label fw-semibold">
                                Краткое описание на русском
                            </label>

                            <textarea name="excerpt_ru"
                                      id="excerpt_ru"
                                      class="form-control"
                                      rows="5">{{ old('excerpt_ru') }}</textarea>
                        </div>

                       {{-- Основной текст --}}
<div class="col-12 col-lg-6">
    <label for="content" class="form-label fw-semibold">
        Текст статті українською
    </label>

    <textarea name="content"
              id="content"
              class="form-control article-rich-text"
              rows="12">{{ old('content') }}</textarea>
</div>

<div class="col-12 col-lg-6">
    <label for="content_ru" class="form-label fw-semibold">
        Текст статьи на русском
    </label>

    <textarea name="content_ru"
              id="content_ru"
              class="form-control article-rich-text"
              rows="12">{{ old('content_ru') }}</textarea>
</div>
                        {{-- Дата публикации --}}
                        <div class="col-12 col-md-6">
                            <label for="published_at" class="form-label fw-semibold">
                                {{ $isRu ? 'Дата публикации' : 'Дата публікації' }}
                            </label>

                            <input type="date"
       name="published_at"
       id="published_at"
       class="form-control"
       value="{{ old('published_at') }}">
                        </div>

                        {{-- Статус --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold d-block">
                                {{ $isRu ? 'Статус статьи' : 'Статус статті' }}
                            </label>

                            <div class="form-check form-switch mt-2">
                                <input type="checkbox"
                                       name="is_published"
                                       value="1"
                                       class="form-check-input"
                                       id="is_published"
                                       {{ old('is_published', true) ? 'checked' : '' }}>

                                <label class="form-check-label" for="is_published">
                                    {{ $isRu ? 'Опубликовать статью' : 'Опублікувати статтю' }}
                                </label>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <button type="submit"
                                class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>
                            {{ $isRu ? 'Создать статью' : 'Створити статтю' }}
                        </button>

                        <a href="{{ route('articles.index') }}"
                           class="btn btn-outline-secondary px-4">
                            {{ $isRu ? 'Отмена' : 'Скасувати' }}
                        </a>
                    </div>

                </div>
            </div>

        </form>

    </div>
@endsection