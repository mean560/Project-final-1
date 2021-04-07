<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    header('location: ../authen/signin.php');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllNote</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
                <a class="navbar-brand" href="../index.php">Brand</a>
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
                        <a href="#">
                            Parts of a sentence & translate
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
                        <a href="allnote.php">
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

    <?php $_SESSION['user_id']; ?>

    <div class="middle">
        <aside class="left">
            <div class="middle_left" align="left">
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
                    <!-- <form method="post" enctype="multipart/form-data">
                        <div class="form-upload">
                            <i class="fas fa-file-upload" style="font-size:54px;"></i>
                            <font style="font-size:32px;">Upload File</font>
                            <input type="hidden" value="1000000000" name="MAX_FILE_SIZE" />
                        </div>
                        <div class="form-file">
                            <input type="file" name="uploadfile" />
                        </div>

                        <input type="submit" name="submit" value="Upload" class="btn" />

                    </form> -->
                    <!-- <div class="w3-padding">
                        <i class="far fa-edit" style="font-size:56px;"></i>
                        <font style="position:relative;">All Search</font>
                    </div>
                    <div class="form-search-paper">
                        <form action="./note.php" method="POST" class="example" style="margin-left:18px;max-width:500px">
                            <input type="text" placeholder="Search" name="search-paper" id="search-paper">
                            <button class="search-paper" type="submit" name="searchPaper"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class='col-md-9' style="position:absolute;margin-top:-30px;">
                        <div class="list-group" id="show-list-paper">
                             Here autocomplete list will be display 
                        </div>
                    </div>
                    <div class="form-allsearch">
                        <?php
                        include '../env/config.php';
                        $q = "SELECT * FROM search where user_id = {$_SESSION['user_id']} AND type='search'";

                        $query = mysqli_query($con, $q);

                        while ($res = mysqli_fetch_array($query)) {
                        ?>
                            <ul class="w3-ul search" style="width:100%">

                                <a target="_blank" href="<?php echo $res['url']; ?>">
                                    <li> <?php echo $res['title']; ?><br>
                                </a>
                                <a href=" ./allnote.php?delete=<?php echo $res['id']; ?>" onclick="return confirm(' Are you sure you want to delete?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>

                                </li>
                                <li></li>
                            </ul>
                        <?php
                        }
                        ?>
                    </div> -->

                    <?php if (isset($_POST['submitUpload'])) {
                        $target_path = "../uploads/";
                        $target_path = $target_path . basename($_FILES['uploadfile']['name']);
                        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path);
                        echo "<embed src='$target_path ' width='100%' height='700px'>";


                        // echo $_FILES['uploadfile']['name'];
                        // echo $target_path;
                    ?>
                        <input type="hidden" id="file_name" value="<?= $_FILES['uploadfile']['name'] ?>">
                        <input type="hidden" id="file_directory" value="<?= $target_path ?>">
                    <?php }  ?>
                </div>
            </div>

        </aside>

        <aside class="right">
            <div class="w3-padding">
                <i class="far fa-edit" style="font-size:56px;"></i>
                <font style="position:relative;">All Note</font>
            </div>

            <div class="form-search-note">
                <form class="example" style="margin:auto;max-width:500px">
                    <input type="text" placeholder="Search notes" name="search-note" id="search-note">
                    <!-- <button class="search-note" type="submit" name="searchNote"><i class="fa fa-search"></i></button> -->
                </form>
            </div>
            <div class='col-md-8' style="position:absolute;margin-top:-30px;margin-left:40px;">
                <div class="list-group" id="show-list">
                    <!-- Here autocomplete list will be display -->
                </div>
            </div>
            <div class="form-create">
                <a href="./note.php" class="my-link">
                    <button class="w3-button w3-round-large">Create Note<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        </svg></i></button>
                </a>
            </div>

            <div class="form-allnote">
                <?php
                include '../env/config.php';
                $q = "SELECT * FROM search where user_id = {$_SESSION['user_id']} ";

                $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <ul class="w3-ul" style="width:100%">
                        <li> <?php echo $res['title']; ?><br>
                            <a href="./note.php?edit=<?php echo $res['id']; ?>" class="btn btn-sm btn-warning " data-toggle="tooltip" title="Edit"><i class="far fa-edit "></i></a>
                            <input type="hidden" class="delete_id_note" value="<?php echo $res['id']; ?>">
                            <a href="./allnote.php?delete=<?php echo $res['id']; ?>" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt"></i></a>

                        </li>
                        <li></li>
                    </ul>
                <?php
                }
                ?>
            </div>

        </aside>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Send Search Text to the server
            $("#search-note").keyup(function() {
                let searchText = $(this).val();
                if (searchText != "") {
                    $.ajax({
                        url: "../env/config.php",
                        method: "post",
                        data: {
                            query: searchText,
                        },
                        success: function(response) {
                            $("#show-list").html(response);
                        },
                    });
                } else {
                    $("#show-list").html("");
                }
            });
            // Set searched text in input field on click of search button
            $(document).on("click", ".search-note", function() {
                $("#search").val($(this).text());
                $("#show-list").html("");
            });
            //Search paper
            $("#search-paper").keyup(function() {
                let searchText = $(this).val();
                if (searchText != "") {
                    $.ajax({
                        url: "../env/config.php",
                        method: "post",
                        data: {
                            search: searchText,
                        },
                        success: function(response) {
                            $("#show-list-paper").html(response);
                        },
                    });
                } else {
                    $("#show-list-paper").html("");
                }
            });
            $(document).on("click", ".search-paper", function() {
                $("#search-paper").val($(this).text());
                $("#show-list-paper").html("");
            });

            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                // console.log("test");
                var deleteid = $(this).closest("ul").find('.delete_id_note').val().trim();
                console.log(deleteid);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "../env/config.php",
                                data: {
                                    "delete": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    swal("Data Deleted Successfully!", {
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                    });
                                }

                            });
                        }
                    });
            });

        });
    </script>


</body>

</html>