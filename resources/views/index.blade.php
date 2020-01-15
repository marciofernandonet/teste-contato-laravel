<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Teste Contato Laravel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
  .uper {
    margin-top: 20px;
    margin-bottom: 20px;
  }
</style>
<body>
<div class="container">    
    <div class="row justify-content-md-center">
	    <div class="col-sm-6 col-sm-offset-2">
            <div class="card uper">
                <div class="card-header">
                    Enviar contato
                </div>
                <div class="card-body">
                    @if(session()->get('type'))
                    <div class="alert alert-{{session()->get('type')}}">
                        {{ session()->get('msg') }}  
                    </div>
                    @endif
                    <form method="POST" action="{{url('/')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label>Nome:</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}"/>
                            @error('nome')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"/>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telefone:</label>
                            <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" placeholder="DDD + Número" maxlength="11" value="{{ old('telefone') }}"/>
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mensagem:</label>
                            <textarea class="form-control @error('mensagem') is-invalid @enderror" name="mensagem">{{ old('mensagem') }}</textarea>
                            @error('mensagem')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('arquivo') is-invalid @enderror"name="arquivo">
                            <label class="custom-file-label">Arquivo</label>
                            @error('arquivo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <hr/>
                        <button type="submit" class="btn btn-primary">
                            Enviar
                        </button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
<script>
$(".custom-file-input").on("change", function(){
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>