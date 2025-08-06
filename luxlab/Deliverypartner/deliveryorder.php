<?php
include "topbar.php";
?>
<title>Order Status</title>
<?php
include "sidebar.php";
?>
<script type="text/javascript">
function delieverstat(stat,idd)
{
    console.log(stat,idd)
    //alert(str);
    if(idd=="" && stat=="")
    {
        alert("Please Choose Correct status for Delievery");
        // document.getElementById("sdiv").innerHTML="";
        return;
    }
    if(window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            // alert("status Updated successfully");
            // xmlhttp.responseText
           var value= xmlhttp.responseText.split("-");
            // console.log()
            document.getElementById("val-"+value[0].trim()).innerHTML=value[1];
        }
        console.log(xmlhttp.responseText);
}
//alert(str);
xmlhttp.open("GET", "get_deliever.php?oid="+idd+"&stat="+stat,true);
xmlhttp.send();
}
</script>

        
<!-- start your design down-->


            <div class="page-wrapper">

<style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Initial box shadow */
            transition: box-shadow 0.3s ease; /* Smooth transition for the hover effect */
            /* Width of the card */
            border: 1px solid #ddd; /* Optional: Border for better visual appearance */
            border-radius: 5px; /* Optional: Border radius for rounded corners */
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Box shadow on hover */
        }

        .card-body {
            padding: 16px; /* Padding inside the card body */
        }

        .card-title {
            margin-bottom: 0.75rem; /* Margin below the card title */
            font-size: 1.25rem; /* Font size of the card title */
        }

        .card-subtitle {
            margin-bottom: 0.5rem; /* Margin below the card subtitle */
            color: #6c757d; /* Text color of the card subtitle */
        }

        .card-text {
            margin-bottom: 1rem; /* Margin below the card text */
            font-size: 16px;
            font-weight: 500;
        }

        .card-link {
            color: #007bff; /* Color of the card links */
            text-decoration: none; /* No underline for card links */
        }

        .card-link:hover {
            text-decoration: underline; /* Underline card links on hover */
        }
    </style>
                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                            <h3>Order Status</h3>
                            <div class="row mt-4">
                                <?php 
                                include 'connection.php';
                                $sql="SELECT ord.status as sta, ord.id, ord.order_date, ord.order_amount, cus.user_name, ship.first_name,ship.last_name, ship.address, ship.state,ship.zip_code,ship.country, ship.note,ship.mob_num from tab_order as ord left JOIN tab_user_register as cus on ord.customer_id= cus.user_email left join tab_shipment as ship on ord.customer_id= ship.customer_id  where ord.delievery_parnter_id='".$_SESSION['dld']."' group by ord.id order by order_date";
                                    $result=mysqli_query($con,$sql);
                                    while ($row=mysqli_fetch_array($result)) {
                                       echo ' <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Order # '.$row["id"].'</h5>
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">Customer Name</p>
                                                </div>
                                                <div class="col-sm-6">
                                                <p class="card-text">'.$row["user_name"].'</p>
                                                </div>    
                                            </div>   
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">Shipping Address</p>
                                                </div>
                                                <div class="col-sm-6">
                                                <p class="card-text">'.$row["address"].", ".$row["state"].", ".$row["zip_code"].'</p>
                                                </div>    
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">order Date</p>
                                                </div>
                                                <div class="col-sm-6">
                                                <p class="card-text">'.$row["order_date"].'</p>
                                                </div>    
                                            </div> 
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">Number Of Items</p>
                                                </div>
                                                <div class="col-sm-6">';

                                                $sql2="Select main.quantity,main.order_id,prod.pro_name as product FROM tab_order_item main LEFT JOIN tab_product prod on main.product_id=prod.id where order_id=".$row["id"];
                                                $res=mysqli_query($con,$sql2);
                                                $count=mysqli_num_rows($res);
                                                echo'
                                                <p class="card-text">'.$count.'
                                                </div>    
                                            </div>  
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">Items</p>
                                                </div>
                                                <div class="col-sm-6">';
                                                $tot=0;
                                                while($row2=mysqli_fetch_array($res)){
                                                    echo ' <p class="card-text">'.$row2["product"].' x '.$row2["quantity"].'</p>';
                                                    $tot=+$row2["quantity"];
                                                }
                                                echo'
                                               
                                                </div>    
                                            </div> 
                                             <div class="row mt-2">
                                                <div class="col-sm-6">
                                                <p class="card-text">order Status</p>
                                                </div>
                                                <div class="col-sm-6">
                                                <p class="card-text" id=val-'.$row["id"].'>'.$row["sta"].'</p>
                                                </div>    
                                            </div>';
                                            if ($row["sta"] !="delievered") {
                                                      echo'<div class="row mt-4">
                                            <div class="col-sm-6 align-self-center"><label for="select">Delievery Status</label></div>
                                                <div class="col-sm-6">
                                                    <select class="form-control form-select" onchange="delieverstat(this.value,'.$row["id"].');">
                                                    
                                                        <option value="">Choose status</option>
                                                        <option value="outfordelievery">Out For Delievery</option>
                                                        <option value="delievered">Delievered</option>
                                                        <option value="undelievered" >Undelievered </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>' ;                     
                                }                             
                                    }
                                 ?>
                               
                            </div>
                        </div>

                        <!-- End Blank Page -->

                    </div>
                </div>

                <div id="styleSelector">
                    
                  
                </div>
            </div>


<!-- end your design up-->
    
    

<?php
include "footer.php";
?>