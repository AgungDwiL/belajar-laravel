<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public static function getProducts() {
        return DB::table('products')->get();
    }
}
