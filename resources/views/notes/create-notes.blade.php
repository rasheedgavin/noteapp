<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-notes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Create a New Note</title>
</head>
<body>
    @if($errors->any())
        <div class="notification">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <section class="container">
        <a href="{{ route('notes.index') }}" class="back-button" title="Back">
            <i class="fas fa-arrow-left"></i>
        </a>
        
        <form method="post" action="{{ route('notes.save') }}">
            @csrf
            <div class="form-group">
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" maxlength="10000" required>
            </div>
            <div class="form-group">
                <textarea id="notes" name="notes" class="form-control" placeholder="Your notes here..." required></textarea>
                <div class="character-counter" id="characterCounter">0 / 10000</div>
            </div>
        </form>
        
        <button class="create-button" onclick="document.querySelector('form').submit();" title="Save Note">
            <i class="fas fa-check"></i>
        </button>
    </section>

    <script>
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
