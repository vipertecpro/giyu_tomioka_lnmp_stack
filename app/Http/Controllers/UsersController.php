<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function list(){
        $exceptionColumns = ['password','remember_token','email_verified_at', 'is_password_update'];
        $moduleSchemaColumns = Schema::getColumnListing('users');
        $moduleSchemaColumns = array_diff($moduleSchemaColumns,$exceptionColumns);
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
            'api'            => route('internal.blogs'),
            'columns'        => $moduleSchemaColumns
        ];
        return view('restricted.appPages.users.list',$pageData);
    }
    public function create(){
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
    public function edit(int $user_id){
        $pageData = [
            'pageTitle'         => 'Edit user',
            'pageDescription'   => 'Edit an existing user in the system',
            'crumbs'            => [
                ['title' => 'Users', 'route' => route('app.dashboard.users.list')],
                ['title' => 'Edit User', 'route' => '']
            ],
            'pageData'          => User::with(['profile'])->findOrFail($user_id)
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
            $validator->after(function ($validator) use ($request) {
                $email = $request->input('email');
                $user = User::where('email',$email)->first();
                if($user && $user->id != $request->get('id')){
                    $validator->errors()->add('email', 'Email already exists');
                }
            });
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
            $returnMessage = 'User updated successfully';
            if(!$request->get('id')){
                $data['password'] = bcrypt('password');
                $data['is_password_update'] = false;
                $returnMessage = 'User created successfully';
                User::create($data);
            }else{
                User::where('id',$request->get('id'))->update($data);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => $returnMessage,
                'redirect'  => route('app.dashboard.users.list')
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'exception',
                'message'    => $exception->getMessage(),
            ],400);
        }
    }
    public function updateAvatar(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'avatar'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $user = User::with(['profile'])->find($request->get('user_id'));
            if(!$user){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'User not found'
                ],400);
            }
            $avatar = $request->file('avatar');
            $avatarName = Str::random(10).'_avatar'.time().'.'.$avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars',$avatarName);
            if($user->profile){
                $user->profile->update(['avatar' => $avatarName]);
            }else{
                $user->profile()->create(['avatar' => $avatarName]);
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
                'user_id' => 'required',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'    => 'form-error',
                    'message'   => $validator->errors(),
                    'fields'    => $validator->errors()->keys()
                ],400);
            }
            $user = User::with(['profile'])->find($request->get('user_id'));
            if(!$user){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'User not found'
                ],400);
            }
            if($user->profile){
                $user->profile->update(['avatar' => null]);
            }else{
                $user->profile()->create(['avatar' => null]);
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
    public function delete($user_id){
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
    public function deleteAll(){
        try{
            $users = User::where('id','!=',auth()->id());
            if($users->count() == 0){
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'No users found'
                ],400);
            }
            $users->each(function($user){
                $user->delete();
            });
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
    public function import(){
        return redirect()->route('app.dashboard.users.list');
    }
    public function export(){
        return redirect()->route('app.dashboard.users.list');
    }
}
