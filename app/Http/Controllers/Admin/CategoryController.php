<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.categories.index');
    }

    public function create()
    {
        return view('admin.dashboard.sections.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        toastr()->success('Category has been created successfully!');

        return to_route('admin.sections.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.dashboard.sections.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        toastr()->success('Category has been updated successfully!');

        return to_route('admin.sections.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        if(request()->ajax())
        {
            return response('',Response::HTTP_NO_CONTENT);
        }

        toastr()->success('Category has been deleted successfully!');

        return back();
    }
}
