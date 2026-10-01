@extends('layouts.main')

@section('content')

@php
$isRu = app()->getLocale() === 'ru';


$title = $isRu && $article->title_ru
    ? $article->title_ru
    : $article->title;

$content = $isRu && $article->content_ru
    ? $article->content_ru
    : $article->content;


@endphp

<div class="container-1600 py-4">

<article class="mx-auto" style="max-width: 960px;">
{{-- Кнопка назад --}}
<div class="mb-4">
    <a href="{{ route('articles.public.index') }}"
       class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>
        {{ $isRu ? 'Все статьи' : 'Всі статті' }}
    </a>
</div>



    {{-- Главное изображение --}}
    @if($article->image)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $article->image) }}"
                 alt="{{ $title }}"
                 class="img-fluid rounded-4 shadow-sm"
                 style="width: 100%; max-height: 520px; object-fit: cover;">
        </div>
    @endif

    {{-- Дата --}}
    <div class="text-muted small mb-2">
        {{ $article->published_at
            ? $article->published_at->format('d.m.Y')
            : '' }}
    </div>

    {{-- Заголовок --}}
    <h1 class="fw-bold mb-3">
        {{ $title }}
    </h1>

    {{-- Автор --}}
    <div class="text-muted mb-4">
        <i class="bi bi-person me-1"></i>
        {{ $isRu
            ? 'Инженер DymSystems'
            : 'Інженер DymSystems' }}
    </div>

    {{-- Короткое описание --}}
    @php
        $excerpt = $isRu && $article->excerpt_ru
            ? $article->excerpt_ru
            : $article->excerpt;
    @endphp

    @if($excerpt)
         <div class="fs-5 text-muted mb-4">
            {{ $excerpt }}
        </div>
    @endif

    {{-- Основной текст --}}
    <div class="article-content fs-5 mb-4">
        {!! $content !!}
    </div>

</article>


</div>

@endsection
