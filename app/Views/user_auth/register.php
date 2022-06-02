<div class="bg-register">
    <div class="container grayed" id="zver sum">
        <div class="container register-sign">
            Sign up
        </div>
        <div class="alert alert-danger" id="greski" hidden>
        </div>
        <form action="" method="post" class="mb-4 mx-5 font_poppins">
            <div class="register__input_form font_poppins mb-4">
                Sign up as<br>
                <div class="form-group mb-1 mt-1 p-2 transparent_bg_box radio_box d-flex flex-row ">
                    <div class="">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" value="user" id="rb1" checked onchange="hideA(this)">
                        <label class="form-check-label font_poppins" for="flexRadioDefault1">
                            User
                        </label>
                    </div>
                    <div class="mx-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" value="barbershop" onchange="hideB(this)" id="rb2">
                        <label class="form-check-label font_poppins" for="flexRadioDefault1">
                            Barbershop
                        </label>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <label for="name" class="font_poppins">Name</label>
                    <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control font_poppins">
                </div>
                <div class="form-group mb-1" id="surn">
                    <label for="surname" class="font_poppins">Surname</label>
                    <input type="text" name="surname" placeholder="Surname" value="<?= set_value('surname') ?>" class="form-control font_poppins">
                </div>
                <div class="form-group mb-1" id="addr" hidden>
                    <label for="address" class="font_poppins">Address</label>
                    <input type="text" name="address" placeholder="Address" value="<?= set_value('address') ?>" class="form-control font_poppins">
                </div>
                <div class="form-group mb-1">
                    <label for="email" class="font_poppins">Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control font_poppins">
                </div>
                <div class="form-group mb-1">
                    <label for="password" class="font_poppins">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control font_poppins">
                </div>
                <div class="form-group mb-1">
                    <label for="confirmpassword" class="font_poppins">Confirm Passowrd</label>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control font_poppins">
                </div>
            </div>
            <button type="submit" class="form__submit_button px-4 py-2" id="prati">
                SIGN UP
                <i class="fa fa-arrow-right-long"></i>
            </button>

        </form>

        <div class="d-grid">
            <a href="login" class="font_poppins">Already a member? Sign in here</a>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/user_auth/register',
                dataType: "html",
                data: $('form').serialize(),
                success: function(response) {
                    if (response === "ok") {
                        alert("Register Successful!");
                        window.location = "/login"
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

    function hideA(x) {
        if (x.checked) {
            document.getElementById("surn").style.display = "inherit";
            document.getElementById("addr").style.display = "none";
        }
    }

    function hideB(x) {
        if (x.checked) {
            document.getElementById("addr").hidden = false;
            document.getElementById("surn").style.display = "none";
            document.getElementById("addr").style.display = "inherit";
        }
    }
</script>