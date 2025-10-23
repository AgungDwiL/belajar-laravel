<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public static function getProducts() {
        return DB::table('products')->get();
    }
}
