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