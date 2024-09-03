<div class="user-cards">
    @forelse ($users as $user)
        <div class="user-card">
            <div class="user-card-content">
                <h3>Name: {{ $user->name }}</h3>
                <p>Document Type: {{ $user->document_type }}</p>
                <p>Document: {{ $user->document }}</p>
                <p>ID Card: {{ $user->id_card }}</p>
                <p>Role: {{ ucfirst(strtolower($user->role)) }}</p>
                <p>Status: {{ ucfirst(strtolower($user->status)) }}</p>
                <p>Email: {{ $user->email }}</p>
                <p hidden>id: {{ $user->id }}</p>
            </div>
            <div class="user-card-actions">
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
                <form method="POST" action="{{ url('users/' . $user->id) }}" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @empty
        <div class="user-card">
            <div class="user-card-content">
                <h3>No users found</h3>
            </div>
        </div>
    @endforelse
</div>