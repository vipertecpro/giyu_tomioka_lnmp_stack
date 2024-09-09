<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function list(){
        $exceptionColumns = ['password','remember_token','email_verified_at', 'is_password_update'];
        $moduleSchemaColumns = Schema::getColumnListing('tags');
        $moduleSchemaColumns = array_diff($moduleSchemaColumns,$exceptionColumns);
        $pageData = [
            'pageTitle'         => 'List of tags',
            'pageDescription'   => 'List of all tags in the system',
            'crumbs'            => [
                ['title' => 'Tags', 'route' => route('app.dashboard.tags.list')],
            ],
            'actions'           => [
                ['title' => 'Delete All', 'route' => route('app.dashboard.tags.deleteAll'), 'method' => 'DELETE', 'color' => 'red'],
                ['title' => 'Import', 'route' => route('app.dashboard.tags.import'), 'method' => 'POST', 'color' => 'green'],
                ['title' => 'Export', 'route' => route('app.dashboard.tags.export'), 'method' => 'POST', 'color' => 'teal'],
            ],
            'api'            => route('internal.tags'),
            'columns'        => $moduleSchemaColumns
        ];
        return view('restricted.appPages.tags.list',$pageData);
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
            $returnMessage = 'Tag updated successfully';
            if(!$request->get('id')){
                $returnMessage = 'Tag created successfully';
                Tag::create($data);
            }else{
                Tag::where('id',$request->get('id'))->update($data);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => $returnMessage,
                'redirect'  => route('app.dashboard.tags.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function details(int $user_id){
        $pageData = [
            'pageTitle'         => 'User details',
            'pageDescription'   => 'Detailed information about the user',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'User details', 'route' => '']
            ],
            'pageData'          => User::with(['profile'])->findOrFail($user_id)
        ];
        return view('restricted.appPages.users.details',$pageData);
    }
    public function delete($tag_id){
        try{
            $findTag = Tag::find($tag_id);
            if(!$findTag){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Tag not found'
                ],400);
            }
            $findTag->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Tag deleted successfully'
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
            $tags = Tag::where('id','!=',auth()->id());
            if($tags->count() == 0){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'No tags found'
                ],400);
            }
            $tags->each(function($tag){
                $tag->delete();
            });
            return response()->json([
                'status'    => 'success',
                'message'   => 'All tags has been removed successfully',
                'redirect'  => route('app.dashboard.tags.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function import(){
        return redirect()->route('app.dashboard.tags.list');
    }
    public function export(){
        return redirect()->route('app.dashboard.tags.list');
    }
}
