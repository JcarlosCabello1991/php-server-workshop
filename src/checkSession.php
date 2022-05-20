<?php

function checkSession(){
    session_start();

    $urlFile = basename($_SERVER['REQUEST_URI'],'?' .$_SERVER['QUERY_STRING']);

    if($urlFile == "index.php"){
        if(isset($_SESSION["email"])){
            header("Location:./panel.php");
        }else{
            if($alert = checkLoginError()){
                return $alert;
            }
            if($alert = checkLoginOut()){
                return $alert;
            }
        }
    }
}

function verifyInputs(){
    $email = "jc@go.com";
    $password = "12345";
    $alert = "";

    session_start();

    if($_POST["emailUser"] === $email){
        if(password_verify($_POST["passUser"], password_hash($password, PASSWORD_DEFAULT))){
            session_start();
            $_SESSION["emailUser"] = $email;
            $_SESSION["passUser"] = $password;
            header("Location:./panel.php");
        }else{
            $alert = "incorrect email";
            $_SESSION["loginError"] = "Incorrect password";
            header("Location:./index.php");
        }
    }else{
        $alert = "incorrect email";
        $_SESSION["loginError"] = "Incorrect email";
        header("Location:./index.php");
    }
}

function logOutSession(){
    session_start();
    unset($_SESSION);
    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(),
        '',
        time()-42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]);
    }
    session_destroy();
    header("Location:./index.php?logout=true");
}

function checkLoginError(){
    if(isset($_SESSION["loginError"])){
        $class = "msg-alert";
        return "<p class=".$class.">".$_SESSION["loginError"]."</p>";
    }
}

function checkLoginOut(){
    if(isset($_GET["logout"]) && !(isset($_SESSION["email"]))){
        $class = "msg-alert";
        return "<p class=".$class.">Logout Successful!!</p>";
    }
}
?>