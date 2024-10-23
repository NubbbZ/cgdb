<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->query('set_id')) {
            $cards = Card::where('set_id', $request->get('set_id'))->get();
        }
        elseif ($request->query('illustrator')) {
            $cards = Card::where('illustrator', $request->get('illustrator'))->get();
        }
        else $cards = Card::all();

        return CardResource::collection($cards);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }
}
