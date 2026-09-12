@extends('layouts.main')

@section('content')


<div class="container-1600">

    <div class="card shadow-sm p-3">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5>Створити опис</h5>

            <a href="{{ route('descriptions.index') }}" class="btn btn-secondary btn-sm">
                Назад
            </a>

        </div>

        <form action="{{ route('descriptions.store') }}" method="POST">

            @csrf

            {{-- NAME --}}
            <div class="mb-3">

                <label class="form-label" for="element_name_field">
                    Назва
                </label>

                <input type="text"
                       id="element_name_field"
                       name="name"
                       class="form-control"
                       placeholder="Назва"
                       value="{{ old('name') }}"
                       autocomplete="off">

                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror

            </div>

            {{-- OVERVIEW --}}
            <div class="mb-3">

                <label class="form-label" for="element_overview">
                    Загальний опис
                </label>

                <textarea id="element_overview"
                          name="overview"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('overview') }}</textarea>

            </div>

            {{-- OVERVIEW RU --}}
            <div class="mb-3">

                <label class="form-label" for="element_overview_ru">
                    Загальний опис (RU)
                </label>

                <textarea id="element_overview_ru"
                          name="overview_ru"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('overview_ru') }}</textarea>

            </div>

            {{-- ADVANTAGES --}}
            <div class="mb-3">

                <label class="form-label" for="element_advantages">
                    Переваги
                </label>

                <textarea id="element_advantages"
                          name="advantages"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('advantages') }}</textarea>

            </div>

            {{-- ADVANTAGES RU --}}
            <div class="mb-3">

                <label class="form-label" for="element_advantages_ru">
                    Переваги (RU)
                </label>

                <textarea id="element_advantages_ru"
                          name="advantages_ru"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('advantages_ru') }}</textarea>

            </div>

            {{-- USAGE --}}
            <div class="mb-3">

                <label class="form-label" for="element_usage">
                    Застосування
                </label>

                <textarea id="element_usage"
                          name="usage"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('usage') }}</textarea>

            </div>

            {{-- USAGE RU --}}
            <div class="mb-3">

                <label class="form-label" for="element_usage_ru">
                    Застосування (RU)
                </label>

                <textarea id="element_usage_ru"
                          name="usage_ru"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('usage_ru') }}</textarea>

            </div>

            {{-- WHY CHOOSE US --}}
            <div class="mb-3">

                <label class="form-label" for="why_choose_us_field">
                    Чому обирають нас
                </label>

                <textarea id="why_choose_us_field"
                          name="why_choose_us"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('why_choose_us') }}</textarea>

            </div>

            {{-- WHY CHOOSE US RU --}}
            <div class="mb-3">

                <label class="form-label" for="why_choose_us_ru_field">
                    Чому обирають нас (RU)
                </label>

                <textarea id="why_choose_us_ru_field"
                          name="why_choose_us_ru"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('why_choose_us_ru') }}</textarea>

            </div>

            {{-- ADDITIONAL INFO --}}
            <div class="mb-3">

                <label class="form-label" for="additional_info_field">
                    Додаткова інформація
                </label>

                <textarea id="additional_info_field"
                          name="additional_info"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('additional_info') }}</textarea>

            </div>

            {{-- ADDITIONAL INFO RU --}}
            <div class="mb-3">

                <label class="form-label" for="additional_info_ru_field">
                    Додаткова інформація (RU)
                </label>

                <textarea id="additional_info_ru_field"
                          name="additional_info_ru"
                          class="form-control rich-text"
                          rows="3"
                          autocomplete="off">{{ old('additional_info_ru') }}</textarea>

            </div>

            {{-- BUTTONS --}}
            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                    Зберегти
                </button>

                <a href="{{ route('descriptions.index') }}"
                   class="btn btn-outline-secondary"
                   aria-label="Скасувати редагування та повернутися назад">
                    Відміна
                </a>

            </div>

        </form>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        function fixCkeditorAccessibility() {

            // Находим все служебные voice-label, которые генерирует CKEditor
            document.querySelectorAll('.ck-voice-label').forEach(label => {

                const editorContainer = label.closest('.ck-editor');

                if (editorContainer) {

                    const editorEditable =
                        editorContainer.querySelector('.ck-editor__editable');

                    if (editorEditable) {

                        // Вместо проблемного label используем ARIA
                        editorEditable.setAttribute(
                            'aria-label',
                            label.textContent
                        );

                        // Удаляем проблемный label
                        label.remove();
                    }
                }
            });
        }

        // Запускаем проверку сразу
        fixCkeditorAccessibility();

        // Следим за динамическим появлением редакторов
        const observer = new MutationObserver(function () {
            fixCkeditorAccessibility();
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

    });
</script>


@endsection
