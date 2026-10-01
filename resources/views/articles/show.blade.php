@extends('layouts.main')
@php
    $isRu = app()->getLocale() === 'ru';

    $title = $isRu && $article->title_ru
        ? $article->title_ru
        : $article->title;

    $excerpt = $isRu && $article->excerpt_ru
        ? $article->excerpt_ru
        : $article->excerpt;

    $content = $isRu && $article->content_ru
        ? $article->content_ru
        : $article->content;
@endphp

@section('title', $title)
@section('description', $excerpt)
@section('content')



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
            <img src="{{ asset('images/' . $article->image) }}"
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
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'Article',

    '@id' => url()->current() . '#article',
    'url' => url()->current(),

    'headline' => $title,
    'description' => $excerpt,

    'inLanguage' => $isRu ? 'ru-RU' : 'uk-UA',

    'datePublished' => $article->published_at
        ? $article->published_at->toIso8601String()
        : null,

    'dateModified' => $article->updated_at
        ? $article->updated_at->toIso8601String()
        : null,

    'image' => $article->image
        ? asset('images/' . $article->image)
        : asset('images/logo.webp'),

    'author' => [
        '@type' => 'Organization',
        'name' => 'DymSystems',
        'url' => url('/'),
    ],

    'publisher' => [
        '@type' => 'Organization',
        '@id' => url('/') . '#organization',
        'name' => 'DymSystems',
        'url' => url('/'),
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('images/logo.webp'),
        ],
    ],

    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => url()->current() . '#webpage',
    ],

], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-webpage')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'WebPage',

    '@id' => url()->current() . '#webpage',
    'url' => url()->current(),

    'name' => $title,
    'description' => $excerpt,

    'inLanguage' => $isRu ? 'ru-RU' : 'uk-UA',

    'isPartOf' => [
        '@type' => 'WebSite',
        '@id' => url('/') . '#website',
    ],

], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-breadcrumb')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',

    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => $isRu ? 'Главная' : 'Головна',
            'item' => url('/')
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $isRu ? 'Статьи' : 'Статті',
            'item' => route('articles.public.index')
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $title,
            'item' => url()->current()
        ],
    ]

], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush