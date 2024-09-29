@extends('layouts.dashboard')
@section('nameModule', 'Loans')

@section('content')
    <div class="user-cards">
        @foreach ($loans as $loan)
            <div class="user-card">
                <div class="user-card-content">
                    <h3>User Name: {{ $loan->user->name }}</h3>
                    <p>Book Title: {{ $loan->book->title }}</p>
                    <p>Book Author: {{ $loan->book->author }}</p>
                    <p>Language: {{ $loan->book->language }}</p>
                    <p>Loan Date: {{ $loan->loan_date }}</p>
                    <p>End Date: {{ $loan->end_date }}</p>
                    <p>Return Date: {{ $loan->return_date }}</p>
                    <p>Status:@if ($loan->status == "1") Borrowed @else Returned @endif</p>
                    <p hidden>id: {{ $loan->id }}</p>
                </div>
                <div class="user-card-actions">
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                    <form method="POST" action="{{ url('loans/' . $loan->id) }}" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('formCreate')
    <form method="POST" id='crearForm' action="{{ route('loans.store') }}">
        @csrf

        <label for="user_id">User</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="book_id">Book</label>
        <select name="book_id" id="book_id" required>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="1">Borrowed</option>
                <option value="0">Returned</option>
            </select> 
        </div>

        <button type="submit">Create</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('loans/') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="id" name="id" value="">

        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" readonly>

        <label for="book_title">Book Title:</label>
        <input type="text" id="book_title" readonly>

        <label for="book_author">Book Author:</label>
        <input type="text" id="book_author" readonly>

        <label for="language">Language:</label>
        <input type="text" id="language" readonly>
        
        <label for="loan_date">Loan Date:</label>
        <input type="date" id="loan_date" readonly>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" readonly>
        
        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" readonly>

        <div>
            <label for="status">Status</label>
            <select id="edit_status" name="status">
                <option value="1">Borrowed</option>
                <option value="0">Returned</option>
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
            const
            $token = $('input[name=_token]').val();

            $.post('loans/search', {
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
