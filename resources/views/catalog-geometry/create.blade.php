@extends('layouts.main')

@section('content')
<div class="container-1600">
    <div class="card shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Створити геометрію</h5>
            <a href="{{ route('catalog-geometry.index') }}" class="btn btn-secondary btn-sm">
                Назад
            </a>
        </div>

        <form action="{{ route('catalog-geometry.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NAME --}}
            <div class="mb-4">
                <label class="form-label" for="geometry_name">Назва геометрії</label>
                <input type="text"
                       id="geometry_name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Назва"
                       value="{{ old('name') }}"
                       autocomplete="off">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- PARAMETERS --}}
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0">Параметри геометрії</label>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="addParameter">
                        + Додати параметр
                    </button>
                </div>

                <div id="parametersContainer">
                    <div class="parameter-row border rounded p-3 mb-2">
                        <div class="row g-2 align-items-end">
                            {{-- CODE --}}
                            <div class="col-md-2">
                                <label class="form-label">Позначення</label>
                                <input type="text"
                                       name="parameters[0][code]"
                                       class="form-control"
                                       placeholder="">
                            </div>

                            {{-- NAME UA --}}
                            <div class="col-md-3">
                                <label class="form-label">Назва (UA)</label>
                                <input type="text"
                                       name="parameters[0][name]"
                                       class="form-control"
                                       placeholder="">
                            </div>

                            {{-- NAME RU --}}
                            <div class="col-md-3">
                                <label class="form-label">Название (RU)</label>
                                <input type="text"
                                       name="parameters[0][name_ru]"
                                       class="form-control"
                                       placeholder="">
                            </div>

                            {{-- VALUE --}}
                            <div class="col-md-3">
                                <label class="form-label">Значення</label>
                                <input type="text"
                                       name="parameters[0][value]"
                                       class="form-control"
                                       placeholder="">
                            </div>

                            {{-- DELETE --}}
                            <div class="col-md-1 text-end">
                                <button type="button"
                                        class="btn btn-outline-danger remove-parameter"
                                        title="Видалити параметр">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @error('parameters')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- IMAGE --}}
            <div class="mb-4">
                <label class="form-label" for="geometry_image">Картинка геометрії</label>
                <input type="file"
                       id="geometry_image"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror"
                       accept=".webp,image/webp">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-text">
                    Формат: WebP, максимальний розмір — 2 МБ.
                </div>
            </div>

            {{-- BUTTONS --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Зберегти</button>
                <a href="{{ route('catalog-geometry.index') }}" class="btn btn-outline-secondary">
                    Скасувати
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('parametersContainer');
    const addButton = document.getElementById('addParameter');

    let parameterIndex = 1;

    addButton.addEventListener('click', function () {

        const row = document.createElement('div');

        row.className = 'parameter-row border rounded p-3 mb-2';

        row.innerHTML = `
            <div class="row g-2 align-items-end">

                <div class="col-md-2">
                    <label class="form-label">
                        Позначення
                    </label>

                    <input type="text"
                           name="parameters[${parameterIndex}][code]"
                           class="form-control"
                           placeholder="">
                </div>

                <div class="col-md-3">
                    <label class="form-label">
                        Назва (UA)
                    </label>

                    <input type="text"
                           name="parameters[${parameterIndex}][name]"
                           class="form-control"
                           placeholder="">
                </div>

                <div class="col-md-3">
                    <label class="form-label">
                        Название (RU)
                    </label>

                    <input type="text"
                           name="parameters[${parameterIndex}][name_ru]"
                           class="form-control"
                           placeholder="">
                </div>

                <div class="col-md-3">
                    <label class="form-label">
                        Значення
                    </label>

                    <input type="text"
                           name="parameters[${parameterIndex}][value]"
                           class="form-control"
                           placeholder="">
                </div>

                <div class="col-md-1 text-end">
                    <button type="button"
                            class="btn btn-outline-danger remove-parameter"
                            title="Видалити параметр">

                        <i class="bi bi-trash"></i>

                    </button>
                </div>

            </div>
        `;

        container.appendChild(row);

        parameterIndex++;
    });


    container.addEventListener('click', function (event) {

        const button = event.target.closest('.remove-parameter');

        if (!button) {
            return;
        }

        const row = button.closest('.parameter-row');

        if (row) {
            row.remove();
        }

    });

});
</script>
@endsection