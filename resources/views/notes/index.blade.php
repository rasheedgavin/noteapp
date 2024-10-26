<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Note App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6; /* Soft gray background */
            color: #333;
            margin: 0;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            min-height: 100vh;
            overflow-y: auto;
            position: relative;
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
            background-color: #c7c9d3; /* Light gray accent */
            top: -60px;
            left: -60px;
        }

        body::after {
            background-color: #b0b3ba; /* Darker gray accent */
            bottom: -60px;
            right: -60px;
        }

        /* Sticky Header */
        h1 {
            font-size: 2.5em;
            color: #333333;
            text-align: center;
            background-color: #ffffff;
            width: 100%;
            padding: 10px 0;
            margin: 0;
            position: sticky;
            top: 0;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 5;
        }

        /* Home Icon Styling */
        .home-icon {
            align-self: flex-start;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 10;
        }

        .home-icon a {
            color: #6b7280;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .home-icon a:hover {
            color: #4b5563;
        }

        /* Note List Styling */
        .note-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Dynamic columns */
            gap: 20px;
            width: 100%;
            max-width: 1000px;
            padding: 20px 0;
            z-index: 2;
        }

        /* Note Item Styling */
        .note-item {
            background-color: #84a98c; /* Muted green */
            padding: 20px;
            border-radius: 12px;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 2;
        }

        .note-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .note-title {
            font-weight: bold;
            font-size: 1.3em;
            color: #d9e2d1; /* Lightened green for title */
        }

        .note-preview {
            color: #e0f0ff;
            font-size: 1em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .note-date {
            font-size: 0.85em;
            color: #c7c7c7;
            text-align: right;
        }

        /* Floating Button Styling */
        .create-note {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10;
        }

        .create-note button {
            background-color: #b7c7d6; /* Neutral light blue */
            color: #ffffff;
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 50%;
            font-size: 1.5em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .create-note button:hover {
            background-color: #9aa8b4;
            transform: scale(1.1);
        }

        /* Success Alert Styling */
        .alert-success {
            padding: 15px;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #16a085;
            color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
            text-align: center;
            z-index: 1000;
        }

        .alert-success.hide {
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="home-icon">
        <a href="{{ route('notes.home') }}" class="fas fa-home"></a>
    </div>
    <h1>All Notes</h1>
    
    @if(session()->has('success'))
        <div id="alert" class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="note-list">
        @foreach ($notes->reverse() as $note)
            <a href="{{ route('notes.view', ['note' => $note]) }}" class="note-item">
                <div class="note-title">{{ $note->title }}</div>
                <div class="note-preview">{{ $note->notes }}</div>
                <div class="note-date">
                    {{ $note->updated_at > $note->created_at ? $note->updated_at->format('F j, g:i A') : $note->created_at->format('F j, g:i A') }}
                </div>
            </a>
        @endforeach
    </div>
    
    <div class="create-note">
        <a href="{{ route('notes.create') }}">
            <button><i class="fas fa-pencil-alt"></i></button>
        </a>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successAlert = document.getElementById('alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.add('hide');
                }, 1500);
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 2000);
            }
        });
    </script>
</body>
</html>
