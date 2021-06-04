<?php
  error_reporting(0);
  include "config_s.php";
  $sql="SELECT * FROM author_test";
  $result=mysqli_query($con, $sql);

  $count=mysqli_num_rows($result);
  $order=1;
?>
<?php
  session_start();
  if (!isset($_SESSION['status_login'])) {
    header('location: ../authen/signin.php');
  }
?>

<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bibliographys</title>

  <link rel="stylesheet" href="indexcss.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="" data-new-gr-c-s-loaded="14.990.0">


  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top" id="top-navigation" style="height: 83px;">
    <div class="container">
      <a href="../../index.php">
        <div class="navbar-brand">
          <i class="fas fa-home" style=" font-size:26px;color:#555;"></i>
          Home
        </div>
      </a>
      <h1><span style="font-weight: normal; font-size: 32px;margin-left: 0px;"><i class="fas fa-book"></i>&nbsp&nbspMy Bibliographys</span></h1>
      <!-- <a class="navbar-brand" href="#"><?php echo $_SESSION['username'] ?></a> -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="my-image-icon user">
            <i class="fas fa-user"></i>
          </span>
          <?php echo $_SESSION['username'] ?>
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../../webservice/authen/logout.php">Sign out</a></li>
        </ul>
      </li>

    </div>

  </nav>

  <!-- เส้นขีดบน -->
  <hr style="border-color: rgb(219, 219, 219); width: auto; margin-top:0px; margin-bottom: 0px;">
  </hr>

  <!--Body-->
  <div class="containerBody">
    <div class="leftBody">
      <button type="button" class="btn" data-toggle="modal" data-target="#insertModal" style="margin-top: 25px; margin-left: 25px; width: 70%; font-family: Arial, Helvetica, sans-serif; letter-spacing: 0px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; text-decoration-style: solid;">Create Source</button>
      <!-- list button -->
      <ul class="list-group" style="padding-top: 16px; border-width: 0px;">
        <div class="btn-group-vertical" style="opacity: 1;">
          <a href="index.php" class="list-group-item"ไ style="color: black; border-width: 0px; background-color: rgb(249, 249, 249); float: left; text-align: left; font-size: 14px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ4MC4wMDk1OCA0ODAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEyOCAxMDQuMDAzOTA2di0zMmMwLTQuNDE3OTY4LTMuNTgyMDMxLTgtOC04aC0xMTJjLTQuNDE3OTY5IDAtOCAzLjU4MjAzMi04IDh2MzJ6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTAgMTIwLjAwMzkwNnYyNjRoMTI4di0yNjR6bTk2IDEwNGgtNjRjLTQuNDE3OTY5IDAtOC0zLjU4MjAzMS04LTh2LTY0YzAtNC40MTc5NjggMy41ODIwMzEtOCA4LThoNjRjNC40MTc5NjkgMCA4IDMuNTgyMDMyIDggOHY2NGMwIDQuNDE3OTY5LTMuNTgyMDMxIDgtOCA4em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0wIDQzMi4wMDM5MDZ2NDBjMCA0LjQxNzk2OSAzLjU4MjAzMSA4IDggOGgxMTJjNC40MTc5NjkgMCA4LTMuNTgyMDMxIDgtOHYtNDB6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTAgNDAwLjAwMzkwNmgxMjh2MTZoLTEyOHptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTQ0IDQwMC4wMDM5MDZoMTA0djE2aC0xMDR6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI0OCAzMi4wMDM5MDZ2LTI0YzAtNC40MTc5NjgtMy41ODIwMzEtNy45OTk5OTk3NS04LTcuOTk5OTk5NzVoLTg4Yy00LjQxNzk2OSAwLTggMy41ODIwMzE3NS04IDcuOTk5OTk5NzV2MjR6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTE0NCA4OC4wMDM5MDZoMTA0djI5NmgtMTA0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNDQgNDMyLjAwMzkwNnY0MGMwIDQuNDE3OTY5IDMuNTgyMDMxIDggOCA4aDg4YzQuNDE3OTY5IDAgOC0zLjU4MjAzMSA4LTh2LTQwem0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNDQgNDguMDAzOTA2aDEwNHYyNGgtMTA0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yNjMuODA4NTk0IDE2NS42Njc5NjkgNC4yODEyNSAxNi40MzM1OTMgMTM1LjQ4NDM3NS0zNi4xMjg5MDYtNC4yODUxNTctMTYuNDMzNTk0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0zMzAuNjY0MDYyIDQyMS45NDkyMTkgMTM1LjQ4MDQ2OS0zNi4xMjg5MDctOC41NzgxMjUtMzIuODg2NzE4LTEzNS40ODgyODEgMzYuMTI4OTA2em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im00NTMuNTI3MzQ0IDMzNy40NTMxMjUtNDUuOTEwMTU2LTE3Ni0xMzUuNDg4MjgyIDM2LjEyODkwNiA0NS45MTAxNTYgMTc2em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yNTkuNzY5NTMxIDE1MC4xODc1IDEzNS40NzY1NjMtMzYuMTI1LTExLjQ4NDM3NS00NC4wNTg1OTRjLTEuMTgzNTk0LTQuMjY1NjI1LTUuNTQyOTY5LTYuODE2NDA2LTkuODM5ODQ0LTUuNzU3ODEybC0xMjAgMzJjLTQuMjM4MjgxIDEuMTYwMTU2LTYuNzY1NjI1IDUuNS01LjY4MzU5NCA5Ljc1NzgxMnptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtNDcwLjE4MzU5NCA0MDEuMzAwNzgxLTEzNS40ODgyODIgMzYuMTI4OTA3IDkuNTQyOTY5IDM2LjU3NDIxOGMuNTU0Njg4IDIuMDYyNSAxLjkwNjI1IDMuODIwMzEzIDMuNzYxNzE5IDQuODgyODEzIDEuMjA3MDMxLjczMDQ2OSAyLjU4OTg0NCAxLjExNzE4NyA0IDEuMTE3MTg3LjY5OTIxOSAwIDEuMzk4NDM4LS4wODIwMzEgMi4wNzgxMjUtLjIzODI4MWwxMjAtMzJjNC4yMzgyODEtMS4xNjAxNTYgNi43NjU2MjUtNS41MDM5MDYgNS42ODM1OTQtOS43NjE3MTl6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjwvZz48L3N2Zz4=" style="width: 15px; height: 15px;" /> All Bibliographys</a>
          <a href="fav.php" class="list-group-item" style="color: black; border-width: 0px; background-color: rgb(249, 249, 249); float: left; text-align: left; font-size: 14px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMS45ODY4NSA1MTEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTExNC41OTM3NSA0OTEuMTQwNjI1Yy01LjYwOTM3NSAwLTExLjE3OTY4OC0xLjc1LTE1LjkzMzU5NC01LjE4NzUtOC44NTU0NjgtNi40MTc5NjktMTIuOTkyMTg3LTE3LjQ0OTIxOS0xMC41ODIwMzEtMjguMDkzNzVsMzIuOTM3NS0xNDUuMDg5ODQ0LTExMS43MDMxMjUtOTcuOTYwOTM3Yy04LjIxMDkzOC03LjE2Nzk2OS0xMS4zNDc2NTYtMTguNTE5NTMyLTcuOTc2NTYyLTI4LjkwNjI1IDMuMzcxMDkzLTEwLjM2NzE4OCAxMi41NDI5NjgtMTcuNzA3MDMyIDIzLjQwMjM0My0xOC43MTA5MzhsMTQ3Ljc5Njg3NS0xMy40MTc5NjggNTguNDMzNTk0LTEzNi43NDYwOTRjNC4zMDg1OTQtMTAuMDQ2ODc1IDE0LjEyMTA5NC0xNi41MzUxNTYgMjUuMDIzNDM4LTE2LjUzNTE1NiAxMC45MDIzNDMgMCAyMC43MTQ4NDMgNi40ODgyODEgMjUuMDIzNDM3IDE2LjUxMTcxOGw1OC40MzM1OTQgMTM2Ljc2OTUzMiAxNDcuNzczNDM3IDEzLjQxNzk2OGMxMC44ODI4MTMuOTgwNDY5IDIwLjA1NDY4OCA4LjM0Mzc1IDIzLjQyNTc4MiAxOC43MTA5MzggMy4zNzEwOTMgMTAuMzY3MTg3LjI1MzkwNiAyMS43MzgyODEtNy45NTcwMzIgMjguOTA2MjVsLTExMS43MDMxMjUgOTcuOTQxNDA2IDMyLjkzNzUgMTQ1LjA4NTkzOGMyLjQxNDA2MyAxMC42Njc5NjgtMS43MjY1NjIgMjEuNjk5MjE4LTEwLjU3ODEyNSAyOC4wOTc2NTYtOC44MzIwMzEgNi4zOTg0MzctMjAuNjA5Mzc1IDYuODkwNjI1LTI5LjkxMDE1NiAxLjMwMDc4MWwtMTI3LjQ0NTMxMi03Ni4xNjAxNTYtMTI3LjQ0NTMxMyA3Ni4yMDMxMjVjLTQuMzA4NTk0IDIuNTU4NTk0LTkuMTA5Mzc1IDMuODYzMjgxLTEzLjk1MzEyNSAzLjg2MzI4MXptMTQxLjM5ODQzOC0xMTIuODc1YzQuODQzNzUgMCA5LjY0MDYyNCAxLjMwMDc4MSAxMy45NTMxMjQgMy44NTkzNzVsMTIwLjI3NzM0NCA3MS45Mzc1LTMxLjA4NTkzNy0xMzYuOTQxNDA2Yy0yLjIxODc1LTkuNzQ2MDk0IDEuMDg5ODQzLTE5LjkyMTg3NSA4LjYyMTA5My0yNi41MTU2MjVsMTA1LjQ3MjY1Ny05Mi41LTEzOS41NDI5NjktMTIuNjcxODc1Yy0xMC4wNDY4NzUtLjkxNzk2OS0xOC42ODc1LTcuMjM0Mzc1LTIyLjYxMzI4MS0xNi40OTIxODhsLTU1LjA4MjAzMS0xMjkuMDQ2ODc1LTU1LjE0ODQzOCAxMjkuMDY2NDA3Yy0zLjg4MjgxMiA5LjE5NTMxMi0xMi41MjM0MzggMTUuNTExNzE4LTIyLjU0Njg3NSAxNi40Mjk2ODdsLTEzOS41NjI1IDEyLjY3MTg3NSAxMDUuNDY4NzUgOTIuNWM3LjU1NDY4NyA2LjYxMzI4MSAxMC44NTkzNzUgMTYuNzY5NTMxIDguNjIxMDk0IDI2LjUzOTA2MmwtMzEuMDYyNSAxMzYuOTM3NSAxMjAuMjc3MzQzLTcxLjkxNDA2MmM0LjMwODU5NC0yLjU1ODU5NCA5LjEwOTM3Ni0zLjg1OTM3NSAxMy45NTMxMjYtMy44NTkzNzV6bS04NC41ODU5MzgtMjIxLjg0NzY1NnMwIC4wMjM0MzctLjAyMzQzOC4wNDI5Njl6bTE2OS4xMjg5MDYtLjA2MjUuMDIzNDM4LjA0Mjk2OWMwLS4wMjM0MzggMC0uMDIzNDM4LS4wMjM0MzgtLjA0Mjk2OXptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" style="width: 15px; height: 15px;" /> Favorites</a>
        </div>
      </ul>
    </div>

    <div class="rightBody">
      <form action="searchData.php" class="form-group" method="post">
        <p class="text" style="display: inline-block; margin-left: 15px; margin-top:15px;">All Bibliographys</p>
          <input type="text" class="form-control" id="search_word" name="search_word" placeholder="Search" style="width: 20%; display: inline-block; margin-left: 10px;">
          <button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i></button>
        </p>
      </form>
      <form id="check-form" method="post">
        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 450px; background-color: white;">
          <table class="table table-bordered table-striped mb-0" id="tableAuthor" style='border-collapse: collapse;'>
            <tr>
              <th style="width:5%;">
                <input type="checkbox" id="select_all" class="form-check-input">
                <label class="form-check-label">All</label>
              </th>
              <!-- <th>B</th> -->
              <th>AUTHORS</th>
              <th>TITLE</th>
              <th>SOURCE</th>
              <!-- <th>YEAR</th> -->
              <th style="width:10%">&nbsp;</th>
              <!-- <th>&nbsp;</th> -->
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "userdb1"); 

            $query = "select * from author_test";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
              $id = $row['id'];
              $name = $row['name'];
              $title = $row['title'];
              $journal = $row['journal_name'];
            ?>
              <td><input type="checkbox" class="checkbox" name="ids[]" value=<?php echo $row['id'] ?> ></td>
              <!-- <td><input type="checkbox" name="idcheckbox[]" class="form-control" value="<?php echo $row['id']; ?>" /></td> -->
              <!-- <td></td> -->
              <?php
              echo "<td>" . $name . "</td>";
              echo "<td>" . $title . "</td>";
              echo "<td>" . $journal . "</td>";
              ?>
              <td>
                <button type="button" class="btn btn-warning edit_data" id="<?php echo $row['id']; ?>" name="edit_data" ><i class="fas fa-edit" style="color:white;"></i></button>
                <button type="button" class="btn btn-danger delete_data" id="<?php echo $row['id']; ?>" name="delete_data"><i class="bi bi-trash"></i></button>
              </td>
            <?php
              echo "</tr>";
            }
            ?>
          </table>
        </div>
        </form>

        <?php  require 'insertModal.php'; ?>

      <div class="bottomBody">
      <button type="submit" class="btn" form="check-form" id="show_button" name="show_button" data-toggle="modal" data-target="#exampleModalCenter"
          style="display: inline-block; position: static; margin-top: 35px; margin-left: 23%;
          background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; margin-right: 5px;
          text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; 
          text-decoration-style: solid;">Download Bibliography</button>
        <!-- <button type="button" class="btn" form="check-form" data-toggle="modal" data-target="#exampleModalCenter" id="show_button" name="show_button"
          style="display: inline-block; position: static; margin-top: 35px; margin-left: 23%;
          background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; margin-right: 5px;
          text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; 
          text-decoration-style: solid;">Download Bibliography</button> -->

        <div class="form-group" style="display: inline-block; position: absolute; border-width: 1px; margin-top: 35px;">
          <select class="form-control" name="bibliographyStyle" style="width: 180px; height: 38px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif;">
            <option selected value="apa">APA</option>
            <!-- <option value="ama">AMA</option> -->
            <option value="chicago">Chicago</option>
            <!-- <option value="ieee">IEEE</option> -->
            <option value="mla">MLA</option>
            <!-- <option value="turabian">Turabian</option>
            <option value="vancouver">Vancouver</option> -->
          </select>
        </div>
    </div>
    <!-- </form> -->
  </div>
        <?php// require 'insertModal.php'; ?>
      
        <?php require 'multiselect.php'; ?>
        <div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the &apos;x&apos; icon.</p>
