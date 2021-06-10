<?php
$connect = new PDO("mysql:host=localhost;dbname=project_test", "root", "");



    if(isset($_POST["name"])){

        $name = implode(", ", $_POST["name"]);

        $data = array(	
            // ':selectTypeOfSource' =>  "journal_aticle",
            ':name'		          =>  $b_name,
            ':title'              =>  $_POST["b_title"],
            ':journal_name'       =>  $_POST["b_journal_name"],
            ':periodical_name'    =>  $_POST["b_periodical_name"],
            ':dayP'               =>  $_POST["b_dayP"],
            ':monthP'             =>  $_POST["b_monthP"],
            ':yearP'              =>  $_POST["b_yearP"],
            ':page_start'         =>  $_POST["b_page_start"],
            ':page_end'           =>  $_POST["b_page_end"],
            ':volume'             =>  $_POST["b_volume"],
            ':issue'              =>  $_POST["b_issue"],
            ':url'                =>  $_POST["b_url"],
            ':doi'                =>  $_POST["b_doi"],
            // ':user_id'            => $_POST["author_id"]
        );

        $query = "
        INSERT INTO search 
        (b_name, b_title, b_journal_name, b_periodical_name, b_dayP, b_monthP, b_yearP, b_page_start, b_page_end, b_volume, b_issue, b_url, b_doi) 
        VALUES (:name, :title, :journal_name, :periodical_name, :dayP, :monthP, :yearP, :page_start, :page_end, :volume, :issue, :url, :doi)
        ";
        // $connect->prepare($query);
        $statement = $connect->prepare($query);
        // $query = "
        // INSERT INTO author_test (name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi, user_id)) SELECT Col1, Col2 FROM table1 WHERE Col1='<Your_Condition>';
        // ";

        if($statement->execute($data))
        {
            echo '
                Data Successfully Inserted
            ';
        }
    }
    
?>