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
            background-image: url(https://img.freepik.com/free-vector/background-gradient-green-color-modern-abstract-designs_343694-2100.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f3f4f6;
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
            background-color: #c7c9d3;
            top: -60px;
            left: -60px;
        }

        body::after {
            background-color: #b0b3ba;
            bottom: -60px;
            right: -60px;
        }

        /* Sticky Header */
        h1 {
            font-size: 2.5em;
            color: #333333;
            text-align: center;
            background-color: #c4e3cb;
            width: 100%;
            padding: 10px 0;
            border-radius: 12px;
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
            left: 30px;
            z-index: 10;
        }

        .home-icon a {
            color: #28a745;
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
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1000px;
            padding: 20px 0;
            z-index: 2;
        }

        /* Note Item Styling */
        .note-item {
            background-color: #c4e3cb;
            padding: 20px;
            border-radius: 12px;
            color: #333333;
            display: flex;
            flex-direction: column;
            gap: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: visible; /* Ensures the dropdown isn't cut off */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .note-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .note-title {
            font-weight: bold;
            font-size: 1.3em;
            color: #3a4f41;
        }

        .note-preview {
            color: #4a6057;
            font-size: 1em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .note-date {
            font-size: 0.85em;
            color: #7a8c85;
            text-align: right;
        }

        /* Three Dots Menu */
        .options-menu {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.2em;
            color: #6b7280;
            cursor: pointer;
            z-index: 3;
        }

        /* Improved Edit/Delete Options */
        .menu-options {
            position: absolute;
            top: 30px;
            right: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            gap: 8px;
            padding: 8px;
            z-index: 3;
            min-width: 120px;
            overflow: visible;
        }

        .menu-options a, .menu-options button {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #333;
            font-size: 0.9em;
            text-decoration: none;
            padding: 8px 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            background: none;
        }

        .menu-options a:hover, .menu-options button:hover {
            background-color: #f5f5f5;
        }

        /* Specific styles for the delete button */
        .menu-options button {
            color: #c0392b;
        }

        .menu-options button:hover {
            background-color: #f4c7c3;
        }

        /* Optional icons for better clarity */
        .menu-options a::before {
            content: '\f044';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 1em;
            color: #2980b9;
        }

        .menu-options button::before {
            content: '\f2ed';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 1em;
            color: inherit;
        }

        /* Floating Button Styling */
        .create-note {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10;
        }

        .create-note button {
            background-color: #28a745; 
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
            background-color: #218838; 
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
            <div class="note-item">
                <span class="options-menu" onclick="toggleMenu(this)">
                    <i class="fas fa-ellipsis-h"></i>
                </span>
                <div class="menu-options">
                    <a href="{{ route('notes.edit', ['note' => $note]) }}">Edit</a>
                    <form method="post" action="{{ route('notes.delete', ['note' => $note]) }}" style="margin: 0;">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')" title="Delete Note">Delete</button>
                    </form>
                </div>
                <a href="{{ route('notes.view', ['note' => $note]) }}" style="text-decoration: none;">
                    <div>
                        <div class="note-title">{{ $note->title }}</div>
                        <div class="note-preview">{{ $note->notes }}</div>
                        <div class="note-date">
                            {{ $note->updated_at > $note->created_at ? $note->updated_at->format('F j, g:i A') : $note->created_at->format('F j, g:i A') }}
                        </div>
                    </div>
                </a>
            </div>
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

        function toggleMenu(element) {
            var menu = element.nextElementSibling;
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.options-menu')) {
                document.querySelectorAll('.menu-options').forEach(menu => menu.style.display = 'none');
            }
        });
    </script>
</body>
</html>
