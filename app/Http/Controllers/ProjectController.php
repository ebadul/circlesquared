<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Auth;

class ProjectController extends Controller
{

    public function projectsList(){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->get();
        
        return view('frontend.user.projects')->with(compact('projects'));
    }

    public function addProject(){
        return view('frontend.user.add-project');
    }

    public function addProjectStore(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'project_name'=>'required',
            'project_code'=>'required',
            'project_description'=>'required',
            'project_type'=>'required',
        ]);

        $logo_file = $request->file('project_logo_path'); 
        if($request->hasFile('project_logo_path')){
            $file_name = time().'.'.$logo_file->extension();
            $logo_path = $request->file('project_logo_path')->move('images/projects', $file_name); 
            $data = array_merge($data, ['project_admin'=>$user->id,'project_logo_path'=>$logo_path]);
        }else{
            $data = array_merge($data, ['project_admin'=>$user->id,'project_logo_path'=>'']);
        }
        
        Project::create($data);

        return redirect()->route('projects.list');
    }

 

    

}
