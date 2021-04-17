<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class = "bg-dark">
        <div class = "container">
            <div class = "col-sm-6 offset-md-3">
                <div class="bg-light border border-secondary rounded mt-5">
                    <div class = "bg-secondary">
                        <h2 class="d-flex justify-content-center p-3 text-light">Register</h2>
                    </div>
                    <h6 class="d-flex justify-content-center mt-2 form-text text-danger"><?=$this->userError?></h6>
                    <form class = "m-5" action = "/auth/register" method = "POST">
                        <div class="form-group">
                            <label for="name">Name <span class = "text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name = "name" placeholder="Full name" value = "<?=isset($_POST['name']) ? $_POST['name'] : ''?>">
                            <small id="emailHelp" class="form-text text-danger"><?=$this->nameError?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address <span class = "text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name = "email" placeholder="Enter email" value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>">
                            <small id="emailHelp" class="form-text text-danger"><?=$this->emailError?></small>
                            <small id="emailHelp" class="form-text text-danger"><?=$this->validateEmail?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class = "text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name = "password">
                            <small id="emailHelp" class="form-text text-danger"><?=$this->passError?></small>
                        </div>
                        <div class = "d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary mt-3">Register</button>
                        </div>
                        <div>
                            <p class = "d-flex align-items-center justify-content-center mt-3">You already have an account?</p>
                            <a href="login" class="d-flex align-items-center justify-content-center">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>