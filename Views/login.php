<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class = "bg-dark">
        <div class = "container">
            <div class="col-md-6 offset-md-3 bg-light border border-secondary rounded mt-5">
                <h2 class="d-flex justify-content-center mt-2">Login</h2>
                <h6 class="d-flex justify-content-center mt-2 form-text text-danger"><?=$this->loginError?></h6>
                <form class = "m-5" action = "/auth/login" method = "POST">
                    <div class="form-group">
                        <label for="email">Email address <span class = "text-danger">*</span></label>
                        <input type="email" class="form-control" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-danger"><?=$this->emailError?></small>
                        <small id="emailHelp" class="form-text text-danger"><?=$this->validateEmail?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class = "text-danger">*</span></label>
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
    </body>
</html>