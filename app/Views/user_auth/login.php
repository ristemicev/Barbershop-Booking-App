<div class="bg-register">
    <div class="container grayed">
        <div class="container register-sign">
            Login
        </div>
        <div class="alert alert-danger" id="greski" hidden>
        </div>
        <form action="" method="post">
            <div class="form-group mb-3">
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"
                       class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="dugme" id="prati">SIGN IN
            </button>
        </form>
        <div class="d-grid">
            <a href="register">Don't have an account? Sign up here</a>
        </div>
    </div>
</div>

<script>

    $(function () {

        $('form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/user_auth/login',
                dataType: "html",
                data: $('form').serialize(),
                success: function (response) {
                    if (response==="ok") {
                        alert("Login Successful!");
                        window.location = "/afterLogin"
                    } else {
                        document.getElementById("greski").hidden = false;
                        $('#greski').html(response);
                    }
                },
                error: function (result) {
                    $('body').html("err");
                },
            });

        });

    });
</script>