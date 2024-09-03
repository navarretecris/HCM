@extends('layouts.dashboard')
@section('nameModule', 'Users')

@section('content')
    <div class="user-cards">
        @foreach ($users as $user)
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
        @endforeach
    </div>
@endsection

@section('formCreate')
    <form method="POST" id='crearForm' action="{{ route('users.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <div>
            <label for="document_type">Document Type:</label>
            <select id="document_type" name="document_type" required>
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                <option value="PP">PP</option>
                <option value="NIT">NIT</option>
            </select>
        </div>


        <label for="document">Document:</label>
        <input type="text" id="document" name="document" required>

        <label for="id_card">ID Card:</label>
        <input type="text" id="id_card" name="id_card" required>

        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

        </div>

        <label for==status>Status:</label>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('passwors')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <button type="submit">Create</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('users/') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="edit_id" name="id" value="">

        <div>
            <label for="edit_name">Name</label>
            <input type="text" id="edit_name" name="name">
        </div>

        <div>
            <label for="edit_document_type">Document Type</label>
            <select id="edit_document_type" name="document_type">
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                <option value="PP">PP</option>
                <option value="NIT">NIT</option>
            </select>
        </div>

        <div>
            <label for="edit_document">Document</label>
            <input type="text" id="edit_document" name="document">
        </div>

        <div>
            <label for="edit_id_card">ID Card</label>
            <input type="text" id="edit_id_card" name="id_card">
        </div>

        <div>
            <label for="edit_role">Role</label>
            <select id="edit_role" name="role">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>

        <div>
            <label for="edit_status">Status</label>
            <select id="edit_status" name="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>


        <div>
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email">
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
            $name = $(this).parent().parent().find('h3').text().split(':').pop().trim();

            Swal.fire({
                title: "¿Are you sure? " + $name + " will be deleted!",
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

            $.post('users/search', {
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
