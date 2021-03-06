@extends('frontend.user.user-layout')
@section('content')

    <div class="container-fluid">
         <div class="container my-3">
            
         @include('frontend.user.header',['title'=>'Project Details'])

            @if($project_details)
              
              <div class="row my-3">
                <div class="col">
                  <div class="d-flex d-grid gap-2  align-items-center">
                      <h3>{{$project_details->project_name}} </h3>
                      <small>{{count($testsuites)}} suites</small>
                      <small>|</small>
                      <small>{{count($testcases)}} test cases</small>
                  </div>
                  <a href="{{route('testsuites.add',$project_details->id)}}" role="button" class="btn btn-primary">+ Test Suite</a>  
                  <a href="{{route('testcases.add',$project_details->id)}}" role="button" class="btn btn-primary">+ Test Case</a>
                   
                </div>
              </div>

              <div class="row my-4">
                <div class="col-3"><!-- left column -->
                    <div class="row bg-light p-2 m-1">
                      <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                          <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                          <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                        </svg>
                      </div>
                      <div class="col-9 text-center"><strong>Suites</strong></div>
                      <div class="col-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                          </svg>
                      </div>
                    </div><!-- left column heading row bg-light p-2 m-1 -->
                    @if($testsuites)
                        @foreach($testsuites as $suite)
                          <div class="row d-flex align-items-center d-grid gap-2 mx-2 py-2 border-bottom">
                            <div class="col-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                              </svg>
                            </div>
                            <div class="col-9"><strong>{{strtoupper($suite->testsuite_name)}}</strong></div>
                            <div class="col-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"  id="popDropdown{{$suite->id}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                              </svg>
                              <ul class="dropdown-menu" aria-labelledby="popDropdown{{$suite->id}}" style="padding:0px">
                                  <li><a class="dropdown-item" href="{{route('testsuites.edit',$suite->id)}}" >Edit</a></li>
                                  <li><a class="dropdown-item" href="{{route('testsuites.delete',$suite->id)}}" onclick="return confirm('Do you want to delete this test suite')">Delete</a></li>
                              </ul>
                            
                            </div>
                          </div>
                        @endforeach
                    @endif

                </div><!-- col-3--><!-- left column -->

                <div class="col-9"><!-- right column -->
                  @if($testsuites)
                          @foreach($testsuites as $suite)
                              
                              <div class="row bg-light py-1 mx-1 border-bottom">
                                  <div class="btn btn-light text-start d-flex d-grid gap-3 align-items-center" data-bs-toggle="collapse" href="#collapseExample-{{strtoupper($suite->id)}}"  aria-expanded="false" aria-controls="collapseExample-{{strtoupper($suite->id)}}">

                                      <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <g>
                                              <path fill="none" d="M0 0h24v24H0z"/>
                                              <path d="M11 4h10v2H11V4zm0 4h6v2h-6V8zm0 6h10v2H11v-2zm0 4h6v2h-6v-2zM3 4h6v6H3V4zm2 2v2h2V6H5zm-2 8h6v6H3v-6zm2 2v2h2v-2H5z"/>
                                          </g>
                                      </svg>

                                      <div>{{strtoupper($suite->testsuite_name)}}</div>
                                      <div class="text-muted"><small class="text-muted">{{count($suite->testcases)>0?count($suite->testcases):''}}</small></div>

                                      <a href="{{route('testcases.add',$project_details->id)}}">
                                        <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z"/><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"/></svg>
                                      </a>
                                      <a   href="{{route('testsuites.edit',$suite->id)}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                      </a>
                                      <a  href="{{route('testsuites.copy',$suite->id)}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                                          <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                                        </svg>
                                      </a>
                                  </div>

                                  <div class="collapse" id="collapseExample-{{strtoupper($suite->id)}}">
                                    <div class=" card-body no-border">
                                      @if($suite->testcases)
                                            @foreach($suite->testcases as $case)
                                                <div class="d-flex d-grid  border-bottom  py-2 {{$loop->last?'border-bottom-0':'border-bottom'}} " role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$case->id}}">
                                                    <div class="mx-3 ">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen-exit" viewBox="0 0 16 16">
                                                        <path d="M5.5 0a.5.5 0 0 1 .5.5v4A1.5 1.5 0 0 1 4.5 6h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5zm5 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 10 4.5v-4a.5.5 0 0 1 .5-.5zM0 10.5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 6 11.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zm10 1a1.5 1.5 0 0 1 1.5-1.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4z"/>
                                                      </svg>
                                                    </div>
                                                    <div>
                                                      {{$case->testcase_name}}
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                  <div class="modal fade" id="staticBackdrop{{$case->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl ">
                                                      <div class="modal-content">
                                                      <form action="{{route('testcases.status.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="staticBackdropLabel">{{$case->testcase_name}}</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="d-flex d-grid gap-3">
                                                              <a href="{{route('testcases.edit',$case->id)}}" role="button" class="btn btn-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                </svg>
                                                                Edit
                                                              </a>
                                                              <a href="{{route('testcases.copy', $case->id)}}" role="button" class="btn btn-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                                                                  <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                                                                </svg>
                                                                Copy
                                                              </a>

                                                              <a href="{{route('testcases.delete', $case->id)}}" role="button" class="btn btn-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg>
                                                                Delete
                                                              </a>
                                                           </div>

                                                           <div class="row">
                                                              <div class="col-9">
                                                                  <div class="row my-4">
                                                                      <label>
                                                                        <strong>Test Case Name</strong>
                                                                      </label>
                                                                      <div clss="small">{{$case->testcase_name}}</div>
                                                                  </div>

                                                                  <div class="row my-4">
                                                                      <label>
                                                                        <strong>Test Case Precondition</strong>
                                                                      </label>
                                                                      <div clss="small">{{$case->testcase_precondition}}</div>
                                                                  </div>

                                                                  <div class="row my-4">
                                                                      <label>
                                                                        <strong>Expected Result</strong>
                                                                      </label>
                                                                      <div clss="small">{{$case->expected_result}}</div>
                                                                  </div>

                                                                  @if($case->testcase_steps=="Gherkin")
                                                                  <div class="row my-4">
                                                                      <label class="mb-3">
                                                                        <strong>Steps</strong>
                                                                      </label>
                                                                       
                                                                      <div clss="small">
                                                                          <div class="row">
                                                                            <div class="col-5 text-muted">Actions</div>
                                                                            <div class="col text-muted">Method</div>
                                                                          </div>
                                                                        @php
                                                                            $gherkins = json_decode($case->testcase_steps_gherkins,true);
                                                                            $inx = 1;
                                                                        @endphp

                                                                        @foreach($gherkins as $gherkin)
                                                                            <div class="row">
                                                                              <div class="col-10 {{$loop->last?'':'border-bottom'}} py-2">
                                                                                <div class="row">
                                                                                  <div class="col">{{$inx}}. {{$gherkin["action"]}}</div>
                                                                                  
                                                                                  <div class="col">{{$gherkin["steps"]}}</div>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                            <?php $inx+=1; ?>
                                                                        @endforeach
                                                                      </div>
                                                                  </div>
                                                                  @elseif($case->testcase_steps=="Classic")
                                                                  <div class="row my-4">
                                                                      <label class="mb-3">
                                                                        <strong>Steps</strong>
                                                                      </label>
                                                                       
                                                                      <div clss="small">
                                                                          <div class="row">
                                                                            <div class="col-4 text-muted">Actions</div>
                                                                            <div class="col-3 text-muted">Input</div>
                                                                            <div class="col text-muted">Expected Result</div>
                                                                          </div>
                                                                        @php
                                                                            $classics = json_decode($case->testcase_steps_classic,true);
                                                                            $inx = 1;
                                                                            
                                                                        @endphp

                                                                        @foreach($classics as $classic_row)
                                                                            <div class="row">
                                                                              <div class="col-11 {{$loop->last?'':'border-bottom'}} py-2">
                                                                                <div class="row">
                                                                                  <div class="col-4">{{$inx}}. {{$classic_row["action"]}}</div>
                                                                                  <div class="col-3">{{ $classic_row["input"] }}</div>
                                                                                  <div class="col">{{$classic_row["expected_result"]}}</div>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                            <?php $inx+=1; ?>
                                                                        @endforeach
                                                                      </div>
                                                                  </div>
                                                                  @endif
                                                                </div>
                                                                <div class="col-3 border-start">
                                                                 
                                                                      @csrf
                                                                      <input type="hidden" value="{{$case->id}}" name="testcase_id">
                                                                      <div class=" px-3 mb-3"> 
                                                                          <label for="severity">Severity</label>
                                                                          <select id="severity" name="severity" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_severity=="Blocker"?'selected':''}}>Blocker</option>
                                                                              <option {{$case->testcase_severity=="Critical"?'selected':''}}>Critical</option>
                                                                              <option {{$case->testcase_severity=="Major"?'selected':''}}>Major</option>
                                                                              <option {{$case->testcase_severity=="Normal"?'selected':''}}>Normal</option>
                                                                              <option {{$case->testcase_severity=="Minor"?'selected':''}}>Minor</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class=" px-3 mb-3"> 
                                                                          <label for="status">Status</label>
                                                                          <select id="status" name="status" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_status=="Actual"?'selected':''}}>Actual</option>
                                                                              <option {{$case->testcase_status=="Draft"?'selected':''}}>Draft</option>
                                                                              <option {{$case->testcase_status=="Deprecated"?'selected':''}}>Deprecated</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class=" px-3 mb-3"> 
                                                                          <label for="priority">Priority</label>
                                                                          <select id="priority" name="priority" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_priority=="High"?'selected':''}}>High</option>
                                                                              <option {{$case->testcase_priority=="Medium"?'selected':''}}>Medium</option>
                                                                              <option {{$case->testcase_priority=="Low"?'selected':''}}>Low</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class=" px-3 mb-3"> 
                                                                          <label for="type">Type</label>
                                                                          <select id="type" name="type" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_type=="Other"?'selected':''}}>Other</option>
                                                                              <option {{$case->testcase_type=="Functional"?'selected':''}}>Functional</option>
                                                                              <option {{$case->testcase_type=="Smoke"?'selected':''}}>Smoke</option>
                                                                              <option {{$case->testcase_type=="Regression"?'selected':''}}>Regression</option>
                                                                              <option {{$case->testcase_type=="Security"?'Security':''}}>Security</option>
                                                                              <option {{$case->testcase_type=="Integration"?'selected':''}}>Integration</option>
                                                                          </select>
                                                                      </div>
                                                                 
                                                                </div><!-- col-3 border-start-->
                                                            </div>

                                                        </div><!-- modal body -->
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Update Status</button>
                                                        </div>
                                                      </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                            @endforeach
                                      @endif
                                      </div>
                                  </div>
                              </div> <!-- row bg-light my-3 -->
                          @endforeach

                  @endif

                  <!-- No testcasesNoSuites -->
                  @if($testcasesNoSuites)

                              <div class="row bg-light py-1 mx-1 border-bottom">
                                  <div class="btn btn-light text-start d-flex d-grid gap-3 align-items-center" data-bs-toggle="collapse" href="#collapseExample-noSuite"  aria-expanded="false" aria-controls="collapseExample-{{strtoupper(1)}}">

                                      <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <g>
                                              <path fill="none" d="M0 0h24v24H0z"/>
                                              <path d="M11 4h10v2H11V4zm0 4h6v2h-6V8zm0 6h10v2H11v-2zm0 4h6v2h-6v-2zM3 4h6v6H3V4zm2 2v2h2V6H5zm-2 8h6v6H3v-6zm2 2v2h2v-2H5z"/>
                                          </g>
                                      </svg>

                                      <div>{{'No Suites'}}</div>
                                      <small class="small">{{count($testcasesNoSuites)}}</small>
                                      <a href="{{route('testcases.add',$project_details->id)}}">
                                        <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z"/><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"/></svg>
                                      </a>
                                  </div>
                                  <div class="collapse" id="collapseExample-noSuite">
                                    <div class=" card-body no-border">

                                            @foreach($testcasesNoSuites as $caseTmp)
                                                <div class="d-flex d-grid    py-2 {{$loop->last?'border-bottom-0':'border-bottom'}}" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$caseTmp->id}}">
                                                    <div class="mx-3 ">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen-exit" viewBox="0 0 16 16">
                                                        <path d="M5.5 0a.5.5 0 0 1 .5.5v4A1.5 1.5 0 0 1 4.5 6h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5zm5 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 10 4.5v-4a.5.5 0 0 1 .5-.5zM0 10.5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 6 11.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zm10 1a1.5 1.5 0 0 1 1.5-1.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4z"/>
                                                      </svg>
                                                    </div>
                                                    <div>
                                                      {{$caseTmp->testcase_name}}
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                  <div class="modal fade" id="staticBackdrop{{$caseTmp->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl ">
                                                      <div class="modal-content">
                                                        <form action="{{route('testcases.status.store')}}" method="post" enctype="multipart/form-data" class="my-4">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">{{$caseTmp->testcase_name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="d-flex d-grid gap-3">
                                                                <a href="{{route('testcases.edit',$caseTmp->id)}}" role="button" class="btn btn-light">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                  </svg>
                                                                  Edit
                                                                </a>
                                                                <a href="{{route('testcases.copy', $caseTmp->id)}}" role="button" class="btn btn-light">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                                                                    <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                                                                  </svg>
                                                                  Copy
                                                                </a>

                                                                <a href="{{route('testcases.delete', $caseTmp->id)}}" role="button" class="btn btn-light">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                  </svg>
                                                                  Delete
                                                                </a>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <div class="row my-4">
                                                                        <label>
                                                                          <strong>Test Case Name</strong>
                                                                        </label>
                                                                        <div clss="small">{{$caseTmp->testcase_name}}</div>
                                                                    </div>

                                                                    <div class="row my-4">
                                                                        <label>
                                                                          <strong>Test Case Precondition</strong>
                                                                        </label>
                                                                        <div clss="small">{{$caseTmp->testcase_precondition}}</div>
                                                                    </div>

                                                                    <div class="row my-4">
                                                                        <label>
                                                                          <strong>Expected Result</strong>
                                                                        </label>
                                                                        <div clss="small">{{$caseTmp->expected_result}}</div>
                                                                    </div>

                                                                    @if($caseTmp->testcase_steps=="Gherkin")
                                                                    <div class="row my-4">
                                                                        <label class="mb-3">
                                                                          <strong>Steps</strong>
                                                                        </label>
                                                                        
                                                                        <div clss="small">
                                                                            <div class="row">
                                                                              <div class="col-5 text-muted">Actions</div>
                                                                              <div class="col text-muted">Method</div>
                                                                            </div>
                                                                          @php
                                                                              $gherkins = json_decode($caseTmp->testcase_steps_gherkins,true);
                                                                              $inx = 1;
                                                                          @endphp

                                                                          @foreach($gherkins as $gherkin)
                                                                              <div class="row">
                                                                                <div class="col-10 {{$loop->last?'':'border-bottom'}} py-2">
                                                                                  <div class="row">
                                                                                    <div class="col">{{$inx}}. {{$gherkin["action"]}}</div>
                                                                                    
                                                                                    <div class="col">{{$gherkin["steps"]}}</div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                              <?php $inx+=1; ?>
                                                                          @endforeach
                                                                        </div>
                                                                    </div>
                                                                    @elseif($caseTmp->testcase_steps=="Classic")
                                                                    <div class="row my-4">
                                                                        <label class="mb-3">
                                                                          <strong>Steps</strong>
                                                                        </label>
                                                                        
                                                                        <div clss="small">
                                                                            <div class="row">
                                                                              <div class="col-4 text-muted">Actions</div>
                                                                              <div class="col-3 text-muted">Input</div>
                                                                              <div class="col text-muted">Expected Result</div>
                                                                            </div>
                                                                          @php
                                                                              $classics = json_decode($caseTmp->testcase_steps_classic,true);
                                                                              $inx = 1;
                                                                              
                                                                          @endphp

                                                                          @foreach($classics as $classic_row)
                                                                              <div class="row">
                                                                                <div class="col-11 {{$loop->last?'':'border-bottom'}} py-2">
                                                                                  <div class="row">
                                                                                    <div class="col-4">{{$inx}}. {{$classic_row["action"]}}</div>
                                                                                    <div class="col-3">{{ $classic_row["input"] }}</div>
                                                                                    <div class="col">{{$classic_row["expected_result"]}}</div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                              <?php $inx+=1; ?>
                                                                          @endforeach
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                  </div>
                                                                  <div class="col-3 border-start">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$case->id}}" name="testcase_id">
                                                                    <div class=" px-3 mb-3"> 
                                                                        <label for="severity">SEVERITY</label>
                                                                        <select id="severity" name="severity" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_severity=="Blocker"?'selected':''}}>Blocker</option>
                                                                              <option {{$case->testcase_severity=="Critical"?'selected':''}}>Critical</option>
                                                                              <option {{$case->testcase_severity=="Major"?'selected':''}}>Major</option>
                                                                              <option {{$case->testcase_severity=="Normal"?'selected':''}}>Normal</option>
                                                                              <option {{$case->testcase_severity=="Minor"?'selected':''}}>Minor</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class=" px-3 mb-3"> 
                                                                        <label for="status">Status</label>
                                                                        <select id="status" name="status" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_status=="Actual"?'selected':''}}>Actual</option>
                                                                              <option {{$case->testcase_status=="Draft"?'selected':''}}>Draft</option>
                                                                              <option {{$case->testcase_status=="Deprecated"?'selected':''}}>Deprecated</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class=" px-3 mb-3"> 
                                                                        <label for="priority">Priority</label>
                                                                        <select id="priority" name="priority" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_priority=="High"?'selected':''}}>High</option>
                                                                              <option {{$case->testcase_priority=="Medium"?'selected':''}}>Medium</option>
                                                                              <option {{$case->testcase_priority=="Low"?'selected':''}}>Low</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class=" px-3 mb-3"> 
                                                                        <label for="type">Type</label>
                                                                        <select id="type" name="type" class="form-select form-select-sm">
                                                                              <option {{$case->testcase_type=="Other"?'selected':''}}>Other</option>
                                                                              <option {{$case->testcase_type=="Functional"?'selected':''}}>Functional</option>
                                                                              <option {{$case->testcase_type=="Smoke"?'selected':''}}>Smoke</option>
                                                                              <option {{$case->testcase_type=="Regression"?'selected':''}}>Regression</option>
                                                                              <option {{$case->testcase_type=="Security"?'Security':''}}>Security</option>
                                                                              <option {{$case->testcase_type=="Integration"?'selected':''}}>Integration</option>
                                                                        </select>
                                                                    </div>
                                                                  </div><!-- col-3 border-start-->
                                                              </div>

                                                          </div><!-- modal body -->
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update Status</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                            @endforeach
                                     
                                      </div>
                                  </div>
                              </div> <!-- row bg-light my-3 -->
                      @endif
                      <!-- testcasesNoSuites -->

 
                </div><!-- col-9 --><!-- left column -->
              </div>
              
            @else
                <h4>No projects</h4>
            @endif

         </div>
    </div>

    @endsection
 

 