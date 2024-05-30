@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seller Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Add Item Button -->
                    <a href="{{ route('seller.items.add') }}" class="btn btn-primary mb-3">{{ __('Add Item') }}</a>

                    <!-- Items List -->
                    @if ($items->count())
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="{{ $item->image_link }}" class="card-img-top" alt="{{ $item->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Name:</strong>{{ $item->name }}</h5>
                                            <p class="card-text"><strong>Description:</strong>{{ $item->description }}</p>
                                            <p class="card-text"><strong>Price:</strong> ₱{{ $item->price }}</p>
                                            <p class="card-text"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>{{ __('No items found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
