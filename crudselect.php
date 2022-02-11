
<?php
    include("conn.php");
    if($_POST){
        $id      =   $_POST['id'];

        $data=array('id'=>$id);
        $statement=$conn->prepare("SELECT * FROM tbl_todo WHERE id=:id");
        $result=$statement->execute($data);
        $rows=$statement->fetch(PDO::FETCH_ASSOC);
        //id si verilen değerin db de aranması ve var ise bulunan verinin değerlerinin getirilip select.js dosyasına geri döndürülmesi sağlanıyor.
        echo json_encode($rows);
    }
    $conn = null;
?>
