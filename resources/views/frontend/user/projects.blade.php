@extends('frontend.user.user-layout')
@section('content')

    <div class="container-fluid">
         <div class="container my-3">
            
         @include('frontend.user.header',['title'=>'Projects'])

            @if($projects)
              @foreach($projects as $project)
              <div class="row my-3">
                <div class="col-4  ">
                  <div class=" row d-flex d-grid gap-1  align-items-center justify-content-center  ">
                      <div class="col-3">
                        <a href="{{route('projects.details',$project->id)}}" class="text-decoration-none">
                          <div class="d-flex align-items-center text-center justify-content-center" style="text-align:center;padding-top:35px;border-radius:50%;background:#aaa;height:100px;width:100px;border:1px solid #999;padding:15px">
                            {{substr($project->project_name,0,12)}}
                          </div>
                        </a>
                      </div>
                      <div class="col-8 text-end text-muted"><small>Test suites: {{count($project->testsuites)}}</small>
                      
                       <small>Test cases:  {{count($project->testcases)}}</small></div>
                  </div>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center d-grid gap-2">
                  <a href="{{route('testcases.add',$project->id)}}" class="text-decoration-none">
                    <img src="{{asset('images/circle.jpg')}}" style="border-radius:50%" class="img-thumbnail" height="auto" width="65">
                    Add Test
                  </a>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center d-grid gap-2">
                  <a href="{{route('testsuites.add',$project->id)}}" class="text-decoration-none">
                    <img src="{{asset('images/square.jpg')}}" class="img-thumbnail" height="auto" width="45">
                    Add Test Suites
                  </a>
                </div>

                <div class="col-1 d-flex align-items-center justify-content-center d-grid gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"  id="popDropdown{{$project->id}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg>
                    <ul class="dropdown-menu" aria-labelledby="popDropdown{{$project->id}}" style="padding:0px">
                        <li><a class="dropdown-item" href="{{route('testsuites.delete',$project->id)}}" onclick="return confirm('Do you want to delete this test suite')">Delete</a></li>
                    </ul>
                </div>
              </div>
              @endforeach
            @else
                <h4>No projects</h4>
            @endif


            

         </div>
    </div>

    @endsection
 

 