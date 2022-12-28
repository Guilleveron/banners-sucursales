<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::orderBy('id', 'asc')->orderBy('updated_at', 'asc')->paginate(5);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('categories.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => 'required|string|max:50|unique:categories'
        ]);

        $category = $request->all();

        Category::create($category);

        return redirect()->route('categories.index')->with('toast_success', 'Categoría creada correctamente.');
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $banners = Banner::with('category')->where('category_id', $category->id)->get();
        //return $banners;
        return view('categories.show', compact('category', 'banners'));
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $cat = $request->all();

        $category->update($cat);

        return redirect()->route('categories.index')->with('toast_success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $category->delete();
            return redirect()->route('categories.index')->with('toast_success', 'Categoría eliminada correctamente.');
        } catch (\Throwable $e) {
            \Log::error('Error al eliminar una categoría.', [$e->getMessage(), $e->getCode()]);
            return redirect()->route('categories.index')->with('toast_error', 'No se ha podido procesar su petición ya que la categoría está relacionada a un Banner');
        }
    }
}
