<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function list()
    {
        $pageData = [
            'pageTitle'         => 'Users List',
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
        ];
        return view('restricted.appPages.users.list',$pageData);
    }

    public function create()
    {
        $pageData = [
            'pageTitle'         => 'Add New User',
            'pageDescription'   => 'Add a new user to the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'Add New User', 'route' => route('app.dashboard.users.create')]
            ],
        ];
        return view('restricted.appPages.users.form',$pageData);
    }

    public function edit($user_id)
    {
        return view('restricted.appPages.users.form');
    }

    public function form()
    {
        return redirect()->route('users.list');
    }

    public function delete()
    {
        return redirect()->route('users.list');
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
