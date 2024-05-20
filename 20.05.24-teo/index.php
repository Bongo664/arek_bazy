<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $polaczenie = new mysqli("localhost", "root","","szkola",3306)?>
    <?php $zapytanie = $polaczenie->query("SELECT id, nazwa FROM szkola;")?>
    <form name="formularz2ct" id="formularz2ct">
        <select name="dane" id="dane">
            <?php while(list($id,$nazwa)=mysqli_fetch_row($zapytanie)){
                echo("<option value='$nazwa'>$id</option>");
                }?>
        </select>
    </form>
    <?php $polaczenie->close();?>

    <div style="border:1px solid black;border-radius:20px;width:500px;padding:20px;margin:auto;" id="wynik"></div>
    <script>
            //let nazwa = document.getElementById("nazwa").value;
            //let nazwa = document.getElementsByName("nazwa")[0].value;
            //let nazwa = document.forms["formularz2ct"].elements["nazwa"].value;            
            let odwolanie_do_select = document.getElementById("dane");
            odwolanie_do_select.addEventListener("change", (event)=>{
                if(event.target.value.length!=0){
                    console.log(event.target.value);
                let wynik = document.getElementById("wynik");
                wynik.innerHTML = "imie = " +event.target.value;    
                }
                else{
                    let wynik = document.getElementById("wynik");
                    wynik.innerHTML = "brak danych";
                }
            });
        
    </script>
    
</body>
</html>