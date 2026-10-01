@extends('layouts.main')

@section('content')
    <div class="container-1600">

        @php
            $isRu = app()->getLocale() === 'ru';
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>{{ $isRu ? 'Просмотр статьи' : 'Перегляд статті' }}</h4>

            <div class="d-flex gap-2">
                <a href="{{ route('articles.edit', $article->id) }}"
                   class="btn btn-warning">
                    <i class="bi bi-pencil me-1"></i>
                    {{ $isRu ? 'Редактировать' : 'Редагувати' }}
                </a>

                <a href="{{ route('articles.index') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    {{ $isRu ? 'Назад' : 'Назад' }}
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                {{-- Заголовок --}}
                <h2 class="fw-bold mb-3">
                    {{ $isRu && $article->title_ru
                        ? $article->title_ru
                        : $article->title }}
                </h2>

                @if($article->image)
    <div class="mb-4 text-center">
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="{{ $article->title }}"
             class="img-fluid rounded-4 shadow-sm"
             style="max-height: 400px; object-fit: cover;">
    </div>
@endif

                {{-- Информация --}}
                <div class="d-flex flex-wrap gap-3 align-items-center mb-4 text-muted">

                    <span>
                        <i class="bi bi-link-45deg me-1"></i>
                        {{ $article->slug }}
                    </span>

                    <span>
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $article->published_at
                            ? $article->published_at->format('d.m.Y')
                            : '—' }}
                    </span>

                    @if($article->is_published)
                        <span class="badge bg-success">
                            {{ $isRu ? 'Опубликована' : 'Опублікована' }}
                        </span>
                    @else
                        <span class="badge bg-secondary">
                            {{ $isRu ? 'Черновик' : 'Чернетка' }}
                        </span>
                    @endif

                </div>

                <hr>

                {{-- Краткое описание --}}
                @if($isRu && $article->excerpt_ru)
                    <div class="mb-4">
                        <h5 class="fw-bold">
                            Краткое описание
                        </h5>

                        <div class="text-muted">
                            {{ $article->excerpt_ru }}
                        </div>
                    </div>
                @elseif($article->excerpt)
                    <div class="mb-4">
                        <h5 class="fw-bold">
                            Короткий опис
                        </h5>

                        <div class="text-muted">
                            {{ $article->excerpt }}
                        </div>
                    </div>
                @endif

                {{-- Основной текст --}}
                <div>
                    <h5 class="fw-bold mb-3">
                        {{ $isRu ? 'Текст статьи' : 'Текст статті' }}
                    </h5>

                    @if($isRu && $article->content_ru)
                        <div class="article-content">
                            {!! $article->content_ru !!}
                        </div>
                    @else
                        <div class="article-content">
                            {!! $article->content !!}
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection