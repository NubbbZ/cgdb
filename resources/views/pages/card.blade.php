@extends('layouts.default')

@section('content')
<div class="card lg:card-side bg-base-100 shadow-xl m-8">
    <figure>
        <img src="{{ $card->image }}" alt="{{ $card->name }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $card->name }}</h2>
        
        <div class="card-body">
            <span>Set: <a href="{{ route('set', ['set_id' => $card->set_id]) }}">{{ $card->set->name }}</a></span>
            <span>Reference: {{ $card->reference }}</span>
            @foreach ($card->card_elements as $key => $element)
                <span class="badge">{{ $key }}: {{ $element }}</span>
            @endforeach
        </div>
    </div>
</div>
@endsection