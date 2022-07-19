<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\TestCase;
use Auth;

class TestCaseController extends Controller
{

    public function projectsList(){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->get();
        
        return view('frontend.user.projects')->with(compact('projects'));
    }

    public function addTestcases($project_id  = null){
        return view('frontend.user.add-testcases')->with(compact('project_id'));
    }

    public function addTestcasesStore(Request $request){
        $user = Auth::user();

        $data = $request->validate([
            'project_id'=>'required',
            'testcase_name'=>'required',
            'testcase_precondition'=>'required',
            'expected_result'=>'required',
            'test_case_steps'=>'required',
        ]);

        $classic_steps = [
            "action_1"=>$request->action_1,
            "input_data_1"=>$request->input_data_1,
            "expected_result_1"=>$request->expected_result_1
        ];

        $gherkin_steps = [
            "gerkin_1"=>$request->gerkin_1,
            "gerkin_input_1"=>$request->gerkin_input_1,
        ];

        $data_tmp=[
            "testcase_steps"=>$request->test_case_steps,
            "testcase_raw_details"=>$request->testcase_raw_details,
            "project_admin"=>$user->id,
            "testcase_status"=>'active',
            "testcase_steps_classic"=>json_encode($classic_steps),
            "testcase_steps_gherkins"=>json_encode($gherkin_steps)
        ];

        $data = array_merge($data, $data_tmp);

        // $logo_file = $request->file('project_logo_path'); 
        // $file_name = time().'.'.$logo_file->extension();
        // $logo_path = $request->file('project_logo_path')->move('images\projects', $file_name); 
        // $data = array_merge($data, ['project_admin'=>$user->id,'project_logo_path'=>$logo_path]);
        TestCase::create($data);

        return redirect()->route('projects.list');
    }


    

 

    

}
