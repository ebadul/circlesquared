<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $project = Project::where('project_admin', $user->id)->get();
      
        return response([
            'code'=>'201',
            'status'=>'success',
            'data'=>$project
        ]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects($id=null)
    {
        $user = Auth::user();
        if($id){
            $project = Project::where('id',$id)->where('project_admin', $user->id)->first();
            return response([
                'code'=>'202',
                'status'=>'success',
                'data'=>$project
            ]);
        } else{
            return response([
                'code'=>'203',
                'status'=>'error',
                'message'=>'Project not found'
            ]);
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'project_code'=>'required|unique:projects',
            'project_name'=>'required',
        ]);

        $project = new Project;
        $project->project_code = $request->project_code;
        $project->project_name=$request->project_name;
        $project->project_description=$request->project_description;
        $project->project_logo_path=$request->project_logo_path;
        $project->project_remarks=$request->project_remarks;
        $project->project_admin=$user->id;
        $project_info = $project->save();
        if($project_info){
            return response([
                'code'=>'204',
                'status'=>'success',
                'message'=>'Project has been created'
            ]);
        }else{
            return response([
                'code'=>'205',
                'status'=>'error',
                'message'=>$request->all()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if($id){
            $data = Project::find($id)->update($request->all());
            return response([
                'code'=>'206',
                'status'=>'success',
                'data'=>$data,
                'message'=>'Project has been updated'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateProjectRequest $request, Project $project)
    public function update()
    {
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($id){
            $data = Project::find($id)->delete();
            return response([
                'code'=>'207',
                'status'=>'success',
                'data'=>$data,
                'message'=>'Project has been deleted'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
