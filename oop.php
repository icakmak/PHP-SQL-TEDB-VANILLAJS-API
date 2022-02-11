<?php
    class TodoApp
    {
        public $title = "OTOMATİK EKLENEN BAŞLIK";
        public $content = "OTOMATİK EKLENEN İÇERİK";
        public $startDate;
        public $finishDate;


        public function __construct($title, $content, $startDate, $finishDate)
        {
            $today = date('Y-d-m'); //Bugünün Tarihini almak için kullanıyoruz
            $tomorrow = date("Y-m-d", strtotime('+1 day', strtotime($today))); // yarının tarihi elimizde
            /*
             * if-else kullanma sebebi gönderilecek verilerden biri boş değer olarak gönderilip gönderilmediğini kontrol etmek amacıyla kullanılmıştır.
             * Gönderilen veri boş ise yukarıda tanımlanan değerler kullanılacaktır.
             * Tarih işlemleri için ise
             * startDate kısmına verinin eklenme tarihi olan bugünün tarihi kullanıyor
             * finishDate kısmına ise verinin eklenme tarihinden bir gün sonrası tarih olarak kullanılıyor
             * */

            if ($title) {
                $this->title = $title;
            } else {
                $this->title;
            }

            if ($content) {
                $this->content = $content;
            } else {
                $this->content;
            }

            if ($startDate) {
                $this->startDate = $startDate;
            } else {
                $this->startDate = $today;
            }

            if ($finishDate) {
                $this->finishDate = $finishDate;;
            } else {
                $this->finishDate = $tomorrow;
            }
        }

        //Verilerin çağırılan alanda kullanılabilmesi için dataTrans fonksiyonu kullanılıyor
        //Bu fonksiyon ile veriler array oluşturulup istenen veri alanında çağırılabiliyor.
        public function dataTrans()
        {
            $data = array(
                "title" => $this->title,
                "content" => $this->content,
                "startDate" => $this->startDate,
                "finishDate" => $this->finishDate
            );
            return $data;
        }

    }
/*
    $deneme=new TodoApp("","",'','');
    echo $deneme->showInfo();*/

