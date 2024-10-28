<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Welcome to my Noteapp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://img.freepik.com/free-vector/background-gradient-green-color-modern-abstract-designs_343694-2100.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            color: #3a4f41; /* Matching text color */
            display: flex;
            flex-direction: column;
            height: 100vh; /* Full height */
            justify-content: center; /* Center content vertically */
            text-align: center; /* Center text */
        }

        .container {
            max-width: 90%; /* Fluid width */
            margin: 20px auto;
            padding: 20px;
            background-color: #c4e3cb; /* Container background */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

        h1 {
            font-size: 36px;
            margin: 0;
            padding: 20px 0;
            color: #3a4f41; /* Matching heading color */
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745; /* Button color (green) */
            color: white; /* Button text color */
            border-radius: 4px; /* Rounded corners */
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #218838; /* Darker hover effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to My Notes</h1>
        <a href="{{ route('notes.index') }}">START</a>
    </div>
</body>
</html>
