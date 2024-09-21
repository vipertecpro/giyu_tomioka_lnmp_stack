<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list(){
        $exceptionColumns = [];
        $moduleSchemaColumns = Schema::getColumnListing('categories');
        $moduleSchemaColumns = array_diff($moduleSchemaColumns,$exceptionColumns);
        $pageData = [
            'pageTitle'         => 'List of categories',
            'pageDescription'   => 'List of all categories in the system',
            'crumbs'            => [
                ['title' => 'TableBased', 'route' => route('app.dashboard.categories.list')],
            ],
            'actions'           => [
                ['title' => 'Delete All', 'route' => route('app.dashboard.categories.deleteAll'), 'method' => 'DELETE', 'color' => 'red'],
                ['title' => 'Import', 'route' => route('app.dashboard.categories.import'), 'method' => 'POST', 'color' => 'green'],
                ['title' => 'Export', 'route' => route('app.dashboard.categories.export'), 'method' => 'POST', 'color' => 'teal'],
            ],
            'api'            => route('internal.categories'),
            'columns'        => $moduleSchemaColumns
        ];
        return view('restricted.appPages.categories.list',$pageData);
    }
    public function form(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'name'     => 'required|string',
                'slug'     => 'required|unique:tags,slug,'.$request->get('id'),
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $data = [
                'name'    => $request->get('name'),
                'slug'    => $request->get('slug'),
            ];
            $returnMessage = 'Category updated successfully';
            if(!$request->get('id')){
                $returnMessage = 'Category created successfully';
                Category::create($data);
            }else{
                Category::where('id',$request->get('id'))->update($data);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => $returnMessage,
                'redirect'  => route('app.dashboard.categories.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function delete($category_id){
        try{
            $findCategory = Category::find($category_id);
            if(!$findCategory){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Category not found'
                ],400);
            }
            $findCategory->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Category deleted successfully'
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => $exception->getMessage()
            ],500);
        }
    }
    public function deleteAll(){
        try{
            $categories = Category::where('id','!=',auth()->id());
            if($categories->count() == 0){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'No categories found'
                ],400);
            }
            $categories->each(function($category){
                $category->delete();
            });
            return response()->json([
                'status'    => 'success',
                'message'   => 'All categories has been removed successfully',
                'redirect'  => route('app.dashboard.categories.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function import(){
        return redirect()->route('app.dashboard.categories.list');
    }
    public function export(){
        return redirect()->route('app.dashboard.categories.list');
    }
}
