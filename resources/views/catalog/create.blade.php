@extends('layouts.main')
@section('content')
    <div class="container-1600">
    <div class="card p-3 mb-4 shadow-sm">
    <h5>Создать товар</h5>

    <form action="{{ route('catalog.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Название</label>
                <input type="text" name="name" class="form-control" placeholder="Название">
            </div>

            <div class="col-md-6">
                <label class="form-label">Тип</label>
                <input type="text" name="type" class="form-control" placeholder="Тип">
            </div>

            <div class="col-md-6">
                <label class="form-label">Толщина</label>
                <input type="text" name="thickness" class="form-control" placeholder="Толщина">
            </div>

            <div class="col-md-6">
                <label class="form-label">Марка</label>
                <input type="number" name="grade" class="form-control" placeholder="Марка">
            </div>

            <div class="col-md-6">
                <label class="form-label">Диаметр</label>
                <input type="text" name="diameter" class="form-control" placeholder="Диаметр">
            </div>

            <div class="col-md-6">
                <label class="form-label">Тип дымохода</label>
                <input type="text" name="chimneyType" class="form-control" placeholder="Тип дымохода">
            </div>

            <div class="col-md-6">
                <label class="form-label">Кожух</label>
                <input type="text" name="casing" class="form-control" placeholder="Кожух">
            </div>

            <div class="col-md-6">
                <label class="form-label">Цена</label>
                <input type="number" name="price" class="form-control" placeholder="Цена">
            </div>

            <!-- Картинка -->
            <div class="col-md-12">
                <label class="form-label">Картинка</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">

                <label class="form-label">Опис</label>

                <select name="description_id" class="form-control">

                    <option value="">Без опису</option>

                    @foreach($descriptions as $description)

                        <option value="{{ $description->id }}"
                            {{ old('description_id') == $description->id ? 'selected' : '' }}>

                            {{ $description->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="mt-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Back</a>
        </div>

    </form>
    </div>
    </div>
@endsection
