<?php 

$baglanti=@mysqli_connect("localhost","root","","bsc");
mysqli_set_charset($baglanti,"utf8");
mysqli_query($baglanti,"set names 'utf-8' collate 'utf8_turkish_ci'");
if(!$baglanti){
    echo "Hatalı deneme";
}

?>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>