<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-notes.css') }}">
    <title>Create a New Note</title>
</head>
<body style="background: linear-gradient(135deg, #4b79a1, #283e51); color: #fff;">
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
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Create a New Note</h1>
        <form method="post" action="{{ route('notes.save') }}">
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="form-control" rows="10" placeholder="Your notes here..."></textarea>
            </div>

            <div class="actions">
                <input type="submit" value="Create" class="submit-button">
            </div>
        </form>
        <div class="back-to-notes">
            <a href="{{ route('notes.index') }}" style="text-decoration: none; background-color: #3498db; color: white; padding: 15px 30px; border-radius: 10px; font-size: 1.1rem; transition: background-color 0.3s ease, transform 0.2s ease; display: inline-block;">← Back to All Notes</a>
        </div>
    </div>
</body>
</html>
