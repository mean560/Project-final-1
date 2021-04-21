<?php
  include "config_s.php";

  if(isset($_POST['function'])&& $_POST['function'] == 'update_func'){
    // echo $_POST['id'];
    // print_r($_POST);
    // exit();

    $id = $_POST['id'];
    // $name = $_POST['name'];
    $sql = "SELECT * FROM author WHERE id = '$id' ";
    $query = mysqli_query($con, $sql) or die("Error in sql : $sql". mysqli_error($sql));
    $row = mysqli_num_rows($query);
    if($row > 0){
      $result = mysqli_fetch_assoc($query);
      echo json_encode($result); 
      // print_r($result);
      // echo $result['name'];
      // $old_name = $result['name'];
      // if(rename($old_name,$name)){
      //   $sql_update = "UPDATE author SET name = '$name' WHERE id = '$id'";
      //   $query_update = mysqli_query($con, $sql_update);
      //   if($query_update){
      //     echo "Saved!";
      //     exit();
      //   }
      // }
      exit();
    }
  }

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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
      <button type="button" class="btn" data-toggle="modal" data-target="#myModal" style="margin-top: 25px; margin-left: 25px; width: 150px; font-family: Arial, Helvetica, sans-serif; letter-spacing: 0px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; text-decoration-style: solid;">Create Source</button>
      <!-- list button -->
      <ul class="list-group" style="padding-top: 16px; border-width: 0px;">
        <div class="btn-group-vertical" style="opacity: 1;">
          <a href="index.php" class="list-group-item" style="color: black; border-width: 0px; background-color: rgb(249, 249, 249); float: left; text-align: left; font-size: 14px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ4MC4wMDk1OCA0ODAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEyOCAxMDQuMDAzOTA2di0zMmMwLTQuNDE3OTY4LTMuNTgyMDMxLTgtOC04aC0xMTJjLTQuNDE3OTY5IDAtOCAzLjU4MjAzMi04IDh2MzJ6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTAgMTIwLjAwMzkwNnYyNjRoMTI4di0yNjR6bTk2IDEwNGgtNjRjLTQuNDE3OTY5IDAtOC0zLjU4MjAzMS04LTh2LTY0YzAtNC40MTc5NjggMy41ODIwMzEtOCA4LThoNjRjNC40MTc5NjkgMCA4IDMuNTgyMDMyIDggOHY2NGMwIDQuNDE3OTY5LTMuNTgyMDMxIDgtOCA4em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0wIDQzMi4wMDM5MDZ2NDBjMCA0LjQxNzk2OSAzLjU4MjAzMSA4IDggOGgxMTJjNC40MTc5NjkgMCA4LTMuNTgyMDMxIDgtOHYtNDB6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTAgNDAwLjAwMzkwNmgxMjh2MTZoLTEyOHptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTQ0IDQwMC4wMDM5MDZoMTA0djE2aC0xMDR6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI0OCAzMi4wMDM5MDZ2LTI0YzAtNC40MTc5NjgtMy41ODIwMzEtNy45OTk5OTk3NS04LTcuOTk5OTk5NzVoLTg4Yy00LjQxNzk2OSAwLTggMy41ODIwMzE3NS04IDcuOTk5OTk5NzV2MjR6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTE0NCA4OC4wMDM5MDZoMTA0djI5NmgtMTA0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNDQgNDMyLjAwMzkwNnY0MGMwIDQuNDE3OTY5IDMuNTgyMDMxIDggOCA4aDg4YzQuNDE3OTY5IDAgOC0zLjU4MjAzMSA4LTh2LTQwem0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNDQgNDguMDAzOTA2aDEwNHYyNGgtMTA0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yNjMuODA4NTk0IDE2NS42Njc5NjkgNC4yODEyNSAxNi40MzM1OTMgMTM1LjQ4NDM3NS0zNi4xMjg5MDYtNC4yODUxNTctMTYuNDMzNTk0em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0zMzAuNjY0MDYyIDQyMS45NDkyMTkgMTM1LjQ4MDQ2OS0zNi4xMjg5MDctOC41NzgxMjUtMzIuODg2NzE4LTEzNS40ODgyODEgMzYuMTI4OTA2em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im00NTMuNTI3MzQ0IDMzNy40NTMxMjUtNDUuOTEwMTU2LTE3Ni0xMzUuNDg4MjgyIDM2LjEyODkwNiA0NS45MTAxNTYgMTc2em0wIDAiIGZpbGw9IiNiMWI5YzQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yNTkuNzY5NTMxIDE1MC4xODc1IDEzNS40NzY1NjMtMzYuMTI1LTExLjQ4NDM3NS00NC4wNTg1OTRjLTEuMTgzNTk0LTQuMjY1NjI1LTUuNTQyOTY5LTYuODE2NDA2LTkuODM5ODQ0LTUuNzU3ODEybC0xMjAgMzJjLTQuMjM4MjgxIDEuMTYwMTU2LTYuNzY1NjI1IDUuNS01LjY4MzU5NCA5Ljc1NzgxMnptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtNDcwLjE4MzU5NCA0MDEuMzAwNzgxLTEzNS40ODgyODIgMzYuMTI4OTA3IDkuNTQyOTY5IDM2LjU3NDIxOGMuNTU0Njg4IDIuMDYyNSAxLjkwNjI1IDMuODIwMzEzIDMuNzYxNzE5IDQuODgyODEzIDEuMjA3MDMxLjczMDQ2OSAyLjU4OTg0NCAxLjExNzE4NyA0IDEuMTE3MTg3LjY5OTIxOSAwIDEuMzk4NDM4LS4wODIwMzEgMi4wNzgxMjUtLjIzODI4MWwxMjAtMzJjNC4yMzgyODEtMS4xNjAxNTYgNi43NjU2MjUtNS41MDM5MDYgNS42ODM1OTQtOS43NjE3MTl6bTAgMCIgZmlsbD0iI2IxYjljNCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjwvZz48L3N2Zz4=" style="width: 15px; height: 15px;" /> All Bibliographys</a>
          <a href="fav.php" class="list-group-item" style="color: black; border-width: 0px; background-color: rgb(249, 249, 249); float: left; text-align: left; font-size: 14px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMS45ODY4NSA1MTEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTExNC41OTM3NSA0OTEuMTQwNjI1Yy01LjYwOTM3NSAwLTExLjE3OTY4OC0xLjc1LTE1LjkzMzU5NC01LjE4NzUtOC44NTU0NjgtNi40MTc5NjktMTIuOTkyMTg3LTE3LjQ0OTIxOS0xMC41ODIwMzEtMjguMDkzNzVsMzIuOTM3NS0xNDUuMDg5ODQ0LTExMS43MDMxMjUtOTcuOTYwOTM3Yy04LjIxMDkzOC03LjE2Nzk2OS0xMS4zNDc2NTYtMTguNTE5NTMyLTcuOTc2NTYyLTI4LjkwNjI1IDMuMzcxMDkzLTEwLjM2NzE4OCAxMi41NDI5NjgtMTcuNzA3MDMyIDIzLjQwMjM0My0xOC43MTA5MzhsMTQ3Ljc5Njg3NS0xMy40MTc5NjggNTguNDMzNTk0LTEzNi43NDYwOTRjNC4zMDg1OTQtMTAuMDQ2ODc1IDE0LjEyMTA5NC0xNi41MzUxNTYgMjUuMDIzNDM4LTE2LjUzNTE1NiAxMC45MDIzNDMgMCAyMC43MTQ4NDMgNi40ODgyODEgMjUuMDIzNDM3IDE2LjUxMTcxOGw1OC40MzM1OTQgMTM2Ljc2OTUzMiAxNDcuNzczNDM3IDEzLjQxNzk2OGMxMC44ODI4MTMuOTgwNDY5IDIwLjA1NDY4OCA4LjM0Mzc1IDIzLjQyNTc4MiAxOC43MTA5MzggMy4zNzEwOTMgMTAuMzY3MTg3LjI1MzkwNiAyMS43MzgyODEtNy45NTcwMzIgMjguOTA2MjVsLTExMS43MDMxMjUgOTcuOTQxNDA2IDMyLjkzNzUgMTQ1LjA4NTkzOGMyLjQxNDA2MyAxMC42Njc5NjgtMS43MjY1NjIgMjEuNjk5MjE4LTEwLjU3ODEyNSAyOC4wOTc2NTYtOC44MzIwMzEgNi4zOTg0MzctMjAuNjA5Mzc1IDYuODkwNjI1LTI5LjkxMDE1NiAxLjMwMDc4MWwtMTI3LjQ0NTMxMi03Ni4xNjAxNTYtMTI3LjQ0NTMxMyA3Ni4yMDMxMjVjLTQuMzA4NTk0IDIuNTU4NTk0LTkuMTA5Mzc1IDMuODYzMjgxLTEzLjk1MzEyNSAzLjg2MzI4MXptMTQxLjM5ODQzOC0xMTIuODc1YzQuODQzNzUgMCA5LjY0MDYyNCAxLjMwMDc4MSAxMy45NTMxMjQgMy44NTkzNzVsMTIwLjI3NzM0NCA3MS45Mzc1LTMxLjA4NTkzNy0xMzYuOTQxNDA2Yy0yLjIxODc1LTkuNzQ2MDk0IDEuMDg5ODQzLTE5LjkyMTg3NSA4LjYyMTA5My0yNi41MTU2MjVsMTA1LjQ3MjY1Ny05Mi41LTEzOS41NDI5NjktMTIuNjcxODc1Yy0xMC4wNDY4NzUtLjkxNzk2OS0xOC42ODc1LTcuMjM0Mzc1LTIyLjYxMzI4MS0xNi40OTIxODhsLTU1LjA4MjAzMS0xMjkuMDQ2ODc1LTU1LjE0ODQzOCAxMjkuMDY2NDA3Yy0zLjg4MjgxMiA5LjE5NTMxMi0xMi41MjM0MzggMTUuNTExNzE4LTIyLjU0Njg3NSAxNi40Mjk2ODdsLTEzOS41NjI1IDEyLjY3MTg3NSAxMDUuNDY4NzUgOTIuNWM3LjU1NDY4NyA2LjYxMzI4MSAxMC44NTkzNzUgMTYuNzY5NTMxIDguNjIxMDk0IDI2LjUzOTA2MmwtMzEuMDYyNSAxMzYuOTM3NSAxMjAuMjc3MzQzLTcxLjkxNDA2MmM0LjMwODU5NC0yLjU1ODU5NCA5LjEwOTM3Ni0zLjg1OTM3NSAxMy45NTMxMjYtMy44NTkzNzV6bS04NC41ODU5MzgtMjIxLjg0NzY1NnMwIC4wMjM0MzctLjAyMzQzOC4wNDI5Njl6bTE2OS4xMjg5MDYtLjA2MjUuMDIzNDM4LjA0Mjk2OWMwLS4wMjM0MzggMC0uMDIzNDM4LS4wMjM0MzgtLjA0Mjk2OXptMCAwIiBmaWxsPSIjYjFiOWM0IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" style="width: 15px; height: 15px;" /> Favorites</a>
        </div>
      </ul>
    </div>

    <div class="rightBody">
      <p class="text" style="display: inline-block; margin-left: 15px; margin-top:15px;">All Bibliographys</p>
      <input type="text" class="form-control" placeholder="Search" style="width: 200px; display: inline-block; margin-left: 10px;"></p>
     
      <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 360px; background-color: white;">
        <table class="table table-bordered table-striped mb-0" id="tableAuthor" style='border-collapse: collapse;'>
          <tr>
            <th style="width: 5%">A</th>
            <th>B</th>
            <th>AUTHORS</th>
            <th>TITLE</th>
            <th>SOURCE</th>
            <!-- <th>YEAR</th> -->
            <th>&nbsp;</th>
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
            // $year = $row['yearACC'];
          ?>
            <td>
              <!-- <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"> -->
              <input type="checkbox" id="customCheck"/>
            </td>
            <?php
            // echo "<td></td>";
            echo "<td></td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $title . "</td>";
            echo "<td>" . $journal . "</td>";
            // echo "<td>" . $year . "</td>";
            ?>
            <td>
              <button type="button" class="btn btn-warning update" id="<?=$row['id']?>" id="userinfo" name="update" ><i class="fas fa-edit" style="color:white;"></i></button>
              <button type="button" class="btn btn-danger delete" data-id='<?= $id; ?>'"><i class="bi bi-trash"></i></button>
            </td>
          <?php
            echo "</tr>";
          }
          ?>
        </table>
      </div>

      <div class="bottomBody">
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" style="display: inline-block; position: static; margin-top: 35px; margin-left: 380px;
          background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; margin-right: 5px;
          text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; 
          text-decoration-style: solid;">Download Bibliography</button>
        <div class="form-group" style="display: inline-block; position: absolute; border-width: 1px; margin-top: 35px;">
          <select class="form-control" style="width: 180px; height: 38px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif;">
            <option value="value1">APA</option>
            <!-- <option value="value2">AMA</option>
            <option value="value3">Chicago</option>
            <option value="value4">IEEE</option>
            <option value="value5">MLA</option>
            <option value="value6">Turabian</option>
            <option value="value7">Vancouver</option> -->
          </select>

        <!-- Example single danger button -->
        <!-- <div class="btn-group" style="display: inline-block; position: absolute; margin-top: 35px;">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 180px; height: 38px; background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; border-color: rgb(212, 212, 212); border-style: solid;">
            Action
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div> -->

      </div>
    </div>
  </div>
  <style>
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
</body>
</html>

