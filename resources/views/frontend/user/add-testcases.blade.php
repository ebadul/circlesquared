    @extends('frontend.user.user-layout')
    @section('content')
    <div class="container-fluid">
         <div class="container my-3">
             @include('frontend.user.header',['title'=>'Add Test Case'])

              <div class="row">
                <div class="col-3">
                  <div class="d-flex align-items-center text-center justify-content-center" style="text-align:center;padding-top:35px;border-radius:50%;background:#aaa;height:100px;width:100px;border:1px solid #999;padding:15px">
                    {{'Project One'}}
                  </div>
                </div>
                <div class="col">
                  <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                      @csrf
                      

                      <div class="mb-3 row">
                        <div class="col-8">
                          <label>Test Case Name</label>
                          <input type="hidden" name="project_id" id="project_id" value="{{isset($project_id)?$project_id:null}}" class="form-control" required>
                          <input type="text" name="testcase_name" id="testcase_name" class="form-control" required>
                          @if($errors->has('testcase_name'))
                                    <div class="text-danger">{{ $errors->first('testcase_name') }}</div>
                          @endif
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-8">
                          <label>Precondition</label>
                          <input type="text" name="testcase_precondition" id="testcase_precondition" class="form-control" required>
                          @if($errors->has('testcase_precondition'))
                                    <div class="text-danger">{{ $errors->first('testcase_precondition') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="col-8">
                          <label>Expected Result</label>
                          <input type="text" name="expected_result" id="expected_result" class="form-control" required>
                          @if($errors->has('expected_result'))
                                    <div class="text-danger">{{ $errors->first('expected_result') }}</div>
                          @endif
                        </div>
                      </div>

                      
                      <div class="mt-4 row">
                        <div class="col-8">
                          <label>Attachments</label>
                          <input type="file" name="project_logo_path" id="project_logo_path" class="file" multiple="true" >
                          @if($errors->has('project_description'))
                                    <div class="text-danger">{{ $errors->first('project_description') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mt-4 row">
                        <div class="col-6">
                          <label>Test Case Steps</label>
                          <select class="select">
                              <option>Gherkin</option>
                              <option>Classic</option>
                          </select>
                          @if($errors->has('project_description'))
                              <div class="text-danger">{{ $errors->first('project_description') }}</div>
                          @endif
                        </div>

                        <div class="col-4 d-flex d-grid px-3">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Raw</label>
                          <div class="form-check form-switch ms-2">
                            <input class="form-check-input" value="testcase_steps_raw" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Steps</label>
                          </div>
                        </div>
                      </div>

                     
                      <div class="mb-3 mt-3 row">

                        <div class="row">
                          <div class="col-3 d-flex">
                            <span class="me-1">1.</span>
                            <input type="text" name="btnAddSteps" id="btnAddSteps" placeholder="Example: Open Sign in page" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <input type="text" name="btnAddSteps" id="btnAddSteps" placeholder="Example: Login / password" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <input type="text" name="btnAddSteps" id="btnAddSteps" placeholder="Example: popup is opened" class="form-control form-control-sm">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-8">
                            <input type="button" name="btnAddSteps" id="btnAddSteps" value="+ Add Steps" class="btn btn-link">
                          </div>
                        </div>
                      </div>


                      <div class="mb-3 mt-3 row">

                      <div class="row">
                        <div class="col-2 d-flex">
                          <span class="me-1">1.</span>
                          <select class=" form-control-sm">
                            <option>Given</option>
                            <option>And</option>
                            <option>Then</option>
                            <option>When</option>
                            <option>But</option>
                          </select>
                        </div>
                        <div class="col-6">
                          <input type="text" name="btnAddSteps" id="btnAddSteps" placeholder="Example: Login / password" class="form-control form-control-sm">
                        </div>
                         
                      </div>

                      <div class="row">
                        <div class="col-8">
                          <input type="button" name="btnAddSteps" id="btnAddSteps" value="+ Add Steps" class="btn btn-link">
                        </div>
                      </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="col-8">
             
                          <textarea name="expected_result" rows="8" id="expected_result" class="form-control" required>

                          </textarea>
                          @if($errors->has('expected_result'))
                              <div class="text-danger">{{ $errors->first('expected_result') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="mt-5 row">
                        <div class="col-2">
                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Add TestCase" class="btn btn-primary" required>
                        </div>
                        <div class="col-3">
                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Save & Create Another" class="btn btn-primary" required>
                        </div>
                        <div class="col-2">
                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Cancel" class="btn btn-primary" required>
                        </div>
                        
                      </div>


                  </form>
                </div>
              </div><!--row-->

         </div>
    </div>

    @endsection
 