<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    const NOMBRES = [
        'Gabriela', 'Laura', 'Pedro', 'Raúl', 'Fabián', 'Alejandra', 'Karina', 'Carolina', 'Rubén', 'Carlos', 'Amelia', 'Tania',
        'Carla', 'Saul', 'Jimena', 'Verónica'
    ];
    const APELLIDOS = ['Velázquez', 'Fernandez', 'Gonzalez', 'Tapia', 'Carmona', 'Alejandre', 'Cosio', 'Galvez', 'Guzmán', 'Estrada', 'Figueroa'];
    const NUM_ROWS = 25;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lenNom = count(static::NOMBRES) - 1;
        $lenApe = count(static::APELLIDOS) - 1;

        $u = new User;
        $u->email = 'krammstein@gmail.com';
        $u->name = 'Luis Dirceu Velázquez Fuentes';
        $u->password = '12345678';
        $u->updated_at = null;
        $u->created_at = date('Y-m-d H:i:s');
        $u->status = User::STATUS_ACTIVE;
        $u->save();


        /* for ($i = 0; $i < static::NUM_ROWS; $i++) {
            $e = new User();
            $nombre = static::NOMBRES[rand(0, $lenNom)];
            //$len = strlen($nombre);
            $nombre = $nombre;
            $ape_pat = static::APELLIDOS[rand(0, $lenApe)];
            $ape_mat = static::APELLIDOS[rand(0, $lenApe)];
            $e->name = $nombre . ' '. $ape_pat . ' '. $ape_mat;
            $e->email = strtolower($nombre) . rand(100, 1000) . '@gmail.com';
            $e->updated_at = null;
            $e->created_at = date('Y-m-d H:i:s');
            $e->status = User::STATUS_ACTIVE;
            $e->save();
        } */
    }
}
