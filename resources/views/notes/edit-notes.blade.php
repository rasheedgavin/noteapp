<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit-notes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Edit Note</title>
</head>
<body>
    @if($errors->any())
        <div class="notification">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <section class="container">
        <button class="back-button" onclick="window.history.back();" aria-label="Go back">
            <i class="fas fa-arrow-left"></i>
        </button>

        <form method="post" action="{{ route('notes.update', ['note' => $note]) }}" style="flex-grow: 1; display: flex; flex-direction: column;">
            @csrf
            @method('put')
            
            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $note->title }}" required>
            <div class="timestamp" id="timestamp"></div>

            <textarea id="notes" name="notes" class="form-control" placeholder="Your notes here..." required>{{ $note->notes }}</textarea>
            <div class="character-counter" id="characterCounter">0 / 10000</div>

            <button type="submit" class="update-button" aria-label="Update note">
                <i class="fas fa-check"></i>
            </button>
        </form>
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

        const timestampElement = document.getElementById('timestamp');
        function updateTimestamp() {
            const now = new Date();
            const formattedTime = now.toLocaleString();
            timestampElement.textContent = `Last edited: ${formattedTime}`;
        }

        updateTimestamp();
        notesTextarea.addEventListener('input', updateTimestamp);
    </script>
</body>
</html>
