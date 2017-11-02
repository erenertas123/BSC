     <?php
        if(isset($_GET['n'])){
            $n=$_GET['n'];
                           
    ?>
        <div class="cont">
            <div class="sol">
                <div class="detay">
                    <div class="title">
                        <?php
                            $m=$n-1;
                            $k=$n+1;
                            $sonrakisql=mysqli_query($baglanti,"select * from haber where id='$k'");
                            $sonraki=mysqli_fetch_assoc($sonrakisql);
                            $oncekisql=mysqli_query($baglanti,"select * from haber where id='$m'");
                            $onceki=mysqli_fetch_assoc($oncekisql);
                            $habersql=mysqli_query($baglanti,"select * from haber where id='$n'");
                            
                            if($haber=mysqli_fetch_assoc($habersql)){
                               ?><h1><?php echo $haber['haber_title'];?></h1><?php 
                            } 
                        ?>
                    </div>
                    <div class="info">
                        <div class="tarih"><?php echo $haber['haber_tarih'] ?></div>
                        <div class="yazar"><?php echo $haber['haber_aut'] ?></div>
                        <div class="yorum"><?php echo $haber['haber_yorum'] ?></div>
                        <div class="yazdir">Yazdır</div>
                    </div>
                    <div class="genel">
                        <div class="metin">
                            <p>
                                <span></span>
                            </p>
                            <div style="text-align:center">
                                <img src="images/<?php echo $haber['haber_img'] ?>"/>
                            </div>
                            <div class="kisim">
                                <p><?php echo $haber['haber_cont']?></p>  
                            </div>
                            <div class="etiket">
                                <?php
                                $satirsql=mysqli_query($baglanti,"select haber_eti from haber where id='1'");
                                $satir=1;
                                 ?>
                            </div>
                            <div class="onson">
                                <?php
                                $oyunsql=mysqli_query($baglanti,"select oyun_isim from oyun where id='$n'");
                                if($oyun=mysqli_fetch_assoc($oyunsql)){
                                    ?><a href="" class="etiket"><?php echo $oyun['oyun_isim'] ?></a><?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="kontrol">
                            <div class="left"> 
                                 <?php if($m!=0){ ?>  
                                <a href="index.php?n=<?php $n=$_GET['n'];
                                         if($n==1){
                                             $n=1;
                                            echo $n;
                                         }
                                        else{
                                            $n=$n-1; 
                                            echo $n;
                                            }?>" class="onceki"></a>
                            
                                <a  href="index.php?n=<?php 
                                         if($n==1){
                                             $n=1;
                                             echo $n;
                                         }
                                        else{
                                            echo $n;
                                            }?>"class="gorsel">
                                    <img src="images/<?php 
                                        echo $onceki['haber_ozimg'];
                                              ?>"/>
                                </a>
                                <a  href="index.php?n=<?php
                                         if($n==1){
                                             $n=1;
                                             echo $n;
                                         }
                                        else{
                                            echo $n;
                                            }?>" class="isim"><?php echo $onceki['haber_title']; } ?></a> 
                                                
                        </div>
                        <div class="right">
                            <?php
                            $habersayisisql=mysqli_query($baglanti,"select count(*) from haber");
                            $habersayisi=mysqli_fetch_row($habersayisisql);
                            $h=$habersayisi[0]+1;
                            if($k!=$h){ ?>
                            <a href="index.php?n=<?php $n=$_GET['n'];
                                         if($n==$habersayisi[0]){
                                             $n=$habersayisi[0];
                                            echo $n;
                                         }
                                        else{
                                            $n=$n+1; 
                                            echo $n;
                                            }?>" class="sonraki"></a>
                               <a  href="index.php?n=<?php $n=$_GET['n'];
                                         if($n==$habersayisi[0]){
                                             $n=$habersayisi[0];
                                            echo $n;
                                         }
                                        else{
                                            $n=$n+1; 
                                            echo $n;
                                            }?>"class="gorsel">
                                    <img src="images/<?php echo $sonraki['haber_ozimg']; ?>"/>
                                </a>
                            <a href="index.php?n=<?php $n=$_GET['n'];
                                         if($n==$habersayisi[0]){
                                             $n=$habersayisi[0];
                                            echo $n;
                                         }
                                        else{
                                            $n=$n+1; 
                                            echo $n;
                                            }?>" class="isim"><?php echo $sonraki['haber_title']; ?></a> <?php } ?>         
                        </div>
                    </div>
                </div>    
                <div class="yorumlar">
                        <div class="title">Yorumlar</div>
                        <div class="comment">   
                            <div class="filtre">
                                Yorumlar yeniden eskiye doğru listelenmektedir. Sıralamayı değiştirmek için sağdaki menüyü kullanabilirsiniz.
                            </div>
                            <div class="icerik">
                                <div class="all">
                                    <?php
                                        $n=$_GET['n'];  
                                        $yorumsayisql=mysqli_query($baglanti,"select count(*) from yorum where haber_id='{$n}'");
                                        $yorumsayi=mysqli_fetch_row($yorumsayisql);
                                        $comment=$yorumsayi[0];
                                        $yorumsayikontrol=mysqli_query($baglanti,"update haber set haber_yorum='{$comment}' where id='{$n}'");
                                        if(isset($_GET['q'])){
                                            $q=$_GET['q'];
                                            $txtsql=mysqli_query($baglanti,"select * from yorum where yorum_id='{$q}'");
                                            $txt=mysqli_fetch_assoc($txtsql);
                                        }
                                    if(isset($_POST['Gonder'])){    
                                        $gun=date('d');
                                        $ay=date('m');
                                        $yil=date('Y');
                                        $tarih="$gun.$ay.$yil";
                                        $kadi=$_SESSION['no'];
                                        $atilanyorum=$_POST['yorum'];
                                        if(!empty($_POST['yorum'])){
                                        $yorumekle=mysqli_query($baglanti,"insert into yorum (yorum,yorum_tarih,yazar_id,haber_id,puan) values ('{$atilanyorum}','{$tarih}','{$kadi}','{$n}','0')");
                                        }
                                        $n=$_GET['n'];                
                                        $yorumarasql=mysqli_query($baglanti,"select * from yorum where yorum='{$atilanyorum}' and yorum_tarih='{$tarih}' and yazar_id='{$kadi}' and haber_id='{$n}' and puan='0'");
                                        $yorumara=mysqli_fetch_assoc($yorumarasql);
                                        if(isset($_GET['q'])){
                                            $alintiekle=mysqli_query($baglanti,"insert into alintiyorum (haber_id,yorum_id,yorum) values ('{$n}','{$yorumara['yorum_id']}}','{$txt['yorum']}')");
                                        }
                                        header("location:index.php?n=$n");
                                    }
                                        $yorumsql=mysqli_query($baglanti,"select * from yorum");
                                        while($yorum=mysqli_fetch_assoc($yorumsql)){
                                            $yid=$yorum['yazar_id'];
                                            $uyesql=mysqli_query($baglanti,"select * from uyeler where id='$yid'");
                                            $uye=mysqli_fetch_assoc($uyesql); 
                                            if(($n)==$yorum['haber_id']){ 
                                        ?>
                                    <div class="tek">
                                        <div class="info">
                                            <div class="ust">
                                                <div class="nt">
                                                    <p class="name"><?php echo $uye['kadi']; echo " ";?>
                                                        <?php if(@$_SESSION['no']==$yorum['yazar_id'] || @$_SESSION['statu']==1){?> 
                                                        <a href="?n=<?php $n=$_GET['n']; echo $n; ?>&ysil=<?php echo $yorum['yorum_id'];?>">sil</a><?php } ?></p>
                                                    <?php if(isset($_GET['ysil'])){
                                                        $sil=$_GET['ysil'];
                                                        $silsql=mysqli_query($baglanti,"delete from yorum where yorum_id='{$sil}'");
                                                        $silbegenisql=mysqli_query($baglanti,"delete from yorum_begen where yorum_id='{$sil}'");
                                                        $alintigetirsql=@mysqli_query($baglanti,"select alinti_yorum_id from alintiyorum where yorum_id='{$sil}'");
                                                        if($alintigetir=@mysqli_fetch_assoc($alintigetirsql)){
                                                            $alintisil=@mysqli_query($baglanti,"delete from alintiyorum where yorum_id='{$sil}'");
                                                        }
                                                        header("location:index.php?n=$n");
                                                    } ?>
                                                    <p class="tarih"><?php echo $yorum['yorum_tarih']; ?></p>
                                                </div>
                                            </div>
                                            <div class="alt">
                                                <?php  
                                                    if(isset($_GET['a'])){
                                                        $a=$_GET['a'];
                                                        if(isset($_SESSION['oturum'])){
                                                            if($a==$yorum['yorum_id']){
                                                                $begensql=mysqli_query($baglanti,"select * from yorum_begen");
                                                                $begen=mysqli_fetch_assoc($begensql);
                                                                $ppuan=$yorum['puan']+1;
                                                                $distolikesql=mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$a}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='0'");
                                                                $distolike=mysqli_fetch_assoc($distolikesql);
                                                                 $likearamasql=mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$a}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='1'");
                                                                $likearama=mysqli_fetch_assoc($likearamasql);
                                                                if($likearama){
                                                                   $likesil=mysqli_query($baglanti,"delete from yorum_begen where yorum_id='{$a}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='1'");
                                                                    $yeni=$yorum['puan']-1;
                                                                    $duzeltl=mysqli_query($baglanti,"update yorum set puan='{$yeni}' where yorum_id='{$a}'");
                                                                    header("location:index.php?n=$n");
                                                                }
                                                                else if($distolike){
                                                                    $yeni=$yorum['puan']+2;
                                                                    $dislikadon=mysqli_query($baglanti,"update yorum set puan='{$yeni}' where yorum_id='{$a}'");
                                                                    $duzeltltd=mysqli_query($baglanti,"update yorum_begen set begen='1' where yorum_id='{$a}'");
                                                                    header("location:index.php?n=$n");
                                                                }
                                                                else{
                                                                $guncelle=mysqli_query($baglanti,"update yorum set puan='{$ppuan}' where yorum_id='{$a}'");
                                                                $like=mysqli_query($baglanti,"insert into yorum_begen (yorum_id,yazar_id,haber_id,begen) values ('{$a}','{$_SESSION['no']}','{$n}','1')");
                                                                    header("location:index.php?n=$n");
                                                                }    
                                                            }
                                                        }
                                                        else{
                                                            header("location:kayit.php");
                                                        }
                                                    }
                                                    $likesql=@mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$yorum['yorum_id']}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='1'");
                                                    if($like=mysqli_fetch_row($likesql)>0){ 
                                                        ?><a href="?n=<?php echo $n; ?>&a=<?php echo $yorum['yorum_id'];?>" class="artia"></a><?php
                                                    }
                                                else{
                                                ?>
                                                <a href="?n=<?php echo $n; ?>&a=<?php echo $yorum['yorum_id'];?>" class="arti"></a>
                                                <?php }    
                                                if(isset($_GET['e'])){
                                                    $e=$_GET['e'];
                                                        if(isset($_SESSION['oturum'])){          
                                                            if($e==$yorum['yorum_id']){
                                                                $begensql=mysqli_query($baglanti,"select * from yorum_begen");
                                                                $begen=mysqli_fetch_assoc($begensql);
                                                                $npuan=$yorum['puan']-1;
                                                                $liketodissql=mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$e}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='1'");
                                                                $liketodis=mysqli_fetch_assoc($liketodissql);
                                                                $disaramasql=mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$e}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='0'");
                                                                $disarama=mysqli_fetch_assoc($disaramasql);
                                                                if($disarama){
                                                                    $dislikesil=mysqli_query($baglanti,"delete from yorum_begen where yorum_id='{$e}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='0'");
                                                                    $eski=$npuan+2;
                                                                    $duzeltd=mysqli_query($baglanti,"update yorum set puan='{$eski}' where yorum_id='{$e}'");
                                                                    header("location:index.php?n=$n");
                                                                } 
                                                                else if($liketodis){
                                                                    $eksi=$yorum['puan']-2;
                                                                    $dislikadon=mysqli_query($baglanti,"update yorum set puan='{$eksi}' where yorum_id='{$e}'");
                                                                    $duzeltltd=mysqli_query($baglanti,"update yorum_begen set begen='0' where yorum_id='{$e}'");
                                                                    header("location:index.php?n=$n");
                                                                }
                                                                else{
                                                                $guncelle=mysqli_query($baglanti,"update yorum set puan='{$npuan}' where yorum_id='{$e}'");
                                                                $dislike=mysqli_query($baglanti,"insert into yorum_begen (yorum_id,yazar_id,haber_id,begen) values ('{$e}','{$_SESSION['no']}','{$n}','0')"); 
                                                                    header("location:index.php?n=$n");
                                                                }                                                    
                                                            }
                                                        }                                                 
                                                        else{
                                                           header("location:kayit.php");
                                                            phpAlert("Yorum Beğenebilmek için Üyelik gerekiyor!!!");
                                                        }  
                                                }
                                                $dislikesql=@mysqli_query($baglanti,"select * from yorum_begen where yorum_id='{$yorum['yorum_id']}' and yazar_id='{$_SESSION['no']}' and haber_id='{$n}' and begen='0'"); 
                                                if($dislike=mysqli_fetch_row($dislikesql)>0){
                                                ?><a href="?n=<?php echo $n; ?>&e=<?php echo $yorum['yorum_id'];?>" class="eksia"></a><?php
                                                }
                                                else{?>
                                                <a href="?n=<?php echo $n; ?>&e=<?php echo $yorum['yorum_id'];?>" class="eksi"></a><?php } ?>
                                                <span class="pmalinti">
                                                    <a href="?n=<?php echo $n;?>&q=<?php echo $yorum['yorum_id']; ?>" class="alinti"></a>
                                                    <a href="" class="pm"></a>
                                                </span>
                                                <span class="puan"><?php echo $yorum['puan']; ?></span>
                                            </div>
                                        </div>
                                        <?php 
                                            $alintisql=mysqli_query($baglanti,"select * from alintiyorum where yorum_id='{$yorum['yorum_id']}'");
                                            $alintiyorum=mysqli_fetch_assoc($alintisql);?>
                                        <div class="quo"><?php if($alintiyorum){ echo "Alinti: "; echo $alintiyorum['yorum']; }?></div>
                                        <div class="deneme"><?php echo $yorum['yorum'];?></div>
                                    </div>
                                    <?php  } } ?>
                                </div>
                                <div class="sayfa">Siz de aşağıdaki form aracılığıyla yorum yapabilirsiniz.</div>
                            </div>
                            <div class="yorumy">
                                <span>Yorum Yap</span>
                                <a href="" class="link">Forum Arayüz vs.</a>
                            </div>
                            <?php 
                                if((isset($_SESSION['oturum']))){
                            ?>
                            <div class="form">
                                <div class="ust">
                                    <div class="title">
                                        Mesajınız
                                    </div>
                                </div>
                                <div class="orta">
                                    <form action="" method="post">
                                     <?php if(isset($_GET['q'])){
                                        ?>
                                        <input type="text" name="Alinti" class="alinti" placeholder="<?php echo "Alinti: "; echo $txt['yorum']; ?>" disabled/>
                                        <?php } if(isset($_SESSION['yetki'])==-1){
                                
                                        }?>                           
                                        <textarea class="alan" name="yorum" <?php if(@$_SESSION['statu']!=-1){
                                        ?> placeholder="Yorum Yap" <?php
                                        }else {?>
                                       placeholder="Banlısın";<?php } ?>
                                        <?php if(@$_SESSION['statu']==-1){
                                            echo "disabled";
                                        } ?>></textarea>
                                        <input type="submit" value="" name="Gonder" class="putton">
                                    </form>
                                </div>
                            </div>
                              <div class="uyari">
                            <?php 
                                    echo "Yorum yapabilmek için giriş yapmış olmalısınız!";
                                 ?>
                            </div>
                            <?php } ?>
                     </div>
                </div>    
            </div>
        </div>
    </div>
<?php } ?>