<!DOCTYPE html>
<?php
session_start();
    include 'connection.php';
    ?>

<html>
    <head>
        <title>TODAY'S WITHDRAWAL</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
        <!-- Script -->
        <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

        <!-- jQuery UI -->
        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-ui.min.js' type='text/javascript'></script>
        <meta charset="utf-8">
        
        
           <!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
  <!--<script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
        
        
         <!--<link rel="stylesheet" type="text/css" href="majorstyle.css"/>-->
        <style type="text/css">
                    body{
                         background-image: none;
                        background-color: white;  
                        
                         }
                        
             </style>
        
        
        
    </head>
    <body style="background-color: #e0d3d3;">
         <center class="heading"><div class="trans fixed-top" style="background-color:#ff5d0f; font-size: 22px;"><b><a href="admin_home.php" style="color: black;">FINSOLUTE</a></b></div></center>
    
     <hr style="color: red; height: 3px; margin-top: 0.5px"/>
        <button id="back" onclick="goBack()" style="padding: 4px; margin-bottom:  25px;  border-radius: 8px; font-size: 16px; background-color: black; color: whitesmoke; border: 2px solid white; cursor: pointer;"><<|Back|</button>
         
        
        
        <div class="container-fluid ">
       <!--DISPLAY ARENA-->
      
       <div class="row ">  
            <div  class="col">  
            </div>
           
           
           
           <!--id="dispay_db"-->
           <div  class="col" >    
                <?php
           
    
    
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM witdraw WHERE date = '$date' AND amount > '1' ORDER BY  name");
             echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">MONEY WITHDRRAWN: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name</th>';
           echo '<th>Withdrawn</th>';
         echo '<th>District</th>';
          echo '</tr>';   
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>" . number_format($row['amount'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
            
                ////////////THIS IS TO SUM CONTRIBUTION
                        $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE date='$date'");      
                          while  ($row = mysqli_fetch_array($total_savings)){
                          $summation = $row['total'];                          
                          }
                            
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: red; font-size: 20px;'>".number_format($summation)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ; 
            ?>
           </div>
        
       
        
       
       
       
           <div class="col" style="margin-top:80px; margin-left: 20px; " >
          <!--SHOW ALL-->
<!--         <button class="show_all" style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW ALL</button>
        
           SELECT CLASS
           <form action="student_db.php" method="POST" enctype="multipart/form-data">
           
               <input type="text" required="true" class="class_d"  id="cla" placeholder="select district" style="margin-top:20px; margin-bottom:20px; width:40%; border-radius: 8px;  height:28px; font-size: 15px; padding: 7px;"/> 
               <button  name="get_class" class="select_class" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">GO</button>
            </form>
        
           
            PRINT
        <button class="print_me" style=" border-radius: 4px; font-size: 16px; background-color: white; color: green; cursor: pointer">Print>></button>
        </div>  -->
        
       </div> 
      
        
           
       
         
                  <!--ON LOAD DISPLAY ALL-->
          <script>
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","stud_db_magic.php",true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ==4 && xmlhttp.status==200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                 
                    
            
        </script>
        
        
        
                          <!--THIS IS TO DISPLAY SELECTED CLASS -->
          <script>
               $(document).ready(function() {
               var select_class = $(".select_class"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_class).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
        var getclass = document.getElementById('cla').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","stud_db_magic22.php?district="+getclass,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ==4 && xmlhttp.status==200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                        
                        
                document.getElementById('cla').value = "";        
                    });  
                    
                    
                    
                    
                        var print_page = $(".print_me");
                        $(print_page).click(function(e){ //Function LINK TO PRINT
                  e.preventDefault();
                                window.print();
                             });         
           });     
            
        </script>
         
         
                   <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
          <script>
         $(document).ready(function() {
               var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(show_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
        e.preventDefault();
              window.location = "student_db.php";
            });
        });
          </script>   
          
          
          
          <script>
             function goBack() {
                 window.location = "admin_home.php";
             }
          </script>
          
          
          
                        <!--AUTO-COMPLETE-->
          <script type='text/javascript'>
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "district.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });
        
 ////////////////////////////////////////////////////////////////////////////////////////       
        $( ".autocomover" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
//                    url: "autocomplete.php",
                    url: "district.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
      
            select: function (event, ui) {
                $('.autocomover').val(ui.item.label); // display the selected text
////                $('#selectuser_idd').val(ui.item.value);
                $('#text1').val(ui.item.value);                
////                console.log("this.value: " + this.value);
                $('#text1').trigger('change');
                

            }
            
       
  });
            
          
        
        
        ////////////////////////////////////////////////////////////////////////////////////////       
        $( ".class_d" ).autocomplete({
            source: function( request, response ) {
                $.ajax({

                    url: "district.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
//                         response(results.slice(0, 10));
                        
                    }
                });
            },
      
            select: function (event, ui) {
                $('.class_d').val(ui.item.label); // display the selected text
                $('#selectuser_idd').val(ui.item.value);
//                $('#text1').val(ui.item.value);                
//////                console.log("this.value: " + this.value);
//                $('#text1').trigger('change');
//                

            }
            
       
  });
        
        
        
            
            
        
///////////////////////////////////////////////////////////////////////////////////////////
        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "autocomplete.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                var terms = split( $('#multi_autocomplete').val() );
                
                terms.pop();
                
                terms.push( ui.item.label );
                
                terms.push( "" );
                $('#multi_autocomplete').val(terms.join( ", " ));

                // Id
                var terms = split( $('#selectuser_ids').val() );
                
                terms.pop();
                
                terms.push( ui.item.value );
                
                terms.push( "" );
                $('#selectuser_ids').val(terms.join( ", " ));

                return false;
            }
           
        })
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script> 
          
          
       </div>   
    </body>
</html>
