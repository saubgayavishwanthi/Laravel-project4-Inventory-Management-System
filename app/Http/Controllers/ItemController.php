<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{  
   

    public function index()
    {
        $items = Item::all();
       
        return view('items.index', compact('items'));
    }
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this rule
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Store the item
        Item::create($validatedData);
    
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
    
        // Update the item with the validated data
        if ($request->hasFile('image')) {
            // Handle the image upload
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $item->update($validatedData);
    
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function edit(Item $item)
{
    return view('items.edit', compact('item'));
}

public function show(Item $item)
{
    // Pass the item data to the 'show' view
    return view('items.show', compact('item'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
