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
  <title>Search</title>


  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


  <!-- cdn font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../src/css/searchcss.css">

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
            <a href="searchpage.php">
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

  <div class="middle">
    <div class="container">
      <div class="header">
        <div class="w3-padding w3-xxxlarge ">
          <i class="far fa-file-alt" style="font-size:70px;"></i>
          Search
        </div>
      </div>
      <aside class="left">
        <div class="menu-sort">
          <div class="text-header">
            Tools & Options
          </div>
          <div class="my-text">
            Sort By
          </div>
          <div class="text-content">
            <form>
              <ul class="menu-select">
                <li class="item">
                  <input type="radio" name="order" id="old" value="old">
                  <label for="old" data-toggle="tooltip" title="เรียงบทความเก่าสุด">
                    Oldest First
                  </label>
                </li>
                <li class="item">
                  <input type="radio" name="order" id="new" value="new">
                  <label for="new" data-toggle="tooltip" title="เรียงบทความใหม่สุด">
                    Newest First
                  </label>
                </li>
                <li class="item">
                  <input type="radio" name="order" id="asc" value="asc">
                  <label for="asc" data-toggle="tooltip" title="เรียงบทความจาก A-Z">
                    Sort A to Z
                  </label>
                </li>
                <li class="item">
                  <input type="radio" name="order" id="desc" value="desc">
                  <label for="desc" data-toggle="tooltip" title="เรียงบทความจาก Z-A">
                    Sort Z to A
                  </label>
                </li>
              </ul>
            </form>
          </div>
        </div>


        <div class="menu-sort">

          <div class="my-text">
            Refine By Database
          </div>
          <div class="text-content">
            <form>
              <ul class="menu-select">
                <li class="item">
                  <input type="checkbox" name="db" id="eric" value="eric">
                  <label for="eric" data-toggle="tooltip" title="ฐานข้อมูล Eric เป็นฐานข้อมูลที่เกี่ยวกับบทความทางด้านมนุษยศาสตร์ และสังคมศาตร์">
                    Eric
                  </label>
                </li>
                <li class="item">
                  <input type="checkbox" name="db" id="arxiv" value="arxiv">
                  <label for="arxiv" data-toggle="tooltip" title="ฐานข้อมูล arXiv เป็นฐานข้อมูลที่เกี่ยวกับบทความทางด้านฟิสิกส์ ชีววิทยาเชิงปริมาณ คณิตศาสตร์ สถิติ วิศวกรรมศาสตร์ และคอมพิวเตอร์">
                    arXiv
                  </label>
                </li>
                <li class="item">
                  <input type="checkbox" name="db" id="scopus" value="scopus">
                  <label for="scopus" data-toggle="tooltip" title="ฐานข้อมูล Scopus เป็นฐานข้อมูลที่เกี่ยวกับบทความทางด้านวิทยาศาสตร์และเทคโนโลยี">
                    Scopus
                  </label>
                </li>
              </ul>
            </form>
          </div>
        </div>
        <!-- <div class="text-header">
          Tools & Options
        </div>
        <span class="my-text">
          Sort By
        </span>
        <form>
          <div class="radio">
            <label><input type="radio" name="optradio1" id="new">Newest First</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio1" id="old">Oldest First</label>
          </div>
          <span class="my-text">
            Refine By Database
          </span>
          <div class="radio" id="db">
            <label><input type="radio" name="optradio2" id="eric" value="eric">Eric</label></br>
            <label><input type="radio" name="optradio2" id="isi" value="isi">arXiv</label></br>
            <label><input type="radio" name="optradio2" id="scopus" value="scopus">Scopus</label></br>
            <label><input type="radio" name="optradio2" id="googleScholar" value="googlescholar">Google Scholar</label>
            <p id="demo-scopus"></p>
            <p id="demo-eric"></p>
            <p id="demo-isi"></p>
          </div>
        </form> -->
      </aside>
      <div class="content">
        <form id="my-form">
          <div class="input-group">
            <input type="text" id="topic" class="form-control" placeholder="Search" style="font-size:16px;" name="search">
            <div class="input-group-btn">
              <button class="btn" name="submit" type="submit"><i class="glyphicon glyphicon-search" style="font-size:18px;"></i></button>
            </div>
          </div>
        </form>
        <div class="myblock list-data" id="data">
        </div>
        <div class="no-rerult" id="no-data">
        </div>
        <div class="page" id="page">
        </div>

        <section>
          <div id="result"></div>
          <div id="data-container"></div>
          <div id="pagination"></div>
        </section>
        <!-- <div class="footer" id="footer">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div> -->

      </div>

      <!-- lin sweet alert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css" />


      <script>
        $(document).ready(function() {


          function getSelectedCheckboxValues(name) {
            const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
            let values = [];
            checkboxes.forEach((checkbox) => {
              values.push(checkbox.value);
            });
            return values;

          }

          $('[data-toggle="tooltip"]').tooltip()

          $('#my-form').on('submit', function(e) {

            // หยุดการทำงานแบบปกติของฟอร์ม
            e.preventDefault();

            var globalArray = [];
            var myTopic = $("#topic").val().trim();
            var searchEric = document.getElementById("eric").checked;
            var searchArXiv = document.getElementById("arxiv").checked;
            var searchScopus = document.getElementById("scopus").checked;

            var sortASC = document.getElementById("asc").checked;
            var sortDESC = document.getElementById("desc").checked;

            var sortOld = document.getElementById("old").checked;
            var sortNew = document.getElementById("new").checked;

            if (!topic) {
              Swal.fire({
                title: 'ผิดพลาด',
                text: 'กรุณาเลือกหัวข้อเรื่อง',
                type: 'warning',
                confirmButtonColor: '#3085d6',
              }).then((result) => {


              })
            } else if (!searchEric && !searchArXiv && !searchScopus) {
              Swal.fire({
                title: 'ผิดพลาด',
                text: 'กรุณาเลือกฐานข้อมูล',
                type: 'warning',
                confirmButtonColor: '#3085d6',
              }).then((result) => {


              })
            } else {

              Swal.fire({
                title: 'Loading',
                text: 'Please Wait...',
              })
              Swal.showLoading();

              setTimeout(function() {

                if (searchEric) {
                  requestEric(myTopic);
                }
                if (searchArXiv) {

                  requestArXiv(myTopic);
                }
                if (searchScopus) {
                  requestScopus(myTopic);
                }

                Swal.close();


                console.log(globalArray);

                if (sortASC) {
                  function compare(a, b) {
                    if (a.title.toLowerCase() < b.title.toLowerCase()) {
                      return -1;
                    }
                    if (a.title.toLowerCase() > b.title.toLowerCase()) {
                      return 1;
                    }
                    return 0;
                  }
                  globalArray.sort(compare);
                }

                if (sortDESC) {
                  function compare(a, b) {
                    if (a.title.toUpperCase() > b.title.toUpperCase()) {
                      return -1;
                    }
                    if (a.title.toUpperCase() < b.title.toUpperCase()) {
                      return 1;
                    }
                    return 0;
                  }
                  globalArray.sort(compare);
                }

                if (sortOld) {
                  globalArray.sort(function(a, b) {
                    var dateA = new Date(a.date),
                      dateB = new Date(b.date);
                    return dateA - dateB;
                  });

                }

                if (sortNew) {
                  globalArray.sort(function(a, b) {
                    var dateA = new Date(a.date),
                      dateB = new Date(b.date);
                    return dateB - dateA;
                  });

                }



                $(function() {
                  let container = $('#pagination');
                  container.pagination({
                    dataSource: globalArray,
                    callback: function(data, pagination) {
                      var dataHtml = '<ul>';
                      var dataResult = '<ul>';
                      var i = 0;

                      dataResult += '<div class="results">' + globalArray.length + " results" + '</div>' + '<br>'+ '</ul>';

                      $.each(data, function(index, item) {
                        console.log("loop");

                        if (data[i].ref_data == "eric") {
                          dataHtml += '<li>' + '<a class="title-doc" href=' + data[i].url + ' target="_blank"><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;' + data[i].title + '</a>' +
                            '<div class="source">' + "(Eric, " + data[i].publicationdateyear + ")" + '</div>' + '</li>';
                        } else if (data[i].ref_data == "scopus") {

                          dataHtml += '<li>' + '<a class="title-doc" href=' + data[i].link[2]["@href"] + ' target="_blank"><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;' + data[i]["dc:title"] + '</a>' +
                            '<div class="source">' + "(Scopus, " + data[i].date + ")" + '</div>' +
                            '</li>';

                        } else if (data[i].ref_data == "arxiv") {

                          dataHtml += '<li>' + '<a class="title-doc" href=' + data[i].link[0]["@attributes"].href + ' target="_blank"><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;' + data[i].title + '</a>' +
                            '<div class="source">' + "(arXiv, " + data[i].date + ")" + '</div>' + '</li>';

                        }

                        i = i + 1;

                      });

                      dataHtml += '</ul>';

                      $("#result").html(dataResult);
                      $("#data-container").html(dataHtml);


                    }
                  })
                })




              }, 200);




            }



            // requestEric("covid");
            // console.log(globalArray);
            function requestEric(topic) {

              var postData = {
                'topic': topic
              };

              $.ajax({
                type: 'post',
                async: false,
                url: '../webservice/search/eric.php',
                data: postData,
                success: function(response) {
                  // console.log(response);

                  if (response) {

                    response.response.docs.forEach(filterData => {
                      // console.log(filterData);

                      if (filterData.url) {
                        filterData.ref_data = 'eric';
                        filterData.date = filterData.publicationdateyear;
                        globalArray.push(filterData);
                      }

                    });

                  }


                }

              });

            } //function requestEric

            function requestScopus(topic) {
              var postData = {
                'topic': topic

              };


              // console.log(postData);
              $.ajax({
                type: 'post',
                async: false,
                url: '../webservice/search/scopus.php',
                data: postData,
                success: function(response) {
                  // console.log(response);


                  if (response) {
                    response["search-results"].entry.forEach(filterData => {
                      // console.log(filterData);

                      if (filterData.link) {

                        filterData.ref_data = 'scopus';
                        filterData.title = filterData["dc:title"];

                        const date = new Date(filterData["prism:coverDate"]);
                        //const date2 = new Date(filterData["prism:coverDate"]);
                        //console.log(date.getFullYear());
                        filterData.date = date.getFullYear();
                        //filterData.date = filterData["prism:coverDate"];
                        //filterData.date2 = date.getFullYear();

                        globalArray.push(filterData);

                      }

                    });


                  }




                }

              });
            } //function requestScopus

            function requestArXiv(topic) {
              var postData = {
                'topic': topic


              };
              var title = "";
              var result = "";
              $.ajax({
                type: 'post',
                async: false,
                url: '../webservice/search/arxiv.php',
                data: postData,
                success: function(response) {
                  // console.log(response);


                  response.entry.forEach(filterData => {
                    // console.log(filterData);

                    if (filterData.link[0]["@attributes"].href) {

                      filterData.ref_data = 'arxiv';

                      const date = new Date(filterData.published);
                      //console.log(date.getFullYear());

                      filterData.date = date.getFullYear();

                      globalArray.push(filterData);
                      // myData.push(filterData);
                    }

                  });



                }

              });
            } //function requestArXiv





          }); //form click








        });
      </script>
    </div>


  </div> <!-- middle -->

  <aside class="right">
  </aside>
  </div>
  <div class="col-sm-12 col-md-12 footer-contianer" id="footer-contianer">

  </div>

</body>


</html>