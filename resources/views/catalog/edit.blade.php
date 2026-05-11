@extends('layouts.main')
@section('content')

    <h5>Редактировать</h5>

    <div class="card p-3 mb-4 shadow-sm">
        <form action="{{ route('catalog.update', $catalog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Название</label>
                    <input type="text" name="name" class="form-control" value="{{ $catalog->name }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Тип</label>
                    <input type="text" name="type" class="form-control" value="{{ $catalog->type }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Толщина</label>
                    <input type="text" name="thickness" class="form-control" value="{{ $catalog->thickness }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Марка</label>
                    <input type="number" name="grade" class="form-control" value="{{ $catalog->grade }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Диаметр</label>
                    <input type="text" name="diameter" class="form-control" value="{{ $catalog->diameter }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Тип дымохода</label>
                    <input type="text" name="chimneyType" class="form-control" value="{{ $catalog->chimneyType }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Кожух</label>
                    <input type="text" name="casing" class="form-control" value="{{ $catalog->casing == 'н' ? '-' : $catalog->casing }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Цена</label>
                    <input type="number" name="price" class="form-control" value="{{ $catalog->price }}">
                </div>

                <div class="col-md-12">

                    <label class="form-label">Опис</label>

                    <select name="description_id" class="form-control">

                        <option value="">Без опису</option>

                        @foreach($descriptions as $description)

                            <option value="{{ $description->id }}"
                                {{ $catalog->description_id == $description->id ? 'selected' : '' }}>

                                {{ $description->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Картинка (занимает всю ширину справа/снизу) -->
                <div class="col-md-12">
                    <label class="form-label">Картинка</label>

                    @if($catalog->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $catalog->image) }}"
                                 style="max-width: 200px;">
                        </div>




                        <button type="button"
                                class="btn btn-outline-danger btn-sm btn-icon"
                                title="Удалить картинку"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteImageModal"
                                data-id="{{ $catalog->id }}">
                            <i class="bi bi-trash"></i>
                        </button>

                    @endif

                    <input type="file" name="image" class="form-control">
                </div>

            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success btn-icon">
                    <i class="bi bi-save"></i> Сохранить
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-icon">
                    <i class="bi bi-arrow-left"></i>Back</a>
            </div>

        </form>
    </div>
    <div class="modal fade" id="deleteImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Удаление изображения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Ты точно хочешь удалить изображение?
                </div>

                <div class="modal-footer">

                    <form method="POST" action="{{ route('catalog.image.remove', $catalog->id) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger ">Удалить картинку</button>
                    </form>

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Отмена
                    </button>

                </div>

            </div>
        </div>
    </div>

@endsection
