<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function list()
    {
        $pageData = [
            'pageTitle'         => 'List of users',
            'pageDescription'   => 'List of all users in the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
            ],
            'actions'           => [
                ['title' => 'Add New', 'route' => route('app.dashboard.users.create'), 'method' => 'GET', 'color' => 'blue'],
                ['title' => 'Delete All', 'route' => route('app.dashboard.users.deleteAll'), 'method' => 'DELETE', 'color' => 'red'],
                ['title' => 'Import', 'route' => route('app.dashboard.users.import'), 'method' => 'POST', 'color' => 'green'],
                ['title' => 'Export', 'route' => route('app.dashboard.users.export'), 'method' => 'POST', 'color' => 'teal'],
            ],
            'api'            => route('internal.users'),
        ];
        return view('restricted.appPages.users.list',$pageData);
    }

    public function create()
    {
        $pageData = [
            'pageTitle'         => 'Add new user',
            'pageDescription'   => 'Add a new user to the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'Add new user', 'route' => '']
            ],
        ];
        return view('restricted.appPages.users.form',$pageData);
    }

    public function edit(int $user_id)
    {
        $pageData = [
            'pageTitle'         => 'Edit user',
            'pageDescription'   => 'Edit an existing user in the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'Edit User', 'route' => '']
            ],
            'pageData'          => User::findOrFail($user_id)
        ];
        return view('restricted.appPages.users.form',$pageData);
    }

    public function form(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'status'     => 'required',
                'fullName'   => 'required',
                'email'      => 'required|email',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => 'User saved successfully',
                'redirect'  => route('app.dashboard.users.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function details(){
        $pageData = [
            'pageTitle'         => 'User details',
            'pageDescription'   => 'Detailed information about the user',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'User details', 'route' => '']
            ],
        ];
        return view('restricted.appPages.users.details',$pageData);
    }

    public function delete($user_id)
    {
        try{
            $findUser = User::find($user_id);
            if(!$findUser){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'User not found'
                ],400);
            }
            $findUser->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'User deleted successfully'
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => $exception->getMessage()
            ],500);
        }
    }

    public function deleteAll(Request $request){
        try{
            return response()->json([
                'status'    => 'success',
                'message'   => 'All users has been removed successfully',
                'redirect'  => route('app.dashboard.users.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }

    public function import()
    {
        return redirect()->route('app.dashboard.users.list');
    }

    public function export()
    {
        return redirect()->route('app.dashboard.users.list');
    }
}
