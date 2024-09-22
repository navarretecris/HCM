@extends('layouts.dashboard')
@section('nameModule', 'Books')

@section('content')
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
@endsection

@section('formCreate')
    <form method="POST" id='crearForm' action="{{ route('books.store') }}">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="author">Author</label>
        <input type="text" id="author" name="author">

        <label for="isbn">ISBN</label>
        <input type="text" id="isbn" name="isbn">

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity">

        <label for="price">Price</label>
        <input type="number" id="price" name="price">

        <label for="pages">Pages</label>
        <input type="number" id="pages" name="pages">

        <label for="language">Language</label>
        <input type="text" id="language" name="language">

        <div>
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Availabe">Available</option>
                <option value="Not available">Not Available</option>
            </select>
        </div>


        <button type="submit">Create</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('books/') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="edit_id" name="id" value="">

        <label for="title">Title</label>
        <input type="text" id="edit_title" name="title">

        <label for="author">Author</label>
        <input type="text" id="edit_author" name="author">

        <label for="isbn">ISBN</label>
        <input type="text" id="edit_isbn" name="isbn">

        <label for="quantity">Quantity</label>
        <input type="number" id="edit_quantity" name="quantity">

        <label for="price">Price</label>
        <input type="number" id="edit_price" name="price">

        <label for="pages">Pages</label>
        <input type="number" id="edit_pages" name="pages">

        <label for="language">Language</label>
        <input type="text" id="edit_language" name="language">

        <div>
            <label for="status">Status</label>
            <select id="edit_status" name="status">
                <option value="Availabe">Available</option>
                <option value="Not available">Not Available</option>
            </select>
        </div>

        <div class="modal-actions">
            <button type="submit" class="save-btn">Update</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </div>
    </form>
@endsection

@section('js')

    <script>
        $('div').on('click', '.delete-btn', function() {
            $title = $(this).parent().parent().find('h3').text().split(':').pop().trim();

            Swal.fire({
                title: "¿Are you sure? " + $title + " will be deleted!",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).next().submit();
                }
            });
        });

        // reconocer el cambio de tecla de búsqueda
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('books/search', {
                    q: $query,
                    _token: $token
                },
                function(data) {
                    $('.content').empty().append(data);
                }
            )
        });
    </script>

@endsection
