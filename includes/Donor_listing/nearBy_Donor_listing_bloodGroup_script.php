<?php

require_once './nearBy_Donor_listing.php';
$response = array();


if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['latitude']) and 
    isset($_POST['longitude']) and
    isset($_POST['blood_group']))
    {

        $db= new nearBy_Donor_listing();
       
            $result = $db->getNearby_donors_byBloodGroup($_POST['latitude'],$_POST['longitude'],$_POST['blood_group']);

            while($r =mysqli_fetch_assoc($result))
            {
                // $response['email']=$r['email'];
                // $response['name']=$r['name'];
                // $response['blood_group']=$r['blood_group'];
                // $response['postal_address']=$r['postal_address'];
                // $response['mobile']=$r['mobile'];
                // $response['distance']=$r['distance'];
                $response[]=$r;
            }
        

        // else
		// {
		// 	$response['error']=true;
		// 	$response['message']="No Donors found";
		// }


    }

    else
	{
		//echo "hii";
		$response['error']=true;
		$response['message']="Can't Access your location";
	}

   

}

else
{
	
	$response['error']=true;
	$response['message']="Inavlid request";

}
echo json_encode($response);