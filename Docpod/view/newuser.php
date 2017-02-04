<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Register</title>

</head>

<body>
<?php echo $message ?>
    <form action="" method="POST">

        <p>

            <input type="text" name="username" placeholder="Username" required autofocus>

        </p>

        <p>

            <input type="password" name="password_first" placeholder="Password" required>

        </p>

        <p>

            <input type="password" name="password_second" placeholder="Password repeated" required>

        </p>

        <p>

            <input type="text" name="email" placeholder="Adresse Email" required>

        </p>

        <p>

            <input type="submit" value="Register">        

        </p>

    </form>

<?php include_once "footer.php" ?>
</body>

</html>