</div>


  <style>
    th {
      vertical-align: middle;
      text-align: center;
    }
    .navbar .container {
      margin: 0;
    }
    li.dropdown {
      list-style: none;
    }
    li.dropdown .dropdown-toggle {
      color: #555;
      font-size: 18px;
    }
    .containerBody {
      background-color: rgb(249, 249, 249);
      height: 100%;
      width: auto;
    }
    .leftBody {
      background-color: rgb(249, 249, 249);
      float: left;
      width: 15%;
      height: 637px;
    }
    .rightBody {
      background-color: white;
      float: right;
      width: 85%;
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
  </style>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

<!-- ####################################################################################################################### -->
<!-- Modal Download Bibliography -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Download Bibliography</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size:16px">
        <iframe src="multiselect.php" width="auto" height="auto" frameborder="0" allowtransparency="true"></iframe>  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- ####################################################################################################################### -->

<script type="text/javascript">
  $(document).ready(function() {
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

// save data from #insertModal to database ######################################################################################################################################################
    $('#insert-form').on('submit', function(e){ 
      e.preventDefault();           
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:$('#insert-form').serialize(),  
                beforeSend:function(){
                  $('#insertSubmit').val("Insert...");
                },
                success:function(data)  
                {  
                    //  alert(data);  
                     $('#insert-form')[0].reset();  
                     $('#insertModal').modal('hide');
                    //  $('#add_name').html(data);  

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
// select style bibliography ######################################################################################################################################
    $('#apa').show();
    $('#mla').hide();
    $('#chicago').hide();

    $('select[name=bibliographyStyle]').change(function () {
      $("select[name=bibliographyStyle] option:selected").each(function () {
          var value = $(this).val();
          if(value == "apa") {
            $('#apa').show();
            $('#mla').hide();
            $('#chicago').hide();
          } else if(value == "mla") {
            $('#apa').hide();
            $('#mla').show();
            $('#chicago').hide();
          }  else if(value == "chicago") {
            $('#apa').hide();
            $('#mla').hide();
            $('#chicago').show();
          } 
      });
    }); 
// edit data from #insertModal to database ########################################################################################################################################################
  $('.edit_data').click( function(){  
      // var uid = $('#postid').val();
      var uid = $(this).attr("id");  
      $.ajax({  
        url:"fetch.php",  
        method:"POST",  
        data:{id: uid},  
        dataType:"json",  
        success:function(data){  
          $('#hidden_id').val(data.id);
          $('#name').val(data.name);  
          $('#titleB').val(data.title);  
          $('#journal_nameB').val(data.journal_name);  
          $('#periodical_nameB').val(data.periodical_name); 
          $('#dayPB').val(data.dayP);  
          $('#monthPB').val(data.monthP); 
          $('#yearPB').val(data.yearP);  
          $('#page_startB').val(data.page_start); 
          $('#page_endB').val(data.page_end);  
          $('#volumeB').val(data.volume); 
          $('#issueB').val(data.issue);  
          $('#urlB').val(data.url);  
          $('#doiB').val(data.doi); 
          $('#insertSubmit').val("Update");
          $('#insertModal').modal('show');
        }  
      });  
  });
// delete data from #insertModal to database ########################################################################################################################################################
  $('.delete_data').click( function(){
    var el = this;
    var uid = $(this).attr("id");
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
      $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: {id: uid },
        success: function(data){
          // if(data == 1){
          //   $(el).closest('tr').css('background','tomato');
          //   $(el).closest('tr').fadeOut(800,function(){
          //     $(this).remove();
          //   });
          // } else {
          //   alert('Invalid ID.');
          // }
          location.reload();
        }
      });
    }
  });
// click select all choose all ###################################################################################################################################################
  $('#select_all').on('click', function(){
    if(this.checked) {
      $('.checkbox').each(function() {
        this.checked = true;
      })
    } else {
      $('.checkbox').each(function() {
        this.checked = false;
      })
    }
  });
// click choose all checked select all #######################################################################################################################################
  $('.checkbox').on('click', function() {
    if($('.checkbox:checked').length == $('.checkbox').length) {
      $('#select_all').prop('checked', true);
    } else {
      $('#select_all').prop('checked', false);
    }
  });
// ##############################################################################
// $("#show_button").submit(function(e){
//     $('#exampleModalCenter').modal('show');
//     e.preventDefault();
// });

// $("#show_button").on("click", function(){


//   $.post("multiselect.php", function(data){

//     $("#exampleModalCenter").html(data).modal('show');

//   });

// });
// $( "#show_button").load( "multiselect.php" );
// $('#check-form').on('submit', function(e){
//   $('#exampleModalCenter').modal('show');
//   e.preventDefault();
// });

// $('#myForm').on('submit', function(e){
//   $('#exampleModalCenter').modal('show');
//   e.preventDefault();
// });

// $('#dialog-confirm').dialog();



});

</script>