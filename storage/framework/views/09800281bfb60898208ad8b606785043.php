<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.05);
        }

        h1 {
            color: #00796b;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        button {
            padding: 12px 25px;
            font-size: 18px;
            color: white;
            background: #ff5722;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 30px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #e64a19;
        }

        button:focus {
            outline: none;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to Your Dashboard</h1>
    <button id="logout">Logout</button>
    <p>Click the button to log out of your account.</p>
</div>

<script>
    $(document).ready(function() {
        $('#logout').click(function() {
            $.ajax({
                url: "<?php echo e(route('ajax.logout')); ?>",
                type: "POST",
                data: { _token: "<?php echo e(csrf_token()); ?>" },
                success: function(response) {
                    alert(response.message);
                    window.location.href = "<?php echo e(route('login.page')); ?>"; // Redirects to login
                },
                error: function(xhr) {
                    alert("Logout failed! Please try again.");
                }
            });
        });
    });
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\act\activity6\resources\views/dashboard.blade.php ENDPATH**/ ?>