<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\ClinicalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentAndClinicalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Department::factory()->count(5)->create();
        $all_departments = ['Cardiología', 'Cirugía', 'Medicina Interna', 'Neurociencias', 'Oncología', 'Otros Servicios Médicos'];
        $clinical_services = array(
            'Cardiología' => array(
                'Arritmias Cardíacas y Dispositivos Implantables',
                'Cardiología',
                'Cardiología Intervencionista y Tratamientos Endovasculares',
                'Cirugía Torácica y Cardiovascular',
                'Diagnóstico por Imágenes Cardiovasculares',
                'Unidad Coronaria'
            ),
            'Cirugía' => array(
                'Anestesiología',
                'Cirugía Bariátrica y Metabólica',
                'Cirugía de Cabeza y Cuello',
                'Cirugía General',
                'Cirugía Plástica, Reparadora y Maxilofacial',
                'Coloproctología',
                'Flebolinfología',
                'Ginecología',
                'Oftalmología',
                'Ortopedia y Traumatología',
                'Otorrinolaringología',
                'Urología'
            ),
            'Medicina Interna' => array(
                'Alergia e Inmunología',
                'Clínica Médica',
                'Dermatología',
                'Endocrinología',
                'Fisiatría',
                'Gastroenterología y Videoendoscopía Digestiva',
                'Guardia General',
                'Hematología',
                'Hepatología',
                'Infectología',
                'Medicina Hospitalaria',
                'Medicina Transfusional',
                'Nefrología',
                'Neumonología | Enfermedades Respiratorias',
                'Nutrición',
                'Oncología',
                'Reumatología',
                'Terapia Radiante',
                'Unidad de Terapia Intensiva'
            ),
            'Neurociencias' => array(
                'Fonoaudiología',
                'Neurocirugía',
                'Neurofisiología',
                'Neurología',
                'Neurorradiología',
                'Psiquiatría y Psicología'
            ),
            'Oncología' => array(
                'Anatomía Patológica',
                'Cuidados Paliativos',
                'Hematología',
                'Oncología',
                'Terapia Radiante',
            ),
            'Otros Servicios Médicos' => array(
                'Densitometría',
                'Diagnóstico por Imágenes Cuerpo',
                'Diagnóstico por Imágenes de la Mujer',
                'Diagnóstico por Imágenes Odontológicas',
                'Diagnóstico por Imágenes Osteomioarticular',
                'Laboratorio de Análisis Clínicos',
                'Medicina Reproductiva',
                'Radiología'
            )
        );

        foreach ($all_departments as $department){
            $depart_created = Department::create(['name'=>$department]);
            foreach ($clinical_services["$department"] as $clinical_service){
                ClinicalService::create(['name'=>$clinical_service, 'department_id'=>$depart_created->id]);
            }
        }
    }
}
