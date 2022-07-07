<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        if($id){
            $role=Role::find($id);
        }else{
            $role=Role::all();
        }
        return response([
            'code'=>'215',
            'status'=>'success',
            'data'=>$role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'role_title'=>'required',
            'role_description'=>'required',
        ]);
        $role = Role::create($data);
        return response([
            'code'=>'221',
            'status'=>'success',
            'data'=>$role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $update = "";
        $data = $request->validate([
            'role_id'=>'required',
            'role_title'=>'required',
            'role_description'=>'required',
        ]);
        $role_id = $data['role_id'];
        unset($data['role_id']);
        $role=Role::find($role_id);
        if( $role){
            $update = $role->update($data);
        }

        if($update){
            return response()->json([
                'code'=>'222',
                'status'=>'success',
                'data'=>$role,
                'message'=>'Role has been updated'
            ]);
        }else{
            return response()->json([
                'code'=>'223',
                'status'=>'error',
                'message'=>'Role not updated'
            ]); 
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        $deleted="";
        $role=Role::find($id);
        if( $role){
            $deleted=$role->delete();
        }

        if($deleted){
            return response()->json([
                'code'=>'225',
                'status'=>'success',
                'message'=>'Role has been deleted'
            ]);
        }else{
            return response()->json([
                'code'=>'227',
                'status'=>'error',
                'message'=>'Role not deleted'
            ]); 
        }
    }
}
