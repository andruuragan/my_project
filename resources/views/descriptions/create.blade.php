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
                    <label class="form-label" for="element_name_field">Назва</label>
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
                    <label class="form-label" for="element_overview">Загальний опис</label>
                    <textarea id="element_overview"
                              name="overview"
                              class="form-control rich-text"
                              rows="3"
                              autocomplete="off">{{ old('overview') }}</textarea>
                </div>

                {{-- ADVANTAGES --}}
                <div class="mb-3">
                    <label class="form-label" for="element_advantages">Переваги</label>
                    <textarea id="element_advantages"
                              name="advantages"
                              class="form-control rich-text"
                              rows="3"
                              autocomplete="off">{{ old('advantages') }}</textarea>
                </div>

                {{-- USAGE --}}
                <div class="mb-3">
                    <label class="form-label" for="element_usage">Застосування</label>
                    <textarea id="element_usage"
                              name="usage"
                              class="form-control rich-text"
                              rows="3"
                              autocomplete="off">{{ old('usage') }}</textarea>
                </div>

                {{-- WHY CHOOSE US --}}
                <div class="mb-3">
                    <label class="form-label" for="why_choose_us_field">Чому обирають нас</label>
                    <textarea id="why_choose_us_field"
                              name="why_choose_us"
                              class="form-control rich-text"
                              rows="3"
                              autocomplete="off">{{ old('why_choose_us') }}</textarea>
                </div>

                {{-- ADDITIONAL INFO --}}
                <div class="mb-3">
                    <label class="form-label" for="additional_info_field">Додаткова інформація</label>
                    <textarea id="additional_info_field"
                              name="additional_info"
                              class="form-control rich-text"
                              rows="3"
                              autocomplete="off">{{ old('additional_info') }}</textarea>
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
                        const editorEditable = editorContainer.querySelector('.ck-editor__editable');

                        if (editorEditable) {
                            // 1. Вместо проблемного тега <label for="..."> используем современный стандарт ARIA.
                            // Переносим текст "Rich Text Editor" внутрь самого редактора как его описание.
                            editorEditable.setAttribute('aria-label', label.textContent);

                            // 2. Просто удаляем этот кривой <label>, чтобы инспектор браузера его вообще не видел
                            label.remove();
                        }
                    }
                });
            }

            // Запускаем проверку сразу
            fixCkeditorAccessibility();

            // Следим за динамическим появлением редакторов на странице
            const observer = new MutationObserver(function (mutations) {
                fixCkeditorAccessibility();
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
@endsection
