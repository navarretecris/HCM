@extends('layouts.dashboard')
@section('nameModule', 'Home')

@section('content')
<div class="home-container">
    <!-- Welcome Section -->
    <div class="transparent-card mb-4">
        <div class="card-body">
            <h1>Welcome to Your Dashboard</h1>
            <p>Here you can manage your books, view active loans, and check out our recommendations.</p>
        </div>
    </div>

    <!-- Quick Stats Section without cards -->
    <div class="quick-stats">
        <div class="quick-stat-item">
            <div class="icon">
                <img src="{{ asset('icon/books.png') }}" alt="Books">
            </div>
            <div class="stat-info">
                <h3>Available Books</h3>
                <p>Browse through our collection of over <strong>1500 books</strong>.</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">View Books</a>
            </div>
        </div>

        <div class="quick-stat-item">
            <div class="icon">
                <img src="{{ asset('icon/bookloans.png') }}" alt="Loans">
            </div>
            <div class="stat-info">
                <h3>Active Loans</h3>
                <p>You currently have <strong>3 borrowed books</strong>.</p>
                <a href="{{ route('loans.index') }}" class="btn btn-primary">View Loans</a>
            </div>
        </div>

        <div class="quick-stat-item">
            <div class="icon">
                <img src="{{ asset('icon/recommendations.png') }}" alt="Recommendations">
            </div>
            <div class="stat-info">
                <h3>Recommendations</h3>
                <p>Check out our personalized recommendations based on your interests.</p>
                <a href="#" class="btn btn-primary">View Recommendations</a>
            </div>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div class="card transparent-card mt-4">
        <div class="card-body">
            <h2>Featured Books</h2>
            <div class="featured-books">
                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 1">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 1</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>

                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 2">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 2</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>

                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 3">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 3</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>

                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 4">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 4</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
                
                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 5">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 5</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>

                <div class="book-card">
                    <img src="path-to-book-image.jpg" class="card-img-top rounded" alt="Book 6">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 6</h5>
                        <p class="card-text">Brief description of the book.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>

                <!-- Add more books as needed -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Add your custom scripts here -->
@endsection