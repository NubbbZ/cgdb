@extends('layouts.default')

@section('content')
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content text-center">
        <div class="max-w-md">
            <h1 class="text-5xl font-bold">Hello there</h1>
            <p class="py-6">
                Welcome to {{ config('app.name') }}. We are a database for the card game {{ config('app.card_game_name') }}, we mainly serve as an api for other projects.
            </p>
        </div>
    </div>
</div>
@endsection