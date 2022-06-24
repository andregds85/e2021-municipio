@extends('limpo.app')
@section('content')
<?php session_start(); ?>  
<?php $hospital=Auth::user()->categorias_id; 
$userMacro=Auth::user()->macro; 
$login=Auth::user()->email; 
use App\Models\incluir_mapa_p2;
use App\Models\municipio_mapa_p3;
use App\Http\Controllers\MapaMunicipioController;
use App\Http\Controllers\PacienteController;
use App\Models\Pacientes;

$id;
$cidade2=Auth::user()->cidade;  

$tabela = incluir_mapa_p2::all(); 
$itensP = incluir_mapa_p2::where('id',$id)->get(); 

?>

@foreach($itensP  as $t)


<b> ID do Paciente:</b> {{$t->idPaciente}}<br>
<?php
 $municipio=$t->municipio;
 $idPaciente=$t->idPaciente;

         $tab1 = pacientes::all(); 
         $pac1 = pacientes::where('id',$idPaciente)->get(); 

?>

            @foreach($pac1  as $tatuPac)

            {{$tatuPac->id}}

        

          {{$tatuPac->municipio}}

          <?php $local=$tatuPac->municipio; ?>
        
                
            

            @endforeach




            <?php 
                
                              
                    $local;
                    $cidade2;
                    $contarLocal=strlen($local);
                    $contarCidadade2=strlen($cidade2);

                    if($contarCidadade2 == $contarLocal){

                        echo "<script> alert('Área permitida, úsuario e paciente do mesmo municipio')</script>";



                    }else{
                     
                        echo "<script> alert('Voce Tentou acessar dados de Pacientes que não são da tua Região ')</script>";
                        echo redirect()->route('sair.index'); 
                  
                    }
                  
                    
                    
                   
              ?>














<?php 
echo "<br>";
$idPaciente;
echo "<br>";




$tabelap3 = municipio_mapa_p3::all();              
$itensP = municipio_mapa_p3::where('idp2',$id)->count();

               
                if ($itensP>0) { 
              
                 
                 } ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criando Mapa de Cirurgias Eletivas') }}</div>

                <div class="card-body">
                <form action="{{ route('mapamunicipio.store') }}" method="POST" id="validate" enctype="multipart/form-data" NAME="regform"
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
                 

                     <!-- ID do Paciente -->
                       <div class="form-group row">
                            <label for="idPaciente" class="col-md-4 col-form-label text-md-right">{{ __('Id do Paciente') }}</label>
                            <div class="col-md-6">
                            <input id="idPaciente" type="text" class="form-control @error('idPaciente') is-invalid @enderror" name="idPaciente"  value="<?php echo $idPaciente; ?>" required autocomplete="idPaciente" readonly>
                                @error('idPaciente')
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
                            <select class="form-control" name="observacao" id="confirma">
                              <option value='Defina uma observação' >Defina uma observação</option>
                              <option value='1. Aguarda cirurgia' >1. Aguarda cirurgia</option>
                              <option value='2. Já realizou no SUS' >2. Já realizou no SUS</option>
                              <option value='3. Já realizou particular' >3. Já realizou particular</option>
                              <option value='4. Não deseja mais realizar' >4. Não deseja mais realizar</option>
                              <option value='5. Contra-indicado o procedimento' >5. Contra-indicado o procedimento</option>
                              <option value='6. Sem contato' >6. Sem contato</option>
                              <option value='7. Não localizado' >7. Não localizado</option>
                              <option value='8. Óbito' >8. Óbito</option>
                              <option value='9. Termo de desistência assinado' >9. Termo de desistência assinado</option>
                              <option value='10. Paciente com indicação de UTI' >10. Paciente com indicação de UTI</option>
                              <option value='11. Paciente aguardando avaliação de outra especialidade' >11. Paciente aguardando avaliação de outra especialidade</option>
                              <option value='12. Paciente não compareceu na data agendada da cirurgia' >12. Paciente não compareceu na data agendada da cirurgia</option>
                           

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
                  <select class="form-control" name="usuarioSistema"> 
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









@endforeach

@endsection














