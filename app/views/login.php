<?php include 'header.php'; ?>

<?php
require_once __DIR__.'/../services/userservice.php';

// Initialize error message
$errorMsg = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create an instance of UserService
    $userService = new UserService();

    // Attempt to authenticate the user
    $authenticatedUser = $userService->authenticateUser($username, $password);
    
    if ($authenticatedUser) {
        
        // Set the authenticated user in the session
        $_SESSION['authenticatedUser'] = $authenticatedUser;

        exit('<script>window.location.href = "/";</script>');
    } else {
        $errorMsg = true;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/loginstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="logincontainer">

    <h2>Login</h2>
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
                <div class="form-group form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="clearFields()">Clear</button>
                <a href="register" class="btn btn-link">Register</a>
            </form>
        </div>
    </div>

    <?php
    if ($errorMsg) {
        ?> <div class="alert alert-danger mt-3" role="alert">Invalid username or password!</div><?php
    }
    ?>

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
