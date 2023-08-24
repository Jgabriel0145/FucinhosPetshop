<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;
        }

        body{
            height: 100vh;
        }

        nav.menu-lateral{
            width: 70px;
            height: 100%;
            background-color: #d1efec;
            padding: 20px 0 40px 0;
            box-shadow: 3px 0 0 #a8e2dc;
            position: fixed;
            top: 0;
            left: 0;
            overflow: hidden;
        }

        nav.menu-lateral.expandir{
            width: 270px;
            transition: .3s;
        }

        .btn-expandir{
            width: 100%;
            padding-left: 10px;
        }

        .btn-expandir > i{
            width: 100%;
            padding-left: 10px;
            color: #1aae9f;
            cursor: pointer;
            font-size: 40px;
        }

        .menu-principal{
            height: 100%;
            list-style-type: none;
            width: 100%;
        }

        .menu-principal li.item-menu a {
            color: #1aae9f;
            text-decoration: none;
            font-size: 20px;
            padding: 4% 0px 4% 0;
            margin-bottom: 10px;
            margin-left: -7px;
            display: flex;
            line-height: 44px;
            width: 100%;
        }

        .menu-principal li.item-menu a .txt-link {
            margin-left: 25px;

        }

        .menu-principal li.item-menu a .icon {
            font-size: 30px;
        }

        .menu-principal li.item-menu{
            transition: .5s;
        }

        .menu-principal li.ativo{
            background-color: #1aae9f;
        }
        .menu-principal li.item-menu:hover{
            background-color: #1aae9f;
        }

        .menu-principal li.ativo a{
            color: #d1efec;
        }

        .menu-principal li.item-menu a:hover{
            color: #d1efec;
        }

        .form{
            width: 700px;
            height: 40vh;
            line-height:18px;
            justify-content: center;
            align-items: center;
            margin: 20vh auto;
            font-size:20px;
            
        }

        #btn-enviar{
            background-color: #1aae9f;
            border-color: #1aae9f;
            width: 100%;
        }
    </style>
</head>

