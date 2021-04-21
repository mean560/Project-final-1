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


    <link rel="stylesheet" href="../src/css/notecss.css">

    <link href="../css/landing-page.min.css" rel="stylesheet">



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

                    <button type="button" class="btn" data-toggle="modal" data-target="#myModal" >Create Source</button>


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
            // add input author from field #########################################################################################################################################################
            var i = 1;
            $('#addif').click(function() {
              i++;
              $('#dynamic_field').append('<tr id="row'+i+'"><td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td><td><input type="text" id="'+i+'" name="name[]" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: inline-block; padding-left: 0px;"/></button></td></tr>');
            });
        // add delete input author from field ###########################################################################################################################################################
            $(document).on('click', '.btn_remove', function() {
              var button_id = $(this).attr("id");
              $('#row' + button_id + '').remove();
            });

        // save data from #myModal to database ######################################################################################################################################################
            $('#submit').click(function(){            
                  $.ajax({  
                        url:"savedata_note.php",  
                        method:"POST",  
                        data:$('#add_name').serialize(),  
                        success:function(data)  
                        {  
                            alert(data);  
                            $('#add_name')[0].reset();  
                            $('#myModal').modal('hide');
                              location.reload();
                            //  location.reload();
                        }  
                  });  
              }); 
        // hide/show radio input url/doi ######################################################################################################################################################
            $('#Ddoi').hide();
            $('#Durl').show();

            $('input[type=radio][name=options]').change(function() {
              if (this.id == "optionURL") {
                $('#Ddoi').hide();
                $('#Durl').show();
              }else if (this.id == "optionDOI") {
                $('#Durl').hide();
                $('#Ddoi').show();
              }
            });
        // hide/show select option input journal_name/periodical_name ######################################################################################################################################################
            $('#Djournal_name').show();
            $('#Dperiodical_name').hide();

            $('select[name=selectTypeOfSource]').change(function () {
              $("select[name=selectTypeOfSource] option:selected").each(function () {
                  var value = $(this).val();
                  if(value == "journal_article") {
                      $('#Djournal_name').show();
                      $('#Dperiodical_name').hide();
                  } else if(value == "article_periodical") {
                      $('#Djournal_name').hide();
                      $('#Dperiodical_name').show();
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Create Source</h4>
        <h5 class="modal-title" style="display: contents;">Type of Source&nbsp;&nbsp;&nbsp;:</h5>
        <div class="form-group" style="display: inline-block;">
        <!-- <form method="POST" name="add_name" id="add_name"> -->
          <select class="form-control" data-role="" name="selectTypeOfSource" style="max-width: 255px; max-height: 35px; padding: 0px 0px; border: none; background:none; font-size: 18px; ">
            <!-- <option selected disabled value="" >Select Type of Source</option> -->
            <!-- <option value="value1">Book</option>
            <option value="value2">Book Section</option> -->
            <option selected value="journal_article">Journal Article</option>
            <option value="article_periodical">Article in a Periodical</option>
            <!-- <option value="value5">Conference Proceedings</option>
            <option value="value6">Report</option>
            <option value="value7">Web site</option>
            <option value="value8">Document From Web site</option>
            <option value="value9">Electronic Source</option>
            <option value="value10">Art</option>
            <option value="value11">Sound Recording</option>
            <option value="value12">Performance</option>
            <option value="value13">Film</option>
            <option value="value14">Interview</option>
            <option value="value15">Patent</option>
            <option value="value16">Case</option>
            <option value="value17">Miscellaneous</option> -->
          </select>
        </div>
      </div>
      <div class="modal-body">
        <form method="POST" name="add_name" id="add_name">
          <div class="form-group">
            <div class="table-responsive">
              <table id="dynamic_field">
                <tr>
                  <td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td>
                  <td><input type="text" name="name[]" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" style="width: 300px;" /></td>
                  <td><button type="button" name="remove" id="'+i+'" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: block; padding-left: 0px;" /></button></td>
                </tr>
              </table>
            </div>
          </div>
          <button type="button" name="addif" id="addif" class="btn btn-default" style="margin-left: 100px; margin-bottom: 20px; padding-left: 15px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiA1MTJjLTE0MS4xNjQwNjIgMC0yNTYtMTE0LjgzNTkzOC0yNTYtMjU2czExNC44MzU5MzgtMjU2IDI1Ni0yNTYgMjU2IDExNC44MzU5MzggMjU2IDI1Ni0xMTQuODM1OTM4IDI1Ni0yNTYgMjU2em0wLTQ4MGMtMTIzLjUxOTUzMSAwLTIyNCAxMDAuNDgwNDY5LTIyNCAyMjRzMTAwLjQ4MDQ2OSAyMjQgMjI0IDIyNCAyMjQtMTAwLjQ4MDQ2OSAyMjQtMjI0LTEwMC40ODA0NjktMjI0LTIyNC0yMjR6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzJoLTIyNGMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgyMjRjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiAzODRjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZ2LTIyNGMwLTguODMyMDMxIDcuMTY3OTY5LTE2IDE2LTE2czE2IDcuMTY3OTY5IDE2IDE2djIyNGMwIDguODMyMDMxLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiMwNjliYmQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9zdmc+" style="width: 30px; height: 30px;" />
            <p class="text" style="color: #069BBD; display: inline;">&nbsp;&nbsp;Add another Report author</p></img>
          </button>
          <div class="form-group" id="Dtitle">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">TITLE&nbsp;&nbsp;:</p>
            <input type="text" name="title" class="form-control" placeholder="How to Write Bibliographies" style="display: inline; width: 88%;">
          </div>
          <div class="form-group" id="Djournal_name">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">JOURNAL NAME&nbsp;&nbsp;:</p>
            <input type="text" name="journal_name" class="form-control" placeholder="Adventure Works Monthly" style="display: inline; width: 77%;">
          </div>
          <div class="form-group" id="Dperiodical_name">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">PERIODICAL TITLE&nbsp;&nbsp;:</p>
            <input type="" name="periodical_name" class="form-control" placeholder="Adventure Works Daily" style="display: inline; width: 75%;">
          </div>
          <!-- <div class="form-group" id="Dcity">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">CITY&nbsp;&nbsp;:</p>
            <input type="text" id="city" class="form-control" placeholder="Chicago" style="width: 500px; display: inline-block;">
          </div> -->
          <div class="form-group" id="DdateP">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">DATE PUBLISHED&nbsp;&nbsp;:</p>
            <input type="text" name="dayP" class="form-control" placeholder="1" style="width: 25%; display: inline-block;">
            <input type="text" name="monthP" class="form-control" placeholder="January" style="width: 25%; display: inline-block;">
            <input type="text" name="yearP" class="form-control" placeholder="2006" style="width: 25%; display: inline-block;">
          </div>
          <div class="form-group" id="Dpages">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">FROM PAGE&nbsp;&nbsp;:</p>
            <input type="text" name="page_start" class="form-control" placeholder="50" style="width: 25%; display: inline-block;">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">TO PAGE&nbsp;&nbsp;:</p>
            <input type="text" name="page_end" class="form-control" placeholder="62" style="width: 25%; display: inline-block;">
          </div>
          <div class="form-group" id="Dvolume" style="display: inline-block">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">VOLUME&nbsp;&nbsp;:</p>
            <input type="text" name="volume" class="form-control" placeholder="III" style="width: 60%; display: inline-block;">
          </div>
          <div class="form-group" id="Dissue" style="display: inline-block">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">ISSUE&nbsp;&nbsp;:</p>
            <input type="text" name="issue" class="form-control" placeholder="12" style="width: 60%; display: inline-block;">
          </div><br/>
          <div class="btn-group btn-group-toggle" data-toggle="buttons" style="padding-left: 50px; padding-bottom:10px;">
            <label class="btn btn-info active" >
              <input type="radio" name="options" id="optionURL" checked> URL
            </label>
            <label class="btn btn-info">
              <input type="radio" name="options" id="optionDOI"> DOI
            </label>
          </div>
          <div class="form-group" id="Durl">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">URL&nbsp;&nbsp;:</p>
            <input type="text" name="url" class="form-control" placeholder="http://www.adatum.com" style="width: 70%; display: inline-block;">
          </div>
          <div class="form-group" id="Ddoi">
            <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">DOI&nbsp;&nbsp;:</p>
            <input type="text" name="doi" class="form-control" placeholder="10.1000/182" style="width: 70%; display: inline-block;">
          </div>


          <!-- Demo Collapse -->
          <!-- <div id="demo" class="collapse">
            <div class="md-form">
              <div class="form-group" id="Deditor">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">EDITOR&nbsp;&nbsp;:</p>
                <input type="text" id="editor" class="form-control" placeholder="Kramer, James D; Chen, Jacky" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dpublisher">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">PUBLISHER&nbsp;&nbsp;:</p>
                <input type="text" id="publisher" class="form-control" placeholder="Adventure Works Monthly" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dedition">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">EDITON&nbsp;&nbsp;:</p>
                <input type="text" id="edition" class="form-control" placeholder="Weekend" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dvolume">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">VOLUME&nbsp;&nbsp;:</p>
                <input type="text" id="volume" class="form-control" placeholder="III" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dissue">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">ISSUE&nbsp;&nbsp;:</p>
                <input type="text" id="issue" class="form-control" placeholder="12" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dshort_title">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">SHORT TITLE&nbsp;&nbsp;:</p>
                <input type="text" id="short_title" class="form-control" placeholder="Bibliographies" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dstandard_num">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">STANDARD NUMBER&nbsp;&nbsp;:</p>
                <input type="text" id="standard_num" class="form-control" placeholder="ISBN/ISSN" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dcomment">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">COMMENTS&nbsp;&nbsp;:</p>
                <input type="text" id="comment" class="form-control" placeholder="enter comment about this source" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="Dmedium">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">MEDIUM&nbsp;&nbsp;:</p>
                <input type="text" id="medium" class="form-control" placeholder="Document" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
              <div class="form-group" id="DdateACC">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">DATE ACCESSED&nbsp;&nbsp;:</p>
                <input type="text" id="dayACC" class="form-control" placeholder="1" style="width: 150px; display: inline-block; padding-right: 0px;">
                <input type="text" id="monthACC" class="form-control" placeholder="January" style="width: 150px; display: inline-block; padding-right: 0px;">
                <input type="text" id="yearACC" class="form-control" placeholder="2006" style="width: 150px; display: inline-block; padding-right: 0px;">
              </div>
              <div class="form-group" id="Durl">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">URL&nbsp;&nbsp;:</p>
                <input type="text" id="url" class="form-control" placeholder="http://www.adatum.com" style="width: 650px; display: inline-block; padding-right: 0px;">
              </div>
              <div class="form-group" id="Ddoi">
                <p class="text" style="padding-left: 25px; padding-right: 10px; display: inline-block;">DOI&nbsp;&nbsp;:</p>
                <input type="text" id="doi" class="form-control" placeholder="10.1000/182" style="width: 500px; display: inline-block; padding-right: 0px; ">
              </div>
            </div>
          </div> -->
          <!-- </from> -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-info mr-auto" data-toggle="collapse" data-target="#demo" style="background-color: white; border: none;">
          <p class="text" style="display: inline-block; color: black; align-content: center;">Show more detail</p>
        </button><br /> -->
        <!-- <input type="hidden" name="author_id" id="author_id" /> -->
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </from>

      </div>
    </div>
  </div>
</div>