
@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-white text-center">
                <h3>Edit Item</h3>
            </div>
            <div class="card-body">
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Edit Form -->
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="image" class="form-label">Item Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        @if ($item->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                            </div>
                        @endif
                        
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $item->price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $item->description) }}" required>
                    </div>

                    
                    <button type="submit" class="btn btn-success w-100">Update Item</button>
                    <a href="{{ route('items.index') }}" class="btn btn-secondary mt-2 w-100">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
