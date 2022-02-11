<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo Update</title>
    <script src="js/update.js"></script>
    <script src="js/select.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" onload="DataUpdate(<?php echo $_GET['id']?>)">
    <h4>Todo Add Form</h4>
    <hr>
    <input type="hidden" id="id" value="<?php echo $_GET['id']?>">
    <div class="">
        <label for="todoTitle">Todo Title</label>
        <input type="text" name="title" id="title" placeholder="Todo Title">
    </div>
    <div class="">
        <label for="todoText">Todo Text</label>
        <input type="text" name="content" id="content" placeholder="Todo content">
    </div>
    <div class="">
        <label for="todoStart">Start Date</label>
        <input type="date" name="startDate" id="startDate" placeholder="Todo Start Date">
    </div>
    <div class="">
        <label for="todoFinish">Finish Date</label>
        <input type="date" name="finishDate" id="finishDate" placeholder="Todo Finish Date">
    </div>
    <div class="center">
        <button class="button2 button w20" onclick="DataUpdate(<?php echo $_GET['id']?>)">TODO UPDATE</button>
        <a href="index.php" class="button button3 w20" style="width: 20%;">Cancel</a>
        <?php //Veri Güncellemesi yapmak için DataUpdate fonksiyonu kullanılmakta?>
    </div>


</div>
<script>
    //Sayfa Yüklendiğinde gerekli verinin db'den çekilip gerekli alanlara doldurulması için onload fonksiyonu kullanılmakta
    window.onload = function () {
        let id=document.getElementById('id').value;
        //DataSelect fonkisyonu ile id gönderiliyor ve db'de bu id'ye sahip veri satırının bilgileri çekiliyor.
        DataSelect(id);
        //DataSelect içinde bu veriler gerekli alanlara dolduruluyor.

    };
</script>

</body>
</html>
