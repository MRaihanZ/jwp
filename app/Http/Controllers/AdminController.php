<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('pages.admin.dashboard');
    }

    public function catalog()
    {
        return view('pages.admin.catalog');
    }

    public function showCatalogCreate()
    {
        return view('pages.admin.createCatalog');
    }

    public function actionCatalogCreate(Request $request)
    {
        // return view('pages.admin.catalog');
    }

    public function showCatalogUpdate($slug)
    {
        return view('pages.admin.updateCatalog');
    }

    public function actionCatalogUpdate(Request $request, $slug)
    {
        // return view('pages.admin.catalog');
    }

    public function catalogDelete($slug)
    {
        return view('pages.admin.catalog');
    }
}
