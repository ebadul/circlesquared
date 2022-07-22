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
                  <form action="{{route('testcases.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                      @csrf

                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Test Case Name</label>
                          <input type="hidden" name="project_id" id="project_id" value="{{isset($project_id)?$project_id:null}}" class="form-control form-control-sm" required>
                          <input type="text" name="testcase_name" id="testcase_name" class="form-control form-control-sm" required>
                          @if($errors->has('testcase_name'))
                                    <div class="text-danger">{{ $errors->first('testcase_name') }}</div>
                          @endif
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Precondition</label>
                          <input type="text" name="testcase_precondition" id="testcase_precondition" class="form-control form-control-sm" required>
                          @if($errors->has('testcase_precondition'))
                                    <div class="text-danger">{{ $errors->first('testcase_precondition') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Expected Result</label>
                          <input type="text" name="expected_result" id="expected_result" class="form-control form-control-sm" required>
                          @if($errors->has('expected_result'))
                                    <div class="text-danger">{{ $errors->first('expected_result') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mt-4 row">
                        <div class="col-9">
                          <label for="testsuite_id" class="form-label">Test Suite</label>
                          <select class="form-select form-select-sm" name="testsuite_id" id="testsuite_id">
                            @if($testsuites)
                              @foreach($testsuites as $suite)
                                <option value="{{$suite->id}}">{{$suite->testsuite_name}}</option>
                              @endforeach
                            @endif
                          </select>

                          @if($errors->has('testsuite_id'))
                                    <div class="text-danger">{{ $errors->first('testsuite_id') }}</div>
                          @endif
                        </div>
                      </div>

                      
                      <div class="mt-4 row">
                        <div class="col-9">
                          <label for="attachment_path" class="form-label">Attachments</label>
                          <input class="form-control form-control-sm" name="attachment_path" id="attachment_path" type="file">

                          @if($errors->has('attachment_path'))
                                    <div class="text-danger">{{ $errors->first('attachment_path') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mt-4 row">
                        <div class="col-6 d-flex">
                          <div class="col-3"><label>Test Case Steps</label></div>
                          <div class="col-9 pe-3">
                            <select class="form-select form-select-sm" name="test_case_steps" id="test_case_steps">
                                <option value="Gherkin">Gherkin</option>
                                <option value="Classic">Classic</option>
                            </select>
                          </div>
                          @if($errors->has('test_case_steps'))
                              <div class="text-danger">{{ $errors->first('test_case_steps') }}</div>
                          @endif
                        </div>

                        <div class="col-3 d-flex d-grid px-3 justify-content-center">
                          <label class="form-check-label" for="switch_steps_raw">Raw</label>
                          <div class="form-check form-switch ms-2">
                            <input class="form-check-input" name="switch_steps_raw" type="checkbox" value="switch_steps_raw" id="switch_steps_raw" checked>
                            <label class="form-check-label" for="switch_steps_raw">Steps</label>
                          </div>
                        </div>
                      </div>

                     
                      <div class="mb-4 mt-3 row" id="divClassic">

                        <div class="row">
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Actions</label>
                            <input type="text" name="classic[0][action]" id="classic[0][action]" placeholder="Open Sign in page" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Input Data</label>
                            <input type="text" name="classic[0][input]" id="classic[0][input]" placeholder="Login / password" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Expected Result</label>
                            <input type="text" name="classic[0][expected_result]" id="classic[0][expected_result]" placeholder="Popup is opened" class="form-control form-control-sm">
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Actions</label>
                            <input type="text" name="classic[1][action]" id="classic[1][action]" placeholder="Open Sign in page" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Input Data</label>
                            <input type="text" name="classic[1][input]" id="classic[1][input]" placeholder="Login / password" class="form-control form-control-sm">
                          </div>
                          <div class="col-3">
                            <label class="form-check-label" for="switch_steps_raw">Expected Result</label>
                            <input type="text" name="classic[1][expected_result]" id="classic[1][expected_result]" placeholder="Popup is opened" class="form-control form-control-sm">
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-8">
                            <input type="button" name="btnAddClassic" id="btnAddClassic" value="+ Add Steps" class="btn btn-link">
                          </div>
                        </div>
                      </div>


                      <div class="mb-4 mt-3 row" id="divGherkin">

                      <div class="row mb-3">
                        <div class="col-3 d-flex">
                          <select class="form-select form-select-sm" name="gerkin[0][action]" id="gerkin[0][action]">
                            <option>Given</option>
                            <option>And</option>
                            <option>Then</option>
                            <option>When</option>
                            <option>But</option>
                          </select>
                        </div>
                        <div class="col-6">
                          <input type="text" name="gerkin[0][steps]" id="gerkin[0][steps]" placeholder="Step 1" class="form-control form-control-sm">
                        </div> 
                      </div>
                      <div class="row mb-3">
                        <div class="col-3 d-flex">
                          <select class="form-select form-select-sm" name="gerkin[1][action]" id="gerkin[1][action]">
                            <option>Given</option>
                            <option>And</option>
                            <option>Then</option>
                            <option>When</option>
                            <option>But</option>
                          </select>
                        </div>
                        <div class="col-6">
                          <input type="text" name="gerkin[1][steps]" id="gerkin[1][steps]" placeholder="Step 1" class="form-control form-control-sm">
                        </div> 
                      </div>

                      

                       
                      <div class="row">
                        <div class="col-9">
                          <input type="button" name="btnAddGerkin" id="btnAddGerkin" value="+ Add Steps" class="btn btn-link">
                        </div>
                      </div>
                      </div>

                      <div class="mb-3 row" id="divRaw">
                        <div class="col-9">
             
                          <textarea name="testcase_raw_details" rows="8" id="testcase_raw_details" class="form-control form-control-sm" required>

                          </textarea>
                          @if($errors->has('raw'))
                              <div class="text-danger">{{ $errors->first('raw') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="mt-5 row">
                        <div class="col-2">
                          <input type="submit" name="btnAddTestCase" id="btnAddTestCase" value="Add TestCase" class="btn btn-primary" required>
                        </div>
                        <div class="col-3">
                          <input type="submit" name="btnAddAnother" id="btnAddAnother" value="Save & Create Another" class="btn btn-primary" required>
                        </div>
                        <div class="col-2">
                          <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" class="btn btn-primary" required>
                        </div>
                        
                      </div>


                  </form>
                </div>
              </div><!--row-->

         </div>
    </div>

    
      <script>
              $(document).ready(function(){
                  //$('#mainNavbar').hide();
                  $('#divRaw').hide();
                  $('#divClassic').hide();
                  $('#switch_steps_raw').on('click',function(){
                      var chkRaw = $(this).prop('checked');
                      if(chkRaw){
                          $('#divRaw').hide();
                      }else{
                          $('#divRaw').show();
                      }
                  });

                  $('#test_case_steps').on('change',function(){
                      var test_case_steps = $(this).val();
                       
                      if(test_case_steps=="Classic"){
                          $('#divClassic').show();
                          $('#divGherkin').hide();
                      }else{
                          $('#divGherkin').show();
                          $('#divClassic').hide();
                      }
                  });
              });
            </script>



    @endsection
 