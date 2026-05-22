<section>

    <header class="mb-4">
        <h5 class="mb-1 text-danger">
            Видалення облікового запису
        </h5>

        <p class="text-muted mb-0">
            Після видалення облікового запису всі дані будуть безповоротно видалені
        </p>
    </header>

    {{-- BUTTON --}}
    <button type="button"
            class="btn btn-outline-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteAccountModal">

        <i class="bi bi-trash3"></i>
        Видалити обліковий запис
    </button>

    {{-- MODAL --}}
    <div class="modal fade"
         id="deleteAccountModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        Підтвердження видалення
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <form method="post"
                      action="{{ route('profile.destroy') }}">

                    @csrf
                    @method('delete')

                    <div class="modal-body">

                        <p class="mb-3">
                            Ви впевнені, що хочете видалити обліковий запис? Цю дію не можна скасувати.
                        </p>

                        <!-- Добавляем for="confirm_action_password" -->
                        <label class="form-label" for="confirm_action_password">
                            Введіть пароль для підтвердження
                        </label>

                        <!-- Добавляем id="confirm_action_password" в сам инпут -->
                        <input type="password" id="confirm_action_password"
                               name="password"
                               class="form-control"
                               required>

                        @error('password', 'userDeletion')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">

                            Скасування
                        </button>

                        <button type="submit"
                                class="btn btn-danger">

                            Видалити
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>
