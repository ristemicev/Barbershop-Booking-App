<div class="bg-register">
    <div class="container grayed">
        <div class="container register-sign">
            Register
        </div>
        <form action="" method="post">
            <div class="form-group mb-3">
                <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <input type="text" name="surname" placeholder="Surname" value="<?= set_value('surname') ?>" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
            </div>
            <button type="submit" class="dugme">SIGN UP
            </button>
        </form>
        <div class="d-grid">
            <a href="login">Already a member? Sign in here</a>
        </div>
    </div>
</div>