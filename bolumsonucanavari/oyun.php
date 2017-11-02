<?php 
    if(isset($_GET['oyun'])){
        $oyun=$_GET['oyun'];
    }
    $oyunarasql=mysqli_query($baglanti,"select * from oyun where id='{$oyun}'");
    $oyunara=mysqli_fetch_assoc($oyunarasql);
if(isset($_SESSION['oturum'])){
    $uyearasql=mysqli_query($baglanti,"select * from uyeler where id='{$_SESSION['no']}'");
    $uyeara=mysqli_fetch_assoc($uyearasql);
?>
<div class="profil">
    <div class="title">Oyunun Profili</div>
    <div class="isim"><?php echo $oyunara['oyun_isim'];echo " ";if(@$_SESSION['statu']==1){
        ?><a href="?oyun=<?php echo $oyunara['id']; ?>&osil=<?php echo $oyunara['id']; ?>">sil</a><?php $id=$oyunara['id'];
        $ratingsql=mysqli_query($baglanti,"select rating from oyun where id='{$oyun}'");
        $rating=mysqli_fetch_assoc($ratingsql);
        echo $rating['rating'];
        if(isset($_GET['osil'])){
            $oyunsilsql=mysqli_query($baglanti,"delete from oyun where id='{$id}'");
            header("location:index.php");
        } }?></div>
    <div class="resim"><img src="images/<?php echo $oyunara['oyun_img']; ?>"></div>
    <div class="mail"><?php echo $oyunara['yapimci']; ?></div>
    <div class="title">Bu Oyuna Attığınız Yorumlar</div>
    <div class="yorum">
    <?php
        $haberarasql=mysqli_query($baglanti,"select * from haber where oyun_id='{$oyun}'");
        $haberara=mysqli_fetch_assoc($haberarasql);
        $id=$haberara['id'];
        $yorumarasql=mysqli_query($baglanti,"select * from yorum where haber_id='{$id}' and yazar_id='{$_SESSION['no']}'");
        while($yorumara=@mysqli_fetch_assoc($yorumarasql)){
          echo $yorumara['yorum_tarih']; echo " Tarihinde "; echo $yorumara['yorum']; echo " yorumu atıldı.";
        ?><br><?php
        }
?>
    </div>
    <div class="title">Bu Oyuna Atılan Yorumlar</div>
        <div class="yorum">
        <?php
            $yorumarasql=mysqli_query($baglanti,"select * from yorum where haber_id='{$oyunara['id']}'");
            while($yorumara=mysqli_fetch_assoc($yorumarasql)){
                echo $yorumara['yorum_tarih']; echo " Tarihinde "; echo $yorumara['yorum']; echo " yorumu atıldı.";
            ?><br><?php
            }
    ?>
        </div>
</div><?php } else { 
    $oyunarasql=mysqli_query($baglanti,"select * from oyun where id='{$oyun}'");
    $oyunara=mysqli_fetch_assoc($oyunarasql);
?>
    <div class="profil">
        <div class="title">Oyunun Profili</div>
        <div class="isim"><?php echo $oyunara['oyun_isim'];?></div>
        <div class="resim"><img src="images/<?php echo $oyunara['oyun_img']; ?>"></div>
        <div class="mail"><?php echo $oyunara['yapimci']; ?></div>
        <div class="title">Bu Oyuna Atılan Yorumlar</div>
        <div class="yorum">
        <?php
            $yorumarasql=mysqli_query($baglanti,"select * from yorum where haber_id='{$oyunara['id']}'");
            while($yorumara=mysqli_fetch_assoc($yorumarasql)){
                echo $yorumara['yorum_tarih']; echo " Tarihinde "; echo $yorumara['yorum']; echo " yorumu atıldı.";
            ?><br><?php
            }
    ?>
        </div>
    </div>
<?php } ?>
