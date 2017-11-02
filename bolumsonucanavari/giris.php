<?php 
if(isset($_SESSION['oturum'])){
?>
<div class="profil">
    <div class="sol">
        <div class="isim"><a href=""><?php echo $_SESSION['isim'];?></a></div>
        <div class="ayarlar">
            <form action="" method="post">
                <input type="submit" name="set" class="link" value="Ayarlar"/>
                <input type="submit" name="exit" class="cikis" value="Çıkış Yap"/>
            </form>             
        </div>
    </div>
    <div class="foto">
        <a href="">
            <img src="images/<?php echo $_SESSION['resim']; ?>"/>
        </a>     
    </div>
</div>
<?php } else{   
?>
    <div class="giris">
        <form action="" method="post" class="form1">
			<input name="kadi" type="text" placeholder="Kullanıcı Adı" class="nickname"/>		
            <input name="sifre" type="password"  placeholder="*******"  class="pass"/>
                <span class="hatirla">
                    <input id="CheckBox" type="checkbox" name="Beni Hatırla" checked="checked"/>
				</span>
            <input name="giris" type="submit" class="buton"/>
        </form>
    </div>    
				<div id="Register" class="linkler">
				<a href="kayit.php" title="Yeni Kayıt">
				<strong>Yeni Kayıt</strong></a>
				<br>
				<a href="https://www.twitter.com/">Şifremi Unuttum</a>
				</div>
<?php  } 
    else if(isset($_POST['exit']))  {
        $_SESSION['oturum']="kapali";
        header("location:index.php");
    }

?>