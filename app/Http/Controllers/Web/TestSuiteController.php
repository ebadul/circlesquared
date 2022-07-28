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

    
    public function editTestsuites($testsuite_id=null){
        $user = Auth::user();
        $testsuite = TestSuite::find($testsuite_id);
        $project_id = $testsuite->project_id;
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        return view('frontend.user.edit-testsuite')->with(compact('testsuite', 'testsuites', 'project_id'));
    }

    public function copyTestsuites($testsuite_id=null){
        $user = Auth::user();
        $testsuite = TestSuite::find($testsuite_id);
        $project_id = $testsuite->project_id;
        $testsuites = TestSuite::where('project_id',$project_id)->get();
        return view('frontend.user.copy-testsuite')->with(compact('testsuite', 'testsuites', 'project_id'));
    }

    public function editTestsuitesStore(Request $request)
    {
        if($request->testsuite_id){
            $testsuite = TestSuite::find($request->testsuite_id);
            $updated = "";
            $data = $request->validate([
                'project_id'=>'required',
                'testsuite_id'=>'required',
                'testsuite_name'=>'required',
                'testsuite_description'=>'required',
                'parent_testsuite_id'=>'nullable'
            ]);

            unset($data['project_id']);
            unset($data['testsuite_id']);

            if( $testsuite){
                $updated = $testsuite->update( $data);
            }

            if($updated){
                Toastr::success('Test suite updated successfully');
            } 

        }

        return redirect()->route('projects.details',$testsuite->project_id);
         
    }


}
