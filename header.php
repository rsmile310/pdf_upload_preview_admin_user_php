<?php 
        @session_start();
        // $_SESSION['id']="null";
 ?>
<html>
        <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='assets/fontawesome/a076d05399.js'></script>        
                  <style id="compiled-css" type="text/css">
                        .my_container{
                                box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                        }
                    :root {
                  --input-padding-x: 1.5rem;
                  --input-padding-y: .75rem;
                        }
                        body{
                                box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                        }
                        .content {
                          background-image:url("assets/images/content-bg3.png")        ;
                         background-size:85% 100%;                
                        }
                        table td,th{
                                text-align:center;
                        }

                        .card-signin {
                          border: 0;
                          border-radius: 1rem;
                          box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
                          overflow: hidden;
                        }

                        .card-signin .card-title {
                          margin-bottom: 2rem;
                          font-weight: 300;
                          font-size: 1.5rem;
                        }
                        .card-signin .card-body {
                          padding: 2rem;
                        }

                        .form-signin {
                          width: 100%;
                        }

                        .form-signin .btn {
                          font-size: 80%;
                          border-radius: 5rem;
                          letter-spacing: .1rem;
                          font-weight: bold;
                          padding: 1rem;
                          transition: all 0.2s;
                        }

                        .form-label-group {
                          position: relative;
                          margin-bottom: 1rem;
                        }

                        .form-label-group input {
                          height: auto;
                          border-radius: 2rem;
                        }

                        .form-label-group>input,
                        .form-label-group>label {
                          padding: var(--input-padding-y) var(--input-padding-x);
                        }

                        .form-label-group>label {
                          position: absolute;
                          top: 0;
                          left: 0;
                          display: block;
                          width: 100%;
                          margin-bottom: 0;
                          /* Override default `<label>` margin */
                          line-height: 1.5;
                          color: #495057;
                          border: 1px solid transparent;
                          border-radius: .25rem;
                          transition: all .1s ease-in-out;
                        }

                        .form-label-group input::-webkit-input-placeholder {
                          color: transparent;
                        }

                        .form-label-group input:-ms-input-placeholder {
                          color: transparent;
                        }

                        .form-label-group input::-ms-input-placeholder {
                          color: transparent;
                        }

                        .form-label-group input::-moz-placeholder {
                          color: transparent;
                        }

                        .form-label-group input::placeholder {
                          color: transparent;
                        }

                        .form-label-group input:not(:placeholder-shown) {
                          padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
                          padding-bottom: calc(var(--input-padding-y) / 3);
                        }

                        .form-label-group input:not(:placeholder-shown)~label {
                          padding-top: calc(var(--input-padding-y) / 3);
                          padding-bottom: calc(var(--input-padding-y) / 3);
                          font-size: 12px;
                          color: #777;
                        }
                        input[type=search]{
                                padding: .375rem .75rem;
                                font-size: 1rem;
                                font-weight: 400;
                                line-height: 1.5;
                                color: #495057;
                                background-color: #fff;
                                background-clip: padding-box;
                                border: 1px solid #ced4da;
                                border-radius: .25rem;
                                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                        }
                        input[type=search]:focus{
                                color: #495057;
                                background-color: #fff;
                                border-color: #80bdff;
                                outline: 0;
                                box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
                        } 
                        .f-20{
                                font-size:20px;
                        }
                        .bg-grey{
                                background:#2C3B56;
                        }
                        .dataTables_wrapper div{
                                margin-left:0 !important;
                                margin-right:0 !important;
                        }
                        /* footer{
                                position:fixed;
                                bottom:0;
                                width:100%;
                        } */
                        .user_del_msg,
                        .report_del_msg{
                                position:fixed;
                                right:5px;
                                top:5px;
                                z-index:5;
                        }
                        #wpforo #wpforo-wrap .wpforo-forum-icon {
                                display: block !important;
                        }

                        @media screen and (max-width: 620px)
                                #wpforo #wpforo-wrap .wpfl-1 .wpforo-forum-info {
                                width: auto !important;
                        }
                  </style>
                  <script id="insert"></script>
        </head>
        <body>
                <div class="my_container container px-0">
                        <header class="mx-3 d-flex" style="border-bottom:2px solid #2C3B56">
                                <div>
                                        <img class="py-3" src="assets/images/logo.png" alt="" style="width:200px;">
                                </div>
                                <div class="ml-auto my-auto">
                                        <?php
                                                if(isset($_SESSION["id"])){
                                        ?>
                                        <ul class="nav justify-content-end">
                                                <li class="nav-item">
                                                        <h4>
                                                                <a class="nav-link" href="controller/logout.php" title="Logout">Log out</a>
                                                        </h4>
                                                </li>
                                        </ul>
                                        <?php } ?>
                                </div>
                        </header>