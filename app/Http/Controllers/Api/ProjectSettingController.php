<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\ProjectSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectSettingRequest;
use App\Http\Requests\UpdateProjectSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Auth;
use Illuminate\Support\Facades\Storage;

class ProjectSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        $user = Auth::user();
        if($project_id){
            $project = Project::where('id',$project_id)->with('settings')->get();
        }
        
        return response([
            'code'=>'208',
             'status'=>'success',
             'data'=>$project
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data=$request->validate([
            'project_id'=>'required',
            'setting_meta_title'=>'required',
            'setting_value'=>'required',
       ]);

       $project_setting =  ProjectSetting::create($data);

       return response([
            'code'=>'209',
            'status'=>'success',
            'data'=>$project_setting
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function iconStore(Request $request)
    {
       $valid_data=$request->validate([
            'project_id'=>'required',
            'icon_image'=>'required|image',
       ]);

       $data = [
                'project_id'=>$valid_data['project_id'],
                'setting_meta_title'=>'icon_path',
                'setting_value'=>'',
        ];
        $project_setting =  ProjectSetting::create($data);

       $icon_image = $request->file('icon_image')->store('/projects/icon');
       $data = [
                'project_id'=>$valid_data['project_id'],
                'setting_meta_title'=>'icon_path',
                'setting_value'=>$icon_image,
        ];
       $update =  ProjectSetting::find($project_setting->id)->update($data);
       $project_setting = ProjectSetting::find($project_setting->id);

       return response([
            'code'=>'210',
            'status'=>'success',
            'data'=>$project_setting
        ]);

    }

    
    public function iconRemove($project_id)
    {
        if($project_id){
            $icon_setting = ProjectSetting::where('project_id',$project_id)->where('setting_meta_title','icon_path')->get();
            foreach($icon_setting as $icon){
                $path = str_replace('/','\\','app/'.$icon->setting_value);
                $deleted = "";
                if(File::exists(storage_path($path)).storage_path($path)){
                    File::delete(storage_path($path)).storage_path($path) ;
                    $deleted = true; 
                    $icon->delete();
                } 
            }
        }

       return response([
            'code'=>'211',
            'status'=>'success',
            'message'=>'Icon image has been deleted'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\ProjectSetting  $projectSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectSetting $projectSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\ProjectSetting  $projectSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectSetting $projectSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectSettingRequest  $request
     * @param  \App\Models\Models\ProjectSetting  $projectSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $update = "";
        $data = $request->validate([
            'project_setting_id'=>'required',
            'project_id'=>'required',
            'setting_meta_title'=>'required',
            'setting_value'=>'required',
        ]);
        $project_setting_id = $data['project_setting_id'];
        unset($data['project_setting_id']);
        $project_setting=ProjectSetting::find($project_setting_id);
        if( $project_setting){
            $update = $project_setting->update($data);
        }

        if($update){
            return response()->json([
                'code'=>'212',
                'status'=>'success',
                'data'=>$project_setting,
                'message'=>'Project setting has been updated'
            ]);
        }else{
            return response()->json([
                'code'=>'213',
                'status'=>'error',
                'message'=>'Project setting not updated'
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\ProjectSetting  $projectSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectSetting $projectSetting)
    {
        //
    }
}
