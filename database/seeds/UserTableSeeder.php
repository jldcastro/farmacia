<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Carlos',
            'email' => 'cajvalen@alumnos.ubiobio.cl',
            'password' => bcrypt('admin123'),
            'apellido_paterno' => 'Valenzuela',
            'apellido_materno' => 'San martin',
            'rut_usuario' => '17574483-5',
            'telefono' => '+56954889944',
            'estado' => 'Activo',
            'unidad_trabajo' => 'Administración',
            'cargo_id' => 1,
        ]);
    }
}
