@extends('layouts.default')

@section('content')
<div class="container mx-auto">
    <div class="card lg:card-side bg-base-100 shadow-xl m-8">
        <figure>
            <img src="{{ $product->image }}" alt="{{ $product->name }}" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            
            <div class="card-body">
                <span>Release Date: {{ $product->release_date }}</span>
            </div>
        </div>
    </div>
</div>
@endsection