<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Welome to my Noteapp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/simple-solid-navy-blue-background-pegkdhi0fyi7d5aa.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            color: #fff;
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
            background-color: rgba(0, 50, 100, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px; 
            margin: 0; 
            padding: 20px 0; 
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF; 
            color: white; 
            border-radius: 4px; 
            text-decoration: none; 
            transition: background-color 0.3s ease; 
        }

        a:hover {
            background-color: #0056b3; 
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
