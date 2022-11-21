<?php

ini_set('display_errors', '1');

    if (isset($_POST['command']) && isset($_POST['server'])) {
        $comand = $_POST['command'];
        $host = $_POST['server'];

    // if(file_exists($host."/app/release_metadata.json")){
        // 	$data = file_get_contents($host."/app/release_metadata.json");
        // 	$items = json_decode($data, true);

        // 	if($items['version'] >= "3.0.1"){
        // 		$output =  shell_exec("php ".$host."/bin/console ".$comand);
        // 	}
            
        // }else{
        // 	$output =  shell_exec("php ".$host."/app/console ".$comand);
        // }
    } else {
        $output ="";
        $comand = "";
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mrktic Cron Runner</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">
        <div class="navbar jumbotron">
            <div id="loadingBox">
                <div id="loadingImg"></div>
            </div>
            <div class="col-sm-12 mb-5 logo">
                <a href="https://mrktic.com/crones">
                    <img src="https://mrktic.com/images/logo.png">
                </a>
            </div>
            <div class="col-sm-12 mb-5">
                <h1>Mrktic Cron Runner</h1>
                <select id="server" name="server" class="btn btn-primary float-left ml-3 mrktic-line">
                    <?php
                        $hosts = ["35.198.80.32", "104.155.7.120", "104.199.74.132", "35.205.108.231", "35.187.34.195"];
                        //$host = $_POST['server'];

                        foreach ($hosts as $host) {
                            switch ($host) {
                                case "35.205.108.231":
                                $hostname = "Instancia Propia";
                                break;
                                case "104.155.7.120":
                                $hostname = "Obi One";
                                break;
                                case "35.198.80.32":
                                $hostname = "C3P0";
                                break;
                                case "35.187.34.195":
                                $hostname = "R2D2";
                                break;
                                default:
                                $hostname =  $host;
                                break;
                                }

                            echo ("<option ".$hostname." value='".$host."'>".$hostname."</option>");
                        }






                        // foreach ($hosts as $host) {
                        //     if ($host != $hosts[0]){echo ("--------------");};
                        //     $dir = new DirectoryIterator($host.'/var/www/html');
                                               
                        //     foreach ($dir as $cleanDir) {
                        //         if ($cleanDir->isDir()) {
                        //             $cleanDir;
                        //         }
                        //     }

                        //     foreach ($cleanDir as $carpeta) {
                        //         $fullDir = "/var/www/html/".$carpeta;
                        //         if ($fullDir == $host) {
                        //             $selected = "selected";
                        //         } else {
                        //             $selected = "";
                        //         }
                                                    
                        //         if ($carpeta->isDir() && !$carpeta->isDot()) {
                        //             if (substr_count($carpeta, '.') > 1) {
                        //                 echo "<option ".$selected." value='".$host."/var/www/html/".$carpeta."'>".$carpeta."</option>";
                        //             }
                        //         }
                        //     }
                        // }


                        // switch ($_SERVER['HTTP_HOST']) {
                        // case "35.205.108.231":
                        // echo "Instancia Propia";
                        // break;
                        // case "104.155.7.120":
                        // echo "Obi One";
                        // break;
                        // case "35.198.80.32":
                        // echo "C3P0";
                        // break;
                        // case "35.187.34.195":
                        // echo "R2D2";
                        // break;
                        // }
                    ?>
                </select>
            </div>
            <div class="col-sm-12">
                <h2>Ejecutar crones</h2>
            </div>
            <div class="col-sm-12">
                <form action="?" method="post" enctype="multipart/form-data">
                    <div class="container-full">
                        <p class="float-left mrktic-line mb-0">Mautics disponibles:</p>
                        <select id="server" name="server" class="btn btn-primary float-left ml-3 mrktic-line">


                            <?php

                                // $dir = new DirectoryIterator('/var/www/html');

                                // foreach ($dir as $cleanDir) {
                                //     if ($cleanDir->isDir()) {
                                //         $cleanDir;
                                //     }
                                // }

                                // foreach ($cleanDir as $carpeta) {
                                //     $fullDir = "/var/www/html/".$carpeta;
                                //     if ($fullDir == $host) {
                                //         $selected = "selected";
                                //     } else {
                                //         $selected = "";
                                //     }
                                    
                                //     if ($carpeta->isDir() && !$carpeta->isDot()) {
                                //         if (substr_count($carpeta, '.') > 1) {
                                //             echo "<option ".$selected." value='".$host."/var/www/html/".$carpeta."'>".$carpeta."</option>";
                                //         }
                                //     }
                                // }
                            ?>
                        </select>
                    </div>

                    <div class="container-full">
                        <p class="float-left mrktic-line mb-0">Crones:</p>
                        <select id="command" name="command" class="btn btn-primary float-left ml-3 mrktic-line">
                            <option <?php if ($comand =="mautic:segments:update") {
                                echo "selected";
                            }?>
                                value="mautic:segments:update">Actualización de segmentos
                            </option>
                            <option <?php if ($comand =="mautic:campaigns:rebuild") {
                                echo "selected";
                            }?>
                                value="mautic:campaigns:rebuild">Recostrucción de campañas
                            </option>
                            <option <?php if ($comand =="mautic:campaigns:trigger") {
                                echo "selected";
                            }?>
                                value="mautic:campaigns:trigger">Aplicación de actualizaciones
                            </option>
                            <option <?php if ($comand =="mautic:emails:send") {
                                echo "selected";
                            }?>
                                value="mautic:emails:send">Envío de emails
                            </option>
                            <option <?php if ($comand =="mautic:email:fetch") {
                                echo "selected";
                            }?>
                                value="mautic:email:fetch">Info mails rebotados
                            </option>
                            <option <?php if ($comand =="social:monitor:twitter:hashtags") {
                                echo "selected";
                            }?>
                                value="social:monitor:twitter:hashtags">Actualización de hashtags
                            </option>
                            <option <?php if ($comand =="mautic:import") {
                                echo "selected";
                            }?>
                                value="mautic:import">Mautic Import
                            </option>
                            <option <?php if ($comand =="cache:clear") {
                                echo "selected";
                            }?>
                                value="cache:clear">Limpiar caché
                            </option>
                        </select>
                    </div>

                    <input class="btn btn-primary mt-2" type="submit" id="run" value="Ejecutar">
                </form>
            </div>

            <div class="col-sm-12 mt-5">
                <h2>Resultado</h2>
                <div id="output" class="jumbotron bg-faded p-3 mt-3">
                    <pre>
                    <?php
                        echo $output;
                    ?>
                </pre>
                </div>
            </div>
        </div>

    </div>
    <style>
        .container-full {
            margin: 0 auto;
            width: 100%;
            display: inline-block;
        }

        .btn-primary {
            background-color: #EB4947;
            border-color: #EB4947;
        }

        select option {
            background-color: white;
            color: #212529;
        }

        .btn-primary:hover {
            background-color: #EB4947;
            border-color: #EB4947;
        }

        .bg-faded {
            background-color: #f7f7f7;
        }

        .mrktic-line {
            line-height: 2.2rem;
        }

        #loadingImg {
            background: url(img/loading.gif);
            background-repeat: no-repeat;
            background-size: 420px;
            width: 100%;
            height: 100%;
            position: absolute;
            left: calc(50% - 210px);
            top: 200px;
        }

        #loadingBox {
            display: none;
            background: rgba(255, 255, 255);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.5;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#run').click(function() {
                $("#loadingBox").show();
            });
        });
    </script>
</body>

</html>