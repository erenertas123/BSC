		<div class="header">
			<div class="link">
				<span class="sol">
					<a href="localhost:8080/bolumsonucanavari/index.php">Forum</a>
					<a href="asasdasd">Hakkımızda</a>
					<a href="asdasdasd">Reklam</a>
					<a href="https://www.facebook.com/" class="face">Facebook</a>
					<a href="https://twitter.com/"class="twitter">Twitter</a>
					<a href="https://www.youtube.com/" class="youtube">Youtube</a>
					<a href="https://www.twitch.tv/"class="twitch">Twitch</a>
					<a href="https://www.bolumsonucanavari.com/Rss/BSC.htm"class="rss">RSS</a>
				</span>
				<span class="sag">
                    <?php if(isset($_SESSION['oturum'])){
                    ?>
                    <font color="#000"><b><a href="?profil=<?php echo $_SESSION['no']; ?>">Profil</a></b></font>
                    <?php }
                    else{ ?>
                        <span class="sag2">Bunlarlar Giriş Yapın:</span>
					<a href="https://www.facebook.com/" class="facebaglantısı">
					<img src="images/logos/icon-facebooklogin.png"/>Facebook
					</a>
					<a href="?kayit"><strong>Yeni Kayıt</strong></a>
                 <?php  } ?>
				</span>
			</div>
			<div class="logo">
				<div class="logosol">	
					<a href="index.php">
					<img src="images/Logobsc.png"/>
					</a>
				</div>
				<div class="arama">
                    <form action="?arama" method="post">
				<input  name="Search" type="text" class="kutu" placeholder="Arama Terimi..">
                <input  name="aramabutton" type="submit" value="ARA" class="buton"/>
                    </form>
				</div>             
                <?php 
                if(isset($_POST['giris'])){
                        $kadi=$_POST['kadi'];
                        $sifre=$_POST['sifre'];
                        $uyelersql=mysqli_query($baglanti,"select * from uyeler where kadi='$kadi' and sifre='$sifre'");
                        if($uye=mysqli_fetch_assoc($uyelersql)){
                            $_SESSION['oturum']="acik";
                            $_SESSION['isim']=$uye['kadi'];
                            $_SESSION['mail']=$uye['Email'];
                            $_SESSION['resim']=$uye['img'];
                            $_SESSION['no']=$uye['id'];
                            $_SESSION['statu']=$uye['yetki'];
                            header("refresh:0");
                           
                        }
                        else{
                            phpAlert("Üye yok");
                        }
                }
                    if(isset($_POST['exit'])){
                        session_destroy();
                        header("location:index.php");
                    }
                    if(isset($_POST['set'])){
                        header("location:index.php?settings");
                    }
                  ?>
                <?php
                    if(isset($_SESSION['oturum'])){?>
                      <div class="profil">
                          <div class="sol">
                            <div class="isim">
                                <?php if($_SESSION['statu']==1){
                                        echo "Admin"; echo " ";
                                        $sonhabersql=mysqli_query($baglanti,"select * from haber order by id desc limit 1");
                                        $sonhaber=mysqli_fetch_row($sonhabersql);
                                        $son=$sonhaber[0]+1;
                                        ?><a href="index.php?ekle=<?php echo $son;?>">Haber Ekle</a>
                                        <?php echo " ";
                                        $sonoyunsql=mysqli_query($baglanti,"select * from oyun order by id desc limit 1");
                                        $sonoyun=mysqli_fetch_row($sonoyunsql);
                                        $sonoyun[0]++;
                                        ?>
                                        <a href="index.php?cikacak=<?php echo $sonoyun[0] ?>">Oyun Ekle</a>
                                <?php 
                                } ?>
                                <a href=""><?php echo $_SESSION['isim'];?> </a>
                            </div>
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
                <?php    }
                    else {
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
				    <a href="?kayit" title="Yeni Kayıt">
				    <strong>Yeni Kayıt</strong>
                    </a>
				<br>
				    <a href="https://www.twitter.com/">Şifremi Unuttum</a>
				</div>
                <?php } ?>
			</div>
			<div class="kategori">
				<div class="menu">
					<a href="http://localhost:8080/bolumsonucanavari/index.php" class="aktifpage">
					ANASAYFA
						<span></span>
					</a>
					<a href="file:///C:/Users/TULPAR/Desktop/bolumsonucanavar%C4%B1/PC.html" class="PC">PC
					</a>
					<a href="file:///C:/Users/TULPAR/Desktop/bolumsonucanavar%C4%B1/index.html" class="PC">SONY
					</a>
					<a href="file:///C:/Users/TULPAR/Desktop/bolumsonucanavar%C4%B1/index.html" class="PC">MICROSOFT
					</a>
					<a href="file:///C:/Users/TULPAR/Desktop/bolumsonucanavar%C4%B1/index.html" class="PC">NINTENDO
					</a>
					<a href="file:///C:/Users/TULPAR/Desktop/bolumsonucanavar%C4%B1/index.html" class="PC">MOBIL
					</a>
					<a href="https://www.bolumsonucanavari.com">
					<img src="images/logos/msi-ozel-sayfa.png"/></a>
					<a href="https://www.bolumsonucanavari.com">
					<img src="images/logos/vrmsi2016.png"/></a>
					<a href="http://www.bolumsonucanavari.com" class="oyunserisi1">
					<img src="images/logos/oyunserisi.png"/></a>
				</div>
				<div class="icerik">
					<a href="https://www.bolumsonucanavari.com">BSC Videoları</a>
					<a href="https://www.bolumsonucanavari.com">Oyun Videoları</a>
					<a href="https://www.bolumsonucanavari.com">Haberler</a>
					<a href="https://www.bolumsonucanavari.com">Oyunlar</a>
					<a href="https://www.bolumsonucanavari.com">İncelemeler</a>
					<a href="https://www.bolumsonucanavari.com">Ön İncelemer</a>
					<a href="https://www.bolumsonucanavari.com">Çıkış Tarihleri</a>
					<a href="https://www.bolumsonucanavari.com">Dosya Konusu</a>
					<a href="https://www.bolumsonucanavari.com">Tam Çözüm</a>
					<a href="https://www.bolumsonucanavari.com">Kullanıcı Videoları</a>
				</div>
			</div>
		</div>
