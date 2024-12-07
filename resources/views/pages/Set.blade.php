@extends('layouts.default')

@section('content')
<div class="card lg:card-side bg-base-100 shadow-xl m-8">
    <figure>
        <img src="{{ $set->logo }}" alt="{{ $set->name }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">
            <span>{{ $set->name }}</span>
            <div class="avatar">
                <div class="w-8">
                    <img src="{{ $set->symbol }}" />
                </div>
            </div>
        </h2>
        
        <div class="card-body">
            <span>Release Date: {{ $set->release_date }}</span>
        </div>
    </div>
</div>
<div class="divider"></div>
<div>
    @foreach ($set->cards as $card)
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
    @endforeach
</div>
@endsection