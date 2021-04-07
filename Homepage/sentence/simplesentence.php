<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    header('location: ../authen/signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Sentence & Translate</title>


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- cdn font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../index.php">
                    <div class="navbar-brand">
                        <i class="fas fa-home" style=" font-size:26px;color:#555;"></i>
                        Home
                    </div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- <a href="#">
              Dashboard
            </a> -->
                    </li>

                    <li>
                        <a href="openpaper.php">
                            Simple sentence & translate
                        </a>
                    </li>
                    <li>
                        <a href="../search/searchpage.php">
                            Search
                        </a>
                    </li>
                    <li>
                        <a href="../bibliography/startbootstrap-landing-page-master/index.php">
                            Bibliography
                        </a>
                    </li>
                    <li>
                        <a href="../note/allnote.php">
                            Note
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="my-image-icon user">
                                <i class="fas fa-user"></i>
                            </span>
                            <?php echo $_SESSION['username'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="../webservice/authen/logout.php">Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="containerBody">
        <div class="w3-padding">
            <i class="far fa-copy" style="font-size:64px;"></i>
            <font style="position:relative;">Simple sentence & translate</font>
        </div>
        <div class="leftBody">
            <form id="my-form" method="POST" action="simplesentence.php?action=ok">
                <textarea class="form-control textbox-r" name="inserttxt" id="inserttxt">
                    <?php
                    if (isset($_POST["inserttxt"])) {
                        echo $_POST["inserttxt"];
                    } else {
                        echo " ";
                    }
                    ?>
                </textarea>
                <input class="sentence" type="submit" name="buttonPastofSentence" id="buttonPastofSentence" value="Simple Sentence">

        </div>

        <input class="translate" type="submit" name="buttonTranslate" id="buttonTranslate" value="Translate">
        <!-- <button class="translate" type="submit" name="buttonTranslate" id="buttonTranslate">Translate</button> -->

        <div class="rightBody">
            <textarea class="form-control textbox-l" name='showtext' rows='10' cols='72'>
                <?php
                if (isset($_POST["buttonTranslate"])) {
                    include("translate.php");
                } else if (isset($_POST["buttonPastofSentence"])) {
                    include("runpython.php");
                } else {
                    echo " ";
                }
                ?>
            </textarea>
            </form>
        </div>
    </div>

    <style>
        .sentence {
            padding: 8px 15px;
            font-size: 16px;
            color: white;
            background: #5bc0de;
            border: none;
            border-radius: 2px;
            position: absolute;
            margin-top: 400px;
            margin-left: 480px;

        }

        .translate {
            padding: 8px 35px;
            font-size: 16px;
            color: white;
            background: #5bc0de;
            border: none;
            border-radius: 2px;
            margin-top: 400px;
            position: absolute;
            margin-left: 10px;
        }

        .form-control.textbox-r {
            height: 250px;
            width: 600px;
            float: right;
            align: center;
            margin-top: 60px;
            margin-right: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 2px 1.5px #E5E5E5;
        }

        .form-control.textbox-l {
            height: 250px;
            width: 600px;
            float: left;
            align: center;
            margin-top: 60px;
            margin-left: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 2px 1.5px #E5E5E5;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .containerBody {
            background-color: white;
            height: 100%;
            width: auto;
        }

        .leftBody {
            background-color: white;
            float: left;
            width: 50%;
            height: 541px;
            text-align: center;
        }

        .rightBody {
            background-color: white;
            float: right;
            width: 50%;
            height: 541px;
        }

        .bottomBody {
            background-color: rgb(249, 249, 249);
            position: fixed;
            bottom: 0px;
            float: right;
            width: 100%;
            height: 110px;
            text-align: left;
        }

        .w3-padding {
            background-color: white;
            color: #555;
            margin-bottom: 15px;
            margin-top: 30px;
            margin-left: 50px;
            font-size: 36px;
        }

        /* .fixed {
        max-height: 360px;
        max-width:98%;
        position: center;
      } */
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#my-form').on('submit', function(e) {

                var text = $('#inserttxt').val().trim();
                console.log(text);
                if (text == '') {
                    e.preventDefault();
                    swal("กรุณากรอกข้อมูล!", {
                        icon: "warning",
                    });
                }

            });
        });
    </script>



</body>

</html>