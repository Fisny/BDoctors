<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Specialization;
use App\Sponsorship;
use App\Review;
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

        $reviewsArray = [
            [
                'user_name' => 'titti92',
                'vote' => 2,
                'text' => 'Poco professionale. Non ci tornerei.',
                'avatar' => 'https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png'
            ],
            [
                'user_name' => 'User',
                'vote' => 5,
                'text' => 'Mi sono trovato benissimo. Medico competente e disponibile.',
                'avatar' => 'https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png'
            ],
            [
                'user_name' => 'Davide',
                'vote' => 4,
                'text' => "Medico competente, peccato la parcella un po' troppo salata.",
                'avatar' => 'https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png'
            ],
            [
                'user_name' => 'Ottavio',
                'vote' => 3,
                'text' => 'Ho portato il mio gatto Bit pensando fosse un veterinario.',
                'avatar' => 'https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png'
            ],
        ];

        // foreach ($reviewsArray as $review) {
        //     $reviewObj = new Review();
        //     $reviewObj->user_name =  $review['user_name'];
        //     $reviewObj->date =  $review['date'];
        //     $reviewObj->text =  $review['text'];
        //     $reviewObj->avatar =  $review['avatar'];
        //     $reviewObj->save();
        // }

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
            $created_at = Carbon::now();
            $date_end = Carbon::now()->addHour($sponsorshipChosen->duration);
            $doctorObject->sponsorship()->attach($doctorObject, [
                'sponsorship_id' => $sponsorshipId,
                'user_id' => $doctorObject->id,
                'date_end' => $date_end,
                'created_at' => $created_at
            ]);

            for ($i = 0; $i = rand(1, 3); $i++) {
                // $index = rand(1, 4);
                $review = $reviewsArray[1];
                $reviewObj = new Review();
                $reviewObj->user_name =  $review['user_name'];
                $reviewObj->vote =  $review['vote'];
                $reviewObj->text =  $review['text'];
                $reviewObj->avatar =  $review['avatar'];
                $reviewObj->user_id = $doctorObject['id'];
                $reviewObj->save();
            }
        }
    }
}
