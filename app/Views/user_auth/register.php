<div class="bg-register">
    <div class="container grayed" id="zver sum">
        <div class="container register-sign">
            Register
        </div>
        <div class="alert alert-danger" id="greski" hidden>
        </div>
        <form action="" method="post">
            <div class="form-group mb-3">
                Register as:
                <input class="form-check-input" type="radio" name="flexRadioDefault1" value="user" id="rb1" checked onchange="hideA(this)">
                <label class="form-check-label" for="flexRadioDefault1">
                    User
                </label>
                <input class="form-check-input" type="radio" name="flexRadioDefault1" value="barbershop" onchange="hideB(this)" id="rb2">
                <label class="form-check-label" for="flexRadioDefault1">
                    Barbershop
                </label>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control">
            </div>
            <div class="form-group mb-3" id="surn">
                <input type="text" name="surname" placeholder="Surname" value="<?= set_value('surname') ?>"
                       class="form-control">
            </div>
            <div class="form-group mb-3" id="addr" hidden>
                <input type="text" name="address" placeholder="Address" value="<?= set_value('address') ?>"
                       class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"
                       class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
            </div>
            <button type="submit" class="dugme" id="prati">SIGN UP
            </button>
        </form>

        <div class="d-grid">
            <a href="login">Already a member? Sign in here</a>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/user_auth/register',
                dataType: "html",
                data: $('form').serialize(),
                success: function (response) {
                   if (response==="ok") {
                      alert("Register Successful!");
                       window.location = "/login"
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

    function hideA(x) {
        if (x.checked) {
            document.getElementById("surn").style.display="inherit";
            document.getElementById("addr").style.display="none";
        }
    }

    function hideB(x) {
        if (x.checked) {
            document.getElementById("addr").hidden = false;
            document.getElementById("surn").style.display="none";
            document.getElementById("addr").style.display="inherit";
        }
    }
</script>

