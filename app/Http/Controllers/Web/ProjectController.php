<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\TestSuite;
use App\Models\TestCase;
use Auth;
use Toastr;

class ProjectController extends Controller
{

    public function projectsList(){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->get();
        
        return view('frontend.user.projects')->with(compact('projects'));
    }

    public function projectsDetails($project_id=null){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->where('id',$project_id);
        $testsuites = "";
        $testcases = "";
        if($projects){
            $project_details = $projects->first();
            $testsuites = TestSuite::where('project_admin', $user->id)->where('project_id',$project_id)->get();
            $testcases = TestCase::where('project_admin', $user->id)->where('project_id',$project_id)->get();
            $testcasesNoSuites = TestCase::where('project_id',$project_id)->whereNull('testsuite_id')->get();
        }
        
        return view('frontend.user.project-details')->with(compact('project_details','testsuites', 'testcases','testcasesNoSuites'));
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


    public function deleteProject($project_id=null)
    {
        if($project_id){
            $data = Project::find($project_id);
            $datae_tmp = $data;
            $deleted = "";
            if( $data){
                $deleted = $data->delete();
            }

            if($deleted){
                Toastr::success('Project deleted successfully');
            } 

        }

        return redirect()->route('projects.list');

    }
 
    
    

}
