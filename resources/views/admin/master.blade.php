<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Store Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{url('/admin/css/style.css')}}" rel="stylesheet" />
         <!-- toastr cdn -->
         <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
         <!-- close toastr -->
             <!-- font awesome cdn-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     
     <link href="{{mix('/css/app.css')}}" rel="stylesheet" />
       
    </head>
    <body class="sb-nav-fixed">
        <div id="app">
        @include('admin.partials.header')

        <div id="layoutSidenav">
            @include('admin.partials.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                    @if(session()->has('warning'))
                        <p class="alert alert-danger">
                            {{session()->get('warning')}}
                        </p>
                    @endif
                </main>
                
            </div>

            {{-- <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class=" align-items-center small">
                        <div class="text-muted">Copyright &copy; Store Management System</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>    --}}
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('admin/js/script.js')}}"></script>
        <script src="{{mix('/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

    @stack('js')
    </body>
</html>
