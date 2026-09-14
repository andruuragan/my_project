<section>

    <header class="mb-4">

        <h5 class="mb-1 text-danger">
            {{ __('profile.delete_account') }}
        </h5>

        <p class="text-muted mb-0">
            {{ __('profile.delete_account_description') }}
        </p>

    </header>

    {{-- BUTTON --}}

    <button type="button"
            class="btn btn-outline-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteAccountModal">

        <i class="bi bi-trash3"></i>

        {{ __('profile.delete_account_button') }}

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
                        {{ __('profile.delete_confirmation') }}
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
                            {{ __('profile.delete_account_question') }}
                        </p>

                        <label class="form-label" for="confirm_action_password">
                            {{ __('profile.enter_password_confirmation') }}
                        </label>

                        <input type="password"
                               id="confirm_action_password"
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
                            {{ __('profile.cancel') }}
                        </button>

                        <button type="submit"
                                class="btn btn-danger">
                            {{ __('profile.delete') }}
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>