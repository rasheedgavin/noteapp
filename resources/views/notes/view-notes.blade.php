<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0 20px;
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
            max-width: 600px;
            height: 90vh; /* Increased height for more content space */
            padding: 20px;
            background-color: #c4e3cb;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        /* Back Icon */
        .back-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #6b7280;
            font-size: 24px;
            transition: color 0.3s ease;
            z-index: 3;
            text-decoration: none; /* Remove underline */
        }

        .back-icon:hover {
            color: #4b5563;
        }

        /* Title and Date */
        .title {
            text-align: left; /* Align title and date to the left */
            margin-top: 50px; /* Spacing between back icon and title */
        }

        .title h2 {
            font-size: 1.8em;
            font-weight: bold;
            color: #3a4f41;
            margin: 0;
            padding-bottom: 5px;
        }

        .timestamps {
            font-size: 0.85em;
            color: #7a8c85;
            margin: 0;
        }

        /* Note Content */
        .note-item {
            flex-grow: 1;
            padding: 15px;
            background-color: #ffffff;
            color: #4a6057;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            margin-top: 15px;
            overflow-y: auto;
            max-height: calc(90vh - 150px); /* Adjusted for new container height */
        }

        .note-item p {
            margin: 0;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        /* Buttons Styling */
        .edit-button, .delete-button {
            color: white;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .edit-button {
            background-color: #8fc1a9;
        }

        .edit-button:hover {
            background-color: #7da591;
            transform: scale(1.1);
        }

        .delete-button {
            background-color: rgba(255, 0, 0, 0.8);
        }

        .delete-button:hover {
            background-color: rgba(255, 0, 0, 1);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('notes.index') }}" class="back-icon fas fa-arrow-left" title="Back"></a>

        <div class="title">
            <h2>{{ $note->title ?? 'Untitled' }}</h2>
            <p class="timestamps">
                @if ($note->updated_at > $note->created_at)
                    Last updated: {{ $note->updated_at->format('F j, g:i A') }}
                @else
                    Created on: {{ $note->created_at->format('F j, g:i A') }}
                @endif
            </p>
        </div>

        <div class="note-item">
            <p>{{ $note->notes }}</p>
        </div>

        <div class="button-container">
            <a href="{{ route('notes.edit', ['note' => $note]) }}" class="edit-button fas fa-edit" title="Edit Note"></a>
            <form method="post" action="{{ route('notes.delete', ['note' => $note]) }}" style="margin: 0;">
                @csrf
                @method('delete')
                <button type="submit" class="delete-button fas fa-trash" onclick="return confirm('Are you sure you want to delete this note?')" title="Delete Note"></button>
            </form>
        </div>
    </div>
</body>
</html>
