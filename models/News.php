<?php

class NewsModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function loadNews(){
        $sth = $this->db->prepare("SELECT * FROM news");
        
        $sth->execute();
        
        $count = $sth->rowCount();
        if($count > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    function loadArchives($year, $month){
        $sth = $this->db->prepare("SELECT * FROM news WHERE "
                ."year = :year AND month = :month");
        
        $sth->execute(array(
            ':year' => $year,
            ':month' => $month
        ));
        
        $count = $sth->rowCount();
        if($count > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    function loadImages($newsid){
        $sth = $this->db->prepare("SELECT * FROM newsimages WHERE newsid = :newsid");
        
        $sth->execute(array(
            ':newsid' => $newsid
        ));
        
        $count = $sth->rowCount();
        if($count > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    function loadDescribes($newsid){
        $sth = $this->db->prepare("SELECT * FROM newsdescribe WHERE newsid = :newsid");
        
        $sth->execute(array(
            ':newsid' => $newsid
        ));
        
        $count = $sth->rowCount();
        if($count > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    function loadHref($href){
        $sth = $this->db->prepare("SELECT * FROM news WHERE href = :href");
        
        $sth->execute(array(
            ':href' => $href
        ));
        
        $count = $sth->rowCount();
        if($count > 0) {
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $data[0];
        } else {
            return false;
        }
    }
    
    function loadTree() {
        $sth = $this->db->prepare("SELECT year, month, Count(*) FROM news GROUP BY "
                ."year, month ORDER BY year, month DESC");
        
        $sth->execute();
        
        $count = $sth->rowCount();
        if($count > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    function checkArchives($year, $month){
        $sth = $this->db->prepare("SELECT * FROM news WHERE "
                ."year = :year AND month = :month");
        
        $sth->execute(array(
            ':year' => $year,
            ':month' => $month
        ));
        
        $count = $sth->rowCount();
        if($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}