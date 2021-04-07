<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    header('location: ../authen/signin.php');
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "project_test")
    or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
//query
$query = mysqli_query($conn, "SELECT COUNT(id) FROM `search` where user_id = {$_SESSION['user_id']} ");
$row = mysqli_fetch_row($query);

$rows = $row[0];

$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า

$last = ceil($rows / $page_rows);

if ($last < 1) {
    $last = 1;
}

$pagenum = 1;

if (isset($_GET['pn'])) {
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
    $pagenum = 1;
} else if ($pagenum > $last) {
    $pagenum = $last;
}

$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

$nquery = mysqli_query($conn, "SELECT * from  search  where user_id = {$_SESSION['user_id']}  $limit ");

$paginationCtrls = '';

if ($last != 1) {

    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

        for ($i = $pagenum - 4; $i < $pagenum; $i++) {
            if ($i > 0) {
                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
            }
        }
    }

    $paginationCtrls .= '' . $pagenum . ' &nbsp; ';

    for ($i = $pagenum + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
        if ($i >= $pagenum + 4) {
            break;
        }
    }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a> ';
    }
}
?>
<!DOCTYPE html>
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

    <link rel="stylesheet" href="../src/css/allnotecss.css">

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



    <div style="margin-left:10px">
        <div class="w3-padding w3-xxxlarge">
            <i class="far fa-edit" style="font-size:70px;"></i>
            All Note
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
        <div class="form-search-note">
            <form class="example" style="max-width:500px">
                <input type="text" placeholder="Search notes" name="search-note" id="search-note">
                <!-- <button class="search-note" type="submit" name="searchNote"><i class="fa fa-search"></i></button> -->
            </form>
        </div>
        <div class='col-md-3' style="position:absolute;margin-top:0px;margin-left:69em;">
            <div class="list-group" id="show-list">
                <!-- Here autocomplete list will be display -->
            </div>
        </div>

        <div class="container" style="width:100%;margin-top:30px;margin-left:0px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                // include '../env/config.php';
                // $q = "SELECT * FROM search where user_id = {$_SESSION['user_id']} ";

                // $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($nquery)) {
                ?>
                    <tr>
                        <td><?php echo ($res['title']); ?></td>
                        <td><?php echo mb_substr($res['description'], 0, 80, 'utf-8') ?></td>
                        <td>
                            <a href="./note.php?edit=<?php echo $res['id']; ?>" class="btn btn-sm btn-warning " data-toggle="tooltip" title="Edit">
                                <i class="far fa-edit "></i>
                            </a>
                            <input type="hidden" class="delete_id_note" value="<?php echo $res['id']; ?>">
                            <a href="./allnote.php?delete=<?php echo $res['id']; ?>" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div id="pagination_controls" style="margin-top:20px;float: right;"><?php echo $paginationCtrls; ?></div>
        </div>


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
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                // console.log("test");
                var deleteid = $(this).closest("tr").find('.delete_id_note').val().trim();
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

    <div class="footer">

    </div>

</body>

</html>