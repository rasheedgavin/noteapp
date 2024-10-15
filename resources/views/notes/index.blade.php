<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>My Note App</title>
</head>
<body>
    <div class="container">
        <h1>All Notes</h1>
        @if(session()->has('success'))
            <div id="alert" class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="search-bar">
            <input type="text" id="search" placeholder="Search notes..." />
        </div>
        <div class="note-list">
            <div class="note-list-content">
                @foreach ($notes->reverse() as $note)
                    <a href="{{ route('notes.view', ['note' => $note]) }}" class="note-link">
                        <div class="note-item">
                            <ul>
                                <li class="note-title">{{ $note->title }}</li>
                                <li class="note-date">
                                    @if ($note->updated_at > $note->created_at)
                                        {{ $note->updated_at->format('F j, g:i A') }}
                                    @else
                                        {{ $note->created_at->format('F j, g:i A') }}
                                    @endif
                                </li>
                                <li class="note-preview">{{ Str::limit($note->notes, 10) }}</li>
                            </ul>
                        </div>
                    </a>
                @endforeach
            </div>        
            <div id="no-results" style="display: none; text-align: center; margin-top: 20px;">
                <p>No search results</p>
            </div>
        </div>
        <div class="create-note">
            <a href="{{ route('notes.create') }}"><button>&plus;</button></a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('search');
            var noteItems = document.querySelectorAll('.note-item');
            var noResultsMessage = document.getElementById('no-results');
            var createNoteButton = document.querySelector('.create-note');

            searchInput.addEventListener('keyup', function() {
                var filter = searchInput.value.toLowerCase();
                var hasVisibleNotes = false;

                noteItems.forEach(function(note) {
                    var title = note.querySelector('.note-title').textContent.toLowerCase();
                    var preview = note.querySelector('.note-preview').textContent.toLowerCase();
                    if (title.includes(filter) || preview.includes(filter)) {
                        note.parentElement.style.display = ''; // Show note
                        hasVisibleNotes = true; // Found at least one visible note

                        // Highlight title
                        var highlightedTitle = title.replace(new RegExp(filter, 'gi'), function(match) {
                            return `<span style="color: red; font-weight: bold;">${match}</span>`;
                        });
                        note.querySelector('.note-title').innerHTML = highlightedTitle;

                        // Highlight preview
                        var highlightedPreview = preview.replace(new RegExp(filter, 'gi'), function(match) {
                            return `<span style="color: red; font-weight: bold;">${match}</span>`;
                        });
                        note.querySelector('.note-preview').innerHTML = highlightedPreview;
                    } else {
                        note.parentElement.style.display = 'none'; // Hide note
                    }
                });

                // Check if there are no visible notes
                if (!hasVisibleNotes && filter !== '') {
                    noResultsMessage.style.display = 'block'; // Show no results message
                    createNoteButton.style.display = 'none'; // Hide create button
                } else {
                    noResultsMessage.style.display = 'none'; // Hide no results message
                    createNoteButton.style.display = 'block'; // Show create button
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var successAlert = document.getElementById('alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.add('hide');
                }, 1000);
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 1500);
            }
        });
    </script>
</body>
</html>
