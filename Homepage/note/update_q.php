<div id="myModal<?php echo $fetch['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" name="add_name" id="add_name" action="updateModal.php">
      <div class="modal-header text-center d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title">Create Source</h2>
        <h4 class="modal-title" style="display: contents;">Type of Source&nbsp;&nbsp;&nbsp;:</h4>
        <div class="form-group" style="display: inline-block;">
        <!-- <form method="POST" name="add_name" id="add_name"> -->
          <select class="form-control" data-role="" name="selectTypeOfSource" style="max-width: 255px; max-height: 35px; padding: 0px 0px; border: none; background:none; font-size: 18px; ">
            <option selected value="journal_article">Journal Article</option>
            <option value="article_periodical">Article in a Periodical</option>
          </select>
        </div>
      </div>
      <div class="modal-body">
        <!-- <form method="POST" name="add_name" id="add_name" action="/update.php"> -->
        <input type="hidden" id="hid_id" name="hid_id">
          <div class="form-group">
            <div class="table-responsive">
              <table id="dynamic_field">
                <tr>
                  <td class="text" style="padding-left: 25px;">AUTHOR&nbsp;&nbsp;</td>
                  <td><input type="text" id="name" name="name[]" placeholder="Kramer, James D; Chen, Jacky" class="form-control name_list" style="width: 300px;" /></td>
                  <td><button type="button" name="remove" id="'+i+'" class="btn btn_remove"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzExNC44NTMsMCwwLDExNC44MzMsMCwyNTZzMTE0Ljg1MywyNTYsMjU2LDI1NmMxNDEuMTY3LDAsMjU2LTExNC44MzMsMjU2LTI1NlMzOTcuMTQ3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yOTUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcwNSwzOS42NTksMjU2LDM5LjY1OVM0NzIuMzQxLDEzNi43MDUsNDcyLjM0MSwyNTZTMzc1LjI5NSw0NzIuMzQxLDI1Niw0NzIuMzQxeiAgICAiIGZpbGw9IiNjYjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM1NS4xNDgsMjM0LjM4NkgxNTYuODUyYy0xMC45NDYsMC0xOS44Myw4Ljg4NC0xOS44MywxOS44M3M4Ljg4NCwxOS44MywxOS44MywxOS44M2gxOTguMjk2ICAgIGMxMC45NDYsMCwxOS44My04Ljg4NCwxOS44My0xOS44M1MzNjYuMDk0LDIzNC4zODYsMzU1LjE0OCwyMzQuMzg2eiIgZmlsbD0iI2NiMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" style="width: 30px; height: 30px; display: block; padding-left: 0px;" /></button></td>
                </tr>
              </table>
            </div>
          </div>
          <button type="button" name="addif" id="addif" class="btn btn-default" style="margin-left: 100px; margin-bottom: 20px; padding-left: 15px;"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiA1MTJjLTE0MS4xNjQwNjIgMC0yNTYtMTE0LjgzNTkzOC0yNTYtMjU2czExNC44MzU5MzgtMjU2IDI1Ni0yNTYgMjU2IDExNC44MzU5MzggMjU2IDI1Ni0xMTQuODM1OTM4IDI1Ni0yNTYgMjU2em0wLTQ4MGMtMTIzLjUxOTUzMSAwLTIyNCAxMDAuNDgwNDY5LTIyNCAyMjRzMTAwLjQ4MDQ2OSAyMjQgMjI0IDIyNCAyMjQtMTAwLjQ4MDQ2OSAyMjQtMjI0LTEwMC40ODA0NjktMjI0LTIyNC0yMjR6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM2OCAyNzJoLTIyNGMtOC44MzIwMzEgMC0xNi03LjE2Nzk2OS0xNi0xNnM3LjE2Nzk2OS0xNiAxNi0xNmgyMjRjOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZmlsbD0iIzA2OWJiZCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1NiAzODRjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZ2LTIyNGMwLTguODMyMDMxIDcuMTY3OTY5LTE2IDE2LTE2czE2IDcuMTY3OTY5IDE2IDE2djIyNGMwIDguODMyMDMxLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiIGZpbGw9IiMwNjliYmQiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9zdmc+" style="width: 30px; height: 30px;" />
            <p class="text" style="color: #069BBD; display: inline;">&nbsp;&nbsp;Add another Report author</p></img>
          </button>
          <div class="form-group" id="Dtitle">
            <p class="text" style="display: inline-block;">TITLE&nbsp;&nbsp;:</p>
            <input type="text" id="titleB" name="titleB" class="form-control" placeholder="How to Write Bibliographies" style="display: inline; width: 88%;">
          </div>
          <div class="form-group" id="Djournal_name">
            <p class="text" style="display: inline-block;">JOURNAL NAME&nbsp;&nbsp;:</p>
            <input type="text" id="journal_name" name="journal_name" class="form-control" placeholder="Adventure Works Monthly" style="display: inline; width: 77%;">
          </div>
          <div class="form-group" id="Dperiodical_name">
            <p class="text" style="display: inline-block;">PERIODICAL TITLE&nbsp;&nbsp;:</p>
            <input type="text" id="periodical_name" name="periodical_name" class="form-control" placeholder="Adventure Works Daily" style="display: inline; width: 75%;">
          </div>
          <div class="form-group" id="DdateP">
            <p class="text" style="display: inline-block;">DATE PUBLISHED&nbsp;&nbsp;:</p>
            <input type="text" id="dayP" name="dayP" class="form-control" placeholder="1" style="width: 20%; display: inline-block;">
            <input type="text" id="monthP" name="monthP" class="form-control" placeholder="January" style="width: 20%; display: inline-block;">
            <input type="text" id="yearP" name="yearP" class="form-control" placeholder="2006" style="width: 20%; display: inline-block;">
          </div>
          <div class="form-group" id="Dpages">
            <p class="text" style="display: inline-block;">FROM PAGE&nbsp;&nbsp;:</p>
            <input type="text" id="page_start" name="page_start" class="form-control" placeholder="50" style="width: 25%; display: inline-block;">
            <p class="text" style="display: inline-block;">TO PAGE&nbsp;&nbsp;:</p>
            <input type="text" id="page_end" name="page_end" class="form-control" placeholder="62" style="width: 25%; display: inline-block;">
          </div>
          <div class="form-group" id="Dvolume" style="display: inline-block">
            <p class="text" style="display: inline-block;">VOLUME&nbsp;&nbsp;:</p>
            <input type="text" id="volume" name="volume" class="form-control" placeholder="III" style="width: 60%; display: inline-block;">
          </div>
          <div class="form-group" id="Dissue" style="display: inline-block">
            <p class="text" style="display: inline-block;">ISSUE&nbsp;&nbsp;:</p>
            <input type="text" id="issue" name="issue" class="form-control" placeholder="12" style="width: 60%; display: inline-block;">
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
            <input type="text" id="urlB" name="urlB" class="form-control" placeholder="http://www.adatum.com" style="width: 70%; display: inline-block;">
          </div>
          <div class="form-group" id="Ddoi">
            <p class="text" style="display: inline-block;">DOI&nbsp;&nbsp;:</p>
            <input type="text" id="doi" name="doi" class="form-control" placeholder="10.1000/182" style="width: 70%; display: inline-block;">
          </div>
      </div>
      <!-- <div style="clear:both;"></div> -->
      <div class="modal-footer">
        <!-- <input type="hidden" name="author_id" id="author_id" /> -->
        <input type="button" name="submitSave" id="submitSave" class="btn btn-info" value="Submit" >  
      </div>
        </from>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

  $('#submitSave').click(function(){
    var id                = $('#postid').val();
    var b_name            = $('#name').val();
    var b_title           = $('#titleB').val();
    var b_journal_name    = $('#journal_name').val();
    var b_periodical_name = $('#periodical_name').val();
    var b_dayP            = $('#dayP').val();
    var b_monthP          = $('#monthP').val();
    var b_yearP           = $('#yearP').val();
    var b_page_start      = $('#page_start').val();
    var b_page_end        = $('#page_end').val();
    var b_volume          = $('#volume').val();
    var b_issue           = $('#issue').val();
    var b_url             = $('#urlB').val();
    var b_doi             = $('#doi').val();

    console.log(id)
    console.log(b_name)
    console.log(b_title)
    console.log(b_journal_name)
    console.log(b_periodical_name)
    console.log(b_dayP)
    console.log(b_monthP)
    console.log(b_yearP)
    console.log(b_page_start)
    console.log(b_page_end)
    console.log(b_volume)
    console.log(b_issue)
    console.log(b_url)
    console.log(b_doi)

    $.ajax({
        url: 'updateModal.php',
        type: 'POST',
        data: {
            'updateModal': 1,
            id: id,
            b_name: b_name,
            b_title: b_title,
            b_journal_name: b_journal_name,
            b_periodical_name: b_periodical_name,
            b_dayP: b_dayP,
            b_monthP: b_monthP,
            b_yearP: b_yearP,
            b_page_start: b_page_start,
            b_page_end: b_page_end,
            b_volume: b_volume,
            b_issue: b_issue,
            b_url: b_url,
            b_doi: b_doi
        },
        success: function(response) {
          console.log("Yes")
          swal({
              title: "Success!",
              text: "Data has been create successfully.",
              icon: "success",
              // button: "Close",
          }),
          location.reload();
        }
    });
  });
});
</script>