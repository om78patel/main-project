<?php

require './inc/database.php';

// variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

// validate
$ok = true;
require './inc/header.php';

if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($confirm)) {
    echo '<p>All fields are required</p>';
    $ok = false;
}

if (strlen($password) < 6) {
    echo '<p>Password must be at least 6 characters long</p>';
    $ok = false;
}

if ($password != $confirm) {
    echo '<p>Passwords do not match</p>';
    $ok = false;
}

// Check for duplicate username or email
$stmt = $conn->prepare("SELECT user_id FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->fetch()) {
    echo '<p>Username already exists. Please choose a different username.</p>';
    $ok = false;
}

if ($ok) {
   // Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into the database
$sql = "INSERT INTO admin (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $first_name, $last_name, $username, $hashed_password);
$stmt->execute();

    echo '<section class="success-row">';
    echo '<div>';
    echo '<h3>Admin Saved</h3>';
    echo '</div>';
    echo '</section>';

    $conn = null;
} else {
    echo '<section class="error-row">';
    echo '<div>';
    echo '<h3>Error in registration. Please check your inputs and try again.</h3>';
    echo '</div>';
    echo '</section>';
}
?>

<section class="row success-back-row">
    <div>
        <p>All set up, click the button below to head to the sign-in page!</p>
        <a href="login.php" class="btn btn-primary">Sign In</a>
    </div>
</section>

<?php require './inc/footer.php'; ?>
