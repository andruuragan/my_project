@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-3">

        <h4>{{ $description->name }}</h4>

        <hr>

        <h6>Опис:</h6>
        <div>{!! $description->overview !!}</div>

        <h6>Переваги:</h6>
        <div>{!! $description->advantages !!}</div>

        <h6>Застосування:</h6>
        <div>{!! $description->usage !!}</div>

        <h6>Чому обирають нас:</h6>
        <div>{!! $description->why_choose_us !!}</div>

        <h6>Додаткова інформація:</h6>
        <div>{!! $description->additional_info !!}</div>
        <a href="{{ route('descriptions.index') }}" class="btn btn-secondary">
            Назад
        </a>

    </div>

@endsection


