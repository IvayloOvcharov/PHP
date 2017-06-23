 
<!DOCTYPE html>  
<html>  
      <head>  
           <title>Spravki</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
	  <style>
	  *{
		  padding:0;
		  margin:0;
	   }
	  .SearchF{
		  padding: 10px;
		   margin:10px;
	  }
       .TNT, .DDT, .DTT, .PT, .DVT{
                width:100%;
                text-align:center;
      }
	  
	  </style>
    <script>
   $(document).ready(function(){  
           
		var $but = $('.but');
			var TNSval = 0;
				var DDSval = 0;
					var DTSval = 0;
						var PSval = 0;
						  var DVSval = 0;
						
			$($but).on('click', function() {
			 	
		     var id = $(this).attr('id');
	 

			 var $parent = ('.section' + id);
			
			  $('.section' + id)				
				.toggleClass('active')
				.siblings().removeClass('active');
				
			 var $TN = $('.section' + id+ ' td:nth-child(1)');
			 var TNval = $TN.text();		
			 var $DD = $('.section' + id + ' td:nth-child(2)');
			 var DDval = $DD.text();	
			 var $DT = $('.section' + id + ' td:nth-child(3)');
			 var DTval = $DT.text();	
			 var $P =  $('.section' + id + ' td:nth-child(4)');
			 var Pval = $P.text();	
			 var $DV = $('.section' + id + ' td:nth-child(5)');
			 var DVval = $DV.text();	
			 
			
				
				
			if($('.section' + id).hasClass('active')){
				
				$TN.text('').html("<input class='TNT' width='5%' value='"+TNval+"'/>");
			    TNSval = TNval;
				$DD.text('').html("<input class='DDT' width='25%' value='"+DDval+"' />");
				DDSval = DDval;
				$DT.text('').html("<input class='DTT' width='20%' value='"+DTval+"' />");
				DTSval = DTval;
			    $P.text('').html("<input class='PT' width='35%' value='"+Pval+"' />");
				PSval = Pval;
				$DV.text('').html("<input class='DVT' width='15%' value='"+DVval+"' />");
				DVSval = DVval;
				}
				
 				
		else{
			    var TNT = $(".TNT").val();
				$TN.text('').html("<p class='class' >"+TNT+"</p>");
				var DDT = $(".DDT").val();
				$DD.text('').html("<p class='class' > "+DDT+"</p>");
				var DTT = $(".DTT").val();
				$DT.text('').html("<p class='class' > "+DTT+"</p>");
				var PT = $(".PT").val();
				$P.text('').html("<p class='class' > "+PT+"</p>");
				var DVT = $(".DVT").val();
				$DV.text('').append("<p class='class' > "+DVT+"</p>");
				
				if(TNT != '' && DDT != ''&& DTT != ''&& PT != ''&& DVT != '')  
                {  
                     $.ajax({  
                          url:"update.php",  
                          method:"POST",  
                          data:{TankNum:TNT, DocDate:DDT, DocTime:DTT, Provider:PT, DocVolume:DVT},  
                          success:function(data)  
                          {  
                              alert(data); 
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
		}					
			
	    	});
			   	});

 </script>
	  <?php 
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      include 'conn.php';
      $output = '';  
   

  
      $table = 'public."Add"';
      $var = '"DocDate"';
      $fromdate = $_POST["from_date"];
      $todate = $_POST["to_date"];

      $stmt = $dbh->prepare("SELECT * FROM $table WHERE $var BETWEEN '$fromdate' AND '$todate' "); 
      $stmt->execute();
    
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th style="text-align:center" width="5%">TankNum</th>  
                     <th style="text-align:center" width="20%">DocDate</th>  
                     <th style="text-align:center" width="25%">DocTime</th>  
                     <th style="text-align:center"  width="35%">Provider</th>  
                     <th style="text-align:center" width="15%">DocVolume</th>  
                </tr>  
      ';  

      if( $stmt->rowCount() > 0)  
      {  
	
	  $i = 0;
           while ($row = $stmt->fetch())
              { 
                  $i++;
                $output .= '  
                     <tr class="section'.$i.'">  
					         
                        
                          <td style="text-align:center" class="TN'.$i.'">'. $row["TankNum"] .'</td>  
                          <td style="text-align:center" class="DD'.$i.'">'. $row["DocDate"] .'</td>
                          <td style="text-align:center" class="DT'.$i.'">'. $row["DocTime"] .'</td>  
                          <td style="text-align:center" class="P'.$i.'">'. $row["Provider"] .'</td>  
                          <td style="text-align:center" class="DV'.$i.'">'. $row["DocVolume"] .'</td>  
						                 <td><div class="but" id="'.$i.'"><button id="Correct'.$i.'"type="button" class="btn btn-primary">Correct</button></div></td>
                     </tr>  
					
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
 
   </body>  
 </html>  