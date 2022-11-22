<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index() {
        return view('search', [
                'searchTerm' => '',
                'searchResult' => [],
            ]);
    }

    public function search() {
        $searchTerm = request('searchTerm');

        $searchResult = DB::select("SELECT * FROM employees WHERE name like '%$searchTerm%'");

        return view('search', [
            'searchTerm' => $searchTerm,
            'searchResult' => $searchResult,
        ]);
    }
}