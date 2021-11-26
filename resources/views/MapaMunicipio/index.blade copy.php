@extends('layouts2.app')
@section('content')
  
<?php $hospital=Auth::user()->categorias_id; ?>
<?php $userMacro=Auth::user()->macro; ?>
<?php $login=Auth::user()->email; ?>


<?php 
use App\Models\mapas;
use App\Http\Controllers\MapasController;
?>




<SCRIPT> 
<!--
function valida()
{

if(document.regform.nome.value=="" || document.regform.nome.value.length < 5)
{
alert( "Preencha campo Nome do Mapa! " );
regform.nome.focus();
return false;
}

if(document.regform.cns.value.length < 12  || document.regform.cns.value.length > 16)
{
alert( "Preencha campo CNS corretamente ");
regform.cns.focus();
return false;
}


return true;
}
 

</script>

<script>
function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}

</script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criando Mapa de Cirurgias Eletivas') }}</div>

                <div class="card-body">
                <form action="{{ route('mapas.store') }}" method="POST" id="validate" enctype="multipart/form-data" NAME="regform"
    onsubmit="return valida()">
 
                        @csrf

                        </div>
                        </div>
                        </div>
                        </div>
                        </div>


    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dados do Mapa') }}</div>

                <div class="card-body">


                  <!-- macro -->
                     <div class="form-group row">
                            <label for="macro" class="col-md-4 col-form-label text-md-right">{{ __('Macro ') }}</label>
                            <div class="col-md-6">
                            <input id="macro" type="text" class="form-control @error('horaPreenchimento') is-invalid @enderror" name="macro"  value="<?php echo $userMacro=Auth::user()->macro; ?>" required autocomplete="macro" readonly>
                                @error('macro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                 


                    <!-- Hospital -->
                     <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Código do Hospital ') }}</label>
                            <div class="col-md-6">
                            <input id="categoria_id" type="text" class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id"  value="<?php  echo $hospital=Auth::user()->categorias_id; ?>" required autocomplete="categoria_id" readonly>
                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>


                          <!--  nome do Mapa -->
                          <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Mapa') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome">
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                             
                     <!--  descricao -->
                         <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                            <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao"  required autocomplete="descricao" rows="3"></textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>


                           
                          <!--  especialidade-->
                          <div class="form-group row">
                            <label for="especialidade" class="col-md-4 col-form-label text-md-right">{{ __('especialidade') }}</label>
                            <div class="col-md-6">
                                <input id="especialidade" type="text" class="form-control @error('especialidade') is-invalid @enderror" name="especialidade" required autocomplete="especialidade">
                                @error('especialidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                              

                            

                          <!--  cod_procedimento-->
                          <div class="form-group row">
                            <label for="cod_procedimento" class="col-md-4 col-form-label text-md-right">{{ __('Código do Procedimento') }}</label>
                            <div class="col-md-6">
                                <input id="cod_procedimento" type="text" class="form-control @error('cod_procedimento') is-invalid @enderror" name="cod_procedimento" required autocomplete="cod_procedimento">
                                @error('cod_procedimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                              

                                       
                          <!-- Procedimento -->
                          <div class="form-group row">
                            <label for="procedimento" class="col-md-4 col-form-label text-md-right">{{ __('Procedimento') }}</label>
                            <div class="col-md-6">
                                <input id="cod_procedimento" type="text" class="form-control @error('cod_procedimento') is-invalid @enderror" name="procedimento" required autocomplete="procedimento">
                                @error('procedimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                              


                       <!--  Vagas -->
                       <div class="form-group row">
                            <label for="vagas" class="col-md-4 col-form-label text-md-right">{{ __('Vagas') }}</label>
                            <div class="col-md-6">
                                <input id="vagas" type="text" class="form-control @error('vagas') is-invalid @enderror" name="vagas" onkeypress="return onlynumber();"  required autocomplete="vagas">
                                @error('vagas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                          
                    <!--  passo 1 -->
                       <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Passo 1 ') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="passo1" id="confirma">
                              <option value='confirmado' >confirmado</option>
                              </select>     
                                @error('passo1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
             
                           
                    <!--  login 1 -->

                    <div class="form-group">
                      <label for="exampleInputCategoria">Login </label>
                  <select class="form-control" name="login"> 
                      <option value='<?php echo $login ?>' >{{Auth::user()->email}}</option>
                    </select>
                     </div>

                                        </div>
                        </div>
                        </div>
                        </div>
                        </div>


                    











                 

<!--  fim -->
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 