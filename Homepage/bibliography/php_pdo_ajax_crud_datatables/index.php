<?php
session_start();
if (!isset($_SESSION['status_login'])) {
  header('location: ../authen/signin.php');
}
?>
<html>
	<head>
		<title>My Bibliographys</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>	
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

		<!-- Bootstrap icon -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<style>
			.body {
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box {
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
			table.dataTable tr th.select-checkbox.selected::after {
				content: "✔";
				margin-top: -11px;
				margin-left: -4px;
				text-align: center;
				text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
			}
			.containerBody {
				background-color: white;
				margin-top :-20px;
				height: 86.5%;
				width: auto;
			}
			.leftBody {
				background-color: rgb(249, 249, 249);
				float: left;
				width: 15%;
				height: 100%;
			}
			/* .rightBody {
				background-color: white;
				float: right;
				width: 95%;
				height: 541px;
			} */
			.bottomBody {
				background-color:rgb(249, 249, 249);
				position: fixed;
				bottom: 0px;
				float: right;
				width: 100%;
				height: 110px;
				text-align: left;
			}
		</style>
	</head>
	<body data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="" data-new-gr-c-s-loaded="14.990.0">
		<!-- Navigation -->
		<nav class="navbar navbar-default bg-light static-top" id="top-navigation" style="height: 70px;">
			<!-- <div class="container"> -->
				<a href="../../index.php" style="text-align: right;">
					<div class="navbar-brand">
						<i class="glyphicon glyphicon-home" style="font-size: 25px; color:#555;"></i>
						Home
					</div>
				</a>
				<h1><span style="font-weight: normal; font-size: 32px; margin-left: 100px;"><i class="glyphicon glyphicon-book"></i>&nbsp&nbspMy Bibliographys</span></h1>
				<!-- <a class="navbar-brand" href="#"><?php echo $_SESSION['username'] ?></a> -->
				<li class="dropdown" style="margin-left: 80%; margin-top: -35px">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  >
					<span class="my-image-icon user" >
						<i class="glyphicon glyphicon-user"></i>
					</span>
					<?php echo $_SESSION['username'] ?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="../../webservice/authen/logout.php">Sign out</a></li>
					</ul>
				</li>
			<!-- </div> -->
		</nav>
		<div class="containerBody">
			<div class="container">
				<div class="table-responsive">
					<br/>
					<table id="user_data" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th width="20%">Author Name</th>
								<th width="20%">Title</th>
								<th width="20%">Journal Name</th>
								<th width="5%">Year</th>
								<th width="25%">Source</th>
								<th width="5%">Edit</th>
								<th width="5%">Delete</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="bottomBody">
					<button type="button" class="btn" id="add_button" data-toggle="modal" data-target="#userModal" style="display: inline-block; position: static; margin-top: 35px; margin-left: 400px;
					background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; margin-right: 5px;
					text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; width: 180px; height: 38px;
					text-decoration-style: solid;">Create Source</button>
					<div class="form-group" style="display: inline-block; position: absolute; border-width: 1px; margin-top: 35px;">
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
					<button type="button" class="btn" id="download_button" data-toggle="modal" data-target="#exampleModalCenter" style="display: inline-block; position: static; margin-top: 35px; margin-left: 190px;
					background-color: rgb(249, 249, 249); font-family: Arial, Helvetica, sans-serif; border-width: 1px; margin-right: 5px;
					text-decoration-color: rgb(249, 204, 204); border-color: rgb(212, 212, 212); border-style: solid; height: 38px; width: 180px;
					text-decoration-style: solid;">Download Bibliography</button>
				</div>
		</div>

	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header text-center d-block">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Create Source</h2>
					<h4 style="display: inline-block;">Type of Source&nbsp;&nbsp;&nbsp;:</h4>
					<div class="form-group" style="display: inline-block;">
						<select class="form-control" data-role="" name="selectTypeOfSource" style="max-width: 255px; max-height: 35px; font-size: 16px;">
							<option selected value="journal_article">Journal Article</option>
							<option value="article_periodical">Article in a Periodical</option>
						</select>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
              				<table id="dynamic_field">
                				<tr>
									<td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td>
									<td><input type="text" name="name[]" id="name" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" style="width: 300px;" /></td>
									<td><button type="button" name="remove" id="'+i+'" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: block; padding-left: 0px;" /></button></td>
								</tr>
              				</table>
          			</div>
					<button type="button" name="addif" id="addif" class="btn btn-default" style="margin-left: 100px; margin-bottom: 20px; padding-left: 15px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiA1MTJjLTE0MS4xNjQwNjIgMC0yNTYtMTE0LjgzNTkzOC0yNTYtMjU2czExNC44MzU5MzgtMjU2IDI1Ni0yNTYgMjU2IDExNC44MzU5MzggMjU2IDI1Ni0xMTQuODM1OTM4IDI1Ni0yNTYgMjU2em0wLTQ4MGMtMTIzLjUxOTUzMSAwLTIyNCAxMDAuNDgwNDY5LTIyNCAyMjRzMTAwLjQ4MDQ2OSAyMjQgMjI0IDIyNCAyMjQtMTAwLjQ4MDQ2OSAyMjQtMjI0LTEwMC40ODA0NjktMjI0LTIyNC0yMjR6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzJoLTIyNGMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgyMjRjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiAzODRjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZ2LTIyNGMwLTguODMyMDMxIDcuMTY3OTY5LTE2IDE2LTE2czE2IDcuMTY3OTY5IDE2IDE2djIyNGMwIDguODMyMDMxLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiMwNjliYmQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9zdmc+" style="width: 30px; height: 30px;" /><p class="text" style="color: #069BBD; display: inline;">&nbsp;&nbsp;Add another Report author</p></img></button>
					<div class="form-group" id="Dtitle">
            			<p class="text" style="display: inline-block;">TITLE&nbsp;&nbsp;:</p>
            			<input type="text" name="title" id="title" class="form-control" placeholder="How to Write Bibliographies" style="display: inline; width: 88%;">
          			</div>
					<div class="form-group" id="Djournal_name">
            			<p class="text" style="display: inline-block;">JOURNAL NAME&nbsp;&nbsp;:</p>
            			<input type="text" name="journal_name" id="journal_name" class="form-control" placeholder="Adventure Works Monthly" style="display: inline; width: 77%;">
          			</div>
          			<div class="form-group" id="Dperiodical_name">
            			<p class="text" style="display: inline-block;">PERIODICAL TITLE&nbsp;&nbsp;:</p>
            			<input type="" name="periodical_name" id="periodical_name" class="form-control" placeholder="Adventure Works Daily" style="display: inline; width: 75%;">
          			</div>
					<div class="form-group" id="DdateP">
            			<p class="text" style="display: inline-block;">DATE PUBLISHED&nbsp;&nbsp;:</p>
            			<input type="text" name="dayP" id="dayP" class="form-control" placeholder="1" style="width: 20%; display: inline-block;">
            			<input type="text" name="monthP" id="monthP" class="form-control" placeholder="January" style="width: 20%; display: inline-block;">
            			<input type="text" name="yearP" id="yearP" class="form-control" placeholder="2006" style="width: 20%; display: inline-block;">
          			</div>
          			<div class="form-group" id="Dpages">
            			<p class="text" style="display: inline-block;">FROM PAGE&nbsp;&nbsp;:</p>
            			<input type="text" name="page_start" id="page_start" class="form-control" placeholder="50" style="width: 25%; display: inline-block;">
            			<p class="text" style="display: inline-block;">TO PAGE&nbsp;&nbsp;:</p>
            			<input type="text" name="page_end" id="page_end" class="form-control" placeholder="62" style="width: 25%; display: inline-block;">
          			</div>
          			<div class="form-group" id="Dvolume" style="display: inline-block">
            			<p class="text" style="display: inline-block;">VOLUME&nbsp;&nbsp;:</p>
            			<input type="text" name="volume" id="volume" class="form-control" placeholder="III" style="width: 60%; display: inline-block;">
          			</div>
          			<div class="form-group" id="Dissue" style="display: inline-block">
            			<p class="text" style="display: inline-block;">ISSUE&nbsp;&nbsp;:</p>
            			<input type="text" name="issue" id="issue" class="form-control" placeholder="12" style="width: 60%; display: inline-block;">
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
						<p class="text" style="display: inline-block;">URL&nbsp;&nbsp;:</p>
						<input type="text" name="url" id="url" class="form-control" placeholder="http://www.adatum.com" style="width: 70%; display: inline-block;">
					</div>
					<div class="form-group" id="Ddoi">
						<p class="text" style="display: inline-block;">DOI&nbsp;&nbsp;:</p>
						<input type="text" name="doi" id="doi" class="form-control" placeholder="10.1000/182" style="width: 70%; display: inline-block;">
					</div>
					<br />
					<!-- <label>Select User Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span> -->
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Modal Download Bibliography -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center d-block">
        <h2 id="exampleModalLongTitle">Download Bibliography</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size:18px; font-family: Times New Roman, Times, serif;">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Create Source");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"scrollY": "270px",
		"scrollX": "100%",
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var name 			= $('#name').val();
		var title 			= $('#title').val();
		var journal_name 	= $('#journal_name').val();
		var periodical_name = $('#periodical_name').val();
		var dayP 			= $('#dayP').val();
		var monthP 			= $('#monthP').val();
		var yearP 			= $('#yearP').val();
		var page_start 		= $('#page_start').val();
		var page_end 		= $('#page_end').val();
		var volume 			= $('#volume').val();
		var issue			= $('#issue').val();
		var url 			= $('#url').val();
		var doi 			= $('#doi').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg', 'pdf']))
			{
				// alert("Invalid Image File");
				$('#user_image').val('');
				// return false;
			}
		}	
		if(name != '' && title != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){

		var user_id = $(this).attr("id");		
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#name').val(data.name);
				$('#title').val(data.title);
				$('#journal_name').val(data.journal_name);
				$('#periodical_name').val(data.periodical_name);
				$('#dayP').val(data.dayP);
				$('#monthP').val(data.monthP);
				$('#yearP').val(data.yearP);
				$('#page_start').val(data.page_start);
				$('#page_end').val(data.page_end);
				$('#volume').val(data.volume);
				$('#issue').val(data.issue);
				$('#url').val(data.url);
				$('#doi').val(data.doi);
				$('.modal-title').text("Edit Source");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Update");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	var i = 1;
    $('#addif').click(function() {
    	i++;
    	$('#dynamic_field').append('<tr id="row'+i+'"><td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td><td><input type="text" id="'+i+'" name="name[]" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: inline-block; padding-left: 0px;"/></button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
    	var button_id = $(this).attr("id");
    	$('#row' + button_id + '').remove();
    });

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

});
</script>