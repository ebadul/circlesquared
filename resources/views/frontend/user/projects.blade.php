@extends('frontend.user.user-layout')
@section('content')

    <div class="container-fluid">
         <div class="container my-3">
            
         @include('frontend.user.header',['title'=>'Projects'])

            @if($projects)
              @foreach($projects as $project)
              <div class="row my-3">
                <div class="col">
                  <a href="{{route('projects.details',$project->id)}}" class="text-decoration-none">
                    <div class="d-flex align-items-center text-center justify-content-center" style="text-align:center;padding-top:35px;border-radius:50%;background:#aaa;height:100px;width:100px;border:1px solid #999;padding:15px">
                      {{substr($project->project_name,0,12)}}
                    </div>
                  </a>
                </div>
                <div class="col d-flex align-items-center d-grid gap-2">
                  <a href="{{route('testcases.add',$project->id)}}" class="text-decoration-none">
                    <img src="{{asset('images/circle.jpg')}}" style="border-radius:50%" class="img-thumbnail" height="auto" width="65">
                    Add Test
                  </a>
                </div>
                <div class="col d-flex align-items-center d-grid gap-2">
                  <a href="{{route('testsuites.add',$project->id)}}" class="text-decoration-none">
                    <img src="{{asset('images/square.jpg')}}" class="img-thumbnail" height="auto" width="45">
                    Add Test Suites
                  </a>
                </div>
              </div>
              @endforeach
            @else
                <h4>No projects</h4>
            @endif


            

         </div>
    </div>

    @endsection
 

 