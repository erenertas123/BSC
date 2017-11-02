<?php
if(isset($_GET['settings'])){
    include("ayarlar.php");
}
else if(isset($_GET['n'])){
    include("haberler.php");
}
else if(isset($_GET['arama'])){
    include("arama.php");
}
else if(isset($_GET['profil'])){
    include("profil.php");
}
else if(isset($_GET['kayit'])){
    include("kayit.php");
}
else if(isset($_GET['oyun'])){
    include("oyun.php");
}
else if(isset($_GET['ekle'])){
    include("ekle.php");
}
else if(isset($_GET['sil'])){
    include("sil.php");
}
else if(isset($_GET['cikacak'])){
    include("cikacak.php");
}
else{
?>
<div class="Frame">
			<div class="manset">
				<div class="msol">
					<div class="slider">
						<div class="manseticerigi">
							<div class="contentdivi">
                                <?php  
                                    $gundemsql=mysqli_query($baglanti,"select * from haber order by haber_yorum desc limit 1");
                                    $gundem=mysqli_fetch_assoc($gundemsql);
                                ?>
								<a href="index.php?n=<?php echo $gundem['id']; ?>" class="gorsel">
								<img src="images/<?php echo $gundem['haber_img']; ?>">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="populericerik">
					<div class="baslik">
					POPÜLER İÇERİK
						<span>
						Son 3 Gün
						</span>
                        <?php 
                        ?>
					</div>
					<div class="kutular">
                        <?php
                            $ilkikisql=mysqli_query($baglanti,"select * from haber order by haber_yorum DESC limit 2");
                            while($ilkiki=mysqli_fetch_assoc($ilkikisql)){
                        ?>
							<a href="https://www.bolumsonucanavari.com/
							Haberler-Middleearth_Shadow_of_Wardan_Oynanis_Teaseri_Geldi-86317.htm" 
							class="tek">
								<img src="images/<?php echo  $ilkiki['haber_img']; ?>" width="192" height="115" class="cover"/>
								<div class="isim">
								<?php echo $ilkiki['haber_title_oz'];  ?>
										<div class="title">
											<p><?php echo $ilkiki['haber_title']; ?></p>
											<span class="ozet">
												<span>
													<strong><?php echo $ilkiki['haber_tarih']; ?></strong>
												<?php echo $ilkiki['haber_ozet']; ?>
												</span>
											</span>
										</div>
								</div>
							</a>
						<?php } ?>
					</div>
					<div class="liste">
					<?php 
                    $populerhabersql=mysqli_query($baglanti,"select * from haber order by haber_yorum desc");
					while($populerhaber=mysqli_fetch_assoc($populerhabersql)){
					?>
							<div class="tek">
								<div class="tur">
									<img src="images/logos/tur-haber.gif"/>
								</div>
								<div class="detay">
									<div class="isim">
										<a href="index.php?n=<?php echo $populerhaber['id']; ?>" class="text">
										<?php echo $populerhaber['haber_title']; ?>
										</a>
									</div>
								</div>
								<div class="yorum">
									<?php echo $populerhaber['haber_yorum']; ?>
								</div>
								<div class="title">
									<div class="resim">
										<img src="images/<?php echo $populerhaber['haber_img'] ?>" width="140" height="84"/>
										<strong>10 MART</strong>
									</div>
									<div class="previ">
										<a href="index.php?n=<?php echo $populerhaber['id']; ?>"><?php echo $populerhaber['haber_title']; ?></a>
										<span><?php echo $populerhaber['haber_ozet'];?></span>
									</div>
								</div>
							</div>
					<?php } ?>
						</div>					
				</div>
			</div>
			<div class="altman" style="border-left:0px solid #ededed;border-right:-10px solid #ededed; background-color:#ededed;">
				<ul class="bignews">
				<?php 
                $randomsql=mysqli_query($baglanti,"select * from haber ORDER BY RAND() LIMIT 4");
				while($random=mysqli_fetch_assoc($randomsql)){
				?>
					<li class="ilk">
						<a href="index.php?n=<?php echo $random['id']; ?>">
							<img src="images/<?php echo $random['haber_img']; ?>"/>
						</a>
						<span class="ozet" style="box-sizing:border-box; padding:0px 2px;">
						<?php echo $random['haber_ozet']; ?>
						</span>
					</li>
				<?php } ?>					
				</ul>
			</div>
		</div>
		<div class="haberler">
			<div class="sol">
				<div class="liste">
					<div class="baslik">
						En Güncel Haberler
					</div>
					<div class="Anasayfa">
				        <?php 
                                if(isset($_GET['s'])){
                                    $s=@$_GET['s'];
                                   
                                }
                              if(@$_SESSION['sayfa']){
                                  $adet=$_SESSION['sayfa'];
                              }
                             else{
                               $adet=3;
                             }
                              $habersayisisql=mysqli_query($baglanti,"select count(id) from haber");
                              $habersayisi=mysqli_fetch_row($habersayisisql);
                              $sayfasayisi=ceil($habersayisi[0]/$adet);
                               
                                  if(isset($_GET['s'])){
                                  $baslangic=($s*$adet)-$adet;
                                  $habersql=mysqli_query($baglanti,"SELECT * FROM haber ORDER BY DATE_FORMAT(haber_tarih,'%d%m%Y') ASC LIMIT  $baslangic,$adet");
                                 
                                  }
                                  else {
                                    $habersql=mysqli_query($baglanti,"SELECT * FROM haber ORDER BY DATE_FORMAT(haber_tarih,'%d%m%Y') ASC LIMIT 0,$adet");
                                      $s=1;
                                  }
                        while($haber=@mysqli_fetch_assoc($habersql))
                        {
                            $hid=$haber['id'];
                        ?>
                        <div class="tek">
							<div class="resim">
								<a href="index.php?n=<?php echo $hid ?>" class="gorsel">
								<img src="images/<?php echo $haber['haber_ozimg'] ?>"/>
								</a>
								<a href="index.php?n=<?php echo $hid; ?>" class="yorum">
									<?php echo $haber['haber_yorum']; ?>
								</a>
								<span class="tarih">
								<?php echo $haber['haber_tarih']; ?>
								</span>
							</div>
							<div class="detay">
								<span class="isim">
									<a href="index.php?n=<?php echo $hid; ?>">
									<?php echo $haber['haber_title'];?>
									</a>
                                     <?php  if(@$_SESSION['statu']==1){
                                ?><a href="?sil=<?php echo $haber['id']; ?>" class="sil">sil</a><?php } ?>
								</span>
								<span class="aciklama">
									<?php echo $haber['haber_ozet']; ?>
								</span>
								<span class="bilgi">
									<a href="https://bolumsonucanavari.com/" class="editor">
									<?php echo $haber['haber_aut']; ?>
									</a>
                                    <?php 
                                     $tagsql=mysqli_query($baglanti,"select etiket_id from newtag where haber_id='$hid'");
                                     
                                    while($tag=mysqli_fetch_assoc($tagsql))
                                    {
                                        $tage=$tag['etiket_id'];
                                        $etiketsql=mysqli_query($baglanti,"select etiket_adi from etiket where etiket_id='$tage' ");
                                        $etiket=mysqli_fetch_assoc($etiketsql);
                                        ?>
                                    <a class="platform"><?php echo $etiket['etiket_adi']; ?></a>
                                <?php  } ?>
								</span>
							</div>
						</div>
                        <?php  } ?>
                            <div class="sayfa">
                                <a class="prev" href="index.php?s=<?php if($s!=1){
                                echo $s-1;
                            }else{
                                echo $s;
                            } ?>">Önceki Sayfa</a>
                                <?php $ters=1;
                                $sonsayfa=$sayfasayisi;
                                ?> <div class="numara"><?php
                                for($i=1;$i<=$sayfasayisi;$i++){ $sayac=$i+3; 
                                  if($i<$sayac){                       
                                ?>                                
                            <a href="index.php?s=<?php echo $i; ?>" class="link <?php if($i==$s){
                                    echo "aktif"; 
                                }     ?>"><?php echo $i; ?></a><?php } ?> 
                                <?php   } ?></div>
                                <a class="sonraki" href="index.php?s=<?php if($s!=$sayfasayisi){
                                    echo $s+1;
                                }else {
                                    echo $s;
                                } ?>">Sonraki Sayfa</a>
                            </div>
					   </div>
                    <div class="title">
					   En Son Çıkmış Oyunlar
					   <div class="intitle">
					   Yakında Çıkacak Oyunlar
					   </div>
				    </div>
				    <div class="oyunlar">
					   <div class="cizgi"></div>
					   <div class="tablo">
						  <div class="son">
						  <?php  
						    $oyunsql=mysqli_query($baglanti,"select * from oyun");
                            while($oyun=mysqli_fetch_assoc($oyunsql)){
						  ?>
							     <a href="?oyun=<?php echo $oyun['id']; ?>" class="tek">
								    <img src="images/<?php echo $oyun['oyun_img']; ?>"/>
								    <div class="oyun">
									   <?php echo $oyun['oyun_isim']; ?>
									   <p><?php  echo $oyun['oyun_tarih'];?></p>
								    </div>
                                </a>
						  <?php } ?>
						  </div>
                           <div class="sag">
                               <?php 
                                $terssql=mysqli_query($baglanti,"select * from cikacakoyun order by id desc");
                               while($ters=mysqli_fetch_assoc($terssql)){
                               ?>
                                <a href="?cikicak=<?php echo $ters['id']; ?>" class="tek">
                                 <img src="images/<?php echo $ters['image']; ?>"/>
                                    <div class="oyun">
									  <?php  echo $ters['oyun_adi']; ?>
									   <p><?php echo $ters['cikis_tarihi']; ?></p>
								    </div>
                                </a>
                               <?php } ?>
                           </div>
					   </div>
				    </div>
                </div>				
			</div>
			
  
    
    
       <?php  } ?>