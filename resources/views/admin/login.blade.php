<style>
    body{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: #34495e;
      }
      .box{
        width: 300px;
        padding: 40px;
        margin-top: 0px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background: #191919;
        text-align: center;
      }
      .box h1{
        color: white;
        text-transform: uppercase;
        font-weight: 500;
      }
      .box input[type = "text"],.box input[type = "password"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #eb910b;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
      }
      .box input[type = "text"]:focus,.box input[type = "password"]:focus{
        width: 280px;
        border-color: #2ecc71;
      }
      .box input[type = "submit"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
      }
      .box input[type = "submit"]:hover{
        background: #2ecc71;
      }
      .alert{position:relative;padding:.75rem 1.25rem;margin-left: 450px; margin-right: 450px;margin-bottom:1rem;border:1px solid transparent;border-radius:3.25rem}
      
      .alert-warning{color:#806013;background-color:#fdf1d3;border-color:#fdebc2}
      .alert-warning hr{border-top-color:#fce3a9}
      .alert-warning .alert-link{color:#543f0c}
    
      </style>
      
    
                        @if(session()->has('invalid'))
                            <p class="alert alert-warning">
                                {{session()->get('invalid')}}
                            </p>
                        @endif
    
      @if ($errors->any())
    
      <div class="alert alert-warning" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul> 
      </div>
    
      @endif
    
    
      <form class="box" action="{{route('admin.dologin')}}"  method="post">
    
        @csrf
        <h1>Login</h1>
        <input type="text" name="email" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="" value="Login">
        