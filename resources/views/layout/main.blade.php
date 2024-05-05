<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      .divs{
        display: flex;
        flex-direction: column;
      }

      body{
        min-height: 100vh;
      }

      .imgs{
        border: solid black 2px;
        padding: 3px;
        background-color: white;
      }

      .main{
        display: flex;
        margin-bottom: 30px;
      }

      .sub-main{
        margin-left: 8%;
        letter-spacing: 1px;
      }

      .sub-main h1{
        font-size: 30px;
        margin-bottom: 10px;
      }

      .sub-main h2{
        font-size: 25px;
        margin-bottom: 10px;
      }

      .admin_op{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        max-width: 150px;
      }

      .size1{
        font-size: 25px;
        border-radius: 8px;
        padding: 10px 15px;
      }

      .spacings{
        margin-left: 20px;
      }

      .quanti{
        font-size: 20px;
        padding: 10px 15px;
        border: solid black 1.5px;
      }

      .backg{
        background-color: #dcdcdc;
        width: 100%;
        padding: 40px;
        height: auto;
        border-radius: 10px;
        margin-bottom: 30px;
      }

      .mine{
        display:flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-evenly;
      }

      .inMine{
        border: solid #dcdcdc 2px;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 30px;
      }

      .description{
        width: 100%;
      }

      .inDescription{
        width: 100%;
        border: solid black 1px;
        border-radius: 8px;
        background-color: white;
        min-height: 80px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 40px;
        font-weight: 200;
      }

      .navbars{
        position: sticky;
        width:100%;
        top: 0;
      }

      .containers{
        width: 100%;
        padding: 0;
      }

      .about{
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #dcdcdc;
        min-height: 600px;
        border-radius: 10px;
      }

      .about img{
        margin-bottom: 50px;
        border: solid black 1px;
        border-radius: 40%;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbars">
  <div class="container-fluid ms-5">
    <a class="navbar-brand" href="/">RealThings</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link {{ ($title === 'About Me')? 'active' : ''}}" href="/aboutme">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Browse Items')? 'active' : ''}}" href="/myitems">Browse Items</a>
        </li>       
    @can('authenticated')
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'My Cart')? 'active' : ''}}" href="/mycart">My Cart</a>
        </li>
    @endcan
  @can('is_admin')
      <li class="nav-item">
          <a class="nav-link {{ ($title === 'Create Item')? 'active' : ''}}" href="/create-item">Create Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Create Category')? 'active' : ''}}" href="/create-category">Create Category</a>
        </li>
  @endcan
      </ul>  
      @auth
      <ul class="navbar-nav ms-auto me-5">
        <li class="nav-item">
          <form action="/logout" method = "POST">
            @csrf
            <a class="nav-link {{ ($title === 'Logout')? 'active' : ''}}"><button type = "submit" class = "btn btn-dark"><i class="bi bi-box-arrow-left"></i> Logout</button></a>
          </form>
        </li>
      </ul>
      @else      
      <ul class="navbar-nav ms-auto me-5">
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Login')? 'active' : ''}}" href="{{ route('login') }}"><button class ="btn btn-dark"><i class="bi bi-box-arrow-in-right"></i> Login</button></a>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>  
<div class="container mt-3 containers">
    @yield('container')
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>