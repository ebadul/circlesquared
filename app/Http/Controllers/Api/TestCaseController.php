<?php

namespace App\Http\Controllers\Api;

use App\Models\TestCase;
use App\Http\Requests\StoreTestCaseRequest;
use App\Http\Requests\UpdateTestCaseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class TestCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        $user = Auth::user();
        $testcase = TestCase::where('project_id',$project_id)->where('project_admin',$user->id)->get();
        return response()->json([
            'code'=>'230',
            'status'=>'success',
            'data'=>$testcase
        ]);
    }

    public function getDetails($testcase_id)
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

    public function editTestcase($testcase_id, Request $request)
    {
        
        $data = $request->validate([
            "testcase_id" => "required",
            "project_id" => "required",
            "project_code" => "required",
            "testcase_name" => "required",
            "testcase_precondition" => "required"
        ]);

        if($testcase_id){
             
            $testcase = TestCase::find($testcase_id);
            $testcase->update($request->all());

            return response()->json([
                'code'=>'232',
                'status'=>'success',
                'data'=>$testcase
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
        $data = $request->validate([
            "project_id" => "required",
            "project_code" => "required",
            "testcase_name" => "required",
            "testcase_precondition" => "required",
            "expected_result" => "",
        ]);

        $testcase = TestCase::create($data);
        return response()->json([
            'code'=>'229',
            'status'=>'success',
            'data'=>$testcase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteTestcase($testcase_id)
    {
        if($testcase_id){
            $testcase = TestCase::find($testcase_id);
            $deleted = $testcase->delete();
            if($deleted){
                return response()->json([
                    'code'=>'233',
                    'status'=>'success',
                    'message'=>'TestCase deleted successfully'
                ]);
            }  
        }

        return response()->json([
            'code'=>'234',
            'status'=>'error',
            'message'=>'TestCase not found'
        ]);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestCase  $testCase
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $testcase_id = $request->input('testcase_id');
        $status = $request->get('status');
       
        if($testcase_id){
            $testcase = TestCase::find($testcase_id);
         
             $testcase->testcase_status=$status;
             $updated = $testcase->save();
           
            if($updated){
                return response()->json([
                    'code'=>'233',
                    'status'=>$testcase,
                    'message'=>'TestCase updated successfully'
                ]);
            }  
        }

        return response()->json([
            'code'=>'234',
            'status'=>$testcase_id,
            'status'=>'error',
            'message'=>'TestCase not found'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCase  $testCase
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCase $testCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestCaseRequest  $request
     * @param  \App\Models\TestCase  $testCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestCaseRequest $request, TestCase $testCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestCase  $testCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCase $testCase)
    {
        //
    }
}
