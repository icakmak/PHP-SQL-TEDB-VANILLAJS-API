<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO LİST</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/list.js"></script>
    <script src="js/delete.js"></script>
</head>
<body class="container">
<span>Todo List</span>
<div style="float:right;margin: 5px;padding: 5px;">
    <a href="todoinsert.php" class="button button1">Todo Add</a>
</div>

<hr>

<table>
    <thead>
        <tr>
            <th type="hidden">#</th>
            <th style="width: 10%">Title</th>
            <th style="width: 50%">Text</th>
            <th style="width: 10%">Start</th>
            <th style="width: 10%">Finish</th>
            <th style="width: 15%">#</th>
        </tr>
    </thead>
    <tbody id="tbody">
    <?php
    /* db de bulunan verilerin sayfaya ilk girişte sıralanması için kullanılıyor.Silme işlemi yapılırsa eğer listeleme işlemi js sayesinde sayfa yenilenmeden gerçekleştiriliyor*/
        include("conn.php");
        $rows=$conn->query("SELECT * FROM tbl_todo",PDO::FETCH_ASSOC);
        foreach($rows as $row){?>
        <tr>
            <td type="hidden"><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td style="text-align: center;"><?php echo $row['startDate']; ?></td>
            <td style="text-align: center;"><?php echo $row['finishDate']; ?></td>
            <td style="text-align: center;">
                <div class="row">
                    <button class="button button3" onclick="DataDelete(<?php echo $row['id']; ?>)">Delete</button>
                    <a href="todoupdate.php?id=<?php echo $row['id']; ?>" class="button button2">Update</a>
                    <?php //Silme ve Güncelleme için yukarıdaki butonlar kullanılmakta silme işlemi js ile sayfa yenilenmeden yapılmakta.?>
                </div>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

</body>

</html>

