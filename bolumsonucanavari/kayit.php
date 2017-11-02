
     <div class="settings">
        <form action="?kayit" method="post">
            <div class="formic">
                <div class="title">Yeni Kayıt</div>
                <div class="satir">
                    <div class=verilen>Kullanıcı Adı :</div>
                    <div class="istenen">
                        <input type="text" name="kadi"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Sifre :</div>
                    <div class="istenen">
                        <input type="password" name="sifre"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Sifre Tekrar:</div>
                    <div class="istenen">
                        <input type="password" name="sifret"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Email :</div>
                    <div class="istenen">
                        <input type="email" name="posta"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Email Tekrar:</div>
                    <div class="istenen">
                        <input type="email" name="postat"/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen></div>
                    <div class="istenen2">
                        <input type="submit" name="uye" value="Gönder"/>
                    </div>
                </div>
            </div>
        </form>
    </div>

        <?php
        if(@$_POST['uye']){
            $kadi=$_POST['kadi'];
            $sifre=$_POST['sifre'];
            $sifret=$_POST['sifret'];
            $posta=$_POST['posta'];
            $postat=$_POST['postat'];
            $uye=mysqli_query($baglanti,"select * from uyeler where kadi='$kadi'");
            if($uyeler=mysqli_fetch_row($uye)>0){
        ?><div class="hata">
                Aynı kullanıcı adında üye var!!!!
        </div><?php
            }
            else{
                $kelime=strlen($sifre);
                 if($sifre==$sifret && $posta==$postat && $kelime>8){
                     $gun=date('d');
                     $ay=date('m');
                     $yil=date('Y');
                     $tarih="$gun.$ay.$yil";
                $kayitsql=mysqli_query($baglanti,"insert into uyeler (kadi,sifre,Email,tarih,yetki) values ('{$kadi}','{$sifre}','{$posta}','{$tarih}','0')");
                ?><div class="basari">Basarili Denemeler Falan Filan !1!2!1!12312^!23</div><?php
            }
                else if($kelime<8){
                ?><div class="hata">
                Şifre Kısa
                </div><?php  }
                else if($sifre!=$sifret){
                ?>
                <div class="hata">Şifreler uyuşmamaktadır.</div>
                <?php  } else{
                ?>
                <div class="hata">E-postalar uyuşmamaktadır.</div>
                <?php }    
        }     
      }      
    ?>