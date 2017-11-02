  <?php session_start();  include("veritabani.php");
                    if(isset($_POST['add'])){
                         $hadi=$_POST['hadi'];
                         $hadiozet=$_POST['hadiozet'];
                         $haber=$_POST['haber'];
                         $haberozet=$_POST['haberozet'];
                         $oyunadi=$_POST['oyunadi'];
                         $max=1024*1024*5;
                         $dosyaUzanti=substr($_FILES["dosyak"]["name"],-4-4);
                         $dosyaAdik=rand(0,99999999999).$dosyaUzanti;
                         $dosyaYolu="images/".$dosyaAdik;
                         if($_FILES["dosyak"]["size"]>$max){
                             echo "Dosya Boyutu büyük";
                         }else{
                             $tip = $_FILES['dosyak']['type'];
                             $isim = $_FILES['dosyak']['name'];
                             $uzanti = explode('.', $isim);
                             $uzanti = $uzanti[count($uzanti)-1];
                             if($uzanti=="jpeg" || $uzanti=="png" || $uzanti=="jpg"){
                                 if(is_uploaded_file($_FILES["dosyak"]["tmp_name"])){
                                     $tasi=move_uploaded_file($_FILES["dosyak"]["tmp_name"],$dosyaYolu);
                                     if($tasi){
                                         $resimk=$dosyaAdik;
                                     }else{
                                         echo "Yanlış";
                                     }
                                 }else{
                                     echo "Yanlış";
                                 }
                             }else{
                                 echo "Dosya Formatı yanlış";
                             }
                         }
                         $max=1024*1024*5;
                         $dosyaUzanti=substr($_FILES["dosyad"]["name"],-4-4);
                         $dosyaAdib=rand(0,99999999999).$dosyaUzanti;
                         $dosyaYolu="images/".$dosyaAdib;
                         if($_FILES["dosyad"]["size"]>$max){
                             echo "Dosya Boyutu büyük";
                         }else{
                             $tip = $_FILES['dosyad']['type'];
                             $isim = $_FILES['dosyad']['name'];
                             $uzanti = explode('.', $isim);
                             $uzanti = $uzanti[count($uzanti)-1];
                             if($uzanti=="jpeg" || $uzanti=="png" || $uzanti=="jpg"){
                                 if(is_uploaded_file($_FILES["dosyad"]["tmp_name"])){
                                     $tasi=move_uploaded_file($_FILES["dosyad"]["tmp_name"],$dosyaYolu);
                                     if($tasi){
                                         $resimb=$dosyaAdib;
                                     }else{
                                         echo "Yanlış";
                                     }
                                 }else{
                                     echo "Yanlış";
                                 }
                             }else{
                                 echo "Dosya Formatı yanlış";
                             }
                         }
                        $oyunidsql=mysqli_query($baglanti,"select * from oyun where oyun_isim='{$oyunadi}'");
                        $oyunid=mysqli_fetch_assoc($oyunidsql);
                        $id=$oyunid['id'];
                        $gun=date('d');
                        $ay=date('m');
                        $yil=date('Y');
                        $tarih=$yil."-".$ay."-".$gun;
                        $kullanici=$_SESSION['isim'];
                        $sonhabersql=mysqli_query($baglanti,"select * from haber order by id desc limit 1");
                        $sonhaber=mysqli_fetch_row($sonhabersql);
                        $son=$sonhaber[0]+1;
                        $haberekle=mysqli_query($baglanti,"insert into haber (id,haber_title,haber_title_oz,haber_aut,haber_cont,haber_ozet,haber_tarih,haber_yorum,haber_img,haber_ozimg,oyun_id) values ('{$son}','{$hadi}','{$hadiozet}','{$kullanici}','{$haber}','{$haberozet}','{$tarih}','0','{$resimk}','{$resimb}','{$id}')");
                        if($haberekle){
                            header("location:index.php");
                        }

                }
                    ?>