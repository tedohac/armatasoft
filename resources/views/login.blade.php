@extends('layout.master', ['title' => 'Yoshinoya - MagangHub'])

@section('head')
    
    <!-- SB Admin Template -->
    <link href="{{ asset('styles/sb-admin.css?v=').time() }}" rel="stylesheet">

    <style>
        .font-20 {
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        
        <div class="card card-login mx-auto">
            <div class="card-body">
                
                <h3 class="mb-5 text-center">LOGIN</h3>

                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Perhatikan beberapa hal berikut:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                <form action="{{ route('login') }}" method="post" id="registform">
                @csrf
				<div class="form-label-group mb-3">
                    <input id="usernameLogin" class="form-control" placeholder="Username" name="user_name" required="required" autofocus="autofocus" value="{{ old('user_name') }}"
                        data-parsley-required
                        data-parsley-required-message="Masukan Username">
                    <label for="usernameLogin">Username</label>
                    @error('user_name')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>    
                    @enderror
                </div>
                
                <div class="form-label-group mb-3">
                    <input id="passLogin" class="form-control" placeholder="Password" name="user_password" required="required" autofocus="autofocus"  type="password"
                        data-parsley-required
                        data-parsley-required-message="Masukkan password">
                    <label for="passLogin">Password</label>
                    @error('user_password')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>    
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <div>
                        <!-- <input id="rememberLogin" type="checkbox" name="login_remember">
                        <label for="rememberLogin">
                            Ingat saya
                        </label> -->
                    </div>
                </div>
                    
                <input class="btn btn-success btn-block" value="LOGIN" type="submit">
                </form>
            </div>
        </div>
    </div>
@endsection
    
@section('bottom')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('js/parsley.min.js') }}"></script>
	<script>
        $("#registform").parsley({
            errorClass: 'is-invalid text-danger',
            errorsWrapper: '<span class="form-text text-danger"></span>',
            errorTemplate: '<span></span>',
            trigger: 'change'
        }) /* If you want to validate fields right after page loading, just add this here : .validate()*/ ;
        
        // Parsley full doc is avalailable here : https://github.com/guillaumepotier/Parsley.js/
	</script>
@endsection