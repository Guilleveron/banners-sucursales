<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use DateTime;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;


class ShowBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return JsonResponse
     */

    public function index($category = null)
    {
        $query = Banner::where('status', '1');
        if (!empty($category)) {
            //$query->where('category', $category);
            $cat = Category::where('name', $category)->first();
            $query->where('category_id', $cat->id);
        }
        $banners = $query->orderBy('order', 'asc')->get();

        foreach ($banners as $banner) {
            $banner->timeRefresh = $banner->timeRefresh * 1000;
        };

        $time = strtotime(config('banner.refresh_banners'));

        return response()->json([
            'banners' => $banners,
            'timeRefresh' => $time,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
