<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Car Rental Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://cdn.wallpapersafari.com/19/69/mRIjdG.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            color: white;
            overflow: hidden;
        }
        .centered {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: rgba(0,0,0,0.6);
        }
        h1 {
            font-size: 60px;
            font-weight: bold;
            text-shadow: 2px 2px 4px #000;
            animation: fadeIn 2s ease-in-out;
        }
        p {
            font-size: 25px;
            margin-top: 10px;
            animation: fadeIn 2s ease-in-out;
            animation-delay: 1s;
        }
        .btn-enter {
            margin-top: 20px;
            padding: 12px 30px;
            font-size: 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        /* Hover effect for the button */
        .btn-enter:hover {
            background-color: #ff9800;
            transform: scale(1.1);
        }

        /* Parallax scrolling effect */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Make background move slowly to create parallax effect */
        .parallax {
            animation: moveBackground 10s infinite linear;
        }

        @keyframes moveBackground {
            0% { background-position: center center; }
            50% { background-position: center top; }
            100% { background-position: center center; }
        }
    </style>
</head>
<body class="parallax">
    <div class="centered">
        <h1>Welcome to Car Rental Service 🚗</h1>
        <p>Rent Your Dream Car Today!</p>
        <a href="index.php" class="btn btn-primary btn-enter">Enter Site</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
