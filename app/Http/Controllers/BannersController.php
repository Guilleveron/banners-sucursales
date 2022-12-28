<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;

class BannersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banners = Banner::orderBy('order', 'asc')->orderBy('status', 'desc')->orderBy('updated_at', 'asc')->paginate(5);

        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::pluck('name', 'id');

        return view('banners.create', compact('categories'));
    }

    public function store(StoreBannerRequest $request)
    {

        $request->validated();
        $banner = $request->all();
        $banner['category_id'] = $banner['categories'][0];;
        //dd($bann);
        if ($image = $request->file('image')) {
            $routeSaveImage = storage_path(path: 'app/public/banners');
            $imageBanner = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImage, $imageBanner);
            $banner['image'] = "banners/$imageBanner";
        }
        Banner::create($banner);
        return redirect()->route('banners.index')->with('toast_success', 'Banner creado correctamente.');;
    }

    public function show(Banner $banner)
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id');

        return view('banners.edit', compact('banner', 'categories'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $request->validated();

        $bann = $request->all();

        $bann['category_id'] = $bann['categories'][0];
        if ($image = $request->file('image')) {
            $routeSaveImage = storage_path(path: 'app/public/banners');
            $imageBanner = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImage, $imageBanner);
            $bann['image'] = "banners/$imageBanner";
        } else {
            unset($bann['image']);
        }

        $banner->update($bann);

        return redirect()->route('banners.index')->with('toast_success', 'Banner actualizado correctamente.');
    }

    public function destroy(Banner $banner)
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $url = "public/$banner->image";
        $banner->delete();
        Storage::delete($url);

        return redirect()->route('banners.index')->with('toast_success', 'Banner eliminado correctamente.');
    }
}
