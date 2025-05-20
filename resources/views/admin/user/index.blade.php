@extends('admin.layouts.app')


@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">User Listing</h2>
        <a href="{{ route('user_create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Create User
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($users) }} --}}
                @foreach ($users as $iteration => $user)
                    <tr>
                        <th>{{ $iteration+1 }}</th>
                        <td>{{ $user->name ?? $user->name }}</td>
                        <td>{{ $user->email ?? $user->email }}</td>
                        <td>{{ $user->mobile ?? $user->mobile }}</td>
                        <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('user_edit',[$user->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('user_delete',[$user->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection
