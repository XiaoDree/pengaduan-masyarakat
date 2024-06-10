<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lupa Password</h1>

        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if (isset($success)) { ?>
            <div class="success"><?php echo $success; ?></div>
        <?php } ?>

        <?php echo form_open('forgot-password/reset'); ?>
            <label for="email">No. Telfon:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Reset Password</button>
        <?php echo form_close(); ?>

        <p>Remember your password? <a href="<?= base_url('Auth/LoginController'); ?>">Login</a></p>
    </div>
</body>
</html>