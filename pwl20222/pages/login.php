<?php
$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if(isset($loginPressed)){
    $email = filter_input(INPUT_POST, 'txtEmail');
    $password = filter_input(INPUT_POST, 'txtPassword');
    if(trim($email) == '' || trim($password) == ''){
        echo '<div> Please input your email and password</div>';
    } else{
        $user = login($email, $password);
        if($user['email'] == $email){
            $_SESSION['registered_user'] = true;
            $_SESSION['registered_name'] = $user['name'];
            header('location:index.php');
        } else{
            echo '<div>Invalid email or Password</div>';
        }
    }

}
?>



<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col col-lg-5">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address :</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" required autofocus aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Password :</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" required placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="btnLogin">Submit</button>
            </form>
        </div>
    </div>
</div>
