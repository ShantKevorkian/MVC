<div class = "container">
    <div class="col-md-6 offset-md-3 bg-light border border-secondary rounded mt-5">
        <h2 class="d-flex justify-content-center mt-2">Register</h2>
        <h6 class="d-flex justify-content-center mt-2 form-text text-danger"><?=$this->userError?></h6>
        <form class = "m-5" action = "/auth/register" method = "POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name = "name" placeholder="Full name" value = "<?=isset($_POST['name']) ? $_POST['name'] : ''?>">
                <small id="emailHelp" class="form-text text-danger"><?=$this->nameError?></small>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name = "email" placeholder="Enter email" value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>">
                <small id="emailHelp" class="form-text text-danger"><?=$this->emailError?></small>
                <small id="emailHelp" class="form-text text-danger"><?=$this->validateEmail?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name = "password">
                <small id="emailHelp" class="form-text text-danger"><?=$this->passError?></small>
            </div>
            <div class = "d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary mt-3">Register</button>
            </div>
            <div>
                <p class = "d-flex align-items-center justify-content-center mt-3">You already have an account?</p>
                <a href="login" class="d-flex align-items-center justify-content-center text-decoration-none">Login</a>
            </div>
        </form>
    </div>
</div