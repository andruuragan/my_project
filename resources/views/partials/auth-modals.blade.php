<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

<div class="text-center mb-3">
    <img src="{{ asset('images/logo.png') }}"
         alt="Логотип DymSystems"
         width="80"
         height="35"
          loading="lazy"
     decoding="async">

    <div class="text-muted fw-bold fs-6 mt-3">
        Реєстрація
    </div>
</div>
                




                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register') }}" autocomplete="off">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    @if ($errors->hasBag('register') && $errors->register->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->register->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="register_name">Ім’я</label>
                        <input id="register_name" name="name" type="text" class="form-control" autocomplete="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_email">Email</label>
                        <input id="register_email" name="email" type="email" class="form-control" autocomplete="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_phone">Телефон</label>
                        <input id="register_phone" name="phone" type="tel" class="form-control"  placeholder="+38 (___) ___-__-__"  autocomplete="tel" inputmode="numeric" pattern="[0-9+() -]+" maxlength="20">
                    </div>

                    <div class="mb-3">
                        <label for="register_password">Пароль</label>
                        <input id="register_password" type="password" name="password" class="form-control" autocomplete="new-password" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_password_confirmation">Підтвердження пароля</label>
                        <input id="register_password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-warning">Зареєструватись</button>
                </div>
            </form>
        </div>
    </div>
</div>