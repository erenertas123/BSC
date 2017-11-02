<?php if(isset($_GET['settings'])){ ?> 
    <div class="settings">
        <form action="" method="post">
            <div class="formic">
                <div class="title">Ayarlar</div>
                <div class="satir">
                    <div class=verilen>Sifre :</div>
                    <div class="istenen">
                        <input type="password" name="sifre"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Email :</div>
                    <div class="istenen">
                        <input type="email" name="mail"/>
                    </div>
                </div>
                <?php if(@$_SESSION['statu']==1){?>
                <div class="satir">
                    <div class=verilen>Bir Sayfadaki Haber Sayısı: </div>
                    <div class="istenen">
                        <input type="text" name="sayfa"/>
                    </div>
                </div>
                <?php } ?>
                <div class="satir">
                    <div class=verilen></div>
                    <div class="istenen2">
                        <input type="submit" name="buton1" value="Gönder"/>
                    </div>
                </div>
            </div>
        </form>
    </div>


<?php
    if(isset($_POST['buton1'])){
        $sifre=$_POST['sifre'];
        $mail=$_POST['mail'];
        $sayfa=$_POST['sayfa'];
        $numara=$_SESSION['no'];
        $uzunluk=strlen($sifre);
        if($sifre>8){
        $uye=mysqli_query($baglanti,"update uyeler set sifre='{$sifre}' where id='{$numara}' ");
        }
        else{
            phpAlert("8 harften kısa olamaz");
        }
        $mail=mysqli_query($baglanti,"update uyeler set Email='{$mail}' where id='{$numara}'");
        if($mail || $uye){
            header("location:index.php");
        }
        if(empty($sayfa) || !is_numeric($sayfa)){
            $sayfa=1;
        }
        else{
            $_SESSION['sayfa']=$sayfa;
        }
        
    }
}
?>