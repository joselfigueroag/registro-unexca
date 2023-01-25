@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Tablero') }}</div>
                    <div class="card-body d-flex justify-content-between">
                        <div class="col-5">
                            @hasrole('teacher')
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" href="{{ route('list_users') }}">
                                        Usuarios
                                    </a>
                                </div>
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button" href="{{ route('list_departments') }}">
                                        Departamentos
                                    </a>
                                </div>
                                @php($disabled = '')
                                @if ($departments->isEmpty())
                                    @php($disabled = 'disabled')
                                @endif
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary {{ $disabled }}" type="button"
                                        href="{{ route('list_clinical_services') }}">
                                        Servicios Clinicos
                                    </a>
                                </div>
                                {{-- <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button"
                                        href="{{ route('specialist_index') }}">Especialistas</a>
                                </div>
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button"
                                        href="/deleted_records">Registros Eliminados</a>
                                </div> --}}
                            @endhasrole
                            @hasrole(['teacher', 'student'])
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button"
                                    href="/patients">Pacientes</a>
                                </div>
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button"
                                    href="{{ route('list_appointments') }}">Citas</a>
                                </div>
                            @endhasrole
                        </div>
                        <div class="col-6 text-center">
                            <div>
                                <img src="/images/logo_etalrs.jpg" alt="logo_etalrs">
                            </div>
                            <div>
                                <h4>Escuela Tecnica Asistencial Luis Rodriguez Sanchez</h4>
                                <h5>Laboratio Clinico</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <div class="col-sm-4 mt-1"> 
                            <div class="card" >
                                <div class="card-header bg-primary text-light">Citas por Mes</div>
                                <div class="card-body">
                                    <h1></h1>
                                    <div>
                                    <canvas id="CMES"></canvas>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-4 mt-1"> 
                            <div class="card ">
                                <div class="card-header bg-primary text-light">Citas Pendientes</div>
                                <div class="card-body">
                                    <h1></h1>
                                    <div>
                                    <canvas id="CPENDIENTES"></canvas>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-4 mt-1"> 
                        
                        <div class="card">
                            <div class="card-header bg-primary text-light">Citas por servicio</div>
                            <div class="card-body">
                                <h1></h1>
                                <div>
                                <canvas id="CSERVICIOS"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
 
</body>

@endsection

<script src="{{ asset('chart.js/chart.js') }}"></script>
<script>



function onload_funtion(){
      citas_mes();
      citas_pendientes();
      citas_servicio();
    }

function citas_mes(){

var meses = ["enero","febrero","marzo"]

const $grafica = document.getElementById('CMES');
const citas = {
    label: "total",
    data: [20 ,10 ,30], 
    backgroundColor:'rgba(54, 162, 255, 0.6)',
};

new Chart($grafica, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [
            citas,
        ]
    },

});



}
//citas pendientes
function citas_pendientes(){

var meses = ["abril","mayo","junio"]

const $grafica = document.getElementById('CPENDIENTES');
const citas = {
    label: "total",
    data: [5 ,22 ,15], 
    backgroundColor:'rgba(54, 162, 255, 0.6)',
};

new Chart($grafica, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [
            citas,
        ]
    },

});



}
//citas servicio
function citas_servicio(){

var meses = ["Odontologia","Cardiologia","Unidad Coronaria"]

const $grafica = document.getElementById('CSERVICIOS');
const citas = {
    label: "total",
    data: [3 ,6 ,2], 
    backgroundColor:'rgba(54, 162, 255, 0.6)',
};

new Chart($grafica, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [
            citas,
        ]
    },

});



}

</script>