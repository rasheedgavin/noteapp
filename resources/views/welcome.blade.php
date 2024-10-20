<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Notes</title>

    <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        /* Resetting some browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Background and Body Styling */
        body {
            background: linear-gradient(135deg, #4b79a1, #283e51);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Card Container for the Landing Page */
        .landing-container {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }

        /* Title Styling */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        /* Button Styling */
        a {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        a:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .landing-container {
                padding: 30px 40px;
            }

            h1 {
                font-size: 2rem;
            }

            a {
                font-size: 1rem;
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="landing-container">
        <h1>Welcome to My Notes</h1>
        <a href="{{ route('notes.index') }}">Get Started</a>
    </div>

</body>
</html>