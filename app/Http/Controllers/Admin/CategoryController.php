<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create() {

        return view('admin.category.create');
    }

    public function store(CreateCategory$request) {

        $data = $request->only([
            'name',
        ]);

        try {
            $category = Category::create($data);
        } catch (\Exception $e) {

            return back()->with('status', $e->getMessage());
        }

        return redirect()->route('admin.category.index')->with('status', __('category.status'));
    }
   
    public function edit($id) {

        $category = Category::find($id);
        
        if (!$category) {

            return redirect()->route('admin.category.index')->with('status', __('category.not_found'));
        }

        return view('admin.category.edit', ['category' => $category]);
    }
    
    public function update(CreateBrand $request, $id) {

        $data = $request->only([
            'name',
        ]);

        try {
            $category = Category::find($id);
            $category->update($data);

            return redirect()->route('admin.category.index')->with('status', __('category.updated'));
        } catch (\Exception $e) {

            return back()->with('status', __('category.update_fail'));
        }
    }

    public function destroy($id) {

        try {
            $category = Category::find($id);
            $category->delete();
            $result = [
                'status' => true,
                'msg' => __('category.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => __('category.delete_fail'),
            ];
        }
        return redirect()->route('admin.category.index')->with('status', __('Successfully'));
    }
}