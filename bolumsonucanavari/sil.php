<?php
   if(isset($_GET['sil'])){
       $sil=$_GET['sil'];
   }
    $habersilsql=mysqli_query($baglanti,"delete from haber where id='{$sil}'");
    $yorumgetirsql=mysqli_query($baglanti,"select * from yorum where haber_id='{$sil}'");
            while($yorumgetir=mysqli_fetch_assoc($yorumgetirsql)){
                $yorumsilsql=mysqli_query($baglanti,"delete from yorum where haber_id='{$sil}'");
            }
        $alintigetirsql=mysqli_query($baglanti,"select * from alintiyorum where haber_id='{$sil}'");
            while($alintigetir=mysqli_fetch_assoc($alintigetirsql)){
                $alintisilsql=mysqli_query($baglanti,"delete from alintiyorum where haber_id='{$sil}'");
            }
        $begenigetirsql=mysqli_query($baglanti,"select * from yorum_begen where haber_id='{$sil}'");
            while($begenigetir=mysqli_fetch_assoc($begenigetirsql)){
                $begenisil=mysqli_query($baglanti,"delete from yorum_begen where haber_id='{$sil}'");
            }
    if($habersilsql){
        header("location:index.php");
    }
?>