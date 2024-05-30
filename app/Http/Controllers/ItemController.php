<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image_link' => 'required|url', // Validate the URL
        ]);

        // Create the item
        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image_link' => $request->image_link, // Store the image link
            'seller_id' => Auth::id(), // Associate the item with the logged-in seller
        ]);

        // Redirect back with success message
        return redirect()->route('seller.dashboard')->with('success', 'Item added successfully.');
    }

    public function index()
    {
        $sellerId = Auth::id();
        $items = Item::where('seller_id', $sellerId)->get();
        
        return view('seller.dashboard', compact('items'));
    }
}
