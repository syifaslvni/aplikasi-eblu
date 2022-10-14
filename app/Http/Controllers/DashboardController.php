<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\SubJasa;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\JenisJasa;
use App\Models\SubSubJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        
        // $jenisjasas = JenisJasa::count();
        // $subjasas = SubJasa::count();
        // $subsubjasas = SubSubJasa::count();
        // $products = Product::count();
        $visitors = Visitor::count();
        return view('dashboard.index', compact('categories', 'posts', 'visitors'));
    }
}
