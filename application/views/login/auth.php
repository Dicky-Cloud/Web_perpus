<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In </title> 
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            width: 800px;
            height: 400px;
            display: flex;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .left, .right {
            width: 50%;
            padding: 40px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .left {
            background-color: #fff;
        }
        .right {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
        }
        .left h2 {
            margin: 0 0 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .social-icons a {
            margin: 0 10px;
            color: #333;
            font-size: 20px;
            text-decoration: none;
        }
        .left p {
            text-align: center;
            margin: 20px 0;
            color: #888;
        }
        .left input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .left a {
            display: block;
            text-align: right;
            color: #888;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .left button {
            width: 100%;
            padding: 10px;
            background-color: #00c6ff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .right h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .right p {
            text-align: center;
            margin: 20px 0;
        }
        .right button {
            padding: 10px 20px;
            background-color: transparent;
            border: 2px solid #fff;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Login</h2>  <?php if($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    
          
            <!-- Form Sign In -->
            <form action="<?php echo site_url('auth/login'); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
        </div>
        <div class="right">
            <h2>Halo, Admin!</h2>
            <p>Tidak ada yang tidak mungkin. Lakukan yang terbaik hari ini, dan lihat keajaiban esok</p>
            <p> Semangat <i class="fa-solid fa-face-smile-wink"></i></p>
          
        </div>
    </div>
</body>
</html>
