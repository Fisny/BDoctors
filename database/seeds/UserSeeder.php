<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctorArray = [
            [
                "name" => "Paolo",
                "lastname" => "Rossi",
                "email" => "paolo.rossi@gmail.com",
                "password" => Hash::make("paolorossi"),
                "address" => "Via Boolean 37",
                "qualification" => "Dott.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Mario",
                "lastname" => "Bianchi",
                "email" => "Mario.bianchi@gmail.com",
                "password" => Hash::make("Mariobianchi"),
                "address" => "Via sanità 73",
                "qualification" => "Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Marco",
                "lastname" => "Verdi",
                "email" => "Marco.Verdi@gmail.com",
                "password" => Hash::make("MarcoVerdi"),
                "address" => "Via della salute 1337",
                "qualification" => "Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Maria",
                "lastname" => "Verdi",
                "email" => "Maria.Verdi@gmail.com",
                "password" => Hash::make("MariaVerdi"),
                "address" => "Via della Speranza 1338",
                "qualification" => "Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Luisa Laura",
                "lastname" => "Rosa",
                "email" => "Luisa.Rosa@gmail.com",
                "password" => Hash::make("LuisaRosa"),
                "address" => "Via della guarigione 12",
                "qualification" => "Dott.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Alfredo",
                "lastname" => "Esposito",
                "email" => "Alfredo.Esposito@gmail.com",
                "password" => Hash::make("AlfredoEsposito"),
                "address" => "Via Sud-Levante 92",
                "qualification" => "Dott.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Mattew",
                "lastname" => "Brown",
                "email" => "Mattew.Brown@gmail.com",
                "password" => Hash::make("MattewBrown"),
                "address" => "Via del Ponente 33A",
                "qualification" => "Dott. & Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Ottavio",
                "lastname" => "Alberata",
                "email" => "Ottavio.Alberata@gmail.com",
                "password" => Hash::make("OttavioAlberata"),
                "address" => "Via del Corso 37",
                "qualification" => "Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Elisabetta",
                "lastname" => "Tudor",
                "email" => "Elisabetta.Tudor@gmail.com",
                "password" => Hash::make("ElisabettaTudor"),
                "address" => "Via Del Regno Unito 11R",
                "qualification" => "Dott.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            [
                "name" => "Giulia",
                "lastname" => "Gialli",
                "email" => "Giulia.Gialli@gmail.com",
                "password" => Hash::make("GiuliaGialli"),
                "address" => "Piazza del Colore 23",
                "qualification" => "Prof.",
                "profile_pic" => "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png",
                "cv" => "",
            ],
            
        ];

        foreach ($doctorArray as $doctor) {

            $doctorObject = new User();

            $doctorObject->name=$doctor['name'];
            $doctorObject->lastname=$doctor['lastname'];
            $doctorObject->email=$doctor['email'];
            $doctorObject->password=$doctor['password'];
            $doctorObject->address=$doctor['address'];
            $doctorObject->qualification=$doctor['qualification'];
            $doctorObject->profile_pic=$doctor['profile_pic'];
            $doctorObject->cv=$doctor['cv'];

            $doctorObject->save();
        }

    }
}
