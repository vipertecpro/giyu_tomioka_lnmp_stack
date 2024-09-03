<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;

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

    public function edit($user_id)
    {
        $pageData = [
            'pageTitle'         => 'Edit user',
            'pageDescription'   => 'Edit an existing user in the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'Edit User', 'route' => '']
            ],
            'pageData'          => User::find($user_id)
        ];
        return view('restricted.appPages.users.form',$pageData);
    }

    public function form()
    {
        return redirect()->route('users.list');
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

    public function deleteAll()
    {
        return redirect()->route('app.dashboard.users.list');
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
