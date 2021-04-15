<div class = "container">
    <div class="col-md-6 offset-md-3 bg-light border border-secondary rounded mt-5">
        <h2 class="d-flex justify-content-center mt-2">Login</h2>
        <h6 class="d-flex justify-content-center mt-2 form-text text-danger"><?=$this->loginError?></h6>
        <form class = "m-5" action = "/auth/login" method = "POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-danger"><?=$this->emailError?></small>
                <small id="emailHelp" class="form-text text-danger"><?=$this->validateEmail?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name = "password">
                <small id="emailHelp" class="form-text text-danger"><?=$this->passError?></small>
            </div>
            <div class = "d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary mt-3">Login</button>
            </div>
            <div>
                <p class = "d-flex align-items-center justify-content-center mt-3">You don't have an account?</p>
                <a href="register" class="d-flex align-items-center justify-content-center text-decoration-none">Register</a>
            </div>
        </form>
    </div>
</div>