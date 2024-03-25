<?php
if(isset($_POST['select']) && $_POST['select'] !=0){
    include_once("polaczenie.php");
    $idu = $_POST['select'];
    $polaczenie->query("DELETE FROM uczniowie WHERE idu=$idu");
    $polaczenie=null;
}
header("location: index.php")
?>