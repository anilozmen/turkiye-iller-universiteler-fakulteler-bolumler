<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('#il').on('change',function(){
        var ilID = $(this).val();
        if(ilID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'il_id='+ilID,
                success:function(html){
                     $('#universite').html(html);
                    $('#fakulte').html('<option value="">Fakülte Seçin</option>'); 
                    $('#bolum').html('<option value="">Bölüm Seçin</option>'); 
                }
            }); 
        }else{
            $('#fakulte').html('<option value="">Select country first</option>');
            $('#bolum').html('<option value="">Select state first</option>'); 
        }
    });

    $('#universite').on('change',function(){
        var uniID = $(this).val();
        if(uniID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'uni_id='+uniID,
                success:function(html){
                    $('#fakulte').html(html);
                    $('#bolum').html('<option value="">Bölüm Seçin</option>'); 
                }
            }); 
        }else{
            $('#fakulte').html('<option value="">Select country first</option>');
            $('#bolum').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#fakulte').on('change',function(){
        var fakulteID = $(this).val();
        if(fakulteID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'fakulte_id='+fakulteID,
                success:function(html){
                    $('#bolum').html(html);
                }
            }); 
        }else{
            $('#bolum').html('<option value="">İlk Olarak Fakülte Seçin</option>'); 
        }
    });
});
</script>
    <title>Türkiye'de Bulunan İller,Üniversiteler,Fakülteler ve Bölümler</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <style type="text/css">
        .colorgraph {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }
    </style>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 </head>
<body>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form">
                <h2 align="center"> Türkiye <br>İller,Üniversiteler, Fakülteler ve Bölümler</h2>
                <hr class="colorgraph">
                 <div class="row">
                    
                </div>
                <div class="form-group">
                     <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></span>
                            <?php
                            //Include database configuration file
                            include('dbConfig.php');
                            
                            //Get all country data
                            $query = $db->query("SELECT * FROM iller WHERE status = 1 ORDER BY il_name ASC");
                            
                            //Count total number of rows
                            $rowCount = $query->num_rows;
                            ?>
                             <select name="il" id="il" class="form-control">
                            <option value="">Üniversitenizin İlini Seçin</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){ 
                                    echo '<option value="'.$row['il_id'].'">'.$row['il_name'].'</option>';
                                }
                            }else{
                                echo '<option value="">Şuan da İl Bulunmamaktadır</option>';
                            }
                            ?>
                        </select>
                            </select>
                        </div>
                    </div>
                </div>

  
                <div class='form-group'>
                    <div class='cols-sm-10'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-graduation-cap fa-lg' aria-hidden='true'></i></span>
                            
                            <select name="universite" id="universite" class="form-control">
                            <option value="">Üniversitenizi Seçin</option>
                            </select>
                                                

                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='cols-sm-10'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-graduation-cap fa-lg' aria-hidden='true'></i></span>
                            <select name="fakulte" id="fakulte" class="form-control">
                            <option value="">Fakülte Seçin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='cols-sm-10'>
                        <div class='input-group'>
                            <span class='input-group-addon'><i class='fa fa-graduation-cap fa-lg' aria-hidden='true'></i></span>
                            <select name="bolum" id="bolum" class="form-control"> 
                            <option value="">Bölüm Seçin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <input type="submit" value="Gönder" class="btn btn-primary btn-block btn-lg" tabindex="13">
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/kampus.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
