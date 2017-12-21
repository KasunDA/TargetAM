<?php

/*
 * @Description : default mobile services controller
 * @Author      : Magdy Medhat
 * @Date        : date
 */

class Mob extends CI_Controller
{
    function Mob()
    {
        parent::__construct();
    }
    
    function get_nearest_street($lng, $lat)
    {
        //$lat = "38.115583";
        //$lng = "13.37579";
        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false";
        $response = file_get_contents($url);
        $json_array = json_decode($response, true);
        //echo "<pre>" . $response;
        $street_name = $json_array['results'][0]['address_components'][0]['long_name'];
        return $street_name;
    }
    function update()
    {
        //serial_number, lat, lng, speed, date, time
        $post = $this->input->post(NULL, true);
        
        //get driver_id
        $mobile_id = $this->dbmodel->mobile_get_id($post['serial_number']);
        $post['driver_id'] = $this->dbmodel->driver_get_id($mobile_id);
        
        //remove serial_number
        unset($post['serial_number']);
        
        //get street
        $post['street'] = $this->get_nearest_street($post['lng'], $post['lat']);
        $this->dbmodel->tracking_add_record($post);
		echo "sent successfully.";
    }
}

?>