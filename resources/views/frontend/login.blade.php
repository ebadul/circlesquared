<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/gif" sizes="16x16">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <title>CircleSquared</title>
  </head>
  <body class="login login-bg align-items-center">
    
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <div class="col-2">
                    <img src="./images/CircleSquared-White.svg" class="logo-home"/>
                </div>
                <div class="col"></div>
                <div class="col-2">
                    
                </div>
            </div>

           
                
                    
            <div class="vh-75 row align-items-center my-4 bg-light">
              
               

                      
              <div class="row">
                <div class="col"></div>
                <div class="col">
                  <h5 class="text-center text-muted">Sign in
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                      <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                  </h5>
                  
                </div>
                <div class="col">
                  <h5 class="text-center">
                    <a href="/signup" class="text-decoration-none">Sign up</a>
                  </h5>
                </div>
                <div class="col"></div>
                <hr>
              </div>

              <div class="row my0">
                
                <div class="col"></div>
                <div class="col">
                  <form action="/login" method="post">

                      @if($errors->any())
                          {!! implode('<br>', $errors->all(':message')) !!}
                      @endif

                      
                      @csrf
                      <div class="mb-3 row">
                        <label for="staticEmail" class=" col-form-label">E-mail *</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="email" id="staticEmail" placeholder="Enter your email" required>
                         
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword" class=" col-form-label">Password *</label>
                        <div class="col-sm-12">
                          <input type="password" class="form-control" name="password"  id="inputPassword" placeholder="Enter your password" required>
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="col">
                          <input type="checkbox" class="checkbox" id="inputPassword" placeholder="Enter your password">
                          <a href="./">Remember me?</a>
                        </div>

                        <div class="col text-right">
                          <a href="./">Forget your password?</a>
                        </div>
                      </div>

                      <div class="mb-3 d-grid my-3">
                        <input type="submit" class="btn btn-dark btn-block" value="Login">
                      </div>
                  </form>

                  <div class="mb-3 row">
                    <div class="col">
                     <p class="text-warning">Or login with</p>
                    </div>

                    <div class="col" style="text-align:right;">
                      <a href="./" class="text-decoration-none">
                        <img src="./images/facebook.svg">
                      </a>

                      <a href="./" class="text-decoration-none">
                        <img src="./images/google.svg">
                      </a>
                    </div>
                  </div>

                    
                </div>
               
                <div class="col"></div>
              </div>
           
             
        
      </div><!-- vh-75-->
                 
                   
        
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>