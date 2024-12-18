<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login user</title>
    <style>
      /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Body Background */
body {
    background: linear-gradient(120deg, #3498db, #8e44ad);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Form Container */
.form-container {
    background-color: #ffffff;
    width: 350px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Form Title */
.form-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Form Groups */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: 0.3s;
}

/* Input Focus */
.form-group input:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

/* Button Styling */
.form-btn {
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-btn:hover {
    background-color: #2980b9;
}

/* Form Text */
.form-text {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    color: #555;
}

.form-text a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
}

.form-text a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body> 

<div class="form-container">
    <form action="<?php echo base_url('auth/logiin')?>" method="POST" class="form">
        <h2 class="form-title">Login</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="form-btn">Login</button>
        <p class="form-text">
            Don't have an account? <a href="<?= base_url('auth/registrasi')?>">Register here</a>
        </p>
        <div id="menghilang">
                <?php echo $this->session->flashdata('alert', true);?>
            </div>
    </form>
</div>


</body>
</html>


