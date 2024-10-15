<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit-notes.css') }}">
    <title>Edit Note</title>
</head>
<body>
    <div class="container">
        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit Note</h1>
        <form method="post" action="{{ route('notes.update', ['note' => $note]) }}">
            @csrf
            @method('put')
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $note->title }}">
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="form-control" rows="10" placeholder="Your notes here...">{{ $note->notes }}</textarea>
            </div>

            <div class="actions">
                <input type="submit" value="Update" class="update-button">
            </div>
        </form>
        <div class="back-to-notes">
            <a href="{{ route('notes.view', ['note' => $note]) }}">← Back</a>
        </div>
    </div>
</body>
</html>