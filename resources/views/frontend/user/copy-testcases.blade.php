@extends('frontend.user.user-layout')
    @section('content')
    <div class="container-fluid">
         <div class="container my-3">
             @include('frontend.user.header',['title'=>'Edit Test Case'])

              <div class="row">
                <div class="col-3">
                  <div class="d-flex align-items-center text-center justify-content-center" style="text-align:center;padding-top:35px;border-radius:50%;background:#aaa;height:100px;width:100px;border:1px solid #999;padding:15px">
                    @if($project)  
                      {{$project->project_name}}
                    @else
                      Project
                    @endif
                  </div>
                </div>
                <div class="col">
                  <form action="{{route('testcases.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                      @csrf

                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Test Case Name</label>
                          <input type="hidden" name="project_id" id="project_id" value="{{isset($testcase->project_id)?$testcase->project_id:null}}" class="form-control form-control-sm" required>
                          <input type="hidden" name="testcase_id" id="testcase_id" value="{{isset($testcase->id)?$testcase->id:null}}" class="form-control form-control-sm" required>
                          <input type="text" name="testcase_name" id="testcase_name" value="{{$testcase->testcase_name}}" class="form-control form-control-sm" required>
                          @if($errors->has('testcase_name'))
                                    <div class="text-danger">{{ $errors->first('testcase_name') }}</div>
                          @endif
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Precondition</label>
                          <input type="text" name="testcase_precondition" id="testcase_precondition" value="{{$testcase->testcase_precondition}}" class="form-control form-control-sm" required>
                          @if($errors->has('testcase_precondition'))
                                    <div class="text-danger">{{ $errors->first('testcase_precondition') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="col-9">
                          <label>Expected Result</label>
                          <input type="text" name="expected_result" id="expected_result" value="{{$testcase->expected_result}}" class="form-control form-control-sm" required>
                          @if($errors->has('expected_result'))
                                    <div class="text-danger">{{ $errors->first('expected_result') }}</div>
                          @endif
                        </div>
                      </div>

                      <div class="mt-4 row">
                        <div class="col-9">
                          <label for="testsuite_id" class="form-label">Test Suite</label>
                          <select class="form-select form-select-sm" name="testsuite_id" id="testsuite_id" value="{{isset($testcase->testsuite_id)?$testcase->testsuite_id:''}}">
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
                                <option value="Gherkin" {{$testcase->testcase_steps=="Gherkin"?'selected':''}}>Gherkin</option>
                                <option value="Classic" {{$testcase->testcase_steps=="Classic"?'selected':''}}>Classic</option>
                            </select>
                          </div>
                          @if($errors->has('test_case_steps'))
                              <div class="text-danger">{{ $errors->first('test_case_steps') }}</div>
                          @endif
                        </div>

                        <div class="col-3 d-flex d-grid px-3 justify-content-center" id="divSwitchStepsRaw">
                          <label class="form-check-label" for="switch_steps_raw">Raw</label>
                          <div class="form-check form-switch ms-2">
                            <input class="form-check-input" name="switch_steps_raw" type="checkbox" value="switch_steps_raw" id="switch_steps_raw" {{$testcase->switch_steps_raw=='switch_steps_raw'?'checked':''}}>
                            <label class="form-check-label" for="switch_steps_raw">Steps</label>
                          </div>
                        </div>
                      </div>

                      @if($testcase->testcase_steps=="Classic")
                      <div class="mb-4 mt-3 row" id="divClassic">
                          <div class="row" id="divClassicBody">
                              @php 
                                  $classic_steps = json_decode($testcase->testcase_steps_classic,true);
                              @endphp
                              @foreach($classic_steps as $classic)
                              <div class="row" id="classicBox-{{$loop->index}}">
                                <div class="col-3">
                                
                                  <label class="form-check-label" for="classic[{{$loop->index}}][action]">Actions</label>
                                  <input type="text" name="classic[{{$loop->index}}][action]" id="classic[{{$loop->index}}][action]" value="{{$classic['action']}}" placeholder="Open Sign in page" class="form-control form-control-sm">
                                </div>
                                <div class="col-3">
                                  <label class="form-check-label" for="classic[{{$loop->index}}][input]">Input Data</label>
                                  <input type="text" name="classic[{{$loop->index}}][input]" id="classic[{{$loop->index}}][input]" value="{{$classic['input']}}" placeholder="Login / password" class="form-control form-control-sm">
                                </div>
                                <div class="col-3">
                                  <label class="form-check-label" for="classic[{{$loop->index}}][expected_result]">Expected Result</label>
                                  <input type="text" name="classic[{{$loop->index}}][expected_result]" id="classic[{{$loop->index}}][expected_result]" value="{{$classic['expected_result']}}" placeholder="Popup is opened" class="form-control form-control-sm">
                                </div>
                                <div class="col-1 d-flex d-grid gap-2 pt-4 align-items-center text-center justify-content-start">
                                    <svg width="16px" height="16px" role="button" data-id="{{$loop->index}}" class="deleteClassicBox" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg>
                                </div> 
                              </div>
                              @endforeach
                          </div><!-- divClassicBody -->

                          <div class="row">
                            <div class="col-8">
                              <input type="button" name="btnAddClassic" id="btnAddClassic" value="+ Add Steps" class="btn btn-link">
                            </div>
                          </div>
                      </div><!-- divClassic -->
                      @endif

                      @if($testcase->testcase_steps=="Gherkin")
                      <div class="mb-4 mt-3 row" id="divGherkin">
                          <div id="divGherkinBody">
                              @php 
                                  $gherkin_steps = json_decode($testcase->testcase_steps_gherkins,true);
                              @endphp
                              @foreach($gherkin_steps as $gherkin)
                              <div class="row mb-3" id="gherkinBox-{{$loop->index}}">
                                <div class="col-3 d-flex">
                                  <select class="form-select form-select-sm" name="gerkin[{{$loop->index}}][action]" id="gerkin[{{$loop->index}}][action]">
                                    <option {{$gherkin['action']=="Given"?'selected':''}}  >Given</option>
                                    <option {{$gherkin['action']=="And"?'selected':''}}>And</option>
                                    <option {{$gherkin['action']=="Then"?'selected':''}}>Then</option>
                                    <option {{$gherkin['action']=="When"?'selected':''}}>When</option>
                                    <option {{$gherkin['action']=="But"?'selected':''}}>But</option>
                                  </select>
                                </div>
                                <div class="col-6 d-flex d-grid gap-2 align-items-center text-center justify-content-center">
                                  <input type="text" name="gerkin[{{$loop->index}}][steps]" id="gerkin[{{$loop->index}}][steps]" value="{{$gherkin['steps']}}" placeholder="Step 1" class="form-control form-control-sm">
                                 
                                  <svg width="16px" height="16px" role="button" data-id="{{$loop->index}}" class="deleteGherkinBox" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg>
                                </div> 

                              </div>
                              @endforeach
                          </div><!-- divGherkinBody -->
                                            
                          <div class="row">
                            <div class="col-9">
                              <input type="button" name="btnAddGherkin" id="btnAddGherkin" value="+ Add Steps" class="btn btn-link">
                            </div>
                          </div>
                      </div><!-- divGherkins -->
                      @endif

                      <div class="mb-3 row mt-3" id="divRaw">
                        <div class="col-9">
                          <textarea name="testcase_raw_details" rows="8" id="testcase_raw_details" class="form-control form-control-sm"></textarea>
                          @if($errors->has('testcase_raw_details'))
                              <div class="text-danger">{{ $errors->first('testcase_raw_details') }}</div>
                          @endif
                        </div>
                      </div>


                      <div class="mt-5 row">
                        <div class="col-2">
                          <input type="submit" name="btnAddTestCase" id="btnAddTestCase" value="Update TestCase" class="btn btn-primary" required>
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
                  var steps_raw = "{{$testcase->switch_steps_raw=='switch_steps_raw'?'hide':'show'}}";
                  var steps_classic_gherkin = "{{$testcase->testcase_steps}}";
                
                  if(steps_raw=="hide"){
                    $('#divRaw').hide();
                  }else{
                    $('#divRaw').show();
                  }

                  if(steps_classic_gherkin=="Classic"){
                    $('#divClassic').show();
                    $('#divGherkin').hide();
                    $('#divSwitchStepsRaw').removeClass('d-flex d-grid');
                    $('#divSwitchStepsRaw').hide();
                    $('#divRaw').hide(); 

                  }else{
                    $('#divClassic').hide();
                    $('#divGherkin').show();
                    $('#divSwitchStepsRaw').addClass('d-flex d-grid');
                    $('#divSwitchStepsRaw').show();
                    var switch_raw = $('#switch_steps_raw').is(':checked');
                    if(switch_raw){
                      $('#divRaw').hide();
                    }else{
                      $('#divRaw').show();
                    }
                  }
                  
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
                          $('#divRaw').hide();
                          $('#divSwitchStepsRaw').hide();
                          $('#divSwitchStepsRaw').removeClass('d-flex d-grid');
                      }else{
                          $('#divGherkin').show();
                          $('#divClassic').hide();
                          $('#divSwitchStepsRaw').addClass('d-flex d-grid');
                          $('#divSwitchStepsRaw').show();

                          var switch_raw = $('#switch_steps_raw').is(':checked');

                          if(switch_raw){
                            $('#divRaw').hide();
                          }else{
                            $('#divRaw').show();
                          }
                      }
                  });

                $('#btnAddClassic').on('click',function(){

                    var Rows =  $('#divClassicBody').children('.row');
                    var countRow = Rows.length+1;
                   
                    var eleClassic = `
                            <div class="row">
                              <div class="col-3">
                                <label class="form-check-label" for="classic[0][action]">Actions</label>
                                <input type="text" name="classic[${countRow}][action]" id="classic[${countRow}][action]" placeholder="Open Sign in page" class="form-control form-control-sm">
                              </div>
                              <div class="col-3">
                                <label class="form-check-label" for="classic[0][input]">Input Data</label>
                                <input type="text" name="classic[${countRow}][input]" id="classic[${countRow}][input]" placeholder="Login / password" class="form-control form-control-sm">
                              </div>
                              <div class="col-3">
                                <label class="form-check-label" for="classic[0][expected_result]">Expected Result</label>
                                <input type="text" name="classic[${countRow}][expected_result]" id="classic[${countRow}][expected_result]" placeholder="Popup is opened" class="form-control form-control-sm">
                              </div>
                            </div>`;
                    $('#divClassicBody').append(eleClassic);

                });


                $('#btnAddGherkin').on('click',function(){

                    var Rows =  $('#divGherkinBody').children('.row');
                    var countRow = Rows.length+1;

                    var eleGherkin = `<div class="row mb-3"><div class="col-3 d-flex">
                                          <select class="form-select form-select-sm" name="gerkin[${countRow}][action]" id="gerkin[${countRow}][action]">
                                            <option>Given</option>
                                            <option>And</option>
                                            <option>Then</option>
                                            <option>When</option>
                                            <option>But</option>
                                          </select>
                                        </div>
                                        <div class="col-6">
                                          <input type="text" name="gerkin[${countRow}][steps]" id="gerkin[${countRow}][steps]" placeholder="Step 1" class="form-control form-control-sm">
                                        </div></div>`;
                    $('#divGherkinBody').append(eleGherkin);

                  });

                  $('.deleteGherkinBox').on('click',function(){
                      var inxd = $(this).data('id');
                      $('#gherkinBox-'+inxd).remove();
                  });

                  $('.deleteClassicBox').on('click',function(){
                      var inxd = $(this).data('id');
                      $('#classicBox-'+inxd).remove();
                  });

              });
            </script>



    @endsection
 