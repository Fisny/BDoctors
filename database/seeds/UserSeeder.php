<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Specialization;
use App\Sponsorship;
use App\Review;
use App\Message;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
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

        $specializationArray = [
            "Odontoiatria",
            "Oncologia",
            "Cardiologia",
            "Gastroenterologia",
            "Osteopatia",
            "Psicologia",
            "Anestesia",
            "Neurologia",
            "Neuro-chirurgia",
            "Urologia",
            "Ginecologia",
            "Dermatologia",
            "Chirurgia",
            "Chirurgia Estetica",
            "Psichiatria",
            "Pediatria",
            "Ematologia"
        ];


        $sponsorshipArray = [
            [
                "price" => 2.99,
                "description" => "24 ore di sponsorizzazione",
                "duration" => 24,
                "name" => "Platinum"
            ],
            [
                "price" => 5.99,
                "description" => "72 ore di sponsorizzazione",
                "duration" => 72,
                "name" => "Silver"
            ],
            [
                "price" => 9.99,
                "description" => "144 ore di sponsorizzazione",
                "duration" => 144,
                "name" => "Gold"
            ]
        ];

        $listOfSponsorshipId = [];

        foreach ($sponsorshipArray as $sponsorship) {
            $sponsorshipObject = new Sponsorship();
            $sponsorshipObject->price = $sponsorship['price'];
            $sponsorshipObject->description = $sponsorship['description'];
            $sponsorshipObject->duration = $sponsorship['duration'];
            $sponsorshipObject->name = $sponsorship['name'];
            $sponsorshipObject->save();
            $listOfSponsorshipId[] = $sponsorshipObject->id;
        }



        $listOfSpecializationId = [];

        foreach ($specializationArray as $specialization) {
            $specializationObject = new Specialization();
            $specializationObject->name = $specialization;
            $specializationObject->save();
            $listOfSpecializationId[] = $specializationObject->id;
        }


        foreach ($doctorArray as $doctor) {
            $doctorObject = new User();
            $doctorObject->name = $doctor['name'];
            $doctorObject->lastname = $doctor['lastname'];
            $doctorObject->email = $doctor['email'];
            $doctorObject->password = $doctor['password'];
            $doctorObject->address = $doctor['address'];
            $doctorObject->qualification = $doctor['qualification'];
            $doctorObject->profile_pic = $doctor['profile_pic'];
            $doctorObject->cv = $doctor['cv'];
            $doctorObject->save();


            $specializationId = array_rand(array_flip($listOfSpecializationId), rand(1, 3));
            $doctorObject->specialization()->sync($specializationId);

            $sponsorshipId = array_rand(array_flip($listOfSponsorshipId), 1);
            $sponsorshipChosen = Sponsorship::where('id', $sponsorshipId)->first();
            $date_end = Carbon::now()->addHour($sponsorshipChosen->duration);
            $doctorObject->sponsorship()->attach($sponsorshipId, [
                'date_end' => $date_end,
            ]);



            for ($i = 0; $i < rand(0, 10); $i++) {
                $review = new Review();
                $review->user_name = $faker->name();
                $review->vote = rand(1, 5);
                $review->text = $faker->paragraph(rand(1, 5));
                $review->avatar = "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png";
                $doctorObject->reviews()->save($review);
            }

            for ($i = 0; $i < rand(0, 5); $i++) {
                $message = new Message();
                $message->name = $faker->firstName();
                $message->lastname = $faker->lastName();
                $message->email = $faker->email();
                $message->text = $faker->paragraph(rand(3, 6));
                $message->avatar = "https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png";
                $doctorObject->messages()->save($message);
            }
        }
    }
}
