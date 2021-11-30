@extends('limpo.app')
@section('content')
  
<?php $hospital=Auth::user()->categorias_id; ?>
<?php $userMacro=Auth::user()->macro; ?>
<?php $login=Auth::user()->email; ?>

<?php 
use App\Models\mapas;
use App\Http\Controllers\MapasController;

$id;

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


                  <!-- idp2 -->
                     <div class="form-group row">
                            <label for="idp2" class="col-md-4 col-form-label text-md-right">{{ __('Referencia do Paciente no Mapa ') }}</label>
                            <div class="col-md-6">
                            <input id="idp2" type="text" class="form-control @error('idp2') is-invalid @enderror" name="idp2"  value="<?php echo $id; ?>" required autocomplete="idp2" readonly>
                                @error('idp2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                 
        
                                          
                    <!--  passo 1 -->
                       <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Observação') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="passo1" id="confirma">
                              <option value='Defina uma observação' >Defina uma observação</option>
                              <option value='Defina uma observação' >Defina uma observação</option>

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

 