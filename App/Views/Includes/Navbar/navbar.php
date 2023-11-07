<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--<title>Dashboard Sidebar Menu</title>-->

</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">Fucinho's</span>
                    <span class="profession">Petshop</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-user-plus icon'></i>
                            <span class="text nav-text">Adicionar</span>
                        </a>
                    </li>
                    <div class="submenu">
                    <div>
                        <li class="nav-link sub-item">
                            <a href="/cliente/cadastro">
                                <i class='bx bx-user-plus icon' style="visibility: hidden;"></i>
                                <span class="text nav-text">Cliente</span>
                            </a>
                        </li>
                    </div>
                    <div>
                        <li class="nav-link sub-item">
                            <a href="/animal/cadastro">
                                <i class='bx bx-user-plus icon' style="visibility: hidden;"></i>
                                <span class="text nav-text">Animal</span>
                            </a>
                        </li>
                    </div>
                    </div>
                    <li class="nav-link">
                        <a href="/produto/cadastro">
                            <i class='bx bxs-package icon'></i>
                            <span class="text nav-text">Estoque</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-dog icon'></i>
                            <span class="text nav-text">Serviços</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/venda/cadastro">
                            <i class='bx bxs-cart-add icon'></i>
                            <span class="text nav-text">Nova venda</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="/funcionario/login">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Sair</span>
                    </a>
                </li>
            </div>
        </div>


    </nav>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>

</body>

</html>