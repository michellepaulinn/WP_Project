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
        .title{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
        .title1{
            font-family: 'Times New Roman', Times, serif;

         }
        .title2{
            font-family: 'Times New Roman', Times, serif;
            font-weight: 500;
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
        .category-card:hover{
            color :  #333;
            opacity: 0.4;
        }
        .ctg-item{
            margin-top: -45px;
        }
        .register{
            background-color: #ede6db;
        }
        .login{
            background-color: #ede6db;
        }
        .login>form{
            color:#396854;
        }
        .register>form{
            color:#396854;
        }
        .isi{
            background-color: #f7f6f2;
        }
    </style>
  </head>
  <body>
    <header>
        <div class="nav justify-content-between d-flex gap-4 p-4 w-100" style="background-color: #ede6db;">
            <a class="title nav-item navbar-brand" href="/" style="color:#396854;">
                <h3 class="">Thrift Store</h3>
            </a>
            <div class="search nav-item flex-grow-1 px-4 mx-4">
                <form action="/search" class="d-flex flex-row" method="GET">
                    <input type="search" class="form-control pr-5 pl-3 mr-1" placeholder="Celana, Baju, ..." aria-label="Search" name="keyword">
                    <button class="btn " type="submit">
                        <span class="material-icons" style="color:#396854;">search</span>
                    </button>
                </form>
            </div>
            <div class="d-flex nav-item gap-3>
                <div class="cart px-4 align-baseline">
                    @guest   
                        <a href="/cart">
                            <span class="material-icons" style="color:#396854;">shopping_cart</span>
                        </a>
                    @endguest
                    @auth
                        @if(Auth::user()->role_id=='1')
                            <a href="/admin/view_create_item">
                                <span class="material-icons" style="color:#396854;">add_circle</span>
                            </a>
                        @else
                            <a href="/cart">
                                <span class="material-icons" style="color:#396854;">shopping_cart</span>
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="profile px-4 dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <span class="material-icons" style="color:#396854;">person</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        @guest   
                            <li>
                                <div class="dropdown-header">
                                    Guest
                                </div>
                                <a class="dropdown-item" href="/login">Log in</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <div class="dropdown-header">
                                    {{ Auth::user()->name }}
                                </div>
                            </li>
                            @if(auth()->user()->role_id == 1)
                            <a class="dropdown-item" href="/admin/orders">Orders</a>
                            @else
                            <a class="dropdown-item" href="/orders">My Orders</a>
                            @endif
                            <a class="dropdown-item" href="/logout">Log out</a>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="isi">
        @yield('content')
    </div>

    @yield('auth-form')
    
    <div class="" style="background-color:#ede6db;">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top" style="background-color: #ede6db">
            <div class="col-md-4 d-flex align-items-center gap-4" style="background-color: #ede6db">
                <div>
                    <a href="/" class="title">
                        <h3 style="color: #396854">Thrift Store</h3>
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