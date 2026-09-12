@extends('layouts.main')

@section('content')


@php
    $isRu = app()->getLocale() === 'ru';

    $overview = $isRu && filled($description->overview_ru)
        ? $description->overview_ru
        : $description->overview;

    $advantages = $isRu && filled($description->advantages_ru)
        ? $description->advantages_ru
        : $description->advantages;

    $usage = $isRu && filled($description->usage_ru)
        ? $description->usage_ru
        : $description->usage;

    $whyChooseUs = $isRu && filled($description->why_choose_us_ru)
        ? $description->why_choose_us_ru
        : $description->why_choose_us;

    $additionalInfo = $isRu && filled($description->additional_info_ru)
        ? $description->additional_info_ru
        : $description->additional_info;
@endphp

<div class="container-1600">

    <div class="card shadow-sm p-3">

        <h4>{{ $description->name }}</h4>

        <hr>

        <h6>{{ $isRu ? 'Описание:' : 'Опис:' }}</h6>
        <div>{!! $overview !!}</div>

        <h6>{{ $isRu ? 'Преимущества:' : 'Переваги:' }}</h6>
        <div>{!! $advantages !!}</div>

        <h6>{{ $isRu ? 'Применение:' : 'Застосування:' }}</h6>
        <div>{!! $usage !!}</div>

        <h6>{{ $isRu ? 'Почему выбирают нас:' : 'Чому обирають нас:' }}</h6>
        <div>{!! $whyChooseUs !!}</div>

        <h6>{{ $isRu ? 'Дополнительная информация:' : 'Додаткова інформація:' }}</h6>
        <div>{!! $additionalInfo !!}</div>

        <a href="{{ route('descriptions.index') }}" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left me-1"></i>
            {{ $isRu ? 'Назад' : 'Назад' }}
        </a>

    </div>

</div>


@endsection
