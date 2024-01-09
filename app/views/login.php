<?php include 'header.php'; ?>

<?php
require_once __DIR__ . '/../controllers/usercontroller.php';

$loginController = new UserController();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $loginController->authenticateUser();
    } 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/loginstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Galatasaray</title>
    <link rel="icon" type="image/jpg" href="images/favicon4.jpg">
</head>
<body>
<div class="logincontainer">

    <h1 class="text-center fw-bold">Login</h2>
    <div class="card">
        <div class="card-header">
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="clearFields()">Clear</button>
                <a href="register" class="btn btn-link">Register</a>
            </form>
        </div>
    </div>

</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function clearFields() {
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
    }
</script>



</body>
</html>

<?php include 'footer.php'; ?>