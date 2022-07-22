<?php

namespace App\Http\Controllers\Web;

use App\Models\TestSuite;
use App\Http\Requests\StoreTestSuiteRequest;
use App\Http\Requests\UpdateTestSuiteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Toastr;

class TestSuiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testsuitesList($project_id)
    {
        $user = Auth::user();
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        
        return $request->json([
            'testsuites'=>$testsuites
        ]);
    }


    public function addTestsuites($project_id=null)
    {
        $user = Auth::user();
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        
        return view('frontend.user.add-testsuite')->with(compact('project_id','testsuites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTestsuitesStore(Request $request)
    {
        $user = Auth::user();
       
        $data = $request->validate([
            'testsuite_name'=>'required',
            'testsuite_description'=>'required',
            'testsuite_precondition'=>'required',
        ]);

        $data = array_merge($data, ['project_admin'=>$user->id,'project_id'=>$request->project_id]);

        $testsuite = TestSuite::create($data);

        Toastr::success('Test suite added successfully','title');

        return redirect()->route('projects.details',$request->project_id );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestSuiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestSuiteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestSuite  $testSuite
     * @return \Illuminate\Http\Response
     */
    public function show(TestSuite $testSuite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestSuite  $testSuite
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSuite $testSuite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestSuiteRequest  $request
     * @param  \App\Models\TestSuite  $testSuite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestSuiteRequest $request, TestSuite $testSuite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestSuite  $testSuite
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestSuite $testSuite)
    {
        //
    }


    
    public function deleteTestsuites($testsuite_id=null)
    {
        if($testsuite_id){
            $testsuite = TestSuite::find($testsuite_id);
            $testsuite_tmp = $testsuite;
            $deleted = "";
            if( $testsuite){
                $deleted = $testsuite->delete();
            }

            if($deleted){
                Toastr::success('Test case deleted successfully');
            } 

        }

        return redirect()->route('projects.details',$testsuite_tmp->project_id);
         
    }


}
