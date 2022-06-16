<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title')</title> 
    <style>
        .logo{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
    </style>
  </head>
  <body>
    {{-- <header class="py-3 mb-4 border-bottom navbar-light">
        <div class="my-2 d-flex flex-row align-items-center justify-content-between">    
            <a href="/" class="col-md-2 mb-2 mb-md-0 text-decoration-none">
                <h3>Thrift Store</h3>
            </a>
            
            <form action="" class="d-flex flex-row" method="GET">
                <input type="search" class="form-control pr-5 pl-3 mr-1" placeholder="Celana, Baju, ..." aria-label="Search" name="keyword">
                <button class="btn bg-primary" type="submit">Search</button>
            </form>
            
            <div class="col-md-2 text-end">
                <a href="/login" class="btn btn-outline-primary me-2" role="button">Login</a>
                <a href="/signup" class="btn btn-primary" role="button">Sign-up</a>
            </div>
        </div>

        <div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>
        </div>
    </header> --}}

    <header>
        <div class="nav justify-content-between d-flex gap-4 p-4 w-100">
            <div class="logo nav-item">
                <h3 class="">Thrift Store</h3>
            </div>
            <div class="search nav-item flex-grow-1 px-4 mx-4">
                <form action="" class="d-flex flex-row" method="GET">
                    <input type="search" class="form-control pr-5 pl-3 mr-1" placeholder="Celana, Baju, ..." aria-label="Search" name="keyword">
                    <button class="btn " type="submit">
                        <span class="material-icons">search</span>
                    </button>
                </form>
            </div>
            <div class="d-flex nav-item gap-3">
                <div class="cart px-4 align-baseline">
                    <span class="material-icons">shopping_cart</span>
                </div>
                <div class="profile px-4 ">
                    <span class="material-icons">person</span>
                </div>
            </div>
        </div>
        <div class="ctg d-flex col-md-8">
            <div class="ctg-item">
                <a href="">Outer</a>
            </div>
            <div class="ctg-item">
                <a href=""> Tops</a>
            </div>
            <div class="ctg-item">
                <a href="">Bottoms</a>
            </div>
            <div class="ctg-item">
                <a href="">Accessories</a>
            </div>
        </div>
    </header>
    <div class="container mt-4">
        @yield('container')
    </div>
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>