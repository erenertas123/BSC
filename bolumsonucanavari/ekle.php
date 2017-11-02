<div class="settings">
        <form enctype="multipart/form-data" action="yukle.php" method="post">
            <div class="formic">
                <div class="title">Yeni Haber</div>
                <div class="satir">
                    <div class=verilen>Haber Adı :</div>
                    <div class="istenen">
                        <input type="text" name="hadi" required/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Haber Adı Özet :</div>
                    <div class="istenen">
                        <input type="text" name="hadiozet" required/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Haber:</div>
                    <div class="istenen">
                        <textarea class="alan" name="haber" required></textarea>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Haber Özet:</div>
                    <div class="istenen">
                        <input type="text" name="haberozet" required/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Oyun Adı:</div>
                    <div class="istenen">
                        <input type="text" name="oyunadi" required/>
                    </div>
                </div>
                 <div class="satir">
                    <div class=verilen>Haber Resim(küçük):</div>
                    <div class="istenen">
                        <input type="file" class="dosya"  name="dosyak" required/>
                    </div>
                </div>
                 <div class="satir">
                    <div class=verilen>Haber Resim(Büyük):</div>
                    <div class="istenen">
                        <input type="file" class="dosya" name="dosyad" required/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen></div>
                    <div class="istenen2">
                        <input type="submit" name="add" value="Gönder"/>
                    </div>
                  
                </div>
            </div>
        </form>
    </div>
