
 <!DOCTYPE html>  
 <?php  
 header("Content-Type: text/html; charset=windows-1251");
    include 'conn.php';
    $stmt = $dbh->prepare('SELECT * FROM public."Add"');
    $stmt->execute();  
 ?>  
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
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  

           //----------------------------
              
      });  
 </script>
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
				
				$TN.text('').html("<input class='TNT'  value='"+TNval+"'/>");
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

        
           <div class="container" style="width:80%;">  
                <h2 align="center">DataGridView</h2>  
                <h3 align="center">PANDAPANDAPANDA</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-2">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
				<div class="col-md-4">			
				      <input type="text" placeholder="Search" name="end_date" id="end_date" class="form-control" />						
					 </div>
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th style="text-align:center" width="5%">  TankNum</th>  
                               <th style="text-align:center" width="20%"> DocDate</th>  
                               <th style="text-align:center" width="25%"> DocTime</th>  
                               <th style="text-align:center" width="35%"> Provider</th>  
                               <th style="text-align:center" width="15%"> DocVolume</th>  
                          </tr>  
                     <?php  
                     $i = 0;
                     
                     while ($row = $stmt->fetch())
                     {  
                         $i++;
                     ?>  
                               
                          <tr class="section<?php echo $i ?>">        
                            
                        <?php $date = date_parse($row["DocDate"]); ?>

                               <td style="text-align:center" class="TN<?php echo $i ?>"> <?php echo $row["TankNum"]; ?></td>  
                               <td style="text-align:center" class="DD<?php echo $i ?>"> <?php echo $date['day'].'-'.$date['month'].'-'.$date['year'] ?>  </td>  
                               <td style="text-align:center" class="DT<?php echo $i ?>"> <?php echo $row["DocTime"]; ?>  </td>  
                               <td style="text-align:center"  class="P<?php echo $i ?>"> <?php echo base64_decode($row["Provider"]); ?> </td>  
                               <td style="text-align:center" class="DV<?php echo $i ?>"> <?php echo $row["DocVolume"]; ?></td>  
                               <td><div class="but" id="<?php echo $i ?>"><button id="Correct<?php echo $i?>" type="button" class="btn btn-primary" style="width:100%" style="height:100%";>Correct</button></div></td>
                             
                          </tr>  
                    
                     <?php  
                     }
                     ?>  
                     </table>  
                </div>  
           </div>        
      </body>  
 </html>  
