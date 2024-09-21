<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Throwable;

class InternalController extends Controller
{
    /**
     * Fetch users data for internal use only
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function users(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('users');
            $sort = $request->get('sort');
            $users = (new User)->newQuery();
            $users->whereNot('id',1);
            if($search){
                $users->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $users->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $users->orderBy($sort['column'],$sort['order']);
            }else{
                $users->orderBy('id','desc');
            }
            $users = $users->paginate(10);
            $renderTable = view('restricted.appPages.users._table.data', ['users' => $users])->render();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Users data fetched successfully',
                'html'      => $renderTable
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching users data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }
    public function roles(Request $request){

        return response()->json([
            'status'    => 'success',
            'message'   => 'Roles data fetched successfully',
            'data'      => []
        ]);
    }

    public function permissions(Request $request){
        return response()->json([
            'status'    => 'success',
            'message'   => 'Permissions data fetched successfully',
            'data'      => []
        ]);
    }

    public function blogs(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('blogs');
            $sort = $request->get('sort');
            $blogs = (new Blog)->newQuery();
            $blogs->whereNot('id',1);
            if($search){
                $blogs->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $blogs->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $blogs->orderBy($sort['column'],$sort['order']);
            }else{
                $blogs->orderBy('id','desc');
            }
            $blogs = $blogs->paginate(10);
            $renderTable = view('restricted.appPages.blogs._table.data', ['blogs' => $blogs])->render();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Blogs data fetched successfully',
                'html'      => $renderTable
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching blogs data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }

    public function tags(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('tags');
            $sort = $request->get('sort');
            $tags = (new Tag)->newQuery();
            $tags->whereNot('id',1);
            if($search){
                $tags->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $tags->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $tags->orderBy($sort['column'],$sort['order']);
            }else{
                $tags->orderBy('id','desc');
            }
            $tags = $tags->paginate(10);
            $renderTable = view('restricted.appPages.tags._table.data', ['tags' => $tags])->render();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Tags data fetched successfully',
                'html'      => $renderTable
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching tags data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }
    public function tag(Request $request){
        try{
            $formFields = [
                'id',
                'name',
                'slug',
                'description'
            ];
            $tag = Tag::find($request->get('id'));
            if(!$tag){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Tag not found'
                ],400);
            }
            $tag = $tag->only($formFields);
            return response()->json([
                'status'    => 'success',
                'module'    => 'Tag',
                'message'   => 'Tags data fetched successfully',
                'data'      => $tag
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching tags data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }
    public function categories(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('categories');
            $sort = $request->get('sort');
            $categories = (new Category)->newQuery();
            $categories->whereNot('id',1);
            if($search){
                $categories->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $categories->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $categories->orderBy($sort['column'],$sort['order']);
            }else{
                $categories->orderBy('id','desc');
            }
            $categories = $categories->paginate(10);
            $renderTable = view('restricted.appPages.categories._table.data', ['categories' => $categories])->render();
            return response()->json([
                'status'    => 'success',
                'message'   => 'TableBased data fetched successfully',
                'html'      => $renderTable
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching categories data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }

    public function category(Request $request){
        try{
            $formFields = [
                'id',
                'name',
                'slug',
                'description',
                'parent_id'
            ];
            $category = Category::find($request->get('id'));
            if(!$category){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Category not found'
                ],400);
            }
            $category = $category->only($formFields);
            return response()->json([
                'status'    => 'success',
                'module'    => 'Category',
                'message'   => 'Category data fetched successfully',
                'data'      => $category
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching category data',
                'error'     => $exception->getMessage()
            ],402);
        }
    }

    public function comments(Request $request){
        return response()->json([
            'status'    => 'success',
            'message'   => 'Comments data fetched successfully',
            'data'      => []
        ]);
    }
}
