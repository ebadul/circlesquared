@extends('frontend.user.user-layout')
    @section('content')
    <div class="container-fluid dashboard">
         <div class="container my-3">
             @include('frontend.user.header',['title'=>'Dashboard'])
            
             @if($projects)
             <div class="row my-5">
                  @foreach($projects as $project)
                  <div class="col">
                    <div class="row align-items-center justify-content-center d-flex m-5">
                      @php
                      if(isset($project->project_logo_path) && $project->project_logo_path){
                        $logo_path= $project->project_logo_path;
                      }else{
                        $logo_path= "images/projects/project_placeholder.png";
                      }
                      @endphp
                      <img class="project-logo" src="{{isset($logo_path)?$logo_path:'images/projects/project_placeholder.png'}}"  onerror="images/projects/project_placeholder.png">
                      <h5 class="text-center">
                        <a href="{{route('projects.details',$project->id)}}" class="text-decoration-none">
                          {{$project->project_name}}
                        </a>
                      </h5>
                    </div>
                   
                  </div>
                   
                  @endforeach
                </div>
            @else

            @endif

            <div class="row">
                <div class="col">
                    <div id="myBarChart" style="max-width:700px; height:400px;margin-top:100px" class="bg-light"></div>
                </div>
                <div class="col">
                    <div id="myPieChart" style="max-width:700px; height:400px;margin-top:100px" class="bg-light"></div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div id="myBarCharts" style="max-width:700px; height:400px;margin-top:100px" class=" d-flex justify-content-center">
                      <table class="table table-bordered my-5 bg-light">
                        <tr>
                          <th>Projects</th>
                          <th>Quantity</th>
                        </tr>
                        <tr>
                          <td>Android</td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>IOS</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Web</td>
                          <td>10</td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="col">
                    <div id="myColumnChart" style="max-width:700px; height:400px;margin-top:100px" class="bg-light"></div>
                </div>
            </div>
            
         </div>
    </div>

     

    @endsection
 