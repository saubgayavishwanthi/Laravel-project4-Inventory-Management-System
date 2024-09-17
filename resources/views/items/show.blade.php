
@extends('layouts.app')

@section('title', 'Item Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h3>{{ $item->name }}</h3>
            </div>
            <div class="card-body text-center">
                <!-- Image Section-->
                <img src="{{ asset('storage/' . $item->image) }}" 
                     alt="{{ $item->name }}" 
                     class="img-fluid mb-3 rounded" 
                     style="max-width: 300px; height: auto;">

                <!-- Item Details -->
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-start">
                        <strong class="me-1" style="flex: 0 0 100px; text-align:left;">Name</strong>
                        <span>{{ $item->name }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <strong class="me-1" style="flex: 0 0 100px; text-align: left;">Quantity</strong>
                        <span>{{ $item->quantity }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <strong class="me-1" style="flex: 0 0 100px; text-align: left">Price</strong>
                        <span>Rs.{{ number_format($item->price, 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <strong class="me-1" style="flex: 0 0 100px; text-align: left;">Description</strong>
                        <span>{{ $item->description }}</span>
                    </li>
                </ul>
                
                
                
                <!-- Back Button -->
                <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">
                    <i class="bi bi-arrow-left"></i> Back to Items
                </a>
                
            </div>
        </div>
    </div>
</div>
@endsection

