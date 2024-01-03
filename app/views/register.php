<?php
require_once __DIR__.'/../services/userservice.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (implement this part)
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $phonenumber = htmlspecialchars($_POST["phonenumber"]);

    // Check if the username already exists
    $userService = new UserService();
    $existingUser = $userService->getUserByUsername($username);
    $errorMsg = false;

    if ($existingUser) {
        $errorMsg = true;
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create a User object
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($hashedPassword);
        $user->setEmail($email);
        $user->setName($name);
        $user->setAdres($address);
        $user->setPhoneNumber($phonenumber);

        // Insert the user into the database
        $userService->insert($user);

        // Redirect to a confirmation page or login page
        exit('<script>window.location.href = "/login";</script>');
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/registerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container registercontainer">
    <h2>Register</h2>
    <div class="card">
        <div class="card-header">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phonenumber" name="phonenumber" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="button" class="btn btn-secondary" onclick="clearFields()">Clear</button>
                <a href="login" class="btn btn-link">Login</a>
            </form>
        </div>
    </div>
    <?php
    if ($errorMsg) {
        ?> <div class="alert alert-danger mt-3" role="alert">Username already exists!</div><?php
    }
    ?>        
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function clearFields() {
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
        document.getElementById("email").value = "";
        document.getElementById("name").value = "";
        document.getElementById("address").value = "";
        document.getElementById("phoneNumber").value = "";
    }
</script>

</body>
</html>
