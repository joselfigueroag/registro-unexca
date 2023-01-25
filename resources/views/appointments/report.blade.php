<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin: 1.5cm 1cm 1cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 0.5cm;
            text-align: center;
            line-height: 35px;
        }
        </style>
    
</head>
<header class="bg-primary">
    <h1 class="text-center" >Citas pautadas</h1>
</header>
<footer>
    <h6 class="text-center" >Reporte generado el {{date('Y-m-d')}}</h6>
</footer>  
    <body>
            <div class="table-responsive">
                <table class="table table-striped table-bordered small">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Paciente</th>
                            <th scope="col">Fecha de cita</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    @foreach ($appointments as $appointment)
                        <tr>
                            @if ($appointment->patient)
                                <th scope="col">{{ $appointment->patient->full_name }}</th>
                            @else
                                <th scope="col"></th>
                            @endif
                            <th scope="col">{{ $appointment->appointment_date }}</th>
                            <th scope="col">{{ $appointment->clinical_service->department->name }}</th>
                            <th scope="col">{{ $appointment->clinical_service->name }}</th>
                            <th scope="col">{{ $appointment->description }}</th>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $appointments->links() !!}
            </div>
        </div>
    </body>

</html>
