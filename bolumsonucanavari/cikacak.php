<div class="settings">
        <form enctype="multipart/form-data" action="oyunyukle.php" method="post">
            <div class="formic">
                <div class="title">Yeni Haber</div>
                <div class="satir">
                    <div class=verilen>Oyun Adı :</div>
                    <div class="istenen">
                        <input type="text" name="oyunadi" required/>
                    </div>
                </div>
                <div class="satir">
                    <div class=verilen>Yapimci:</div>
                    <div class="istenen">
                        <input type="text" name="yapimci" required/>
                    </div>
                </div>
                 <div class="satir">
                    <div class=verilen>Oyun Resim:</div>
                    <div class="istenen">
                        <input type="file" class="dosya"  name="dosya" required/>
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
