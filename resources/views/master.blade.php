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
        body{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
        .title{
            color: #396854;
            font-weight:500;
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
        .btn-prim:hover{
            color: white;
            background-color: #AB6954;
        }
        a:hover{
            color:#AB6954;
        }
        .ctg-item{
            margin-top: -45px;
        }
        .btn-prim{
            background-color: #396854;
            color: white;
        }
        .bg-sec{
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
        .carousel-img{
            width:100%;
            height:35rem;
            object-fit: cover;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
        height: 50px;
        width: 50px;
        outline: #396854;
        background-size: 100%, 100%;
        border-radius: 50%;
        border: 5px solid #396854; 
        background-color: #396854;
        }
        .dropdown-item:focus{
            color: white;
            background-color: #AB6954;
        }
        /* .carousel-control-next-icon:after {
        content: '>';
        font-size: 55px;
        color: #6b4f4f;
        } */

        /* .carousel-control-prev-icon:after {
        content: '<';
        font-size: 55px;
        color: #6b4f4f;
        } */
        .card-img-top{
            width: 240px;
            height: 240px;
            object-fit: cover;
        }
        .page-item.active .page-link{
                background-color: #AB6954!important;
                border-color: #AB6954 !important;
        }
        .pagination>li>a{
            background-color: #ede6db;
            color: #303030;
        }
        .pagination>li>a:hover{
            color: #AB6954;
        }
        .ctg-border{
            border-bottom:3px solid #ede6db;
        }
    </style>
  </head>
  <body>
    <header>
        <div class="nav justify-content-between d-flex gap-4 p-4 w-100" style="background-color: #ede6db;">
            <a class="title nav-item navbar-brand" href="/" style="text-decoration: none;">
                <h3 class="">Thrift Store</h3>
            </a>
            
            <div class="d-flex nav-item gap-3">
                <div class="cart px-4 align-self-center">
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
                <div class="profile px-4 dropdown align-self-center">
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
                            <a class="dropdown-item" href="/admin/view_slider_add">Add Slider</a>
                            <a class="dropdown-item" href="/admin/view_slider_remove">Delete Slider</a>
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
        <footer class="d-flex flex-wrap justify-content-between align-items-center p-4 border-top" style="background-color: #ede6db">
            <div class="col-md-4 d-flex align-items-center gap-2" style="background-color: #ede6db">
                <div class="justify-content-center">
                    {{-- <a href="/" class="title">
                        <h3>Thrift Store</h3>
                    </a> --}}
                    <h3 style="color:#396854;font-weight:300;">Find Us</h3>
                    <div class="d-flex flex-row">
                        <span class="material-icons" style="color:#396854;">mail</span> 
                        <h5 style="margin-left: 10px;">thriftstorePPTI10@gmail.com</h5>
                    </div>
                    <div class="d-flex flex-row">
                        <span class="material-icons" style="color:#396854;">map</span> 
                        <h5 style="margin-left: 10px;">Jl. Pakuan No.3, Sumur Batu, Babakan Madang, Bogor Regency, West Java 16810</h5>
                    </div>
                    <div class="d-flex flex-row">
                        <span class="material-icons" style="color:#396854;">call</span> 
                        <h5 style="margin-left: 10px;">+6285210107743</h5>
                    </div>
                </div>

            </div>
            
            {{-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul> --}}
            <div style="margin-top: 120px;"><span class="text-muted">  &copy Thrift Company </span></div>
        </footer>
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
</body>
</html>