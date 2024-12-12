<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;


/**
 * @group Cards
 *
 * APIs for cards 
 */
class CardController extends Controller
{
    /**
     * Get all cards
     * 
     * Retrieve all cards from the database.
     * 
     * If you include the `set_id` query parameter, it will return all cards linked to the provided `set_id` query parameter.
     */
    public function index(Request $request)
    {
        if ($request->query('set_id')) {
            $cards = Card::where('set_id', $request->get('set_id'))->get();
        }
        else $cards = Card::all();

        return CardResource::collection($cards);
    }

    /**
     * Get the specified card
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }
}
