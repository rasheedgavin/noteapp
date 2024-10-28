<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
    <link rel="stylesheet" href="{{ asset('css/view-notes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <section class="container">
        <a href="{{ route('notes.index') }}" class="back-icon fas fa-arrow-left" title="Back"></a>

        <header>
            <h2>{{ $note->title ?? 'Untitled' }}</h2>
            <p class="timestamps">
                @if ($note->updated_at > $note->created_at)
                    Last updated: {{ $note->updated_at->diffForHumans() }}
                @else
                    Created : {{ $note->created_at->diffForHumans() }}
                @endif
            </p>
        </header> 

        <main>
            <p>{{ $note->notes }}</p>
        </main>

        <div class="button-container">
            <a href="{{ route('notes.edit', ['note' => $note]) }}" class="edit-button fas fa-edit" title="Edit Note"></a>
            <form method="post" action="{{ route('notes.delete', ['note' => $note]) }}" style="margin: 0;">
                @csrf
                @method('delete')
                <button type="submit" class="delete-button fas fa-trash" onclick="return confirm('Are you sure you want to delete this note?')" title="Delete Note"></button>
            </form>
        </div>
    </section>
</body>
</html>
<style>
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
    transition: background-color 0.3s, transform 0.3s;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}
</style>
