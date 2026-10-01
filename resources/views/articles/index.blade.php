@extends('layouts.main')

@section('content')

@php
    $isRu = app()->getLocale() === 'ru';
@endphp

<div class="container-1600 py-4">

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('contacts.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item active text-black" aria-current="page">
            <span style="color: #f97316; font-weight: 500;">
                {{ __('contacts.breadcrumb_title') }}
            </span>
        </li>

    </ol>
</nav>

    <div class="text-center mb-5">
        <h1 class="fw-bold">
            {{ $isRu ? 'Статьи' : 'Статті' }}
        </h1>

        <p class="text-muted mb-0">
            {{ $isRu
                ? 'Полезная информация о дымоходах, монтаже и эксплуатации'
                : 'Корисна інформація про димоходи, монтаж та експлуатацію' }}
        </p>
    </div>

    <div class="row g-4 justify-content-center mx-auto" style="max-width: 1300px;">

        @forelse($articles as $article)

            <div class="col-12 col-md-6 col-xl-4" style="max-width: 420px;">

                <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    @if($article->image)
                        <a href="{{ route('articles.public.show', $article->slug) }}">
                            <img src="{{ asset('storage/' . $article->image) }}"
                                 alt="{{ $isRu && $article->title_ru
                                    ? $article->title_ru
                                    : $article->title }}"
                                 class="w-100"
                                 style="height: 210px; object-fit: cover;">
                        </a>
                    @endif

                    <div class="card-body d-flex flex-column p-4">

                        <div class="small text-muted mb-2">
                            {{ $article->published_at
                                ? $article->published_at->format('d.m.Y')
                                : '' }}
                        </div>

                        <h2 class="h5 fw-bold mb-3">
                            <a href="{{ route('articles.public.show', $article->slug) }}"
                               class="text-decoration-none text-dark">
                                {{ $isRu && $article->title_ru
                                    ? $article->title_ru
                                    : $article->title }}
                            </a>
                        </h2>

                        <p class="text-muted mb-3"
                           style="
                               display: -webkit-box;
                               -webkit-line-clamp: 3;
                               -webkit-box-orient: vertical;
                               overflow: hidden;
                           ">
                            {{ $isRu && $article->excerpt_ru
                                ? $article->excerpt_ru
                                : $article->excerpt }}
                        </p>

                        <div class="mt-auto small text-muted">
                            {{ $isRu
                                ? 'Автор: Инженер DymSystems'
                                : 'Автор: Інженер DymSystems' }}
                        </div>

                    </div>

                </article>

            </div>

        @empty

            <div class="col-12">
                <div class="text-center py-5 text-muted">
                    {{ $isRu
                        ? 'Статей пока нет.'
                        : 'Статей поки немає.' }}
                </div>
            </div>

        @endforelse

    </div>

</div>

<style>



.hover-orange {
    transition: color .2s ease;
}

.hover-orange:hover {
    color: #f97316 !important;
}

</style>

@endsection