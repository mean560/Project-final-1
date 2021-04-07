
<?php

$stringText = $_POST["inserttxt"];


if($stringText == "" || trim($stringText) == ""){

    echo "plaese enter text to upper box...";

} else {

    $word = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/tagging.py ' . $stringText);

    $result = json_decode($word, true);
    // var_dump($result[0]);
    
    for ($x = 0; $x < count($result); $x++) {
        $arr[$x] = ($result[$x]);
        // var_dump($arr[$x]);
        if ($arr[$x][1] == 'CC') {
            echo $arr[$x][0];
            echo " = (Coordinating Conjunction)";
        } elseif ($arr[$x][1] == 'CD') {
            echo $arr[$x][0];
            echo " = (Cardinal Digit)";
        } elseif ($arr[$x][1] == 'DT') {
            echo $arr[$x][0];
            echo " = (Determiner)";
        } elseif ($arr[$x][1] == 'EX') {
            echo $arr[$x][0];
            echo " = (Existential There)";
        } elseif ($arr[$x][1] == 'FW') {
            echo $arr[$x][0];
            echo " = (Foreign Word)";
        } elseif ($arr[$x][1] == 'IN') {
            echo $arr[$x][0];
            echo " = (Preposition/Subordinating Conjunction)";
        } elseif ($arr[$x][1] == 'JJ') {
            echo $arr[$x][0];
            echo " = (This NLTK POS Tag is an adjective)";
        } elseif ($arr[$x][1] == 'JJR') {
            echo $arr[$x][0];
            echo " = (Adjective, Comparative)";
        } elseif ($arr[$x][1] == 'JJS') {
            echo $arr[$x][0];
            echo " = (Adjective, Superlative)";
        } elseif ($arr[$x][1] == 'LS') {
            echo $arr[$x][0];
            echo " = (List Market)";
        } elseif ($arr[$x][1] == 'MD') {
            echo $arr[$x][0];
            echo " = (modal)";
        } elseif ($arr[$x][1] == 'NN') {
            echo $arr[$x][0];
            echo " = (noun, singular)";
        } elseif ($arr[$x][1] == 'NNS') {
            echo $arr[$x][0];
            echo " = (noun plural)";
        } elseif ($arr[$x][1] == 'NNP') {
            echo $arr[$x][0];
            echo " = (proper noun, singular)";
        } elseif ($arr[$x][1] == 'NNPS') {
            echo $arr[$x][0];
            echo " = (proper noun, plural)";
        } elseif ($arr[$x][1] == 'PDT') {
            echo $arr[$x][0];
            echo " = (predeterminer)";
        } elseif ($arr[$x][1] == 'POS') {
            echo $arr[$x][0];
            echo " = (possessive ending)";
        } elseif ($arr[$x][1] == 'PRP') {
            echo $arr[$x][0];
            echo " = (personal pronoun)";
        } elseif ($arr[$x][1] == 'PRP$') {
            echo $arr[$x][0];
            echo " = (possessive pronoun)";
        } elseif ($arr[$x][1] == 'RB') {
            echo $arr[$x][0];
            echo " = (adverb)";
        } elseif ($arr[$x][1] == 'RBR') {
            echo $arr[$x][0];
            echo " = (adverb, comparative)";
        } elseif ($arr[$x][1] == 'RBS') {
            echo $arr[$x][0];
            echo " = (adverb, superlative)";
        } elseif ($arr[$x][1] == 'RP') {
            echo $arr[$x][0];
            echo " = (particle)";
        } elseif ($arr[$x][1] == 'TO') {
            echo $arr[$x][0];
            echo " = (infinite marker)";
        } elseif ($arr[$x][1] == 'UH') {
            echo $arr[$x][0];
            echo " = (interjection)";
        } elseif ($arr[$x][1] == 'VB') {
            echo $arr[$x][0];
            echo " = (verb)";
        } elseif ($arr[$x][1] == 'VBG') {
            echo $arr[$x][0];
            echo " = (verb gerund)";
        } elseif ($arr[$x][1] == 'VBD') {
            echo $arr[$x][0];
            echo " = (verb past tense)";
        } elseif ($arr[$x][1] == 'VBN') {
            echo $arr[$x][0];
            echo " = (verb past participle)";
        } elseif ($arr[$x][1] == 'VBP') {
            echo $arr[$x][0];
            echo " = (verb, present tense not 3rd person singular)";
        } elseif ($arr[$x][1] == 'VBZ') {
            echo $arr[$x][0];
            echo " = (verb, present tense with 3rd person singular)";
        } elseif ($arr[$x][1] == 'WDT') {
            echo $arr[$x][0];
            echo " = (wh-determiner)";
        } elseif ($arr[$x][1] == 'WP') {
            echo $arr[$x][0];
            echo " = (wh- pronoun)";
        } elseif ($arr[$x][1] == 'WRB') {
            echo $arr[$x][0];
            echo " = (wh- adverb)";
        } else {
            echo " = (don't know)";
        }
        echo " / ";
    }
}

// $output = shell_exec('python C:/xampp/htdocs/Project4/Homepage/enhanced-subject-verb-object-extraction-master/demo.py  '.$stringText);
// echo "$output";

// $word = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/tagging.py ' . $stringText);
// echo "$word";


?>


