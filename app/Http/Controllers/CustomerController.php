<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Order;

class CustomerController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return view('pages.customer.home', compact('catalogs'));
    }

    public function detail($slug)
    {
        // Query the catalog by slug
        $item = Catalog::findBySlug($slug);

        return view('pages.customer.detailCatalog', compact('item'));
    }

    public function orderStore(Request $request, $slug)
    {
        $catalog = Catalog::findBySlug($slug);
        $validated = $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'address'      => 'required',
            'note'         => 'nullable',
            'wedding_date' => 'required',
        ]);
        $validated['catalog_id'] = $catalog->catalog_id;

        $order = Order::create($validated);


        return redirect()->route('home')->with('success', 'Order success');
    }
}
