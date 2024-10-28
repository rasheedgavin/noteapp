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
            min-height: 100vh;
            overflow-y: auto;
        }

        /* Background Graphics */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 1;
        }
        body::before { background-color: #c7c9d3; top: -60px; left: -60px; }
        body::after { background-color: #b0b3ba; bottom: -60px; right: -60px; }

        /* Container Styling */
        .container {
            width: 95%;
            max-width: 600px;
            height: 90vh;
            padding: 30px;
            background-color: #c4e3cb;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
            overflow: hidden;
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
            color: #4b5563;
            transition: color 0.3s;
        }
        .back-button:hover { color: #4b5563; }

        /* Title */
        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #3a4f41;
            text-align: center;
        }

        /* Timestamp */
        .timestamp {
            text-align: right;
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 10px;
        }

        /* Alert Styles */
        .alert.error {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 0px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #ffffff;
            color: #4a6057;
        }
        textarea.form-control {
            resize: vertical;
            height: 350px;
            max-height: 65vh;
            min-height: 150px;
        }

        /* Counter Styling */
        .character-counter {
            margin-top: 5px;
            text-align: right;
            color: #555;
            font-size: 0.9rem;
        }

        /* Actions Container */
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .update-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
            z-index: 10;
            font-size: 24px;
        }
        .update-button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i>
        </button>

        <h1>Edit Note</h1>

        <!-- Real-time Timestamp -->
        <div class="timestamp" id="timestamp"></div>

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
                <div class="character-counter" id="characterCounter">0 / 10000</div>
            </div>

            <div class="actions">
                <button type="submit" class="update-button">
                    <i class="fas fa-check"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        // Character counting logic
        const notesTextarea = document.getElementById('notes');
        const characterCounter = document.getElementById('characterCounter');
        const maxCharacters = 10000;

        notesTextarea.addEventListener('input', () => {
            const currentLength = notesTextarea.value.length;
            characterCounter.textContent = `${currentLength} / ${maxCharacters}`;
            if (currentLength >= maxCharacters) {
                notesTextarea.value = notesTextarea.value.substring(0, maxCharacters);
            }
        });
        characterCounter.textContent = `${notesTextarea.value.length} / ${maxCharacters}`;

        // Real-time timestamp logic
        const timestampElement = document.getElementById('timestamp');
        function updateTimestamp() {
            const now = new Date();
            const formattedTime = now.toLocaleString();
            timestampElement.textContent = `Last edited: ${formattedTime}`;
        }

        // Update timestamp on page load and input changes
        updateTimestamp();
        notesTextarea.addEventListener('input', updateTimestamp);
    </script>
</body>
</html>
