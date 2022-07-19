    @extends('frontend.user.user-layout')
    @section('content')
    <div class="container-fluid">
         <div class="container my-3">
             @include('frontend.user.header',['title'=>'Add Test Suite'])
            <form action="{{route('testsuites.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                @csrf
                <div class="mb-3 row">
                  <div class="col-5">
                    <label>Test Suite Name</label>
                    <input type="hidden" name="project_id" id="project_id" value="{{isset($project_id)?$project_id:null}}" class="form-control" required>
                    <input type="text" name="testsuite_name" id="testsuite_name" class="form-control" required>
                    @if($errors->has('testsuite_name'))
                              <div class="text-danger">{{ $errors->first('testsuite_name') }}</div>
                    @endif

                  </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-5">
                        <label>Parent Test Suite</label>
                        <select name="parent_testsuite_id" id="parent_testsuite_id" class="form-select form-select-sm">
                            <option value=""></option>
                            @if($testsuites)
                                @foreach($testsuites as $suite)
                                <option value="{{$suite->id}}">{{$suite->testsuite_name}}</option>
                                @endforeach
                            @endif
                        </select>
                        
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-5">
                        <label>Test Suite Description</label>
                        <input type="text" name="testsuite_description" id="testsuite_description" class="form-control" required>
                        @if($errors->has('testsuite_description'))
                            <div class="text-danger">{{ $errors->first('testsuite_description') }}</div>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-5">
                    <label>Test Suite Precondition</label>
                    <input type="text" name="testsuite_precondition" id="testsuite_precondition" class="form-control" required>
                    @if($errors->has('testsuite_precondition'))
                              <div class="text-danger">{{ $errors->first('testsuite_precondition') }}</div>
                    @endif
                  </div>
                  
                </div>

                <div class="mb-3 row">
                  <div class="col-5">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Add Test Suite" class="btn btn-primary" required>
                  </div>
                  
                </div>


            </form>

         </div>
    </div>

    @endsection
 