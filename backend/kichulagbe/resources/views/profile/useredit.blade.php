@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">
            Edit Profile
        </div>
        <div class="card-body">
           @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- নাম -->
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <!-- ইমেইল -->
        <div class="mb-3">
            <label for="email" class="form-label">ইমেইল</label>
            <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <!-- প্রোফাইল ছবি -->
        <div class="mb-3">
            <label for="img" class="form-label">প্রোফাইল ছবি</label>
            <input type="file" name="img" class="form-control">
            @if($user->img)
                <img src="{{ asset('storage/' . $user->img) }}" class="mt-2" width="80">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">আপডেট করুন</button>
    </form>

        </div>
    </div>
</div>
@endsection
