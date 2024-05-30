<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SellerController extends Controller
{
    public function dashboard()
    {
        // Retrieve all items
        $items = Item::all();

        // Pass items to the view
        return view('seller', compact('items'));
    }
    public function showAddItemForm()
    {
        return view('add_item');
    }
}
