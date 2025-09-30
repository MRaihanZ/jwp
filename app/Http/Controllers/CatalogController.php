<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function catalog()
    {
        $catalogs = Catalog::all();
        return view('pages.admin.catalog', compact('catalogs'));
    }

    public function showCatalogCreate()
    {
        return view('pages.admin.createCatalog');
    }

    public function actionCatalogCreate(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|integer',
            'status'      => 'required|in:available,unavailable',
        ]);

        $validated['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('assets/images', 'public');
            $validated['image'] = "/storage/" . $path;
        }
        $product = Catalog::create($validated);

        return redirect()->route('admin.catalog')->with('success', 'Catalog created');
    }

    public function showCatalogUpdate($slug)
    {
        $item = Catalog::findBySlug($slug);
        return view('pages.admin.updateCatalog', compact('item'));
    }

    public function actionCatalogUpdate(Request $request, $slug)
    {
        $catalog = Catalog::where('catalog_id', $slug)->firstOrFail();

        $validated = $request->validate([
            'title'       => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'price'       => 'sometimes|required|integer',
            'image'       => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'sometimes|required|in:available,unavailable',
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($catalog->image) {
                Storage::disk('public')->delete(substr($catalog->image, 9));
            }
            $path = $request->file('image')->store('assets/images', 'public');
            $validated['image'] = "/storage/" . $path;
        } else {
            $validated['image'] = $catalog->image;
        }

        $catalog->update($validated);
        return redirect()->route('admin.catalog')->with('success', 'Catalog updated');
    }

    public function catalogDelete($slug)
    {
        $catalog = Catalog::where('catalog_id', $slug)->firstOrFail();

        // Delete image file if exists
        if ($catalog->image) {
            Storage::disk('public')->delete(substr($catalog->image, 9));
        }

        $catalog->delete();
        return redirect()->route('admin.catalog')->with('success', 'Catalog deleted');
    }
}
