<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>kuitansi.com</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
    @yield('search')
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link">
      <span class="brand-text font-weight-light">Kuitansi</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              {{ Auth::user()->name }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kuitansi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kuitansi/request/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Kuitansi Baru</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/kuitansi/validasi" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Validasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
        </div>
      </div>
    </section>

   <section class="content">
      <div class="card">
        
        <div class="card-body">
           @yield('content')
        </div>
        <div class="card-footer">
        </div>
      </div>

    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('template')}}/dist/js/demo.js"></script>
</body>
</html>
