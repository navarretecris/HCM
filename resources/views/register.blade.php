@extends('layouts.app')
@section('title', 'Register')
@section('classMain', 'register')

@section('content')
    <div class="card-header text-center">
        <h3>{{ __('Register') }}</h3>
    </div>
    <div class="card-body mx-auto" style="max-width: 380px;">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="photo" class="form-label">{{ __('Select a profile picture') }}</label>
                <input id="photo" type="file" class="form-control form-control-sm @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <!-- Document Type and Document in the same row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="document_type" class="form-label">{{ __('Document Type') }}</label>
                        <select id="document_type" class="form-control form-control-sm @error('document_type') is-invalid @enderror"
                            name="document_type" required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="CC">{{ __('CC') }}</option>
                            <option value="CE">{{ __('CE') }}</option>
                            <option value="PP">{{ __('PP') }}</option>
                            <option value="NIT">{{ __('NIT') }}</option>
                        </select>
                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="document" class="form-label">{{ __('Document') }}</label>
                        <input id="document" type="text" class="form-control form-control-sm @error('document') is-invalid @enderror"
                            name="document" value="{{ old('document') }}" required>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="id_card" class="form-label">{{ __('ID Card') }}</label>
                <input id="id_card" type="text" class="form-control form-control-sm @error('id_card') is-invalid @enderror"
                    name="id_card" value="{{ old('id_card') }}" required>
                @error('id_card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Role and Status in the same row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Role') }}</label>
                        <select id="role" class="form-control form-control-sm @error('role') is-invalid @enderror" name="role" required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="Admin">{{ __('Administrator') }}</option>
                            <option value="User">{{ __('User') }}</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">{{ __('Status') }}</label>
                        <select id="status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="Active">{{ __('Active') }}</option>
                            <option value="Inactive">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password and Confirm Password in the same row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                            name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation"
                            required>
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
@endsection