    @extends('frontend.user.user-layout')
    @section('content')
    <div class="container-fluid">
         <div class="container my-3">
             @include('frontend.user.header',['title'=>'Add Project'])
            <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                @csrf
                <div class="mb-3 row">
                  <div class="col-4">
                    <label>Project Name</label>
                    <input type="text" name="project_name" id="project_name" class="form-control form-control-sm" required>
                    @if($errors->has('project_name'))
                              <div class="text-danger">{{ $errors->first('project_name') }}</div>
                    @endif

                  </div>
                  <div class="col-3">
                    <label>Project Code</label>
                    <input type="text" name="project_code" id="project_code" class="form-control  form-control-sm" required>
                    @if($errors->has('project_code'))
                        <div class="text-danger">{{ $errors->first('project_code') }}</div>
                    @endif
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-7">
                    <label>Description</label>
                    <input type="text" name="project_description" id="project_description" class="form-control  form-control-sm" required>
                    @if($errors->has('project_description'))
                              <div class="text-danger">{{ $errors->first('project_description') }}</div>
                    @endif
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="row">
                    <div class="col-7">
                      <label>Project Type</label>
                      <hr>
                    </div>
                  </div>
                  
                  <div class="col-1">
                    <input type="checkbox" name="project_type" id="project_type_android" value="android" class="checkbox" >
                    <svg width="32px" height="32px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
                      <path d="M270.1 741.7c0 23.4 19.1 42.5 42.6 42.5h48.7v120.4c0 30.5 24.5 55.4 54.6 55.4 30.2 0 54.6-24.8 54.6-55.4V784.1h85v120.4c0 30.5 24.5 55.4 54.6 55.4 30.2 0 54.6-24.8 54.6-55.4V784.1h48.7c23.5 0 42.6-19.1 42.6-42.5V346.4h-486v395.3zm357.1-600.1l44.9-65c2.6-3.8 2-8.9-1.5-11.4-3.5-2.4-8.5-1.2-11.1 2.6l-46.6 67.6c-30.7-12.1-64.9-18.8-100.8-18.8-35.9 0-70.1 6.7-100.8 18.8l-46.6-67.5c-2.6-3.8-7.6-5.1-11.1-2.6-3.5 2.4-4.1 7.4-1.5 11.4l44.9 65c-71.4 33.2-121.4 96.1-127.8 169.6h486c-6.6-73.6-56.7-136.5-128-169.7zM409.5 244.1a26.9 26.9 0 1 1 26.9-26.9 26.97 26.97 0 0 1-26.9 26.9zm208.4 0a26.9 26.9 0 1 1 26.9-26.9 26.97 26.97 0 0 1-26.9 26.9zm223.4 100.7c-30.2 0-54.6 24.8-54.6 55.4v216.4c0 30.5 24.5 55.4 54.6 55.4 30.2 0 54.6-24.8 54.6-55.4V400.1c.1-30.6-24.3-55.3-54.6-55.3zm-658.6 0c-30.2 0-54.6 24.8-54.6 55.4v216.4c0 30.5 24.5 55.4 54.6 55.4 30.2 0 54.6-24.8 54.6-55.4V400.1c0-30.6-24.5-55.3-54.6-55.3z"/>
                    </svg>
                  </div>

                  <div class="col-1">
                    <input type="checkbox" name="project_type" id="project_type_ios" value="ios" class="checkbox" >
                    <svg width="32px" height="32px" viewBox="-29.5 0 315 315" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                        <g>
                            <path d="M213.803394,167.030943 C214.2452,214.609646 255.542482,230.442639 256,230.644727 C255.650812,231.761357 249.401383,253.208293 234.24263,275.361446 C221.138555,294.513969 207.538253,313.596333 186.113759,313.991545 C165.062051,314.379442 158.292752,301.507828 134.22469,301.507828 C110.163898,301.507828 102.642899,313.596301 82.7151126,314.379442 C62.0350407,315.16201 46.2873831,293.668525 33.0744079,274.586162 C6.07529317,235.552544 -14.5576169,164.286328 13.147166,116.18047 C26.9103111,92.2909053 51.5060917,77.1630356 78.2026125,76.7751096 C98.5099145,76.3877456 117.677594,90.4371851 130.091705,90.4371851 C142.497945,90.4371851 165.790755,73.5415029 190.277627,76.0228474 C200.528668,76.4495055 229.303509,80.1636878 247.780625,107.209389 C246.291825,108.132333 213.44635,127.253405 213.803394,167.030988 M174.239142,50.1987033 C185.218331,36.9088319 192.607958,18.4081019 190.591988,0 C174.766312,0.636050225 155.629514,10.5457909 144.278109,23.8283506 C134.10507,35.5906758 125.195775,54.4170275 127.599657,72.4607932 C145.239231,73.8255433 163.259413,63.4970262 174.239142,50.1987249" fill="#000000"></path>
                        </g>
                    </svg>
                  </div>

                  <div class="col-1">
                    <input type="checkbox" name="project_type" id="project_type_web" value="web" class="checkbox" >
                    <svg width="32px" height="32px" viewBox="-8 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"/></svg>
                  </div>

                  <div class="col-1">
                    
                  </div>
                  
                </div>

                <div class="mb-3 row">
                  <div class="col-7">
                    <label for="project_logo_path">Attachment</label>
                    <input type="file" name="project_logo_path" id="project_logo_path" class="form-control form-control-sm" >
                    @if($errors->has('project_logo_path'))
                        <div class="text-danger">{{ $errors->first('project_logo_path') }}</div>
                    @endif
                  </div>
                </div>



                <div class="mb-3 row mt-4">
                  <div class="col-7">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Add Project" class="btn btn-primary" required>
                  </div>
                  
                </div>


            </form>

         </div>
    </div>

    @endsection
 