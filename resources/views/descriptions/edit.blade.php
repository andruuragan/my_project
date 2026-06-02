@extends('layouts.main')



@section('content')

<div class="container-1600">

    <div class="card shadow-sm p-3">



        <h5 class="mb-3">Редактирование</h5>



        <form action="{{ route('descriptions.update', $description->id) }}" method="POST">

            @csrf

            @method('PUT')



            {{-- NAME (Оставляем стандартный label, так как этот инпут CKEditor не трогает) --}}

            <div class="mb-3">

                <label class="form-label fw-bold" for="item-name">Название</label>

                <input type="text"

                       id="item-name"

                       name="name"

                       class="form-control @error('name') is-invalid @enderror"

                       value="{{ old('name', $description->name) }}"

                       autocomplete="name">

                @error('name')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- OVERVIEW --}}

            <div class="mb-3">

                <div class="form-label fw-bold mb-2" id="label-overview">Общее описание</div>

                <textarea id="overview"

                          name="overview"

                          aria-hidden="true"

                          aria-labelledby="label-overview"

                          class="form-control rich-text @error('overview') is-invalid @enderror"

                          rows="3">{{ old('overview', $description->overview) }}</textarea>

                @error('overview')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- ADVANTAGES --}}

            <div class="mb-3">

                <div class="form-label fw-bold mb-2" id="label-advantages">Преимущества</div>

                <textarea id="advantages"

                          name="advantages"

                          aria-hidden="true"

                          aria-labelledby="label-advantages"

                          class="form-control rich-text @error('advantages') is-invalid @enderror"

                          rows="3">{{ old('advantages', $description->advantages) }}</textarea>

                @error('advantages')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- USAGE --}}

            <div class="mb-3">

                <div class="form-label fw-bold mb-2" id="label-usage">Применение</div>

                <textarea id="usage"

                          name="usage"

                          aria-hidden="true"

                          aria-labelledby="label-usage"

                          class="form-control rich-text @error('usage') is-invalid @enderror"

                          rows="3">{{ old('usage', $description->usage) }}</textarea>

                @error('usage')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- WHY CHOOSE US --}}

            <div class="mb-3">

                <div class="form-label fw-bold mb-2" id="label-why_choose_us">Почему выбирают нас</div>

                <textarea id="why_choose_us"

                          name="why_choose_us"

                          aria-hidden="true"

                          aria-labelledby="label-why_choose_us"

                          class="form-control rich-text @error('why_choose_us') is-invalid @enderror"

                          rows="3">{{ old('why_choose_us', $description->why_choose_us) }}</textarea>

                @error('why_choose_us')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- ADDITIONAL INFO --}}

            <div class="mb-3">

                <div class="form-label fw-bold mb-2" id="label-additional_info">Дополнительная информация</div>

                <textarea id="additional_info"

                          name="additional_info"

                          aria-hidden="true"

                          aria-labelledby="label-additional_info"

                          class="form-control rich-text @error('additional_info') is-invalid @enderror"

                          rows="3">{{ old('additional_info', $description->additional_info) }}</textarea>

                @error('additional_info')

                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror

            </div>



            {{-- КНОПКИ --}}

            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-success">Обновить</button>

                <a href="{{ route('descriptions.index') }}" class="btn btn-secondary">Назад</a>

            </div>



        </form>



    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    function cleanCkeditorLabels() {

        const voiceLabels = document.querySelectorAll('.ck-voice-label');

       

        voiceLabels.forEach(label => {

            const editorContainer = label.closest('.ck-editor');

            if (editorContainer) {

                const editable = editorContainer.querySelector('.ck-editor__editable');

                if (editable) {

                    // Переносим текст в aria-label рабочей области

                    if (!editable.hasAttribute('aria-label')) {

                        editable.setAttribute('aria-label', label.textContent);

                    }

                    // Удаляем скрытый некорректный label

                    label.remove();

                }

            }

        });

    }



    // Проверяем несколько раз с небольшим интервалом, пока CKEditor рендерится

    cleanCkeditorLabels();

    setTimeout(cleanCkeditorLabels, 300);

    setTimeout(cleanCkeditorLabels, 800);



    // Следим за добавлением элементов

    const observer = new MutationObserver((mutations) => {

        for (let mutation of mutations) {

            if (mutation.addedNodes.length) {

                cleanCkeditorLabels();

            }

        }

    });



    observer.observe(document.body, { childList: true, subtree: true });

});

</script>

@endsection