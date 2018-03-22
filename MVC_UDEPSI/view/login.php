<? session_start();?>
<html>

<head>
    <link rel="stylesheet" href="../html/library/bootstrap.css">
</head>
<body>


<form action="../controller/login_test.php" method="POST" class="form-group ">

    <input class="form-control" style="margin:50px;" type="text" id="login" name="login"  placeholder="Login">
    <input class="form-control" style="margin:50px;" type="password" id="mdp" name="mdp"  placeholder="Mot de passe">

    <button type="submit" class="btn btn-default" >Submit</button>

</form>



</body>
</html>
