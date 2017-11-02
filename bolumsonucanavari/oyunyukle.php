  <?php session_start();  include("veritabani.php");
                    if(isset($_POST['add'])){
                         $oyunadi=$_POST['oyunadi'];
                         $yapimci=$_POST['yapimci'];
                         $max=1024*1024*5;
                         $dosyaUzanti=substr($_FILES["dosya"]["name"],-4-4);
                         $dosyaAdi=rand(0,99999999999).$dosyaUzanti;
                         $dosyaYolu="images/".$dosyaAdi;
                         if($_FILES["dosya"]["size"]>$max){
                             echo "Dosya Boyutu büyük";
                         }else{
                             $tip = $_FILES['dosya']['type'];
                             $isim = $_FILES['dosya']['name'];
                             $uzanti = explode('.', $isim);
                             $uzanti = $uzanti[count($uzanti)-1];
                             if($uzanti=="jpeg" || $uzanti=="png" || $uzanti=="jpg"){
                                 if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){
                                     $tasi=move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
                                     if($tasi){
                                         $resim=$dosyaAdi;

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
                        phpAlert($dosyaAdi);
                        $gun=date('d');
                        $ay=date('m');
                        $yil=date('Y');
                        $tarih=$gun.".".$ay.".".$yil;
                        $oyunekle=mysqli_query($baglanti,"insert into oyun (oyun_isim,yapimci,oyun_tarih,oyun_img) values ('{$oyunadi}','{$yapimci}','{$tarih}','{$resim}')");
                        if($oyunekle){
                           header("location:index.php");
                        }
                }
                    ?>