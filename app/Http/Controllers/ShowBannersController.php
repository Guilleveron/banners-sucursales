<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class ShowBannersController extends Controller
{

    public function index($category = null)
    {
        $query = Banner::where('status', '1');
        if (!empty($category)) {
            $cat = Category::where('name', $category)->first();
            $query->where('category_id', $cat->id);
        }
        $banners = $query->orderBy('order', 'asc')->get();

        foreach ($banners as $banner) {
            $banner->timeRefresh = $banner->timeRefresh * 1000;
        };

        //dd($banners);

        return view('showBanners.index', compact('banners', 'category'));
    }
}
