<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CustomerController extends Controller
{
    public function index()
    {
        return view('pages.customer.home');
    }

    public function detail($slug)
    {
        // Query the catalog by slug
        // $item = Catalog::findBySlug($slug);

        return view('pages.customer.detailCatalog');
    }
}
