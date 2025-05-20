@extends('admin.layouts.app')


@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Create Form</h2>
        <a href="{{ route('user_listing') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Back
        </a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('user_store') }}" method="POST" class="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile">
                    @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save me-1"></i> Save User
                    </button>
                    <a href="{{ route('user_listing') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
