<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProjectController extends Controller
{

    public function addProject(){
        return view('frontend.user.add-project');
    }

    public function addProjectStore(Request $request){
        $data = $request->validate([
            'project_name'=>'required',
            'project_code'=>'required',
            'project_description'=>'required',
            'project_type'=>'required',
        ]);

        dd($data);
        Project::create($data);

        return redirect()->route('projects.list');
    }

 

    

}
