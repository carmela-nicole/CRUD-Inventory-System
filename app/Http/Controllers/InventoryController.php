<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $inventories = Inventory::orderBy('id')->paginate(5);
        return view('inventories.index', compact('inventories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('inventories.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'brand' => 'required',
            'category' => 'required',
        ]);

        Inventory::create($request->post());

        return redirect()->route('inventories.index')->with('success','Inventory has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\inventory  $inventory
    * @return \Illuminate\Http\Response
    */
    public function show(Inventory $inventory)
    {
        return view('inventories.show',compact('inventory'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Inventory  $inventory
    * @return \Illuminate\Http\Response
    */
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit',compact('inventory'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Inventory  $inventory
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'brand' => 'required',
            'category' => 'required',
        ]);

        $inventory->fill($request->post())->save();

        return redirect()->route('inventories.index')->with('success','Inventory Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Inventory  $inventory
    * @return \Illuminate\Http\Response
    */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success','Inventory has been deleted successfully');
    }
}