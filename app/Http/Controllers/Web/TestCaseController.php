<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\TestSuite;
use App\Models\TestCase;
use App\Models\ImagesTestCase;
use Auth;
use Toastr;

class TestCaseController extends Controller
{

    public function projectsList(){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->get();
        
        return view('frontend.user.projects')->with(compact('projects'));
    }

    public function addTestcases($project_id  = null){
        $project = Project::where('id',$project_id)->first();
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        
        return view('frontend.user.add-testcases')->with(compact('project_id','testsuites','project'));
    }

    public function addTestcasesStore(Request $request){
        $user = Auth::user();
        $gherkin_steps = "";
        $classic_steps = "";
        $data = $request->validate([
            'project_id'=>'required',
            'testcase_name'=>'required',
            'testcase_precondition'=>'required',
            'expected_result'=>'required',
            'test_case_steps'=>'required',
            'testsuite_id'=>'nullable',
            'switch_steps_raw'=>'nullable',
            'testcase_raw_details'=>'nullable',
        ]);

        if($request->test_case_steps=="Gherkin"){
            $gherkin_steps = json_encode($request->gerkin,true);
            $data_tmp=[
                "testcase_steps"=>$request->test_case_steps,
                "testcase_raw_details"=>$request->testcase_raw_details,
                "project_admin"=>$user->id,
                "testcase_status"=>'active',
                "testcase_steps_gherkins"=>$gherkin_steps
            ];
        }else{
            $classic_steps  = json_encode($request->classic,true);
            
            $data_tmp=[
                "testcase_steps"=>$request->test_case_steps,
                "testcase_raw_details"=>$request->testcase_raw_details,
                "project_admin"=>$user->id,
                "testcase_status"=>'active',
                "testcase_steps_classic"=>$classic_steps,
            ];
        }
       

        $data = array_merge($data, $data_tmp);
 
        $testcase = TestCase::create($data);

        if($request->hasFile('attachment_path')){
            $image_file = $request->file('attachment_path'); 
            $file_name = time().'.'.$image_file->extension();
            $attachment_path = $request->file('attachment_path')->move('images/projects/testcases', $file_name); 
            $data_img =  ['testcase_id'=>$testcase->id, 'attachment_path'=>$attachment_path];
            ImagesTestCase::create($data_img);
        } 

        $submit = $request->btnAddAnother;
        Toastr::success('Test case added successfully,<br> Thank you');
        if($submit){
            
            return redirect()->route('testcases.add', $request->project_id );
        }else{
            return redirect()->route('projects.details', $request->project_id );
        }

        return redirect()->route('projects.details', $request->project_id );
    }

    public function statusTestcasesStore(Request $request){
        $user = Auth::user();
        $updated = "";
        $data_tmp=[
            "testcase_severity"=>$request->severity,
            "testcase_status"=>$request->status,
            "testcase_type"=>$request->type,
            "testcase_priority"=>$request->priority,
        ];
   
        $testcase = TestCase::find($request->testcase_id);
        
        if($testcase){
            $updated =  $testcase->update($data_tmp);
        }
        if($updated){
            Toastr::success('Status updated successfully.');
        }
        // return redirect()->back('projects.details', $request->project_id );
        return redirect()->back();
    }


    

 
    public function deleteTestcases($testcase_id=null)
    {
        if($testcase_id){
            $testcase = TestCase::find($testcase_id);
            $testcase_tmp = $testcase;
            $deleted = "";
            if( $testcase){
                $deleted = $testcase->delete();
            }

            if($deleted){
                Toastr::success('Test case deleted successfully');
            } 

        }

        return redirect()->route('projects.details',$testcase_tmp->project_id);
         
    }


    public function detailsTestcases($testcase_id=null)
    {
        if($testcase_id){
            $testcase = TestCase::find($testcase_id);
            return response()->json([
                'code'=>'231',
                'status'=>'success',
                'data'=>$testcase
            ]);
        }
       
    }


    public function editTestcases($testcase_id  = null){
        $testcase = TestCase::where('id',$testcase_id)->first();
        $project_id = $testcase->project_id;
        $project = Project::where('id',$project_id)->first();
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        return view('frontend.user.edit-testcases')->with(compact('project','project_id',
                                                                'testsuites','testcase'));
    }

    public function copyTestcases($testcase_id  = null){
        $testcase = TestCase::where('id',$testcase_id)->first();
        $project_id = $testcase->project_id;
        $project = Project::where('id',$project_id)->first();
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        return view('frontend.user.copy-testcases')->with(compact('project','project_id',
                                                            'testsuites','testcase'));
    }


    public function editTestcasesStore(Request $request){
        $user = Auth::user();
        $gherkin_steps = "";
        $classic_steps = "";
        $data = $request->validate([
            'project_id'=>'required',
            'testcase_id'=>'required',
            'testcase_name'=>'required',
            'testcase_precondition'=>'required',
            'expected_result'=>'required',
            'test_case_steps'=>'required',
            'testsuite_id'=>'nullable',
            'switch_steps_raw'=>'nullable',
            'testcase_raw_details'=>'nullable',
        ]);

      

        if($request->test_case_steps=="Gherkin"){
            $gherkin_steps = json_encode($request->gerkin,true);
            $data_tmp=[
                "testcase_steps"=>$request->test_case_steps,
                "testcase_raw_details"=>$request->testcase_raw_details,
                "project_admin"=>$user->id,
                "testcase_status"=>'active',
                "testcase_steps_gherkins"=>$gherkin_steps
            ];
        }else{
            $classic_steps  = json_encode($request->classic,true);
            
            $data_tmp=[
                "testcase_steps"=>$request->test_case_steps,
                "testcase_raw_details"=>$request->testcase_raw_details,
                "project_admin"=>$user->id,
                "testcase_status"=>'active',
                "testcase_steps_classic"=>$classic_steps,
            ];
        }
       

        $data = array_merge($data, $data_tmp);
        $testcase_id = $data['testcase_id'];
        unset( $data['testcase_id']);
        $testcase_row = TestCase::find($testcase_id);
        if($testcase_row){
            $testcase_row->update($data);
        }
       
        // $logo_file = $request->file('project_logo_path'); 
        // $file_name = time().'.'.$logo_file->extension();
        // $logo_path = $request->file('project_logo_path')->move('images\projects', $file_name); 
        // $data = array_merge($data, ['project_admin'=>$user->id,'project_logo_path'=>$logo_path]);
       
        Toastr::success('Test case updated successfully,<br> Thank you');
        return redirect()->route('projects.details', $request->project_id );
    }


    

    

}
