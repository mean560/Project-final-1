<?php

$connect = new PDO("mysql:host=localhost;dbname=userdb1", "root", "");



    if(isset($_POST["name"])){

        $name = implode(", ", $_POST["name"]);

        $data = array(	
            // ':selectTypeOfSource' =>  "journal_aticle",
            ':name'		          =>  $name,
            ':title'              =>  $_POST["title"],
            ':journal_name'       =>  $_POST["journal_name"],
            ':periodical_name'    =>  $_POST["periodical_name"],
            ':dayP'               =>  $_POST["dayP"],
            ':monthP'             =>  $_POST["monthP"],
            ':yearP'              =>  $_POST["yearP"],
            ':page_start'         =>  $_POST["page_start"],
            ':page_end'           =>  $_POST["page_end"],
            ':volume'             =>  $_POST["volume"],
            ':issue'              =>  $_POST["issue"],
            ':url'                =>  $_POST["url"],
            ':doi'                =>  $_POST["doi"],
            ':whereCreate'        =>  "Note"
        );

        $query = "
        INSERT INTO author_test 
        (name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi, whereCreate) 
        VALUES (:name, :title, :journal_name, :periodical_name, :dayP, :monthP, :yearP, :page_start, :page_end, :volume, :issue, :url, :doi, :whereCreate)
        ";

        $statement = $connect->prepare($query);

        if($statement->execute($data))
        {
            echo '
                Data Successfully Inserted
            ';
        }
    }
    
?>