@extends('layouts.default')

@section('content')
<div class="container mx-auto">
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

    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($set->cards->sortBy('reference') as $card)
                <tr class="hover">
                    <th>{{ $card->reference }}</th>
                    <td>
                        <a class="link" href="{{ route('card', ['card_id' => $card->id]) }}">{{ $card->name }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection