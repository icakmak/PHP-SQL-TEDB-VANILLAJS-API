<?php
include("conn.php");
include("oop.php");
if(isset($_POST)){
    /*
     * update.js dosyasından gelen veriler oop.php ile verilerin boş mu dolumu geldiği kontrol ediliyor.
     * gelen veriler dolu ise gerekli alanlar için kullanılıyor.
     * boş ise oop.php dosyasında yapılan ayarlamalar ile bu verilerin doldurulması sağlanıyor.

    */
    $id=$_POST['id'];

    $todo       =   new TodoApp($_POST['title'],$_POST['content'],$_POST['startDate'],$_POST['finishDate']);

    $data=$todo->dataTrans();
    //oop.php dosyasından gelen veriler data değişkenine aktarılıyor

    $query = "UPDATE tbl_todo SET title=:title,content=:content,startDate=:startDate,finishDate=:finishDate WHERE id=:id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':content', $data['content']);
    $stmt->bindParam(':startDate', $data['startDate']);
    $stmt->bindParam(':finishDate', $data['finishDate']);
    //data array değişkenin de bulunan veriler array özelliği kullanılarak gerekli şekilde veriler kullanılıyor
    $result=$stmt->execute();

    //veri güncelleme işlemi başarılı ise update.js dosyasına true değeri döndürülüyor
    if($data){
        echo json_encode($data); //js dosyasın gönderilen verilerin okunabilmesi için json veri şekline dönüştürülmesi sağlanıyor
    }else{
        $data="Veri Kaydı Başarısız";
        echo json_encode($data);
    }

    $conn = null;
}
?>


