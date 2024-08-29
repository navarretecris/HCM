@extends('layouts.app')
@section('title', 'Register')
@section('classMain', 'register')

@section('content')
    <div class="card-header text-center">
        <h3>{{ __('Register') }}</h3>
    </div>
    <div class="card-body mx-auto" style="max-width: 500px;"> <!-- Aquí se ajusta el ancho máximo -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4"> <!-- Ajuste del ancho para Document Type -->
                    <div class="mb-3">
                        <label for="document_type" class="form-label">{{ __('Document Type') }}</label>
                        <select id="document_type" class="form-select @error('document_type') is-invalid @enderror"
                            name="document_type" required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="CC">{{ __('Citizenship Card') }}</option>
                            <option value="CE">{{ __('Foreigner ID') }}</option>
                            <option value="PP">{{ __('Passport') }}</option>
                            <option value="NIT">{{ __('Tax ID') }}</option>
                        </select>
                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8"> <!-- Ajuste del ancho para Document -->
                    <div class="mb-3">
                        <label for="document" class="form-label">{{ __('Document') }}</label>
                        <input id="document" type="text" class="form-control @error('document') is-invalid @enderror"
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
                <input id="id_card" type="text" class="form-control @error('id_card') is-invalid @enderror"
                    name="id_card" value="{{ old('id_card') }}" required>
                @error('id_card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Role') }}</label>
                        <select id="role" class="form-select @error('role') is-invalid @enderror" name="role"
                            required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="admin">{{ __('Administrator') }}</option>
                            <option value="user">{{ __('User') }}</option>
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
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status"
                            required>
                            <option value="">{{ __('Select') }}</option>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
@endsection
