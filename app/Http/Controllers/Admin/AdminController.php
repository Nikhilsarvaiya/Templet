<?php

namespace App\Http\Controllers\Admin;

use Str;
use DataTables;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\View\Components\admin\EditButton;
use Illuminate\Support\Facades\Validator;
use App\View\Components\admin\DeleteButton;

class AdminController extends Controller
{
    // list users
    public function index(Request $request)
    {
        return view('admin.sub-admin.list');
    }

    // get users
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {

            $data = Admin::latest();

            return DataTables::of($data)
                ->addColumn('last_login', function ($data) {
                    if( !$data->last_logged_in_at ){
                        return '-';
                    }
                    return '<span class="kt-badge kt-badge--info kt-badge--inline"> '. $data->last_logged_in_at->diffForHumans() .' ( '.$data->last_login_ip.' ) </span>';
                })
                ->addColumn('role', function ($data) {
                    if ( !empty($data->getRoleNames()) ) {
                        $htmlTxt = '';
                        foreach ($data->getRoleNames() as $role) {
                            $htmlTxt .= '<label class="kt-badge kt-badge--brand kt-badge--inline">'.$role.'</label>';
                        }
                        return $htmlTxt;
                    }else{
                        return '<label class="kt-badge kt-badge--brand kt-badge--inline">-</label>';
                    }
                })
                ->addColumn('action', function ($data) {
                    if($data->hasRole(['Admin'])){
                        return '-';
                    }
                    $editRoute = auth()->user()->hasPermissionTo('sub-admin-edit') ? route('admin.sub-admin.edit',$data->id) : null;
                    $deleteRoute = auth()->user()->hasPermissionTo('sub-admin-delete') ? route('admin.sub-admin.delete') : null;
                    
                    $edit   = $editRoute ? (new EditButton($editRoute))->render() : null;
                    $delete = $deleteRoute ? (new DeleteButton($deleteRoute,$data->id))->render() : null;
                    return "{$edit}{$delete}";
                })
                ->rawColumns(['status','action','role','last_login'])
                ->make(true);
        } else {
            return view('admin.sub-admin.list');
        }
    }

    // add user from
    public function add()
    {
        $mode = 'Add';
        $roles = Role::get(['id', 'name']);
        return view('admin.sub-admin.add', compact('mode','roles'));
    }

    // store user
    public function store(Request $request)
    {
        
        $request->validate([
            'name'                  => 'required|max:100',
            'email'                 => 'required|email|unique:admin',
            'password_confirmation' => 'required',
            'password'              => 'required|min:8|confirmed',
        ]);

        $user           = new Admin;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        
        if ($user->save()) {
            $user->assignRole($request->input('roles'));
            return redirect()->route('admin.sub-admin.list')->with('success', 'Admin created successfully');
        } else {
            return back()->with('error', 'User added failed');
        }
        
    }

    // view user
    public function view($id)
    {
        $mode = 'View';
        $user = Admin::findOrFail($id);
        if($user->hasRole(['Admin'])){
            return redirect()->route('admin.sub-admin.list');
        }
        return view('admin.sub-admin.view', compact('mode', 'user',));
    }

    // edit user
    public function edit($id)
    {
        $mode = 'Edit';
        $user = Admin::findOrFail($id);
        if($user->hasRole(['Admin'])){
            return redirect()->route('admin.sub-admin.list');
        }
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.sub-admin.add', compact('mode', 'user', 'roles','userRoles'));
    }

    // update user
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name'  => 'required|max:100',
            'email' => 'required|email|unique:admin'. ($id ? ",email,$id,id" : ''),
            'password'              => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable',
        ]);
        
        $user = Admin::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ( !empty( $request->password ) ) {
            $user->password = \Hash::make($request->password);
        }

        if ($user->save()) {

            $user->syncRoles($request->input('roles'));

            return redirect()->route('admin.sub-admin.list')->with('success', 'Admin updated successfully');
        } else {
            return back()->with('error', 'Admin updated failed');
        }
    }

    // multiple users delete
    public function delete()
    {
        $delete =  Admin::where('id', request('id'))->delete();
        echo ($delete > 0) ? true :  false;
    }
}
