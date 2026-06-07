@extends('layouts.main')

@section('content')
    <div class="container-1600">
    <h3>Элемент</h3>

    <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; font-size: 12px;">
        <tr>
            <th>ID</th>
            <td>{{ $catalog->id }}</td>
        </tr>

        <tr>
            <th>Название</th>
            <td>{{ $catalog->name }}</td>
        </tr>

        <tr>
            <th>Тип</th>
            <td>{{ $catalog->type }}</td>
        </tr>

        <tr>
            <th>Толщина</th>
            <td>{{ $catalog->thickness }}</td>
        </tr>

        <tr>
            <th>Марка нерж.(AISI)</th>
            <td>{{ $catalog->grade }}</td>
        </tr>

        <tr>
            <th>Диаметр</th>
            <td>{{ $catalog->diameter }}</td>
        </tr>


        <tr>
            <th>Тип дымохода</th>
            <td>{{ $catalog->chimneyType }}</td>
        </tr>
        <tr>
            <th>Кожух</th>
            <td> {{ $catalog->casing == 'н' ? '-' : $catalog->casing }}</td>
        </tr>

        <tr>
            <th>Цена</th>
            <td>{{ $catalog->price }}</td>
        </tr>

        @if($catalog->description)

            <tr>
                <th>Описание</th>
                <td>

                    <div class="fw-bold mb-2">
                        {{ $catalog->description->name }}
                    </div>

                    <div class="text small">
                        {!! $catalog->description->overview !!}
                    </div>

                </td>
            </tr>

        @endif

        <tr>
            <th>Картинка</th>
            <td>  @if($catalog->image)
                    <img src="{{ asset('storage/' . $catalog->image) }}"
                         style="max-width:200px; height:auto;">
                @else
                    Нет изображения
                @endif</td>
        </tr>
    </table>

    <div class="d-flex align-items-center gap-2 mt-3">

        <a href="{{ route('catalog.edit', $catalog->id) }}"
           class="btn btn-outline-warning btn-sm btn-icon"
           title="Редактировать">
            <i class="bi bi-pencil"></i>
        </a>

        <button type="button"
                class="btn btn-outline-danger btn-sm btn-icon"
                title="Удалить"
                data-bs-toggle="modal"
                data-bs-target="#deleteModal"
                data-id="{{ $catalog->id }}">
            <i class="bi bi-trash"></i>
        </button>

        <a href="{{ url()->previous() }}"
           class="btn btn-outline-secondary btn-icon btn-sm ms-auto">
            <i class="bi bi-arrow-left"></i> Back
        </a>

    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Подтверждение</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Ты точно хочешь удалить товар?
                </div>

                <div class="modal-footer">

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Отмена
                    </button>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
