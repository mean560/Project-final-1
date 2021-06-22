<?php
session_start();
if (!isset($_SESSION['username'])) {

  $_SESSION['msg'] = "You must log in first";
  header('location: ../authen/signin.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../authen/signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Note</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


  <!-- cdn font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../src/css/notecss.css">
  <link rel="stylesheet" href="../src/css/addcss.css">


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>	
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />



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
        <!--       <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul> -->

        <ul class="nav navbar-nav navbar-right">


          <li>
            <a href="../sentence/openpaper.php" data-toggle="navtab" id="simpletence">
              Simple sentence & translate
            </a>
          </li>
          <li>
            <a href="../search/searchpage.php" data-toggle="navtab" id="searchpage">
              Search
            </a>
          </li>
          <li>
            <a href="../bibliography/startbootstrap-landing-page-master/index.php" data-toggle="navtab" id="bibliography">
              Bibliography
            </a>
          </li>
          <li>
            <a href="./allnote.php" data-toggle="navtab" id="allnote">
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
              <!--            <li><a href="#">Parts of a sentence & translate</a></li>
              <li><a href="#">Search</a></li>
              <li><a href="#">Bibliography</a></li>
              <li><a href="#">Note</a></li>
              <li role="separator" class="divider"></li> -->
              <li><a href="../webservice/authen/logout.php">Sign out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <?php require_once '../env/config.php' ?>

  <div class="container" id="pdfviwer" style="background-color:white; width:50%; height: 573px; margin-top: -20px; float:left;">
    <div class="middle_right" align="left">
      <div class="col-xs-12"><br />
        <form method="post" enctype="multipart/form-data">
          <div class="form-upload">
            <i class="fas fa-file-upload" style="font-size:54px;"></i>
            <font style="font-size:32px;">Upload File</font>
            <input type="hidden" value="1000000000" name="MAX_FILE_SIZE" />
          </div>
          <div class="form-file">
            <input type="file" name="uploadfile" />
          </div>
          <input type="submit" name="submitUpload" value="Upload" class="btn" />
        </form>
      </div>
      <?php if (isset($_POST['submitUpload'])) {
        $target_path = "../uploads/";
        $target_path = $target_path . basename($_FILES['uploadfile']['name']);
        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path);
        echo "<embed src='$target_path ' width='100%' height='700px'>";
        // echo $_FILES['uploadfile']['name'];
        //echo $target_path;
      ?>
        <input type="hidden" id="file_name" value="<?= $_FILES['uploadfile']['name'] ?>">
        <input type="hidden" id="file_directory" value="<?= $target_path ?>">
      <?php }  ?>

      <?php if ($update == true)
        echo "<embed src='$file_directory' width='100%' height='700px'>"; ?>
      <input type="hidden" id="file_directory" value="<?= $file_directory ?>">
    </div>
  </div>
  <br />
  <div class="col-lg-6" style="background-color: white; margin-top: -20px; height: 573px;">
    <ul class="nav nav-tabs" id="myTab">
      <li><a href="#note-tab">Note</a></li>
      <li><a href="#simple-sentence-tab">Simple Sentence & Translate</a></li>
      <li><a href="#bibliography-tab">Bibliography</a></li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane" id="note-tab">
        <div class="w3-padding">
          <i class="far fa-edit" style="font-size:56px;"></i>
          <font style="position:relative; font-size:56px;">Note</font>
        </div>
        <div class="backpage">
          <a href="./allnote.php" class="my-link">
            <span class="my-image-text">
              <i class="fas fa-angle-left" style="font-size:14px;"></i>
              <font style="font-size:16px;">Back to all notes</font>
            </span>
          </a>
        </div>
        <div class="input-note">
          <?php
          require_once '../env/config.php';
          $conn = new mysqli("localhost", "root", "", "project_test");
          if (isset($_POST['searchNote'])) {
            $data = $_POST['search-note'];
            $sql = "SELECT * FROM search WHERE title = '$data' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
          }
          if (isset($_POST['searchPaper'])) {
            $data = $_POST['search-paper'];
            $sql = "SELECT * FROM search WHERE title = '$data' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
          }
          ?>
          <?php
          if ($update == true) :
          ?>
            <input class="w3-input" type="text" id="postTitle" value=" <?php echo $title; ?>" placeholder="Note title"><br>
            <textarea class="form-control" id="postDescription" placeholder="Start typing..." rows="16"><?php echo $description; ?></textarea><br>
            <input class="w3-input" type="text" id="postURL" value="<?php echo $url; ?>" placeholder="URL"><br>
            <input class="w3-input" type="text" id="postKeyword" value="<?php echo $keyword; ?>" placeholder="Keywords"><br>

            <input class="w3-input" type="hidden" id="postid" value="<?php echo $id; ?>">
            <button type="submit" name="submit" class="btn2 update-file">Update</button>

          <?php else : ?>
            <input class="w3-input" type="text" id="postTitle" value="" placeholder="Note title"><br>
            <textarea class="form-control" id="postDescription" placeholder="Start typing..." rows="16"></textarea><br>
            <input class="w3-input" type="text" id="postURL" value="" placeholder="URL"><br>
            <input class="w3-input" type="text" id="postKeyword" value="" placeholder="Keywords"><br>

            <input class="w3-input" type="hidden" id="postid" value="<?php echo $id; ?>">

            <button type="submit" name="submit" class="btn2 save-file">Save</button>

            <!-- <button type="button" class="btn" data-toggle="modal" data-target="#myModal" >Create Source</button> -->


          <?php endif; ?>
        </div>
      </div>

      <div class="tab-pane" id="simple-sentence-tab">
        <div class="w3-padding">
          <br />
          <i class="far fa-copy" style="font-size:50px;"></i>
          <font style="position:relative; font-size: 40px;">Simple sentence & translate</font>
        </div>
        <div class="backpage">
          <a href="./allnote.php" class="my-link">
            <span class="my-image-text">
              <i class="fas fa-angle-left" style="font-size:14px;"></i>
              <font style="font-size:16px;">Back to all notes</font>
            </span>
          </a>
        </div>
        <div class="input-note">
          <form id="my-form" method="POST">
            <textarea name="inserttxt" id="inserttxt" placeholder="Enter one sentence..." style="margin-left:30px; padding: 15px; font-size: 16px; width:90%; height: 180px;">
              <?php
              isset($_POST['inserttxt']) ? $inserttxt = $_POST['inserttxt'] : $inserttxt = 'null';
              if (isset($_POST["inserttxt"])) {
                // echo trim($inserttxt);
                $str = trim(preg_replace('/\s+/', ' ', $_POST["inserttxt"]));
                $arr = array_map('trim', array_filter(explode('.', $str)));
                //print_r($arr);
                for ($q = 0; $q < count($arr); $q++) {
                  echo $arr[$q] . ".\n" . "\n";
                  // echo "";
                }
              } else {
                echo "";
              }
              ?>
            </textarea>

            <input class="tagging" type="submit" name="buttonTagging" id="buttonTagging" value="Tagging" style="margin: 5px 20px 5px 90px; color: white; background: #5bc0de; border-radius: 2px; border: none; font-size: 14px; padding: 8px 35px;">
            <input class="sentence" type="submit" name="buttonPastofSentence" id="buttonPastofSentence" value="Simple Sentence" style="margin: 5px 20px 5px 0px; color: white; background: #5bc0de; border-radius: 2px; border: none; font-size: 14px; padding: 8px 35px;">
            <input class="translate" type="submit" name="buttonTranslate" id="buttonTranslate" value="Translate" style="margin: 5px 0px 5px 0px; color: white; background: #5bc0de; border-radius: 2px; border: none; font-size: 14px; padding: 8px 35px;">

            <div class="container" style="font-size: 16px; border: 1px solid; width: 90%; height: 180px; text-align:center; line-height: 1.8; padding-top: 10px;">
              <?php
              if (isset($_POST["buttonTagging"])) {
                include("runtagging2.php");
                if (empty($result2)) {
                  echo "";
                } else {
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
                  for ($v = 0; $v < count($result2); $v++) {
                    for ($x = 0; $x < count($result2[$v]); $x++) {
                      $arr[$x] = $result2[$v][$x];
                      // echo $arr[$x][1]."<br/>";
                      if ($arr[$x][1] == 'CC') {
                        $cc++; ?>
                        <a href="#" data-toggle="tooltip" title="Coordinating Conjunction" style="border-radius: 5px; background-color: #FDB750; color:white; padding: 5px; "><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'CD') {
                        $cd++ ?>
                        <a href="#" data-toggle="tooltip" title="Cardinal Digit" style="border-radius: 5px; background-color: #FC2E20; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'DT') {
                        $dt++; ?>
                        <a href="#" data-toggle="tooltip" title="Determiner" style="border-radius: 5px; background-color: #FD7F20; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'EX') {
                        $ex++; ?>
                        <a href="#" data-toggle="tooltip" title="Existential There" style="border-radius: 5px; background-color: #3B0918; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'FW') {
                        $fw++; ?>
                        <a href="#" data-toggle="tooltip" title="Foreign Word" style="border-radius: 5px; background-color: #B8390E; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'IN') {
                        $in++; ?>
                        <a href="#" data-toggle="tooltip" title="Preposition/Subordinating Conjunction" style="border-radius: 5px; background-color: #DC4731; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'JJ') {
                        $jj++; ?>
                        <a href="#" data-toggle="tooltip" title="This NLTK POS Tag is an adjective" style="border-radius: 5px; background-color: #D5AF10; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'JJR') {
                        $jjr++; ?>
                        <a href="#" data-toggle="tooltip" title="Adjective, Comparative" style="border-radius: 5px; background-color: #BE6310; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'JJS') {
                        $jjs++; ?>
                        <a href="#" data-toggle="tooltip" title="Adjective, Superlative" style="border-radius: 5px; background-color: #BC3110; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'LS') {
                        $ls++; ?>
                        <a href="#" data-toggle="tooltip" title="List Market" style="border-radius: 5px; background-color: #0074B7; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'MD') {
                        $md++; ?>
                        <a href="#" data-toggle="tooltip" title="modal" style="border-radius: 5px; background-color: #60A3D9; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'NN') {
                        $nn++; ?>
                        <a href="#" data-toggle="tooltip" title="noun, singular" style="border-radius: 5px; background-color: #003B73; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'NNS') {
                        $nns++; ?>
                        <a href="#" data-toggle="tooltip" title="noun plural" style="border-radius: 5px; background-color: #4E514E; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'NNP') {
                        $nnp++; ?>
                        <a href="#" data-toggle="tooltip" title="proper noun, singular" style="border-radius: 5px; background-color: #666666; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'NNPS') {
                        $nnps++; ?>
                        <a href="#" data-toggle="tooltip" title="proper noun, plural" style="border-radius: 5px;  background-color: #A5ABA0; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'PDT') {
                        $pdt++; ?>
                        <a href="#" data-toggle="tooltip" title="predeterminer" style="border-radius: 5px; background-color: #59981A; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'POS') {
                        $pos++; ?>
                        <a href="#" data-toggle="tooltip" title="possessive ending" style="border-radius: 5px; background-color: #81B622; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'PRP') {
                        $prp++; ?>
                        <a href="#" data-toggle="tooltip" title="personal pronoun" style="border-radius: 5px; background-color: #3D550C; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'PRP$') {
                        $prp2++; ?>
                        <a href="#" data-toggle="tooltip" title="possessive pronoun" style="border-radius: 5px; background-color: #870A30; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'RB') {
                        $rb++; ?>
                        <a href="#" data-toggle="tooltip" title="adverb" style="border-radius: 5px; background-color: #D43790; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'RBR') {
                        $rbr++; ?>
                        <a href="#" data-toggle="tooltip" title="adverb, comparative" style="border-radius: 5px; background-color: #FBB80F; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'RBS') {
                        $rbs++; ?>
                        <a href="#" data-toggle="tooltip" title="adverb, superlative" style="border-radius: 5px;  background-color: #F2E437; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'RP') {
                        $rp++; ?>
                        <a href="#" data-toggle="tooltip" title="particle" style="border-radius: 5px; background-color: #D3C02F; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'TO') {
                        $to++; ?>
                        <a href="#" data-toggle="tooltip" title="infinite marker" style="border-radius: 5px; background-color: #FBEE0F; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'UH') {
                        $uh++; ?>
                        <a href="#" data-toggle="tooltip" title="interjection" style="border-radius: 5px; background-color: #ECF87F; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VB') {
                        $vb++; ?>
                        <a href="#" data-toggle="tooltip" title="verb" style="border-radius: 5px; background-color: #6A8820; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VBG') {
                        $vbg++; ?>
                        <a href="#" data-toggle="tooltip" title="verb gerund" style="border-radius: 5px; background-color: #7F4AA4; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VBD') {
                        $vbg++; ?>
                        <a href="#" data-toggle="tooltip" title="verb past tense" style="border-radius: 5px; background-color: #C598AF; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VBN') {
                        $vbn++; ?>
                        <a href="#" data-toggle="tooltip" title="verb past participle" style="border-radius: 5px; background-color: #A45C40; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VBP') {
                        $vbp++; ?>
                        <a href="#" data-toggle="tooltip" title="verb, present tense not 3rd person singular" style="border-radius: 5px; background-color: #CAA88C; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'VBZ') {
                        $vbz++; ?>
                        <a href="#" data-toggle="tooltip" title="verb, present tense with 3rd person singular" style="border-radius: 5px; background-color: #FF3F00; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'WDT') {
                        $wdt++; ?>
                        <a href="#" data-toggle="tooltip" title="wh-determiner" style="border-radius: 5px; background-color: #2D2A11; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'WP') {
                        $wp++; ?>
                        <a href="#" data-toggle="tooltip" title="wh- pronoun" style="border-radius: 5px; background-color: #B43B42; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                      <?php } elseif ($arr[$x][1] == 'WRB') {
                        $wrb++; ?>
                        <a href="#" data-toggle="tooltip" title="wh- adverb" style="border-radius: 5px; background-color: #1B2E3C; color:white; padding: 5px;"><?= $arr[$x][0]; ?></a>
                  <?php } elseif ($arr[$x][1] == '.') {
                        echo ".";
                      }
                    }
                  } ?>
                  <div class="container" style="margin: 140px 0px 0px -15px; border: 0px solid; line-height: 1.5; font-size: 14px; font-style: italic; text-align: left; width: 105%; height: auto;">Description : <br />
                    <?php
                    if ($cc >= 1) { ?> <i class="bi bi-circle-fill" style="color: #FDB750; border-radius: 5px; padding: 3px;">Coordinating Conjunction</i>
                    <?php }
                    if ($cd >= 1) { ?> <i class="bi bi-circle-fill" style="color: #FC2E20;">Cardinal Digit</i>
                    <?php }
                    if ($dt >= 1) { ?> <i class="bi bi-circle-fill" style="color:#FD7F20; border-radius: 5px; padding: 3px;">Determiner </i>
                    <?php }
                    if ($ex >= 1) { ?> <i class="bi bi-circle-fill" style="color: #3B0918;">Existential</i>
                    <?php }
                    if ($fw >= 1) { ?> <i class="bi bi-circle-fill" style="color: #B8390E;">Foreign Word</i>
                    <?php }
                    if ($in >= 1) { ?> <i class="bi bi-circle-fill" style="color:#DC4731; border-radius: 5px; padding: 3px;">Preposition/Subordinating Conjunction</i>
                    <?php }
                    if ($jj >= 1) { ?> <i class="bi bi-circle-fill" style="color: #D5AF10;">adjective</i>
                    <?php }
                    if ($jjr >= 1) { ?> <i class="bi bi-circle-fill" style="color: #BE6310;">Adjective, Comparative</i>
                    <?php }
                    if ($jjs >= 1) { ?> <i class="bi bi-circle-fill" style="color: #BC3110;">Adjective, Superlative</i>
                    <?php }
                    if ($ls >= 1) { ?> <i class="bi bi-circle-fill" style="color: #0074B7;">List Market</i>
                    <?php }
                    if ($md >= 1) { ?> <i class="bi bi-circle-fill" style="color: #60A3D9;">modal</i>
                    <?php }
                    if ($nn >= 1) { ?> <i class="bi bi-circle-fill" style="color: #003B73;">noun, singular</i>
                    <?php }
                    if ($nns >= 1) { ?> <i class="bi bi-circle-fill" style="color: #4E514E;">noun plural</i>
                    <?php }
                    if ($nnp >= 1) { ?> <i class="bi bi-circle-fill" style="color: #666666;">proper noun, singular</i>
                    <?php }
                    if ($nnps >= 1) { ?> <i class="bi bi-circle-fill" style="color: #A5ABA0;">proper noun, plural</i>
                    <?php }
                    if ($pdt >= 1) { ?> <i class="bi bi-circle-fill" style="color: #59981A;">predeterminer</i>
                    <?php }
                    if ($pos >= 1) { ?> <i class="bi bi-circle-fill" style="color: #81B622;">possessive ending</i>
                    <?php }
                    if ($prp >= 1) { ?> <i class="bi bi-circle-fill" style="color: #3D550C;">personal pronoun</i>
                    <?php }
                    if ($prp2 >= 1) { ?> <i class="bi bi-circle-fill" style="color: #870A30;">possessive pronoun</i>
                    <?php }
                    if ($rb >= 1) { ?> <i class="bi bi-circle-fill" style="color: #D43790;">adverb</i>
                    <?php }
                    if ($rbr >= 1) { ?> <i class="bi bi-circle-fill" style="color: #FBB80F;">adverb, comparative</i>
                    <?php }
                    if ($rbs >= 1) { ?> <i class="bi bi-circle-fill" style="color: #F2E437;">adverb, superlative</i>
                    <?php }
                    if ($rp >= 1) { ?> <i class="bi bi-circle-fill" style="color: #D3C02F;">particle</i>
                    <?php }
                    if ($to >= 1) { ?> <i class="bi bi-circle-fill" style="color: #FBEE0F;">infinite marker</i>
                    <?php }
                    if ($uh >= 1) { ?> <i class="bi bi-circle-fill" style="color: #ECF87F;">interjection</i>
                    <?php }
                    if ($vb >= 1) { ?> <i class="bi bi-circle-fill" style="color: #6A8820;">verb</i>
                    <?php }
                    if ($vbg >= 1) { ?> <i class="bi bi-circle-fill" style="color: #7F4AA4;">verb gerund</i>
                    <?php }
                    if ($vbd >= 1) { ?> <i class="bi bi-circle-fill" style="color: #C598AF;">verb past tense</i>
                    <?php }
                    if ($vbn >= 1) { ?> <i class="bi bi-circle-fill" style="color: #A45C40;">verb past participle</i>
                    <?php }
                    if ($vbp >= 1) { ?> <i class="bi bi-circle-fill" style="color: #CAA88C;">verb, present tense not 3rd person singular</i>
                    <?php }
                    if ($vbz >= 1) { ?> <i class="bi bi-circle-fill" style="color: #FF3F00;">verb, present tense with 3rd person singular</i>
                    <?php }
                    if ($wdt >= 1) { ?> <i class="bi bi-circle-fill" style="color:#2D2A11;">wh-determiner</i>
                    <?php }
                    if ($wp >= 1) { ?> <i class="bi bi-circle-fill" style="color: #B43B42;">wh- pronoun</i>
                    <?php }
                    if ($wrb >= 1) { ?> <i class="bi bi-circle-fill" style="color: #1B2E3C;">wh- adverb</i>
                    <?php } ?>
                  </div>
              <?php
                }

              } else if (isset($_POST["buttonPastofSentence"])) {
                include("../sentence/runsimplesentence.php");
                // echo 
                // if(empty($ans)){
                //     echo "";
                // }
                // else{
                //     for ($y = 0; $y < count($ans); $y++) {
                //         for($z = 0; $z < count($ans[$y]); $z++){
                //             print $ans[$y][$z];
                //             print " ";
                //         }
                //         echo "<br>";
                //     }
                // }
              } elseif (isset($_POST["buttonTranslate"])) {
                include("../sentence/translate.php");
              }
              ?>
            </div>
            </from>
        </div>
      </div>

      <div class="tab-pane" id="bibliography-tab">
        <div class="w3-padding">
          <i class="glyphicon glyphicon-book" style="font-size:56px;"></i>
          <font style="position:relative; font-size:56px;">Bibliography</font>
        </div>
        <div class="backpage">
          <a href="./allnote.php" class="my-link">
            <span class="my-image-text">
              <i class="fas fa-angle-left" style="font-size:14px;"></i>
              <font style="font-size:16px;">Back to all notes</font>
            </span>
          </a>
        </div>
        <div class="container" id="display_bibliography" style="width:100%; font-size:18px; font-family: Times New Roman, Times, serif;">
          <br />
          <div id="apa">
            <?php include 'template/apa.php'; ?>
          </div>
          <div id="mla">
            <?php include 'template/mla.php'; ?>
          </div>
          <div id="chicago">
            <?php include 'template/chicago.php'; ?>
          </div>
        </div>
        <?php
        require 'conn.php';
        $query = mysqli_query($conn, "SELECT * FROM `search` WHERE id = $id"); //or die(mysqli_error());
        while ($fetch = mysqli_fetch_array($query)) {
        ?>
          <button type="button" class="btn add_button" name="add_button" data-toggle="modal" data-target="#myModal<?php echo $fetch['id'] ?>" style="display: inline-block; position: static; background-color: #5bc0de; font-family: Arial, Helvetica, sans-serif; border-width: 1px;
        color:white; margin-left: 20%; margin-right:  2%; border-style: solid; width: 180px; height: 38px;">Create Source</button>
        <?php
          include 'update_q.php';
        } ?>
        <!-- <button type="button" class="btn" id="add_button" data-toggle="modal" data-target="#myModal<?php echo $fetch['user_id'] ?>" style="display: inline-block; position: static;
			background-color: #5bc0de; font-family: Arial, Helvetica, sans-serif; border-width: 1px; color:white; margin-left: 20%; margin-right:  2%;
      border-style: solid; width: 180px; height: 38px;">Create Source</button> -->

        <!-- <button type="button" class="btn" id="edit_button" name="edit_button" data-toggle="modal" data-target="#myModal" style="display: inline-block; position: static;
			background-color: #5bc0de; font-family: Arial, Helvetica, sans-serif; border-width: 1px; color:white; 
      border-style: solid; width: 180px; height: 38px;">Update Source</button> -->
        <div class="form-group" style="display: inline-block; position: absolute; border-width: 1px;">
          <select class="form-control" name="bibliographyStyle" style="width: 180px; height: 38px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif;">
            <option selected value="apa" style="padding-left: 29px;">APA</option>
            <!-- <option value="ama">AMA</option> -->
            <option value="chicago">Chicago</option>
            <!-- <option value="ieee">IEEE</option> -->
            <option value="mla">MLA</option>
            <!-- <option value="turabian">Turabian</option>
							<option value="vancouver">Vancouver</option> -->
          </select>
        </div>
        <!-- <button type="button" class="btn" id="download_button" data-toggle="modal" data-target="#exampleModalCenter" style="display: inline-block; position: static; margin-left: 190px;
					background-color: #5bc0de; color:white; font-family: Arial, Helvetica, sans-serif; border-width: 1px; 
					text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; height: 38px; width: 180px;
					text-decoration-style: solid;">Download Bibliography</button> -->
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>
<!-- ########################################################################################################################## -->

<!-- ########################################################################################################################## -->
<script>
  $(document).ready(function() {

    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');

    // save note on note tab
    $(document).on('click', '.btn2.save-file', function() {
      //saveData();
      var title = $('#postTitle').val().trim();
      var description = $('#postDescription').val().trim();
      var file_name = $('#file_name').val() || '';
      var file_directory = $('#file_directory').val() || '';
      var url = $('#postURL').val().trim();
      var keyword = $('#postKeyword').val().trim();
      if (title != '') {
        console.log(title)
        console.log(description)
        console.log(file_name)
        console.log(file_directory)
        console.log(url)
        console.log(keyword)
        swal({
            title: "Do you want to save data?",
            text: "",
            icon: "warning",
            buttons: ["Cancle", "Save"],
          })
          .then((willSave) => {
            if (willSave) {
              $.ajax({
                url: './autosave.php',
                type: 'post',
                data: {
                  title: title,
                  description: description,
                  file_name: file_name,
                  file_directory: file_directory,
                  url: url,
                  keyword: keyword
                },
                success: function(response) {
                  swal("Data Saved Successfully!", {
                    icon: "success",
                  }).then((result) => {
                    // location.reload();
                  });
                }
              });
            }
          });
      }
    });

    // update note on note tab
    $(document).on('click', '.btn2.update-file', function() {

      var id = $('#postid').val();
      var title = $('#postTitle').val().trim();
      var description = $('#postDescription').val().trim();
      var file_name = $('#file_name').val() || '';
      var file_directory = $('#file_directory').val() || '';
      var url = $('#postURL').val().trim();
      var keyword = $('#postKeyword').val().trim();

      console.log(id)
      console.log(title)
      console.log(description)
      console.log(file_name)
      console.log(file_directory)
      console.log(url)
      console.log(keyword)

      $.ajax({
        url: '../env/config.php',
        type: 'POST',
        data: {
          'update': 1,
          id: id,
          title: title,
          description: description,
          file_name: file_name,
          file_directory: file_directory,
          url: url,
          keyword: keyword
        },
        success: function(response) {
          console.log("Yes")
          swal({
            title: "Success!",
            text: "Data has been updated successfully.",
            icon: "success",
            button: "Close",
          });
        }
      });
    });

    // clear textarea on simple sentence tab
    $('#inserttxt').val($('#inserttxt').val().trim());

    // select type source modal on bibliography tab 
    $('#Djournal_name').show();
    $('#Dperiodical_name').hide();
    $('select[name=selectTypeOfSource]').change(function() {
      $("select[name=selectTypeOfSource] option:selected").each(function() {
        var value = $(this).val();
        if (value == "journal_article") {
          $('#Djournal_name').show();
          $('#Dperiodical_name').hide();
        } else if (value == "article_periodical") {
          $('#Djournal_name').hide();
          $('#Dperiodical_name').show();
        }
      });
    });

    // add author input button modal on bibliography tab 
    var i = 1;
    $('#addif').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td><td><input type="text" id="' + i + '" name="name[]" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: inline-block; padding-left: 0px;"/></button></td></tr>');
    });

    // add remove button modal on bibliography tab 
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    // switch url/doi modal on bibliography tab 
    $('#Ddoi').hide();
    $('#Durl').show();
    $('input[type=radio][name=options]').change(function() {
      if (this.id == "optionURL") {
        $('#Ddoi').hide();
        $('#Durl').show();
      } else if (this.id == "optionDOI") {
        $('#Durl').hide();
        $('#Ddoi').show();
      }
    });

    // show template bibliography on bibliography tab
    $('#apa').show();
    $('#mla').hide();
    $('#chicago').hide();
    $('select[name=bibliographyStyle]').change(function() {
      $("select[name=bibliographyStyle] option:selected").each(function() {
        var value = $(this).val();
        if (value == "apa") {
          $('#apa').show();
          $('#mla').hide();
          $('#chicago').hide();
        } else if (value == "mla") {
          $('#apa').hide();
          $('#mla').show();
          $('#chicago').hide();
        } else if (value == "chicago") {
          $('#apa').hide();
          $('#mla').hide();
          $('#chicago').show();
        }
      });
    });

    $(document).on('click', '.add_button', function() {
      var uid = $('#postid').val();
      // var uid = $(this).attr("id");  
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          id: uid
        },
        dataType: "json",
        success: function(data) {
          $('#hid_id').val(data.id);
          $('#name').val(data.b_name);
          $('#titleB').val(data.b_title);
          $('#journal_name').val(data.b_journal_name);
          $('#periodical_name').val(data.b_periodical_name);
          $('#dayP').val(data.b_dayP);
          $('#monthP').val(data.b_monthP);
          $('#yearP').val(data.b_yearP);
          $('#page_start').val(data.b_page_start);
          $('#page_end').val(data.b_page_end);
          $('#volume').val(data.b_volume);
          $('#issue').val(data.b_issue);
          $('#urlB').val(data.b_url);
          $('#doi').val(data.b_doi);
        }
      });
    });



  });
</script>