<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list(){
        $exceptionColumns = [];
        $moduleSchemaColumns = Schema::getColumnListing('blogs');
        $moduleSchemaColumns = array_diff($moduleSchemaColumns,$exceptionColumns);
        $pageData = [
            'pageTitle'         => 'List of blogs',
            'pageDescription'   => 'List of all blogs in the system',
            'crumbs'            => [
                ['title' => 'Blogs', 'route' => route('app.dashboard.blogs.list')],
            ],
            'actions'           => [
                ['title' => 'Add New', 'route' => route('app.dashboard.blogs.create'), 'method' => 'GET', 'icon' => 'plus', 'color' => 'blue'],
                ['title' => 'Delete All', 'route' => route('app.dashboard.blogs.deleteAll'), 'method' => 'DELETE', 'color' => 'red'],
            ],
            'api'            => route('internal.blogs'),
            'columns'        => $moduleSchemaColumns
        ];
        return view('restricted.appPages.blogs.list',$pageData);
    }

    public function edit(int $blog_id){
        $pageData = [
            'pageTitle'         => 'Edit blog',
            'pageDescription'   => 'Edit an existing blog in the system',
            'crumbs'            => [
                ['title' => 'Blogs', 'route' => route('app.dashboard.blogs.list')],
                ['title' => 'Edit blog', 'route' => '']
            ],
            'pageData'          => Blog::with(['author','editor','publisher','categories','tags','comments'])->findOrFail($blog_id)
        ];
        return view('restricted.appPages.blogs.form',$pageData);
    }

    public function form(Request $request){
        try{
            dd($request->all());
            $validator = Validator::make($request->all(),[
                'title'              => 'required',
                'blog-description'   => 'required',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $data = [
                'status'    => $request->get('status'),
                'name'      => $request->get('fullName'),
                'email'     => $request->get('email'),
            ];
            $returnMessage = 'blog updated successfully';
            if(!$request->get('id')){
                $data['password'] = bcrypt('password');
                $data['is_password_update'] = false;
                $returnMessage = 'blog created successfully';
                Blog::create($data);
            }else{
                Blog::where('id',$request->get('id'))->update($data);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => $returnMessage,
                'redirect'  => route('app.dashboard.blogs.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }

    public function create(){
        $pageData = [
            'pageTitle'         => 'Add new blog',
            'pageDescription'   => 'Add a new blog to the system',
            'crumbs'            => [
                ['title' => 'Blogs', 'route' => route('app.dashboard.blogs.list')],
                ['title' => 'Add new blog', 'route' => '']
            ],
            'actions'           => [
                ['title' => 'Blog Settings', 'color' => 'primary', 'type' => 'toggle', 'drawer' => 'blog-settings'],
            ],
        ];
        return view('restricted.appPages.blogs.form',$pageData);
    }

    public function updateAvatar(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'blog_id' => 'required',
                'avatar'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $blog = Blog::with(['profile'])->find($request->get('blog_id'));
            if(!$blog){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'blog not found'
                ],400);
            }
            $avatar = $request->file('avatar');
            $avatarName = Str::random(10).'_avatar'.time().'.'.$avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars',$avatarName);
            if($blog->profile){
                $blog->profile->update(['avatar' => $avatarName]);
            }else{
                $blog->profile()->create(['avatar' => $avatarName]);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => 'Avatar updated successfully',
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function removeAvatar(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'blog_id' => 'required',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $blog = Blog::with(['profile'])->find($request->get('blog_id'));
            if(!$blog){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'blog not found'
                ],400);
            }
            if($blog->profile){
                $blog->profile->update(['avatar' => null]);
            }else{
                $blog->profile()->create(['avatar' => null]);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => 'Avatar has been removed successfully',
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function details(int $blog_id){
        $pageData = [
            'pageTitle'         => 'blog details',
            'pageDescription'   => 'Detailed information about the blog',
            'crumbs'            => [
                ['title' => 'blogs', 'route' => route('app.dashboard.blogs.list')],
                ['title' => 'blog details', 'route' => '']
            ],
            'pageData'          => Blog::with(['profile'])->findOrFail($blog_id)
        ];
        return view('restricted.appPages.blogs.details',$pageData);
    }

    public function deleteAll(){
        try{
            $blogs = Blog::where('id','!=',auth()->id());
            if($blogs->count() == 0){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'No blogs found'
                ],400);
            }
            $blogs->each(function($blog){
                $blog->delete();
            });
            return response()->json([
                'status'    => 'success',
                'message'   => 'All blogs has been removed successfully',
                'redirect'  => route('app.dashboard.blogs.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }

    public function delete($blog_id){
        try{
            $findblog = Blog::find($blog_id);
            if(!$findblog){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'blog not found'
                ],400);
            }
            $findblog->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'blog deleted successfully'
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => $exception->getMessage()
            ],500);
        }
    }

    public function import(){
        return redirect()->route('app.dashboard.blogs.list');
    }
    public function export(){
        return redirect()->route('app.dashboard.blogs.list');
    }
}
