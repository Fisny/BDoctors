<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>footer</title>
    <link rel="stylesheet" href="footer.css">
</head>
<body>

    <footer>
        <div class="contain">
            <div class="container">
                <div class="row">

                    <div class="immagine">
                        <img src="../img/biancoBlu-xs.png" alt="" class="immagine-footer">
                    </div>

                    <!-- left -->
                    <div class="form col-6 col-md-4 col-12">
                        <h1>BDoctors</h1>
                        <div>
                            <a href="{{ url('/') }}" class="white">I nostri dottori <i class="fas fa-arrow-right"></i></a>
                        </div>
                        
                        <div>
                            <a href="{{ url('/info') }}" class="white">I nostri Contributors <i class="fas fa-arrow-right"></i></a>
                        </div>
                        
                        <p>BDoctors offre una vasta gamma di professionisti del settore.</p>
                    </div>

                    <!-- mid -->
                    <div class="form col-6 col-md-4 col-12">
                        <h1>Seguici</h1>
                        <p><a href="https://www.facebook.com/boolean.careers" class="white"><i class="fab fa-facebook-square"></i> Facebook</a></p>
                        <p><a href="https://www.linkedin.com/school/boolean-careers/" class="white"><i class="fab fa-linkedin"></i> Linkedin</a></p>
                        <p><a href="https://www.instagram.com/boolean.careers/" class="white"><i class="fab fa-instagram"></i> Instagram</a></p>
                        <p><a href="https://www.youtube.com/channel/UCN0mktfmWySUg3OmvHKrdcQ" class="white"><i class="fab fa-youtube"></i> Youtube</a></p>
                    </div>

                    <!-- rightt -->
                    <div class="form col-6 col-md-4 col-12"> 
                        <h1>Conttattaci</h1>
                        <p><i class="fas fa-map-marker-alt"></i> Piazzale Giovanni dalle Bande</p>
                        <p><i class="fas fa-road"></i> Nere, 9 20146, Milano</p>
                        <p><i class="fas fa-phone-alt"></i> 0240031288</p>
                        <p><i class="far fa-envelope"></i> Boolean Careers</p>
                    </div>

                    <p class="cp">Copyright © BDOCTORS™ 2021</p>

                </div>
            </div>
        </div>
    </footer>

    <style>

        footer{
            --transition-speed: 600ms;
            color: white;
        }
            .contain{
                background-color: #2c292f;
                width: 100%;
                margin-top: 50px;
            }
            
            .immagine-footer{
                width: 50px;
                margin: 50px 0;
                transition: var(--transition-speed);
            }

            .immagine-footer:hover{
                width: 55px;
            }
            

            .form{
                transition: var(--transition-speed);
                border-left: 1px solid white;
                margin-bottom: 50px;
                
            }

            h1{
                margin-bottom: 20px;
                transition: var(--transition-speed);
            }
            
            h1:hover{
                font-size: 42px;
                color: #0078e0;
            }

            a{
                
                transition: var(--transition-speed);
            }
            
            a:hover{
                color: #0078e0;
            }

            .fa-arrow-right{
                transition: var(--transition-speed);
            }

            .fa-arrow-right:hover{
                padding-left: 30px;
            }
            
            .white{
                color: white;
                
            }

            .white:hover{
                text-decoration: none;
                color: #00ffbb;
            }

            i{
                color: turquoise;
                font-size: 12px;
            }

            .fa-arrow-right{
                font-size: 12px;
            }
            .fa-facebook-square{
                font-size: 12px;
                transition: var(--transition-speed);
            }
            .fa-facebook-square:hover{
                padding-right: 30px;
            }
            .fa-linkedin{
                font-size: 12px;
                transition: var(--transition-speed);
            }
            .fa-linkedin:hover{
                padding-right: 30px;
            }
            .fa-instagram{
                font-size: 12px;
                transition: var(--transition-speed);
            }
            .fa-instagram:hover{
                padding-right: 30px;
            }
            .fa-youtube{
                font-size: 12px;
                transition: var(--transition-speed);
            }
            .fa-youtube:hover{
                padding-right: 30px;
            }
            .fa-map-marker-alt:before{
                font-size: 12px;
            }
            .fa-road:before{
                font-size: 12px;
            }
            .fa-phone-alt:before{
                font-size: 12px;
            }
            .fa-envelope:before{
                font-size: 12px;
            }
            
            .cp{
                margin-top: 15px;
                margin-bottom: 95px;
                text-align: center;
            }

            @media only screen and (max-width: 596px) {
                .immagine, .form {
                    text-align: center;
                    transition: var(--transition-speed);
                    border-left: 0px;
                }
            }

    </style>

</body>

</html>