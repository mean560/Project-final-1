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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

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
                            <!-- <input type="submit" id="submitFile" name="submitFile" value="save file" class="btn"/> -->

                        <!-- </form> -->

                    </div>

                    <?php
                    if (isset($_POST['submitUpload'])) {                        
                        $target_path = "../uploads/";
                        $target_path = $target_path . basename($_FILES['uploadfile']['name']);
                        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path);
                        echo "<embed src='$target_path ' width='100%' height='433px'>";

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
                    <textarea name="inserttxt" id="inserttxt" placeholder="Enter one sentence..." style="padding: 15px; font-size: 16px; width:100%; height: 200px;">
                        <?php
                            isset($_POST['inserttxt']) ? $inserttxt = $_POST['inserttxt'] : $inserttxt = 'null';
                            if (isset($_POST["inserttxt"])) {
                                echo trim($inserttxt);
                            } else {
                                echo "";
                            }
                        ?>
                    </textarea>

                    <input class="tagging" type="submit" name="buttonTagging" id="buttonTagging" value="Tagging" style="margin: 0px 20px 5px 50px; color: white; background: #5bc0de; border-radius: 2px; border: none; font-size: 14px; padding: 8px 35px;" >
                    <input class="sentence" type="submit" name="buttonPastofSentence" id="buttonPastofSentence" value="Simple Sentence" style="margin: 0px 20px 5px 0px;">
                    <input class="translate" type="submit" name="buttonTranslate" id="buttonTranslate" value="Translate" style="margin: 0px 0px 5px 0px;">

                    <div class="container" style="font-size: 16px; border: 1px solid; width: 100%; height: 200px; text-align:center; padding: 10px; line-height: 1.8;">
                        <?php
                            if(isset($_POST["buttonTagging"])){ 
                                include("runtagging.php");
                                if(empty($result)){ 
                                    echo"";
                                }
                                else{
                                    $cc = 0;
                                    $cd = 0;
                                    $dt = 0;
                                    $ex = 0;
                                    $fw = 0;
                                    $in = 0;
                                    $jj = 0;
                                    $jjr = 0;
                                    $jjs = 0;
                                    $ls = 0;
                                    $md = 0;
                                    $nn = 0;
                                    $nns = 0;
                                    $nnp = 0;
                                    $nnps = 0;
                                    $pdt = 0;
                                    $pos = 0;
                                    $prp = 0;
                                    $prp2 = 0;
                                    $rb = 0;
                                    $rbr = 0;
                                    $rbs = 0;
                                    $rp = 0;
                                    $to = 0;
                                    $uh = 0;
                                    $vb = 0;
                                    $vbg = 0;
                                    $vbd = 0;
                                    $vbn = 0;
                                    $vbp = 0;
                                    $vbz = 0;
                                    $wdt = 0;
                                    $wp = 0;
                                    $wrb = 0;

                                    for ($x = 0; $x < count($result); $x++) {
                                        $arr[$x] = ($result[$x]);
                                        if ($arr[$x][1] == 'CC') { $cc++; ?>
                                            <a href="#" data-toggle="tooltip" title="Coordinating Conjunction" style="border-radius: 5px; background-color: #FDB750; color:white; padding: 5px; "><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'CD') { $cd++ ?>
                                            <a href="#" data-toggle="tooltip" title="Cardinal Digit" style="border-radius: 5px; background-color: #FC2E20; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'DT') { $dt++; ?>
                                            <a href="#" data-toggle="tooltip" title="Determiner" style="border-radius: 5px; background-color: #FD7F20; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'EX') { $ex++; ?>
                                            <a href="#" data-toggle="tooltip" title="Existential There" style="border-radius: 5px; background-color: #3B0918; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'FW') { $fw++; ?>
                                            <a href="#" data-toggle="tooltip" title="Foreign Word" style="border-radius: 5px; background-color: #B8390E; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'IN') { $in++; ?>
                                            <a href="#" data-toggle="tooltip" title="Preposition/Subordinating Conjunction" style="border-radius: 5px; background-color: #DC4731; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'JJ') { $jj++; ?>
                                            <a href="#" data-toggle="tooltip" title="This NLTK POS Tag is an adjective" style="border-radius: 5px; background-color: #D5AF10; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'JJR') { $jjr++; ?>
                                            <a href="#" data-toggle="tooltip" title="Adjective, Comparative" style="border-radius: 5px; background-color: #BE6310; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'JJS') { $jjs++; ?>
                                            <a href="#" data-toggle="tooltip" title="Adjective, Superlative" style="border-radius: 5px; background-color: #BC3110; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'LS') { $ls++; ?>
                                            <a href="#" data-toggle="tooltip" title="List Market" style="border-radius: 5px; background-color: #0074B7; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'MD') { $md++; ?>
                                            <a href="#" data-toggle="tooltip" title="modal" style="border-radius: 5px; background-color: #60A3D9; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'NN') { $nn++; ?>
                                            <a href="#" data-toggle="tooltip" title="noun, singular" style="border-radius: 5px; background-color: #003B73; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'NNS') { $nns++; ?>
                                            <a href="#" data-toggle="tooltip" title="noun plural" style="border-radius: 5px; background-color: #4E514E; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'NNP') { $nnp++; ?>
                                            <a href="#" data-toggle="tooltip" title="proper noun, singular" style="border-radius: 5px; background-color: #666666; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'NNPS') { $nnps++; ?>
                                            <a href="#" data-toggle="tooltip" title="proper noun, plural" style="border-radius: 5px;  background-color: #A5ABA0; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'PDT') { $pdt++; ?>
                                            <a href="#" data-toggle="tooltip" title="predeterminer" style="border-radius: 5px; background-color: #59981A; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'POS') { $pos++; ?>
                                            <a href="#" data-toggle="tooltip" title="possessive ending" style="border-radius: 5px; background-color: #81B622; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'PRP') { $prp++; ?>
                                            <a href="#" data-toggle="tooltip" title="personal pronoun" style="border-radius: 5px; background-color: #3D550C; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'PRP$') { $prp2++; ?>
                                            <a href="#" data-toggle="tooltip" title="possessive pronoun" style="border-radius: 5px; background-color: #870A30; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'RB') { $rb++; ?>
                                            <a href="#" data-toggle="tooltip" title="adverb" style="border-radius: 5px; background-color: #D43790; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'RBR') { $rbr++; ?>
                                            <a href="#" data-toggle="tooltip" title="adverb, comparative" style="border-radius: 5px; background-color: #FBB80F; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'RBS') { $rbs++; ?>
                                            <a href="#" data-toggle="tooltip" title="adverb, superlative" style="border-radius: 5px;  background-color: #F2E437; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'RP') { $rp++; ?>
                                            <a href="#" data-toggle="tooltip" title="particle" style="border-radius: 5px; background-color: #D3C02F; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'TO') { $to++; ?>
                                            <a href="#" data-toggle="tooltip" title="infinite marker" style="border-radius: 5px; background-color: #FBEE0F; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'UH') { $uh++; ?>
                                            <a href="#" data-toggle="tooltip" title="interjection" style="border-radius: 5px; background-color: #ECF87F; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VB') { $vb++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb" style="border-radius: 5px; background-color: #6A8820; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VBG') { $vbg++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb gerund" style="border-radius: 5px; background-color: #7F4AA4; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VBD') { $vbg++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb past tense" style="border-radius: 5px; background-color: #C598AF; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VBN') { $vbn++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb past participle" style="border-radius: 5px; background-color: #A45C40; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VBP') { $vbp++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb, present tense not 3rd person singular" style="border-radius: 5px; background-color: #CAA88C; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'VBZ') { $vbz++; ?>
                                            <a href="#" data-toggle="tooltip" title="verb, present tense with 3rd person singular" style="border-radius: 5px; background-color: #FF3F00; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'WDT') { $wdt++; ?>
                                            <a href="#" data-toggle="tooltip" title="wh-determiner" style="border-radius: 5px; background-color: #2D2A11; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'WP') { $wp++; ?>
                                            <a href="#" data-toggle="tooltip" title="wh- pronoun" style="border-radius: 5px; background-color: #B43B42; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif ($arr[$x][1] == 'WRB') { $wrb++; ?>
                                            <a href="#" data-toggle="tooltip" title="wh- adverb" style="border-radius: 5px; background-color: #1B2E3C; color:white; padding: 5px;"><?=$arr[$x][0]; ?></a>
                                        <?php } elseif($arr[$x][1] == '.') { echo "."; }
                                    } ?>
                                    <div class="container" style="overflow: auto; line-height: 1.5; font-size: 14px; font-style: italic; text-align:left; width: 96.25%; height:90px; position:absolute; right:10px; bottom: 10px;">Description :
                                    <?php
                                        if($cc >= 1){ ?> <i class="bi bi-circle-fill" style="color: #FDB750; border-radius: 5px; padding: 3px;">Coordinating Conjunction</i>
                                        <?php } if($cd>=1){ ?> <i class="bi bi-circle-fill" style="color: #FC2E20;">Cardinal Digit</i>
                                        <?php } if($dt>=1){ ?> <i style="background-color:#FD7F20; color:white; border-radius: 5px; padding: 3px;">Determiner </i>
                                        <?php } if($ex>=1){ ?> <i class="bi bi-circle-fill" style="color: #3B0918;">Existential</i>
                                        <?php } if($fw>=1){ ?> <i class="bi bi-circle-fill" style="color: #B8390E;">Foreign Word</i>
                                        <?php } if($in>=1){ ?> <i style="background-color:#DC4731; color:white; border-radius: 5px; padding: 3px;">Preposition/Subordinating Conjunction</i>
                                        <?php } if($jj>=1){ ?> <i class="bi bi-circle-fill" style="color: #D5AF10;">This NLTK POS Tag is an adjective</i>
                                        <?php } if($jjr>=1){ ?> <i class="bi bi-circle-fill" style="color: #BE6310;">Adjective, Comparative</i>
                                        <?php } if($jjs>=1){ ?> <i class="bi bi-circle-fill" style="color: #BC3110;">Adjective, Superlative</i>
                                        <?php } if($ls>=1){ ?> <i class="bi bi-circle-fill" style="color: #0074B7;">List Market</i>
                                        <?php } if($md>=1){ ?> <i class="bi bi-circle-fill" style="color: #60A3D9;">modal</i>
                                        <?php } if($nn>=1){ ?> <i class="bi bi-circle-fill" style="color: #003B73;">noun, singular</i>
                                        <?php } if($nns>=1){ ?> <i class="bi bi-circle-fill" style="color: #4E514E;">noun plural</i>
                                        <?php } if($nnp>=1){ ?> <i class="bi bi-circle-fill" style="color: #666666;">proper noun, singular</i>
                                        <?php } if($nnps>=1){ ?> <i class="bi bi-circle-fill" style="color: #A5ABA0;">proper noun, plural</i>
                                        <?php } if($pdt>=1){ ?> <i class="bi bi-circle-fill" style="color: #59981A;">predeterminer</i>
                                        <?php } if($pos>=1){ ?> <i class="bi bi-circle-fill" style="color: #81B622;">possessive ending</i>
                                        <?php } if($prp>=1){ ?> <i class="bi bi-circle-fill" style="color: #3D550C;">personal pronoun</i>
                                        <?php } if($prp2>=1){ ?> <i class="bi bi-circle-fill" style="color: #870A30;">possessive pronoun</i>
                                        <?php } if($rb>=1){ ?> <i class="bi bi-circle-fill" style="color: #D43790;">adverb</i>
                                        <?php } if($rbr>=1){ ?> <i class="bi bi-circle-fill" style="color: #FBB80F;">adverb, comparative</i>
                                        <?php } if($rbs>=1){ ?> <i class="bi bi-circle-fill" style="color: #F2E437;">adverb, superlative</i>
                                        <?php } if($rp>=1){ ?> <i class="bi bi-circle-fill" style="color: #D3C02F;">particle</i>
                                        <?php } if($to>=1){ ?> <i class="bi bi-circle-fill" style="color: #FBEE0F;">infinite marker</i>
                                        <?php } if($uh>=1){ ?> <i class="bi bi-circle-fill" style="color: #ECF87F;">interjection</i>
                                        <?php } if($vb>=1){ ?> <i class="bi bi-circle-fill" style="color: #6A8820;">verb</i>
                                        <?php } if($vbg>=1){ ?> <i class="bi bi-circle-fill" style="color: #7F4AA4;">verb gerund</i>
                                        <?php } if($vbd>=1){ ?> <i class="bi bi-circle-fill" style="color: #C598AF;">verb past tense</i>
                                        <?php } if($vbn>=1){ ?> <i class="bi bi-circle-fill" style="color: #A45C40;">verb past participle</i>
                                        <?php } if($vbp>=1){ ?> <i class="bi bi-circle-fill" style="color: #CAA88C;">verb, present tense not 3rd person singular</i>
                                        <?php } if($vbz>=1){ ?> <i class="bi bi-circle-fill" style="color: #FF3F00;">verb, present tense with 3rd person singular</i>
                                        <?php } if($wdt>=1){ ?> <i class="bi bi-circle-fill" style="color:#2D2A11;">wh-determiner</i>
                                        <?php } if($wp>=1){ ?> <i class="bi bi-circle-fill" style="color: #B43B42;">wh- pronoun</i>
                                        <?php } if($wrb>=1){ ?> <i class="bi bi-circle-fill" style="color: #1B2E3C;">wh- adverb</i>  
                                        <?php } ?>               
                                    </div>
                                <?php
                                }
                            }
                            else if(isset($_POST["buttonPastofSentence"])){
                                include("runsimplesentence.php");
                                if(empty($ans)){
                                    echo "";
                                }
                                else{
                                    for ($y = 0; $y < count($ans); $y++) {
                                        for($z = 0; $z < count($ans[$y]); $z++){
                                            print $ans[$y][$z];
                                            print " ";
                                        }
                                        echo "<br>";
                                    }
                                }
                            }
                            elseif(isset($_POST["buttonTranslate"])){
                                include("translate.php");
                            }
                        ?>
                    <div>
                </from>
            </div>
        </aside>
    </div>
</body>

</html>
<style>
.i {
    color : white;
}
</style>

<script>
$(document).ready(function() {

    $('textarea').val($('textarea').val().trim())

    $('#submitUpload').click(function(){

        var file_name = $('#file_name').val() || '';
        var file_directory = $('#file_directory').val() || '';

        $.ajax({
            url:'./savepdf.php',
            type: 'POST',
            data: {
                file_name: file_name,
                file_directory: file_directory,
            }
        });
    });
});
</script>