<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-notes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Create a New Note</title>
    <style>
        /* Your existing CSS code */
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
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #4b5563;
        }

        .create-button {
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

        .create-button:hover {
            background-color: #218838;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #3a4f41;
            text-align: center;
        }

        .alert.error {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

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

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        /* Character Counter Styling */
        #characterCounter {
            font-size: 0.9rem;
            color: #666;
            text-align: right;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('notes.index') }}">
            <button class="back-button">
                <i class="fas fa-arrow-left"></i>
            </button>
        </a>
        <h1>Create New</h1>
        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('notes.save') }}">
            @csrf
            
            <div class="form-group">
                <label for="title"></label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" required>
            </div>

            <div class="form-group">
                <label for="notes"></label>
                <textarea id="notes" name="notes" class="form-control" placeholder="Your notes here..." required></textarea>
                <div id="characterCounter">0 / 10000</div>
            </div>
        </form>
        <button class="create-button" onclick="document.querySelector('form').submit();">
            <i class="fas fa-check"></i>
        </button>
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
    </script>
</body>
</html>
