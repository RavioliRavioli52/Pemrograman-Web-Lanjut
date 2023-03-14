<?php
$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if (isset($loginPressed)) {
    $email = filter_input(INPUT_POST, 'mail');
    $password = filter_input(INPUT_POST, 'pass');
    if (trim($email) == '' || trim($password) == '') {
        echo '<div> Please input your email and password </div>';
    } else {
        $user = login($email, $password);
//  Salah satu
//  $result = login($email, MD5($password);
        if ($user['email'] == $email) {
            $_SESSION['registered_user'] = true;
            $_SESSION['registered_user'] = $user['name'];
            header('location:index.php');
        }
        else {
            echo '<div> Invalid email or password </div>';
        }
    }
}
?>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                       <form method="post">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="email" id="mail" name="mail" class="form-control form-control-lg" />
                                <label class="form-label" for="mail">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                <label class="form-label" for="pass">Password</label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                            <button class="btn btn-outline-light btn-lg px-5" name="btnLogin" type="submit">Login</button>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>