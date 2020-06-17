@extends('layouts.login')

@section('css')
    <style>        
        body {
            background-image: url("{{ asset('images/login/background.png') }}");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            height: 100vh; 
        }

        .btn-mentor          { color: #FFFFFF; background-color: #395A6A; border-color: #395A6A; }
        .btn-mentor:hover    { color: #f5f5f5; background-color: #607A87; border-color: #607A87; }

        .text-mentor         { color: #395A6A; }
        a .text-mentor:hover { color: #2D4854; text-decoration: underline; }
        #convite             { display: block; }
    </style>
@endsection

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 20rem;">
                <div class="card-body p-3">
                    <h3 class="card-title text-center">Mentor</h3>
                    <h6 class="card-subtitle mb-3 text-muted text-center">Login</h6>
                    
                    <a href="/redirect" class="btn btn-mentor btn-block">
                        <img src="{{ asset('images/login/g.png') }}" alt="" width="30" height="30" title="Bootstrap">
                        Entrar com o Google
                    </a>
                    
                    @if (session('error'))
                        <div class="text-danger text-center pt-1">
                            {{ session('error') }}
                        </div>
                    @endif

                    <a id="convite" href="#" class="card-link text-mentor mt-3">Tenho convite</a>
                </div>
            </div>
        </div>
    </div> 

    <div id="modal-convite" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="t-convite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="t-convite">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form id="form-convite" class="form-group mb-0" action="#" method="POST">
                        <div class="form-group">
                            <small for="code" class="text-muted">Código de indicação *</small>
                            <input type="text" id="code" class="form-control form-control-sm" name="code" placeholder="XX0123456789YY" required>
                            <span id="span_code" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-mentor btn-sm btn-block" >Validar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        
        $(document).on('click', '#convite', function() {
            $('#modal-convite').modal('show');
        });
        $('#form-convite').on('submit', function (e) {
            e.preventDefault();

            console.log($('#form-convite').serialize());
        });
    </script>
@endsection

