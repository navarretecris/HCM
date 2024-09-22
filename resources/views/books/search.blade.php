<div class="user-cards">
    @foreach ($books as $book)
        <div class="user-card">
            <div class="user-card-content">
                <h3>Title: {{ $book->title }}</h3>
                <p>Author: {{ $book->author }}</p>
                <p>ISBN: {{ $book->isbn }}</p>
                <P>Quantity: {{ $book->quantity }}</P>
                <P>Price: {{ $book->price }}</P>
                <p>Pages: {{ $book->pages }}</p>
                <p>Language: {{ $book->language }}</p>
                <p>Status: {{ ucfirst(strtolower($book->status)) }}</p>
                <p hidden>id: {{ $book->id }}</p>
            </div>
            <div class="user-card-actions">
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
                <form method="POST" action="{{ url('books/' . $book->id) }}" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @endforeach
</div>