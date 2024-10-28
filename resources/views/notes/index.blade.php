<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Note App</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="home-icon">
        <a href="{{ route('notes.home') }}" class="fas fa-home"></a>
    </nav>
    <header>All Notes</header>

    @if(session()->has('success'))
        <div id="alert" class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <main class="note-list">
        @foreach ($notes->reverse() as $note)
            <article class="note-item">
                <div class="options-menu" onclick="toggleMenu(this)">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="menu-options">
                    <a href="{{ route('notes.edit', ['note' => $note]) }}">Edit</a>
                    <form method="post" action="{{ route('notes.delete', ['note' => $note]) }}" style="margin: 0;">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
                    </form>
                </div>
                <a href="{{ route('notes.view', ['note' => $note]) }}" style="text-decoration: none;">
                    <h2 class="note-title">{{ $note->title }}</h2>
                    <p class="note-preview">{{ $note->notes }}</p>
                    <time class="note-date">
                        {{ $note->updated_at > $note->created_at ? $note->updated_at->diffForHumans() : $note->created_at->diffForHumans() }}
                    </time>                    
                </a>
            </article>
        @endforeach
    </main>

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
