
@extends('layouts.main')

@section('content')

<div class="container-1600">

    <div class="card shadow-sm p-3">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h5 class="mb-0">
                Геометрія
            </h5>

            <a href="{{ route('catalog-geometry.index') }}"
               class="btn btn-secondary btn-sm">
                Назад
            </a>

        </div>


        {{-- NAME --}}

        <div class="mb-4">

            <h6 class="text-muted mb-1">
                Назва геометрії
            </h6>

            <div class="fs-5 fw-semibold">
                {{ $catalogGeometry->name }}
            </div>

        </div>


        {{-- IMAGE --}}

        <div class="mb-4">

            <h6 class="text-muted mb-2">
                Картинка
            </h6>

           @if($catalogGeometry->image_hash)
    <img src="{{ asset('images/' . $catalogGeometry->image_hash . '.webp') }}"
         style="max-height:200px; width:auto;">
@else
    Нет изображения
@endif

        </div>


        {{-- PARAMETERS --}}

        <div class="mb-4">

            <h6 class="text-muted mb-2">
                Параметри геометрії
            </h6>

            @if(!empty($catalogGeometry->parameters))

                <div class="table-responsive">

                    <table class="table table-bordered table-striped align-middle">

                        <thead>

                            <tr>
                                <th>Позначення</th>
                                <th>Назва (UA)</th>
                                <th>Название (RU)</th>
                                <th>Значення</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($catalogGeometry->parameters as $parameter)

                                <tr>

                                    <td>
                                        {{ $parameter['code'] ?? '' }}
                                    </td>

                                    <td>
                                        {{ $parameter['name'] ?? '' }}
                                    </td>

                                    <td>
                                        {{ $parameter['name_ru'] ?? '' }}
                                    </td>

                                    <td>
                                        {{ $parameter['value'] ?? '' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-muted">
                    Параметри не задані
                </div>

            @endif

        </div>


        {{-- BUTTONS --}}

        <div class="d-flex gap-2 mt-3">

            <a href="{{ route('catalog-geometry.edit', $catalogGeometry->id) }}"
               class="btn btn-outline-warning btn-sm">

                <i class="bi bi-pencil"></i>
                Редагувати

            </a>

            <button type="button"
                    class="btn btn-outline-danger btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal">

                <i class="bi bi-trash"></i>
                Видалити

            </button>

        </div>

    </div>


    {{-- DELETE MODAL --}}

    <div class="modal fade"
         id="deleteModal"
         tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Підтвердження
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    Ти точно хочеш видалити геометрію?

                </div>

                <div class="modal-footer">

                    <form action="{{ route('catalog-geometry.destroy', $catalogGeometry->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">

                            Видалити

                        </button>

                    </form>

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Скасувати

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

