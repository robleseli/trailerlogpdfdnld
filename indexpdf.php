
<html lang="en">
    <head>
                <title>Edit Trailer Log</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=100%, initial-scale=1">
    

<link rel="stylesheet" href="css/bootstrap.min.css">

        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/moment.js"></script>
        <link rel="stylesheet" href="library/dark-editable/dark-editable.css" />
        <script src="library/dark-editable/dark-editable.js"></script>
        
    
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        
<style type="text/css">
<!--

    

    
.Arial {
	font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
	color: #FFFFFF;
}
    body {width: 100%;
    margin:0px;}
 #container{width: 100%;}
    
    
.auto-style1 {
	text-align: center;
	font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
	font-size: 36px;
    color: navy;
}
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }  
      
          .pagination {   
          text-align: center;
           position: absolute; top: 35px; left: 500px;
          display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:15px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: lightsteelblue;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: palegoldenrod; 
        


-->
</style>
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />

  
    </head>
    
    
    
<?php
//fetch.php

$connect = mysqli_connect("localhost", "root", "", "ladctracking");
$output = '';
    
   
        
$query = "SELECT * FROM trailerlog  ORDER BY trindex desc";
    
 
    
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= ' <div class="auto-style1">
<strong>  
DOWNLOAD GATE PASS</strong>
        </div>
                    <p>&nbsp;</p>  

         <p>&nbsp;</p>  
';
    
  
    
    
    
 $output .= '<div class="table-responsive">
                <table class = "table table bordered">
                   <tr>
                   <th></th>
<th>Gate Pass #</th>  
                               <th>Date In</th>  
                               <th>Time In</th>  
                               <th>Carrier</th> 
                               <th>Gate Entry</th>
                               <th>Tractor<br>In #</th> 
                               <th>Trailer<br>In #</th>
                               <th>Driver Name</th>  
                               <th>Inbound Guard</th>
                               <th>Plant</th>
                               <th>Inbound Status</th>
                               <th>Purpose</th>
                               <th>Date/Time Dispatched</th>
                               <th>Dispatcher</th>
                               <th>Seal #</th>
                               <th>Reference #</th>
                               <th>Tractor<br>Out #</th>
                               <th>Trailer<br>Out #</th>
                               <th>Outbound Status</th>
                               <th>Outbound Guard</th>
                               <th>Tractor Out Time</th>   

                    </tr>';
    
    
    include('db.php');

 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 100;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

    
    
    
    $result_count = mysqli_query($connect,"SELECT COUNT(trindex) As total_records FROM trailerlog");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($connect,"SELECT * FROM trailerlog ORDER BY trindex desc LIMIT $offset, $total_records_per_page");
    
    
    

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                <tr>
                    <td><a href="generate_pdf.php?id='.$row["trindex"].'"><button  id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>PDF</button></a></td>
                <td>'.$row["trindex"].'</td> 
    <td>'.$row["date"].'</td>
    <td>'.$row["time"].'</td>
    <td>'.$row["carrier"].'</td>
    <td>'.$row["eastwest"].'</td>
    <td>'.$row["tractor"].'</td>
    <td>'.$row["trailer"].'</td>
    <td>'.$row["drivername"].'</td>
    <td>'.$row["guardname"].'</td>
    <td>'.$row["comments"].'</td>
    <td>'.$row["eol"].'</td>
    <td>'.$row["purpose"].'</td>
    <td>'.$row["releaset"].'</td>
    <td>'.$row["biller"].'</td>
    <td>'.$row["sealn"].'</td>
    <td>'.$row["shipper"].'</td>
    <td>'.$row["tractorout"].'</td>
    <td>'.$row["traileroutnum"].'</td>
    <td>'.$row["exitloadstatus"].'</td>
    <td>'.$row["outboundguard"].'</td>
    <td>'.$row["trailerout"].'</td>

    </tr>
            ';
    }
    echo $output;

}
else
{
    echo "Data not found";
}
mysqli_close($connect);
?>
    </table>
                        
                    </div>
                </div>
            </div>
            <br />
            <br />
        </div>
    <form id="form2" name="form2" method="post" action="">

    <div align="center">
    <input type="submit" align = "center"  name="Mainm" id="Mainm" value="Main Menu" onclick="action='menu.php';">
  </div>
</form>

     
     <table>
        <tbody><tr><td><img src="penskesmall.gif" border="0"></td></tr>
               <tr><td width='15000' height="20px" bgcolor="#FDD017"></td></tr>
               <tr><td width="100%" height="20px" bgcolor="#151B8D"></td></tr>
        </tbody>
     </table> 
      <p>&nbsp;</p>  
    </tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>


<br /><br />

</div>
</body>
</html>