<!-- Modal Create Source -->
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
        <input type="hidden" name="author_id" id="author_id" />
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </from>

      </div>
    </div>
  </div>
</div>
<!-- ####################################################################################################################### -->
<!-- Modal Edit Source -->
<div id="myEditModal" class="modal fade" role="dialog">
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
        <br/>
        <?php 
          include 'template/apa.php';
        ?>
        
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

// save data from #myModal to database ######################################################################################################################################################
    $('#submit').click(function(){            
           $.ajax({  
                url:"savedata.php",  
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
// ########################################################################################################################################################
    $(document).on('click', '.update', function(){
      var author_id = $(this).attr("id");
      $.ajax({
      url:"update.php",
      method:"POST",
      data:{author_id:author_id},
      dataType:"json",
      success:function(data)
      {
        $('#myModal').modal('show');
        $('#name').val(data.name);
        // $('#title').val(data.title);
        // $('#last_name').val(data.last_name);
        $('.modal-title').text("Edit Source");
        $('#author_id').val(author_id);
        // $('#user_uploaded_image').html(data.user_image);
        $('#submit').val("Edit");      }
      })
    });
// ########################################################################################################################################################

    //submit save author
    // $('#submit').click(function() {
    //   saveAuthor();
    // });
    //submit edit author
    $('.editbtn').click(function(){
      // console.log($(this).attr('id'))
      var id = $(this).attr('id');
      $.ajax({
        url: "index.php",
        type: "post",
        data: {
          id: id, 
          function: "update_func"
        },
        dataType: "json",
        // dataType: "html",
        success: function(response) {
          console.log(response.id);
          $('#name_update').val(response.name);
          $('#title_update').val(response.title);
          $('#id').val(response.id);
          $('#myEditModal').modal('show');
          // if(confirm(response)){
          //   location.reload();
          // }else{
          //   location.reload();
          //}
        }
      })
      return false;
    });
    //Delete Author
    $(document).on('click', '.delete', function(){
      var el = this;
      var deleteid = $(this).data('id');
      var confirmalert = confirm("Are you sure?");
      if (confirmalert == true) {
          // AJAX Request
          $.ajax({
            url: 'before-delete.php',
            type: 'POST',
            data: { id:deleteid },
            success: function(response){
              if(response == 1){
                // Remove row from HTML Table
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                  $(this).remove();
                });
              }else{
                alert('Invalid ID.');
              }
            }
          });
      }
    });
    //Function Save Author
    function saveAuthor() {

      var name = $('#name').val();
      var title = $('#title').val();
      var journal_name = $('#journal_name').val();
      var periodical_name = $('#periodical_name').val();
      var city = $('#city').val();
      var dayP = $('#dayP').val();
      var monthP = $('#monthP').val();
      var yearP = $('#yearP').val();
      var pages = $('#pages').val();
      var editor = $('#editor').val();
      var publisher = $('#publisher').val();
      var edition = $('#edition').val();
      var volume = $('#volume').val();
      var issue = $('#issue').val();
      var short_title = $('#short_title').val();
      var standard_num = $('#standard_num').val();
      var comment = $('#comment').val();
      var medium = $('#medium').val();
      var dayACC = $('#dayACC').val();
      var monthACC = $('#monthACC').val();
      var yearACC = $('#yearACC').val();
      var url = $('#url').val();
      var doi = $('#doi').val();

      // if (title != '' ) {
      $.ajax({
        url: 'savedata.php',
        type: 'POST',
        data: {
          // "title=" + title + "&journal_name=" + journal_name + "&periodical_name=" + periodical_name + "&city=" + city + "&dayP=" + dayP + "&monthP=" + monthP + "&yearP=" + yearP + "&pages=" + pages,
          name: name,
          title: title,
          journal_name: journal_name,
          periodical_name: periodical_name,
          city: city,
          dayP: dayP,
          monthP: monthP,
          yearP: yearP,
          pages: pages,
          editor: editor,
          publisher: publisher,
          edition: edition,
          volume: volume,
          issue: issue,
          short_title: short_title,
          standard_num: standard_num,
          comment: comment,
          medium: medium,
          dayACC: dayACC,
          monthACC: monthACC,
          yearACC: yearACC,
          url: url,
          doi: doi,
        },
      });
      //}

    }
    //Function Edit Author
    function editAuthor() {

      var name = $('#name').val();
      var title = $('#title').val();
      var journal_name = $('#journal_name').val();
      var periodical_name = $('#periodical_name').val();
      var city = $('#city').val();
      var dayP = $('#dayP').val();
      var monthP = $('#monthP').val();
      var yearP = $('#yearP').val();
      var pages = $('#pages').val();
      var editor = $('#editor').val();
      var publisher = $('#publisher').val();
      var edition = $('#edition').val();
      var volume = $('#volume').val();
      var issue = $('#issue').val();
      var short_title = $('#short_title').val();
      var standard_num = $('#standard_num').val();
      var comment = $('#comment').val();
      var medium = $('#medium').val();
      var dayACC = $('#dayACC').val();
      var monthACC = $('#monthACC').val();
      var yearACC = $('#yearACC').val();
      var url = $('#url').val();
      var doi = $('#doi').val();

      // if (title != '' ) {
      $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {
          // "title=" + title + "&journal_name=" + journal_name + "&periodical_name=" + periodical_name + "&city=" + city + "&dayP=" + dayP + "&monthP=" + monthP + "&yearP=" + yearP + "&pages=" + pages,
          name: name,
          title: title,
          journal_name: journal_name,
          periodical_name: periodical_name,
          city: city,
          dayP: dayP,
          monthP: monthP,
          yearP: yearP,
          pages: pages,
          editor: editor,
          publisher: publisher,
          edition: edition,
          volume: volume,
          issue: issue,
          short_title: short_title,
          standard_num: standard_num,
          comment: comment,
          medium: medium,
          dayACC: dayACC,
          monthACC: monthACC,
          yearACC: yearACC,
          url: url,
          doi: doi,
        },
      });
      //}

    }

    // $('.userinfo').click(function(){
      
    //   var userid = $(this).data('id');

    //   // AJAX request
    //   $.ajax({
    //     url: 'ajax_file.php',
    //     type: 'post',
    //     data: {userid: userid},
    //     success: function(response){ 
    //       // Add response in Modal body
    //       $('.modal-body').html(response);

    //       // Display Modal
    //       $('#exampleModalCenter').modal('show'); 
    //     }
    //   });
    // });


  });
</script> -->