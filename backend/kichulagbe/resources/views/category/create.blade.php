@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center py-2">
                <h5 class="mb-0">Add New Category</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="form-control"
                            placeholder="Enter category name">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            required
                            class="form-control"
                            placeholder="Enter slug (example: men-shoes)">
                    </div>

                    <button
                        type="submit"
                        class="btn btn-success w-100">
                        Save Category
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
