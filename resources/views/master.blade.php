<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title')</title> 
    <style>
        .logo{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
        a{
            color: black;
            text-decoration: none;
        }
        .detail-img{
            width:30rem;
        }
        .ctg-img{
            width:17rem;
            height:15rem;
            object-fit: cover;
        }
        .dark-overlay{
            background-color: rgba(0, 0, 0, 0.500) !important;
        }
    </style>
  </head>
  <body>
    <header>
        <div class="nav justify-content-between d-flex gap-4 p-4 w-100">
            <a class="logo nav-item navbar-brand" href="/">
                <h3 class="">Thrift Store</h3>
            </a>
            <div class="search nav-item flex-grow-1 px-4 mx-4">
                <form action="/search" class="d-flex flex-row" method="GET">
                    <input type="search" class="form-control pr-5 pl-3 mr-1" placeholder="Celana, Baju, ..." aria-label="Search" name="keyword">
                    <button class="btn " type="submit">
                        <span class="material-icons">search</span>
                    </button>
                </form>
            </div>
            <div class="d-flex nav-item gap-3">
                <div class="cart px-4 align-baseline">
                    <a href="/cart">
                        <span class="material-icons">shopping_cart</span>
                    </a>
                </div>
                <div class="profile px-4 dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <span class="material-icons">person</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        @guest   
                        <li><a class="dropdown-item" href="/login">Log in</a></li>
                        @endguest
                        @auth
                        <li><div class="dropdown-header">
                            {{ Auth::user()->name }}
                        </div></li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <div class="ctg d-flex justify-content-center w-100">
            {{-- @foreach($category as $ctg)
                <div class="ctg-item mx-2">
                    <a href="/category/{{$ctg->id}}">{{$ctg->category_name}}</a>
                </div>
            @endforeach --}}
        </div>
    </header>
    <div class="container mt-4">
        @yield('content')
    </div>

    @yield('auth-form')
    
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center gap-4">
                <div>
                    <a href="/" class="logo">
                        <h3>Thrift Store  </h3>
                    </a>
                </div>
                <div><span class="text-muted mx-4">  &copy Thrift Company </span></div>
            </div>
      
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </footer>
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
</body>
</html>