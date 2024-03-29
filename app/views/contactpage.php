<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/contactpagestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<div class="container mt-100">

    <?php
    // Check if the form has been submitted
    if ($inserted) {
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Thank you!</h4>
            <p>Your message has been sent.</p>
            <hr>
            <p class="mb-0">We will get back to you as soon as possible.</p> 
        </div>
        <?php

        
    }
    ?>

<h1 class="text-center fw-bold">Contactpage</h1>

    <form method="POST" name="form" action="" id="guestbook-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email please">

        <label for="subject">Subject:</label> 
        <textarea id="subject" name="subject" placeholder="Subject" required></textarea>

        <label for="message">Message:</label> 
        <textarea id="message" name="message" placeholder="Message" required></textarea>

        <button type="submit">Submit</button>
    </form>
    
</div>


</body>
</html>


<?php include 'footer.php'; ?>