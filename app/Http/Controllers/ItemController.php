<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ItemController extends Controller
{
    public function index()
    {
        return Item::all(); // Mengambil semua item
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all()); // Membuat item baru
        return response()->json($item, 201);  // Mengembalikan response 201 (created)
    }

    public function show($id)
    {
        return Item::findOrFail($id);  // Menampilkan item berdasarkan ID
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());  // Mengupdate item
        return response()->json($item, 200);  // Mengembalikan response 200 (OK)
    }

    public function destroy($id)
    {
        Item::destroy($id);  // Menghapus item berdasarkan ID
        return response()->json(null, 204);  // Mengembalikan response 204 (no content)
    }
}
