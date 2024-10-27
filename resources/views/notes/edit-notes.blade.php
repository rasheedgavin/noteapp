<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit-notes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Edit Note</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6; /* Background color */
            color: #333; /* Text color */
            margin: 0;
            padding: 0 20px; /* Horizontal padding */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* Background Graphics */
        body::before,
        body::after {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 1;
        }

        body::before {
            background-color: #c7c9d3;
            top: -60px;
            left: -60px;
        }

        body::after {
            background-color: #b0b3ba;
            bottom: -60px;
            right: -60px;
        }

        /* Container Styling */
        .container {
            width: 95%;
            max-width: 600px; /* Width of container */
            height: 90vh; /* Increased height for more content space */
            padding: 30px; /* Padding */
            background-color: #c4e3cb; /* Container background color */
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2); /* Shadow */
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2; /* Ensures container is above background */
            overflow: hidden; /* Prevent overflow */
        }

        /* Back Button */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #4b5563; /* Change to your desired color */
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #4b5563;
        }

        /* Title */
        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem; /* Title size */
            color: #3a4f41; /* Title color */
            text-align: center; /* Centered text */
        }

        /* Alert Styles */
        .alert.error {
            background-color: #f44336; /* Error background */
            color: white; /* Error text */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 0px; /* Remove spacing between form groups */
        }

        .form-control {
            width: 100%; /* Full width */
            padding: 10px; /* Inner spacing */
            border: 1px solid #ddd; /* Light border */
            border-radius: 4px; /* Rounded borders */
            font-size: 16px; /* Font size */
            box-sizing: border-box; /* Include padding in width */
            background-color: #ffffff; /* Input background */
            color: #4a6057; /* Input text color */
        }

        textarea.form-control {
            resize: vertical; /* Allow vertical resizing */
            height: 350px; /* Set initial height for textarea */
            max-height: 65vh; /* Max height for responsiveness */
            min-height: 150px; /* Min height for usability */
        }

        /* Actions Container */
        .actions {
            text-align: center; /* Centered actions */
            margin-top: 20px; /* Spacing above actions */
        }

        .update-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #28a745; 
            color: white; /* Text color */
            border: none;
            border-radius: 50%;
            width: 60px; /* Size */
            height: 60px; /* Size */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
            z-index: 10; /* Ensure it's above other elements */
            font-size: 24px; /* Increase font size for better visibility */
        }

        .update-button:hover {
            background-color: #218838; 
        }

    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i> <!-- Back arrow icon -->
        </button>
        
        <h1>Edit Note</h1>
        
        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('notes.update', ['note' => $note]) }}" style="flex-grow: 1; display: flex; flex-direction: column;">
            @csrf
            @method('put')
            
            <div class="form-group">
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $note->title }}" required>
            </div>

            <div class="form-group">
                <textarea id="notes" name="notes" class="form-control" placeholder="Your notes here..." required>{{ $note->notes }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="update-button">
                    <i class="fas fa-check"></i> <!-- Check icon -->
                </button>
            </div>
        </form>
    </div>
</body>
</html>
