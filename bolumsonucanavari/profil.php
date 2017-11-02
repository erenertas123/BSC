<?php 
    if(isset($_GET['profil'])){
        $profil=$_GET['profil'];
    }
if(isset($_SESSION['oturum'])){
    $uyearasql=mysqli_query($baglanti,"select * from uyeler where id='{$profil}'");
    $uyeara=mysqli_fetch_assoc($uyearasql);
    $yetki=$_SESSION['statu'];
?>
<div class="profil">
    <div class="title">Profil Özeti</div>
    <div class="isim"><?php echo $uyeara['kadi']; echo " ";if($yetki==1){
        ?><a href="?profil=<?php echo $uyeara['id']; ?>&ksil=<?php echo $uyeara['id']; ?>">sil</a><?php $id=$uyeara['id'];
        if(isset($_GET['ksil'])){
            $kullanicisilsql=mysqli_query($baglanti,"delete from uyeler where id='{$id}'");
            $yorumarasql=mysqli_query($baglanti,"select * from yorum where yazar_id='{$id}'");
            while($yorumara=mysqli_fetch_assoc($yorumarasql)){
                $yorum=$yorumara['yorum_id'];
                $alintisql=mysqli_query($baglanti,"select * from alintiyorum where yorum_id='{$yorum}'");
                if($alinti=mysqli_fetch_assoc($alintisql)){
                    $alintiyorumu=$alinti['alinti_yorum_id'];
                    $alintisil=mysqli_query($baglanti,"delete from alintiyorum where alinti_yorum_id='{$alintiyorumu}'");
                }
            }
            $yorumsilsql=mysqli_query($baglanti,"delete from yorum where yazar_id='{$id}'");
            $yorumbegensilsql=mysqli_query($baglanti,"delete from yorum_begen where yazar_id='{$id}'");
            header("location:index.php");
        }
    }
    if(isset($uyeara['yetki'])!=-1){
        phpAlert($uyeara['yetki']);
        echo " ";?><a href="?profil=<?php echo $uyeara['id'];?>&ban=<?php echo $uyeara['id']; ?>">ban</a><?php 
         if(isset($_GET['unban'])){
            $ban=$_GET['unban'];
            $banlasql=mysqli_query($baglanti,"update uyeler set yetki='-1' where id='{$ban}'");
            if($banlasql){
            }
        }       
             
    }
    else{
        echo " ";?><a href="?profil=<?php echo $uyeara['id'];?>&unban=<?php echo $uyeara['id']; ?>">unban</a><?php 
        if(isset($_GET['ban'])){
            $unban=$_GET['ban'];
            $unbanlasql=mysqli_query($baglanti,"update uyeler set yetki='0' where id='{$unban}'");
            if($unbanlasql){
            }
        }     
    }
        ?>
    </div>
    <div class="resim"><img src="images/<?php echo $uyeara['img']; ?>"></div>
    <div class="mail"><?php echo $uyeara['Email']; ?></div>
    <div class="title">Attığınız Yorumlar</div>
    <div class="yorum">
    <?php
        $yorumarasql=mysqli_query($baglanti,"select * from yorum where yazar_id='{$uyeara['id']}'");
        while($yorumara=mysqli_fetch_assoc($yorumarasql)){
            echo $yorumara['yorum_tarih']; echo " Tarihinde "; echo $yorumara['yorum']; echo " yorumu atıldı.";
        ?><br><?php
        }
?>
    </div>
</div><?php }else { 
    $uyearasql=mysqli_query($baglanti,"select * from uyeler where id='{$profil}'");
    $uyeara=mysqli_fetch_assoc($uyearasql);
?>
    <div class="profil">
    <div class="title">Profil Özeti</div>
    <div class="isim"><?php echo $uyeara['kadi'];?></div>
    <div class="resim"><img src="images/<?php echo $uyeara['img']; ?>"></div>
    <div class="mail"><?php echo $uyeara['Email']; ?></div>
    <div class="title">Kullanıcının Attığı Yorumlar</div>
    <div class="yorum">
    <?php
        $yorumarasql=mysqli_query($baglanti,"select * from yorum where yazar_id='{$uyeara['id']}'");
        while($yorumara=mysqli_fetch_assoc($yorumarasql)){
            echo $yorumara['yorum_tarih']; echo " Tarihinde "; echo $yorumara['yorum']; echo " yorumu atıldı.";
        ?><br><?php
        }
?>
    </div>
</div>
<?php } ?>
