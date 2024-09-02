<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InternalController extends Controller
{
    public function users(Request $request){
        $search = $request->get('search');
        $filters = $request->get('filters');
        $getTableColumnsFromSchema = Schema::getColumnListing('users');
        $users = (new User)->newQuery();
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
        $users = $users->paginate(10);
        $renderTable = view('restricted.appPages.users._table.data', ['users' => $users])->render();
        return response()->json([
            'status'    => 'success',
            'message'   => 'Users data fetched successfully',
            'html'      => $renderTable
        ]);
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
        return response()->json([
            'status'    => 'success',
            'message'   => 'Blogs data fetched successfully',
            'data'      => []
        ]);
    }

    public function tags(Request $request){
        return response()->json([
            'status'    => 'success',
            'message'   => 'Tags data fetched successfully',
            'data'      => []
        ]);
    }

    public function categories(Request $request){
        return response()->json([
            'status'    => 'success',
            'message'   => 'Categories data fetched successfully',
            'data'      => []
        ]);
    }

    public function comments(Request $request){
        return response()->json([
            'status'    => 'success',
            'message'   => 'Comments data fetched successfully',
            'data'      => []
        ]);
    }
}
