<?php

use Illuminate\Database\Seeder;

class HorarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Conjunto de dias en los que trabaja la academia.
    	$dias = array('lunes', 'martes', 'miercoles', 
    				  'jueves', 'viernes','sabado');
    	// Conjunto de horarios en los que trabaja la academia.
    	$horarios = array('08:00', '09:00', '10:00', 
    					  '11:00', '12:00', '13:00', 
    					  '14:00', '15:00', '16:00', 
    					  '17:00', '18:00');

		// Trabajan de 8:00 a 12:00 y de 14:00 a 18:00 de lunes a viernes, y // el sabado de 8:00 a 13:00.

		// Recorre todos los dias de la semana
    	foreach($dias as $dia){
    		// Recorre todos los posibles horarios
    		for ($i=0; $i < (count($horarios) - 1); $i++) {

    			$hora_inicio = $horarios[$i];
    			$hora_fin	 = $horarios[$i + 1];

    			if($dia != 'sabado' && ($hora_inicio != '12:00' && $hora_inicio != '13:00')) {
	    			$this->ingresarHorario($dia, $hora_inicio, $hora_fin);
	    		}else if($dia == 'sabado') {
	    			if($hora_inicio == '13:00'){
	    				return;
	    			}
	    			$this->ingresarHorario($dia, $hora_inicio, $hora_fin);
	    		}
    		}
    	}

    }

    /**
     * Ingresa en la base de datos un horario
     * en base a su dia, hora de inicio y hora
     * de finalizacion.
     *
     * @return void
     */
    private function ingresarHorario($dia, $hora_inicio, $hora_fin) {
    	DB::table('horarios')->insert([
            'dia' => $dia,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin
        ]);
    }

    
}
