<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Google Font Import - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            /* ===== Colors ===== */
            --body-color: #FFF;
            --sidebar-color: #DAF4F1;
            --primary-color: #1aae9f;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #1aae9f;

            /* ====== Transition ====== */
            --tran-03: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.3s ease;
            --tran-05: all 0.3s ease;
        }

        body {
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }

        body.dark {
            --body-color: #18191a;
            --sidebar-color: #242526;
            --primary-color: #3a3b3c;
            --primary-color-light: #3a3b3c;
            --toggle-color: #fff;
            --text-color: #ccc;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
            z-index: 100;
        }

        .sidebar.close {
            width: 88px;
        }

        /* ===== Reusable code - Here ===== */
        .sidebar li {
            height: 50px;
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .sidebar header .image,
        .sidebar .icon {
            min-width: 80px;
            border-radius: 6px;
        }

        .sidebar .icon {
            min-width: 60px;
            border-radius: 6px;
            height: 110%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .sidebar .text,
        .sidebar .icon {
            color: var(--text-color);
            transition: var(--tran-03);
        }

        .sidebar .text {
            font-size: 17px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 1;
        }

        .sidebar.close .text {
            opacity: 0;
        }

        /* =========================== */

        .sidebar header {
            position: relative;
        }

        .sidebar header .image-text {
            display: flex;
            align-items: center;
        }

        .sidebar header .logo-text {
            display: flex;
            flex-direction: column;
        }

        header .image-text .name {
            margin-top: 2px;
            font-size: 18px;
            font-weight: 600;
        }

        header .image-text .profession {
            font-size: 16px;
            margin-top: -2px;
            display: block;
        }

        .sidebar header .image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar header .image img {
            width: 40px;
            border-radius: 6px;
        }

        .sidebar header .toggle {
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            transition: var(--tran-05);
        }

        body.dark .sidebar header .toggle {
            color: var(--text-color);
        }

        .sidebar.close .toggle {
            transform: translateY(-50%) rotate(0deg);
        }

        .sidebar .menu {
            margin-top: 40px;
        }

        .sidebar li.search-box {
            border-radius: 6px;
            background-color: var(--primary-color-light);
            cursor: pointer;
            transition: var(--tran-05);
        }

        .sidebar li.search-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            background-color: var(--primary-color-light);
            color: var(--text-color);
            border-radius: 6px;
            font-size: 17px;
            font-weight: 500;
            transition: var(--tran-05);
        }

        .sidebar li a {
            list-style: none;
            height: 100%;
            background-color: transparent;
            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
        }

        .sidebar li a:hover {
            background-color: var(--primary-color);
        }

        .sidebar li a:hover .icon,
        .sidebar li a:hover .text {
            color: var(--sidebar-color);
        }

        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text {
            color: var(--text-color);
        }

        .sidebar .menu-bar {
            height: calc(100% - 55px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: scroll;
        }

        .sidebar .menu-bar .menu-links{
            margin-left: -30px;
        }

        .sidebar .menu-bar .menu-links div {
            background-color: #1aae9f;
            margin: 0;
            padding: 0;
        }

        .sidebar .menu-bar .menu-links div li a span {
            font-size: 15px;
            color: #fff;
        }

   
        .menu-bar::-webkit-scrollbar {
            display: none;
        }

        .sidebar .menu-bar .mode {
            border-radius: 6px;
            background-color: var(--primary-color-light);
            position: relative;
            transition: var(--tran-05);
        }

        .menu-bar .mode .sun-moon {
            height: 50px;
            width: 60px;
        }

        .mode .sun-moon i {
            position: absolute;
        }

        .mode .sun-moon i.sun {
            opacity: 0;
        }

        body.dark .mode .sun-moon i.sun {
            opacity: 1;
        }

        body.dark .mode .sun-moon i.moon {
            opacity: 0;
        }

        .menu-bar .bottom-content .toggle-switch {
            position: absolute;
            right: 0;
            height: 100%;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
        }

        .toggle-switch .switch {
            position: relative;
            height: 22px;
            width: 40px;
            border-radius: 25px;
            background-color: var(--toggle-color);
            transition: var(--tran-05);
        }

        .switch::before {
            content: '';
            position: absolute;
            height: 15px;
            width: 15px;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            background-color: var(--sidebar-color);
            transition: var(--tran-04);
        }

        body.dark .switch::before {
            left: 20px;
        }

        .home {
            position: relative;
            top: 0;
            top: 0;
            height: 100vh;
            margin-left: 230px;
            width: calc(100% - 250px);
            background-color: var(--body-color);
            transition: var(--tran-03);
        }

        .home .text {
            font-size: 35px;
            font-weight: 500;
            color: var(--text-color);
            padding: 12px 60px;
        }
        

        .sidebar.close~.home {
            margin-left: 78px;
            height: 100vh;
            transition: var(--tran-04);
        }

        body.dark .home .text {
            color: var(--text-color);
        }

        form {
            width: 100%;
            height: 100%;
            line-height: 18px;
            justify-content: center;
            align-items: center;
            font-size: 20px;

        }

        .form-cliente {
            /*width: 700px;
            height: 40vh;*/
            line-height: 18px;
            font-size: 20px;
        }

        #form-animal {
            width: 1000px;
            height: 40vh;
            line-height: 18px;
            justify-content: center;
            align-items: center;
            margin: 20vh auto;
            font-size: 20px;
        }

        #btn-enviar {
            background-color: #1aae9f;
            border-color: #1aae9f;
            width: 100%;
        }

        .login {
            justify-content: center;
            display: flex;
            align-items: center;
            flex-direction: column;
            line-height: 10px;
        }

        #img_fucinhos_login {
            margin-top: 13%;
            width: 20%;
        }

        #form_login {
            margin-top: 1%;
        }

        .conteudo {
            margin-left: 60px;
        }

        #btn-venda {
            position: relative;
            right: 0;
            bottom: 0;
            width: 80px;
            height: 80px;
            border-radius: 15px;
            background: #1aae9f;
            margin-left: 95%;
            border-width: 0;
            margin-top: 100px;
            transition: width 0.7s;
        }

        #btn-venda:hover {
            width: 150px;
        }

        #btn-venda svg {
            scale: 180%;
            margin-bottom: 7px;
        }

        .btn-venda i p {
            font-size: 20px;
            color: #d1efec;
            visibility: hidden;
        }

        .modal {
            padding: 0;
            margin: 0;
        }

        .tudo {
            display: flex;
            flex-direction: column;
        }

        #btn-cliente{
            background-color: #1aae9f;
            border: #1aae9f;
            font-size: 15px;
            margin-left: 58px;
            margin-top: 20px;
        }

        #list-cliente{
            margin-left: -280px;
            margin-top:10px;
        }

        #list-cliente{
            margin-left: -280px;
            margin-top:10px;
        }

        .sidebar .menu-bar .menu-links .submenu{
            display: flex;
            flex-direction: column;
            height: 100px;
            opacity: 100%;
            transition: var(--tran-03);
        }

        .sidebar .menu-bar .menu-links .submenu div li{
            margin:0;
            padding: 0;
            transition: var(--tran-03);
        }

        .sidebar.close .menu-bar .menu-links .submenu{
            height: 0px;
            opacity: 0%;
            transition: var(--tran-03);
        }

        
    </style>
</head>