<?php
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:workstation';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:helloworld';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:varconst';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:datatypes';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:operators';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:controlflow';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:functions';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:pointerreferences';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:trycatch';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:dynamicmemory';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:arrays';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:strings';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:structures';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:unions';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:enumeration';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:classobject';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:encapsulation';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:inheritance';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:operatoroverloading';
  $a[] = 'http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=cpp:libraryreference';

  $n[] = '1. 實習環境介紹';
  $n[] = '2. Hello World!';
  $n[] = '3. 變數與常數';
  $n[] = '4. 資料型態';
  $n[] = '5. 運算子';
  $n[] = '6. 流程控制';
  $n[] = '7. 函式';
  $n[] = '8. 指標與參考';
  $n[] = '9. try與catch';
  $n[] = '10. 淺談記憶體管理';
  $n[] = '11. 陣列';
  $n[] = '12. 字串';
  $n[] = '13. 結構體';
  $n[] = '14. Union';
  $n[] = '15. 列舉資料型態';
  $n[] = '16. 類別與物件';
  $n[] = '17. 資訊隱藏與封裝';
  $n[] = '18. 繼承、覆寫與重載';
  $n[] = '19. 運算子重載';
  $n[] = '1. C++標準程式庫參考資料';
?>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body>
  <div class="list">

    <h1 class="w3-xxxlarge w3-text-teal">學前準備篇</h1>
    <ul class="w3-ul w3-large w3-text-teal">
      <a Target="_new" href="<?php echo $a[0] ?>"><li><?php echo $n[0] ?></li></a>
    </ul>
    <br>

    <h1 class="w3-xxxlarge w3-text-teal">C++語言基礎</h1>
    <ul class="w3-ul w3-large w3-text-teal">
    <?php
      for ($i=1; $i<10; $i++) {
    ?>
        <a Target="_new" href="<?php echo $a[$i] ?>"><li><?php echo $n[$i] ?></li></a>
    <?php
      }
    ?>
    </ul>
    <br>

    <h1 class="w3-xxxlarge w3-text-teal">複合資料型態</h1>
    <ul Target="_new" class="w3-ul w3-large w3-text-teal">
    <?php
      for ($i=10; $i<15; $i++) {
    ?>
       <a Target="_new" href="<?php echo $a[$i] ?>"><li><?php echo $n[$i] ?></li></a>
    <?php
      }
    ?>
    </ul>
    <br>

    <h1 class="w3-xxxlarge w3-text-teal">物件導向程式設計</h1>
    <ul class="w3-ul w3-large w3-text-teal">
    <?php
      for ($i=15; $i<19; $i++) {
    ?>
        <a Target="_new" href="<?php echo $a[$i] ?>"><li><?php echo $n[$i] ?></li></a>
    <?php
      }
    ?>
    </ul>
    <br>

    <h1 class="w3-xlarge w3-text-teal">附錄</h1>
    <ul class="w3-ul w3-large w3-text-teal">
      <a Target="_new" href="<?php echo $a[19] ?>"><li><?php echo $n[19] ?></li></a>
    </ul>
    <br>

  </div>

</body>

