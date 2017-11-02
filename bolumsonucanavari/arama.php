<?php
    if(isset($_POST['aramabutton'])){
     $arama=$_POST['Search'];
    }
    $uyearasql=mysqli_query($baglanti,"select * from uyeler where kadi like '%{$arama}%'");
    $aramasql=mysqli_fetch_assoc($uyearasql);
?>
<div class="sonuc">
        <div class="ilk">
            <div class="title">OYUNLAR</div>
            <?php
                $oyunarasql=mysqli_query($baglanti,"select * from oyun where oyun_isim like '%{$arama}%'");
                while($oyunara=@mysqli_fetch_assoc($oyunarasql)){
                ?><a href="?oyun=<?php echo $oyunara['id']; ?>" class="link"><?php echo $oyunara['oyun_isim'];?><br><?php
                }
             ?> 
            </a>
               </div>
        <div class="iki">
            <div class="title">KULLANICILAR</div>
            
            <?php 
                $kullaniciarasql=mysqli_query($baglanti,"select * from uyeler where kadi like '%{$arama}%'");
                while($kullaniciara=@mysqli_fetch_assoc($kullaniciarasql)){
                   ?><a href="?profil=<?php echo $kullaniciara['id']; ?>" class="link"><?php echo $kullaniciara['kadi'];?></a><br><?php
                } ?>
        </div>
    </div>