
@extends('layouts.app')

@section('content')

<!-- Banner Section -->
    <h1 class="display-4">Inventory Management System</h1>
   
</div>

<!-- Main Content -->
<main class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2 text-center">Inventory Items</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('items.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Add Item
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover table-bordered align-middle shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="text-center">
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail rounded" style="width: 75px; height: 75px;">
                            @else
                                <img src="{{ asset('images/default-item.png') }}" alt="Default Image" class="img-thumbnail rounded" style="width: 75px; height: 75px;">
                            @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rs.{{ number_format($item->price, 2) }}</td>
                        <td style="width: 350px; text-align:left;">{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('items.show', $item) }}" class="btn btn-info btn-sm me-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
