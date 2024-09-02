<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function users(Request $request){
        $search = $request->search;
        $users = User::where('name','like','%'.$search.'%')
                    ->orWhere('email','like','%'.$search.'%')
                    ->paginate(10);
        $renderTable = view('restricted.appPages.users._table.data',['users'=>$users])->render();
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
