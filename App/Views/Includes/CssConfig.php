<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            
        }

        body{
            width: 100%;
            height: 100%;
        }

        .sidebar{
            position: fixed;
            top: 0;
            left:0;
            height: 100%;
            width: 60px;
            background: #1aae9f;
        }

        .sidebar .logo-details{
            height: 60px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .sidebar .logo-details i{
            font-size: 30px;
            color: #d1efec;
            height: 50px;
            min-width: 55px;
            text-align: center;
            line-height: 50px;
        }


        .sidebar .nav-links{
            height: 100%;
            padding-top: 30px;
            padding-left: 0;
        }

        .sidebar .nav-links li{
            position: relative;
            list-style: none;
            transition: all 0.4s ease;
        }

        .sidebar .nav-links li:hover{
            background: #d1efec;
        }

        .sidebar .nav-links li:hover i{
            color:#1aae9f;
        }


        .sidebar .nav-links li .iocn-link{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar .nav-links li .sub-menu{
            padding: 6px 6px 14px 76px;
            margin-top: -10px;
            background: #d1efec;
            /*display: none;*/
        }

        .sidebar .nav-links li .sub-menu a{
            color:#1aae9f;
            font-size: 15px;
            padding: 5px 0;
            white-space: nowrap;
            opacity: 0.6;
            transition: all 0.3 ease;
        }

        .sidebar .nav-links li .sub-menu a:hover{
            opacity: 1;
        }

        .sidebar.close .nav-links li .sub-menu{
            position: absolute;
            left: 100%;
            top:-10px;
            margin-top: 0;
            padding: 10px 20px;
            border-radius: 0 6px 6px 0;
            transition: all 0.4s ease;
            opacity: 0;
            pointer-events: none;
        }

        .sidebar.close .nav-links li.showMenu .sub-menu{
            display: block;
        }

        .sidebar.close .nav-links li:hover .sub-menu{
            top:0;
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar .nav-links li .sub-menu.blank{
            opacity: 1;
            pointer-events: auto;
            padding: 3px 20px 6px 16px;
        }

        .sidebar .nav-links li:hover .sub-menu.blank{
            top:50%;
            transform: translateY(-50%);
        }


        .sidebar .nav-links li .sub-menu .link_name{
            display: none;
        }

        .sidebar.close .nav-links li .sub-menu .link_name{
            font-size: 18px;
            opacity: 1;
            display: block;
        }

        .sidebar .nav-links li i{
            height: 50px;
            min-width: 55px;
            text-align: center;
            line-height: 50px;
            color: #d1efec;
            font-size: 25px;
        }

        .sidebar .nav-links li a{
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        form{
            width: 100%;
            height: 100%;
            line-height:18px;
            justify-content: center;
            align-items: center;
            font-size:20px;
            
        }

        .form-cliente{
            /*width: 700px;
            height: 40vh;*/
            line-height:18px;
            font-size:20px;            
        }

        #form-animal{
            width: 1000px;
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

        .login{
            justify-content: center;
            display: flex;
            align-items: center;
            flex-direction: column;
            line-height: 10px;
        }

        #img_fucinhos_login{
            margin-top: 13%;
            width: 20%;
        }

        #form_login{
            margin-top: 1%;
        }

        .conteudo{
            margin-left: 60px;
        }
        
        #btn-venda{
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

        #btn-venda:hover{
            width: 150px;
        }

        #btn-venda svg{
            scale: 180%;
            margin-bottom: 7px;
        }

        .btn-venda i p{
            font-size: 20px;
            color: #d1efec;
            visibility: hidden;
        }

        .modal{
            padding: 0;
            margin:0;
        }

    </style>
</head>