<div class="bg-register">
    <div class="container grayed" id="zver sum">
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
            <button type="submit" class="dugme" id="prati">SIGN UP
            </button>
        </form>
        <div class="d-grid">
            <a href="register">Don't have an account? Sign up here</a>
        </div>
    </div>
</div>