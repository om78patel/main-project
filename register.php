    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="register-page">
        <title>Registration Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <?php
        include './inc/header.php';
        ?>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Register</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile Picture</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>

                                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php
include './inc/database.php';

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $haspass = password_hash($pass, PASSWORD_DEFAULT);
    $mail = $_POST['email'];

    $duplicate = "SELECT * FROM admin WHERE email=? OR password=?";

    $stmt_duplicate = mysqli_prepare($conn, $duplicate);

    if ($stmt_duplicate === false) {
        die('Error preparing statement: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt_duplicate, "ss", $mail, $pass);
    mysqli_stmt_execute($stmt_duplicate);

    $result1 = mysqli_stmt_get_result($stmt_duplicate);

    if ($result1 === false) {
        die('Error getting result: ' . mysqli_stmt_error($stmt_duplicate));
    }

    // Check for duplicate rows
    if (mysqli_num_rows($result1) > 0) {
        echo "<script>alert('User already registered!');</script>";
    } else {
        // File upload handling
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

       
        // Insert data into the database using prepared statement
        $sql = "INSERT INTO admin (first_name, email, password, image_path) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $sql);

        if ($stmt_insert === false) {
            die('Error preparing insert statement: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt_insert, "ssss", $name, $mail, $haspass, $imagePath);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>alert('User successfully registered!');</script>";
        } else {
            echo "Error inserting data into the database: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt_insert);
    }

    mysqli_stmt_close($stmt_duplicate);
    mysqli_close($conn);
}
?>
<?php
        include './inc/footer.php';
    ?>
</body>
</html>