<section>

    <header class="mb-4">
        <h5 class="mb-1 text-danger">
            Удаление аккаунта
        </h5>

        <p class="text-muted mb-0">
            После удаления аккаунта все данные будут безвозвратно удалены
        </p>
    </header>

    {{-- BUTTON --}}
    <button type="button"
            class="btn btn-outline-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteAccountModal">

        <i class="bi bi-trash3"></i>
        Удалить аккаунт
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
                        Подтверждение удаления
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
                            Вы уверены, что хотите удалить аккаунт? Это действие нельзя отменить.
                        </p>

                        <label class="form-label">
                            Введите пароль для подтверждения
                        </label>

                        <input type="password"
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

                            Отмена
                        </button>

                        <button type="submit"
                                class="btn btn-danger">

                            Удалить
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>
