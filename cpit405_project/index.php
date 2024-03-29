<?php
include 'db.php';
?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database
    $sql = "SELECT * FROM login_ WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Redirect to index.html or index.php (depending on your file name)
        header("Location: main.php");
        exit;
    } else {
      echo '<p class="error-message">Invalid username or password.</p>';
      echo '<style>';
      echo '.error-message {';
      echo ' width:350px;font-size: 20px; color: rgb(214, 4, 4); text-align: center;
      border: 1px solid red;   position: absolute;
      left: 37%;
      top: 560px;';
      echo '}';
      echo '</style>';  
   }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>
</head>

<body>
    <h2 style="text-align: center;">Welcome back!</h2>

    <div class="login_container">
        <div class="content">
            <h2 style="text-align: center;">Sign In</h2>
            <div class="text">
            </div>
            <form action="index.php" method="post">
                <div class="field">
                    <input required="" type="text" class="input" name="username">
                    <span class="span"><svg class="" xml:space="preserve"
                                style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20"
                                width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path class="" data-original="#000000" fill="#595959"
                                        d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z">
                                    </path>
                                </g>
                            </svg></span>
                    <label class="label">Username</label>
                </div>
                <div class="field">
                    <input required="" type="password" class="input" name="password">
                    <span class="span"><svg class="" xml:space="preserve"
                                style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20"
                                width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path class="" data-original="#000000" fill="#595959"
                                        d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0">
                                    </path>
                                </g>
                            </svg></span>
                    <label class="label">Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <button class="button">Sign in</button>
                <div class="sign-up">
                    Create New Account
                    <a href="signup.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>