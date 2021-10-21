<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWSPAPER</title>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    
        <nav class="navbardi">
            <ul class="navbardi-nav">
            <li class="logo">
                <a href="{{ url('/') }}" class="navbardi-link">
                <span class="link-text logo-text"><img src="../img/bianco.png" alt="" class="navbardi-logo"></span>
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon=""
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                        class="fa-primary"
                    ></path>
                    </g>
                </svg>
                </a>
            </li>

            <li class="navbardi-item">
                <a href="{{ url('/dashboard_home') }}" class="navbardi-link">
                <i class="fas fa-clinic-medical"></i>
                <span class="link-text"><b>Dashboard</b></span>
                </a>
            </li>

            <li class="navbardi-item">
                <a href="{{ url('/sponsorship') }}" class="navbardi-link">
                <i class="fas fa-money-check"></i>
                <span class="link-text"><b>Premium</b></span>
                </a>
            </li>

            <li class="navbardi-item">
                <a href="{{ url('/info') }}" class="navbardi-link">
                <i class="fas fa-info"></i>
                <span class="link-text"><b>About us</b></span>
                </a>
            </li>
            @php
            use Illuminate\Support\Facades\Auth;
            $loggedUser = Auth::id();
            @endphp
            @if (Auth::check())
            <li class="navbardi-item">
                <a href="{{ url('show/'.$loggedUser) }}" class="navbardi-link">
                <i class="fas fa-user"></i>
                <span class="link-text"><b>Profilo</b></span>
                </a>
            </li>
            @endif



            <li class="navbardi-item" id="themeButton">
                
            </li>
            </ul>
        </nav>

        <style>

           
            
            :root {
                text-decoration: none;
                font-size: 16px;
                font-family: 'Open Sans';
                --text-primary: #b6b6b6;
                --text-secondary: #ececec;
                --bg-primary: rgb(0, 77, 145);
                --bg-secondary: #0078e0;
                --transition-speed: 600ms;
            }
            

            a{
                text-decoration: none;
            }
            .navbardi-logo{
                width: 60%;
            }

            i{
                font-size: 30px;
            }

            body {
                margin: 0;
                padding: 0;
            }
            
            body::-webkit-scrollbar {
                width: 0.25rem;
            }
            
            body::-webkit-scrollbar-track {
                background: #C4FFF9;
            }
            
            body::-webkit-scrollbar-thumb {
                background: #07BEB8;
            }
            
            main {
                margin-left: 5rem;
                padding: 1rem;
            }
            
            .navbardi {
                position: fixed;
                background-color: var(--bg-primary);
                transition: width 600ms ease;
                overflow: hidden;
            }
            
            .navbardi-nav {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                height: 100%;
            }
            
            .navbardi-item {
                width: 100%;
            }
            
            .navbardi-item:last-child {
                margin-top: auto;
            }
            
            .navbardi-link {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 5rem;
                color: var(--text-primary);
                text-decoration: none;
                filter: grayscale(100%) opacity(0.7);
                transition: var(--transition-speed);
            }
            
            .navbardi-link:hover {
                filter: grayscale(0%) opacity(1);
                background: var(--bg-secondary);
                color: var(--text-secondary);
                transition: var(--transition-speed);
                height: 110px;
            }
            
            .link-text {
                display: none;
                margin-left: 1rem;
                text-decoration: none;
            }
            
            .navbardi-link svg {
                width: 2rem;
                min-width: 2rem;
                margin: 0 1.5rem;
            }
            

            /* hover */
            .fa-primary {
                color: #00aeff;
            }
            
            .fa-secondary {
                color: #ffffff;
            }
            
            .fa-primary,
            .fa-secondary {
                transition: var(--transition-speed);
            }
            
            .logo {
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 1rem;
                text-align: center;
                color: var(--text-secondary);
                background: var(--bg-secondary);
                font-size: 1.5rem;
                letter-spacing: 0.3ch;
                width: 100%;
            }
            a.navbardi-link{
                text-decoration: none;
            }
            .logo svg {
                transform: rotate(0deg);
                transition: var(--transition-speed);
            }
            
            .logo-text
            {
                display: inline;
                position: absolute;
                left: -999px;
                transition: var(--transition-speed);
            }
            
            .navbardi:hover .logo svg {
                transform: rotate(-180deg);
            }
            
            /* Small screens */
            @media only screen and (max-width: 600px) {
                .navbardi {
                bottom: 0;
                width: 100vw;
                height: 5rem;
                }
            
                .logo {
                display: none;
                }
            
                .navbardi-nav {
                flex-direction: row;
                }
            
                .navbardi-link {
                justify-content: center;
                }
            
                main {
                margin: 0;
                }
            }
            
            /* Large screens */
            @media only screen and (min-width: 600px) {
                .navbardi {
                bottom: 0;
                width: 5rem;
                height: 100vh;
                }
            
                .navbardi:hover {
                width: 16rem;
                }
            
                .navbardi:hover .link-text {
                display: inline;
                text-decoration: none;
                }
            
                .navbardi:hover .logo svg
                {
                margin-left: 11rem;
                }
            
                .navbardi:hover .logo-text
                {
                left: 0px;
                }

                
            }

        </style>
</body>

</html>