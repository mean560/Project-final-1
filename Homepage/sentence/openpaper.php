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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper</title>


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- cdn font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="openpapercss.css">

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
    <div class="middle">
        <aside class="left">
            <div class="middle_right" align="left">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-xs-12">
                        <!-- <form method="post" enctype="multipart/form-data"> -->
                            <div class="form-upload">
                                <i class="fas fa-file-upload" style="font-size:54px;"></i>
                                <font style="font-size:32px;">Upload File</font>
                                <input type="hidden" value="1000000000" name="MAX_FILE_SIZE" />
                            </div>
                            <div class="form-file">
                                <input type="file" name="uploadfile" />
                            </div>
                            <input type="submit" id="submitUpload" name="submitUpload" value="Upload" class="btn"/>

                        <!-- </form> -->

                    </div>

                    <?php
                    if (isset($_POST['submitUpload'])) {
                        // $count++;
                        
                        $target_path = "../uploads/";
                        $target_path = $target_path . basename($_FILES['uploadfile']['name']);
                        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path);
                        
                        echo "<embed src='$target_path ' width='100%' height='425px'>";

                        // echo $_FILES['uploadfile']['name'];
                        // echo $target_path;
                    ?>
                        <input type="hidden" name="file_name" value="<?= $_FILES['uploadfile']['name'] ?>">
                        <input type="hidden" id="file_directory" name="file_directory" value="<?= $target_path ?>">
                    <?php } ?>
                    
                    <div class="response" name="response">
                        <?php
                            include "openpaper_2.php";
                        ?>
                    </div>
                </form>
            </div>
        </aside>

        <aside class="right">
            <div class="w3-padding">
                <i class="far fa-copy" style="font-size:60px;"></i>
                <font style="position:relative;">Simple sentence & translate</font>
            </div>

            <div class="input-note">
                <form id="my-form" method="POST" action="openpaper.php">
                    <!-- <input class="w3-input"> -->
                    <textarea class="form-control" rows="7" name="inserttxt" id="inserttxt">
                    <?php
                    if (isset($_POST["inserttxt"])) {
                        echo $_POST["inserttxt"];
                    } else {
                        echo "";
                    }
                    ?>
                    </textarea>

                    <!-- <input class="sentence" type="submit" name="buttonPastofSentence" id="buttonPastofSentence" value="Simple Sentence"> -->
                    <input class="tagging" type="submit" name="buttonTagging" id="buttonTagging" value="Tagging" style="margin: 0px 20px 0px 50px; color: white; background: #5bc0de; border-radius: 2px; border: none; font-size: 14px; padding: 8px 35px;" >
                    <input class="sentence" type="submit" name="buttonPastofSentence" id="buttonPastofSentence" value="Simple Sentence" style="margin: 0px 20px 0px 0px;">
                    <input class="translate" type="submit" name="buttonTranslate" id="buttonTranslate" value="Translate" style="margin: 0px 0px 0px 0px;">

                    <textarea class="form-control" id="show" name='showtext' rows='7' cols='72'>
                     <?php
                        $count = 0;
                        if (isset($_POST["buttonTranslate"])) {
                            include("translate.php");
                        } else if (isset($_POST["buttonPastofSentence"])) {
                            include("runsimplesentence.php");
                        } else if (isset($_POST["buttonTagging"])) {
                            include("runtagging.php"); $count++;
                        } else {
                            echo " ";
                        }
                        ?>
                    </textarea>

                    </from>
            </div>
        </aside>
    </div>
</body>

</html>

<script>
$(document).ready(function() {

    $(document).on('click','tagging', 'sentence', 'translate' ,function(){

        var file_name = $('#file_name').val() || '';
        var file_directory = $('#file_directory').val() || '';
        
        $.ajax({
            url:'./savepdf.php',
            type: 'POST',
            data: {
                file_name : file_name,
                file_directory : file_directory,
            }
        });
    });
    // $('#my-form').on('submit','tagging', 'sentence', 'translate', function(e) {

    //     var text = $('#inserttxt').val().trim();
    //     // console.log(text);
    //     if (text == '') {
    //         e.preventDefault();
    //         swal("กรุณากรอกข้อมูล!", {
    //             icon: "warning",
    //         });
    //     }

    // });

    $(".response").hide();
    // $('#submitUpload').click(function() {
        
    // });
});
// function myFunc() {
//     var x = document.getElementById("response");
//     if(x.style.display === "none") {
//         x.style.display = "block";
//     } else {
//         x.style.display = "none";
//     }
// }
</script>