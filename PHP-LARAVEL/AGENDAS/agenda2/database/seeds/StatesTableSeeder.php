<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['id' => 1, 'country_id' => 1, 'name' => 'Acre', 'uf' => 'AC'],
            ['id' => 2, 'country_id' => 1, 'name' => 'Alagoas', 'uf' => 'AL'],
            ['id' => 3, 'country_id' => 1, 'name' => 'Amazonas', 'uf' => 'AM'],
            ['id' => 4, 'country_id' => 1, 'name' => 'Amapá', 'uf' => 'AP'],
            ['id' => 5, 'country_id' => 1, 'name' => 'Bahia', 'uf' => 'BA'],
            ['id' => 6, 'country_id' => 1, 'name' => 'Ceará', 'uf' => 'CE'],
            ['id' => 7, 'country_id' => 1, 'name' => 'Distrito Federal', 'uf' => 'DF'],
            ['id' => 8, 'country_id' => 1, 'name' => 'Espírito Santo', 'uf' => 'ES'],
            ['id' => 9, 'country_id' => 1, 'name' => 'Goiás', 'uf' => 'GO'],
            ['id' => 10, 'country_id' => 1, 'name' => 'Maranhão', 'uf' => 'MA'],
            ['id' => 11, 'country_id' => 1, 'name' => 'Minas Gerais', 'uf' => 'MG'],
            ['id' => 12, 'country_id' => 1, 'name' => 'Mato Grosso do Sul', 'uf' => 'MS'],
            ['id' => 13, 'country_id' => 1, 'name' => 'Mato Grosso', 'uf' => 'MT'],
            ['id' => 14, 'country_id' => 1, 'name' => 'Pará', 'uf' => 'PA'],
            ['id' => 15, 'country_id' => 1, 'name' => 'Paraíba', 'uf' => 'PB'],
            ['id' => 16, 'country_id' => 1, 'name' => 'Pernambuco', 'uf' => 'PE'],
            ['id' => 17, 'country_id' => 1, 'name' => 'Piauí', 'uf' => 'PI'],
            ['id' => 18, 'country_id' => 1, 'name' => 'Paraná', 'uf' => 'PR'],
            ['id' => 19, 'country_id' => 1, 'name' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['id' => 20, 'country_id' => 1, 'name' => 'Rio Grande do Norte', 'uf' => 'RN'],
            ['id' => 21, 'country_id' => 1, 'name' => 'Rio Grande do Sul', 'uf' => 'RS'],
            ['id' => 22, 'country_id' => 1, 'name' => 'Rondônia', 'uf' => 'RO'],
            ['id' => 23, 'country_id' => 1, 'name' => 'Roraima', 'uf' => 'RR'],
            ['id' => 24, 'country_id' => 1, 'name' => 'Santa Catarina', 'uf' => 'SC'],
            ['id' => 25, 'country_id' => 1, 'name' => 'Sergipe', 'uf' => 'SE'],
            ['id' => 26, 'country_id' => 1, 'name' => 'São Paulo', 'uf' => 'SP'],
            ['id' => 27, 'country_id' => 1, 'name' => 'Tocantins', 'uf' => 'TO']
        ]);
    }
}
