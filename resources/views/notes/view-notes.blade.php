<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="{{ asset('css/view-notes.css') }}">
    <title>View Note</title>
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
        <h1>Viewing Note</h1>        
        <div class="note-detail">
            <div class="title">
                <h2>{{ $note->title ?? 'Untitled' }}</h2>
            </div>
            <div class="timestamps">
                @if ($note->updated_at > $note->created_at)
                    <p>Last updated: {{ $note->updated_at->format('F j, g:i A') }}</p>
                @else
                    <p>Created on: {{ $note->created_at->format('F j, g:i A') }}</p>
                @endif
            </div>
            <div class="notes">
                <p>{{ $note->notes }}</p>
            </div>
            <div class="actions">
                <a href="{{ route('notes.edit', ['note' => $note]) }}" class="edit-btn">Edit</a>
                <form method="post" action="{{ route('notes.delete', ['note' => $note]) }}" class="delete-form">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="delete-btn" onclick="return confirm('Are you sure you want to delete this note?')">
                </form>
            </div>
        </div>
        <div class="back-to-notes">
            <a href="{{ route('notes.index') }}">← Back to All Notes</a>
        </div>
    </div>
</body>
</html>