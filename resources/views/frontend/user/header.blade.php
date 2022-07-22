 
            <div class="row">
              <div class="col-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down-right-circle-fill mx-3" viewBox="0 0 16 16">
                  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
                </svg>

                <svg width="26px" height="26px" id="iconMenu" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>

              </div>
               
              <div class="col text-center">
              <a href="/user" class="text-decoration-none"><img src="{{asset('images/CircleSquared-Black.svg')}}" class="logo-home"/></a>
              </div>
              <div class="col-2 text-end">
                

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">User Invites</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('user.signout')}}">Sign Out</a></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-6"></div>
              <div class="col-6">
                @include('frontend.user.navbar')
              </div><!-- div-navbar -->
            </div>

            <div class="row">
              <div class="col"><b>{{$title}}</b></div>

            </div>
            <hr/>

            <script>
              $(document).ready(function(){
                  //$('#mainNavbar').hide();
                  $('#iconMenu').on('click',function(){
                      $('#mainNavbar').toggle('slow');
                  });
              });
            </script>

            

 
  