<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Bitcoin-specific data
        $bitcoinData = [
            'current_price' => 43250.00,
            'price_change_24h' => 2.45,
            'market_cap' => '847.2B',
            'volume_24h' => '28.4B',
            'circulating_supply' => '19.8M',
            'max_supply' => '21M',
            'all_time_high' => 69045.00,
            'fear_greed_index' => 72,
            'market_sentiment' => 'Bullish'
        ];

        return view('welcome', compact('bitcoinData'));
    }
}