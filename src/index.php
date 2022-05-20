<?php
require_once("./checkSession.php");
$alert = checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Session-Workshop</title>
</head>
<body>
    <header>
        <nav class="header__nav--bar">
            <div class="nav__div--containerImg">
                <a class="navbar-brand" href="#">
                PHP-SESSION-WORKSHOP
                </a>
            </div>
        </nav>
    </header>
    <main class="main--container">
        <img src="../assets/logo_php.png" alt="" width="400rem" height="300rem" class="logo">
        <fieldset class ="main__filedset">
            <legend class="fieldset--legend">SIGN UP</legend>
        <form class="main__form--container" action="./validate.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailUser" placeholder="example@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="passUser">
        </div>
        <?php
            echo ($alert) ? checkLoginOut() : checkLoginError();
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </fieldset>
    </main>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>