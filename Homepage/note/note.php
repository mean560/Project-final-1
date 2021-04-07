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

    <link rel="stylesheet" href="../src/css/notecss.css">


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
                        <!-- <a href="#">
                            Dashboard
                        </a> -->
                    </li>

                    <li>
                        <a href="../sentence/openpaper.php">
                            Simple sentence & translate
                        </a>
                    </li>
                    <li>
                        <a href="../search/searchpage.php">
                            Search
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Bibliography
                        </a>
                    </li>
                    <li>
                        <a href="./allnote.php">
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

    <div class="middle">
        <aside class="left">
            <div class="middle_right" align="left">
                <div class="col-xs-12">
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

        </aside>

        <aside class="right">
            <div class="w3-padding">
                <i class="far fa-edit" style="font-size:56px;"></i>
                <font style="position:relative;">Note</font>
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


                <?php endif; ?>


            </div>


        </aside>

    </div>

    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {


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

                                        });
                                    }

                                });
                            }
                        });

                }

            });
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

        });

        // Save data
        function saveData() {

            var title = $('#postTitle').val().trim();
            var description = $('#postDescription').val().trim();
            var file_name = $('#file_name').val() || '';
            var file_directory = $('#file_directory').val() || '';
            var url = $('#postURL').val().trim();
            var keyword = $('#postKeyword').val().trim();


            if (title != '') {
                // AJAX request
                //console.log("loop")

                console.log(title)
                console.log(description)
                console.log(file_name)
                console.log(file_directory)
                console.log(url)
                console.log(keyword)

                // $.ajax({
                //     url: './autosave.php',
                //     type: 'post',
                //     data: {
                //         title: title,
                //         description: description,
                //         file_name: file_name,
                //         file_directory: file_directory,
                //         url: url,
                //         keyword: keyword

                //     },
                //     success: function(response) {
                //         console.log(response);
                //         console.log("save")
                //         swal({
                //             title: "Data saved",
                //             text: "Data has been saved successfully.",
                //             icon: "success",
                //             button: "Close",
                //         });
                //     }
                // });
            } else {
                console.log("not")
            }
        }
    </script>


</body>

</html>