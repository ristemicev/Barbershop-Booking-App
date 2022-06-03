<div class="bg-register">
    <div class="container grayed">
        <div class="container register-sign">
            Sign in
        </div>
        <div class="alert alert-danger" id="greski" hidden>
        </div>
        <form action="" method="post" class="mb-5 mx-5 font_poppins">
            <div class="register__input_form">
                <div class="form-group mb-3">
                    <label for="email" class="font_poppins">Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control font_poppins">
                </div>
                <div class="form-group mb-5">
                    <label for="password" class="font_poppins">Password</label>
                    <input type="password" name="password" placeholder="*************" class="form-control font_poppins">
                </div>
            </div>
            <button type="submit" class="form__submit_button px-4 py-2" id="prati">
                SIGN IN
                <i class="fa fa-arrow-right-long"></i>
            </button>
        </form>
        <div class="d-grid">
            <a href="register" class="font_poppins">Don't have an account? Sign up here</a>
        </div>
    </div>
</div>

<script>
    $(function() {

        $('form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/user_auth/login',
                dataType: "html",
                data: $('form').serialize(),
                success: function(response) {
                    if (response === "ok") {
                        alert("Login Successful!");
                        window.location = "/afterLogin"
                    } else {
                        document.getElementById("greski").hidden = false;
                        $('#greski').html(response);
                    }
                },
                error: function(result) {
                    $('body').html("err");
                },
            });

        });

    });
</script>