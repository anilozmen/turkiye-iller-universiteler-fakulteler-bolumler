<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["il_id"]) && !empty($_POST["il_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM universiteler WHERE il_id = ".$_POST['il_id']." AND status = 1 ORDER BY uni_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Üniversitenizi Seçin</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['uni_id'].'">'.$row['uni_name'].'</option>';
        }
    }else{
        echo '<option value="">Şuan Üniversite Bulunmamaktadır.</option>';
    }
}


if(isset($_POST["uni_id"]) && !empty($_POST["uni_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM fakulteler WHERE uni_id = ".$_POST['uni_id']." AND status = 1 ORDER BY fakulte_ad ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Fakülte Seçin</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['fakulte_id'].'">'.$row['fakulte_ad'].'</option>';
        }
    }else{
        echo '<option value="">Şuan Fakülte Bulunmamaktadır.</option>';
    }
}

if(isset($_POST["fakulte_id"]) && !empty($_POST["fakulte_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM bolumler WHERE fakulte_id = ".$_POST['fakulte_id']." AND status = 1 ORDER BY bolum_ad ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Bölüm Seçin</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['bolum_id'].'">'.$row['bolum_ad'].'</option>';
        }
    }else{
        echo '<option value="">Şuan Bölüm Bulunmamaktadır</option>';
    }
}
?>