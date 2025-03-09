<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background: #218838;
        }
        #registerMessage {
            margin-top: 10px;
            font-weight: bold;
        }
        .link {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form id="registerForm">
        <?php echo csrf_field(); ?>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
        <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name (Optional)">
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <p id="registerMessage"></p>
    <a href="<?php echo e(route('login.page')); ?>" class="link">Back to Login</a>
</div>

<script>
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        
        let formData = $(this).serialize();

        $.post("<?php echo e(route('ajax.register')); ?>", formData)
        .done(function(response) {
            $('#registerMessage').text(response.message).css('color', 'green');
            setTimeout(() => {
                window.location.href = response.redirect;
            }, 2000);
        })
        .fail(function(xhr) {
            let errorMessage = "Registration failed! Please check your input.";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            $('#registerMessage').text(errorMessage).css('color', 'red');
        });
    });
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\act\activity6\resources\views/register.blade.php ENDPATH**/ ?>