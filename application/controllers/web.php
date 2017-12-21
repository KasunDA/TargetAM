<?php

/*
 * @Description : default front end controller
 * @Author      : Magdy Medhat
 * @Date        : date
 */

class Web extends CI_Controller
{
    var $data;
    function Web()
    {
        parent::__construct();
        $this->data['logged'] = $this->session->userdata('logged');
    }

    function index()
    {
        $this->login();
    }
    
    function check_for_updates()
    {
        $drivers = $this->dbmodel->driver_get_all();
        // $drivers = array(
        // array("driver_id"=>"1", "lon"=>30.056427, "lat"=>31.317949 , "name"=>"مجدى مدحت"),
        // array("driver_id"=>"2","lon"=>30.016427, "lat"=>31.324949 , "name"=>"علاء ناصر"),
        // array("driver_id"=>"3","lon"=>30.026427, "lat"=>31.337949 , "name"=>"محمود زكى"),
        // array("driver_id"=>"4","lon"=>30.036427, "lat"=>31.347949 , "name"=>"فوزى على"),
        // );
        echo json_encode($drivers);
    }
    
    function display($view_name)
    {
        $this->load->view('web/header', $this->data);
        $this->load->view($view_name, $this->data);
        $this->load->view('web/footer', $this->data);
    }
    
    function delete($table, $id)
    {
        $this->db->where($table.'_id', $id)->delete($table);
        redirect(site_url('web/'.$table.'s'));
    }
    
    function logoff()
    {
        $this->session->unset_userdata('logged');
        redirect(site_url('web'));
    }
    
    function login($error = "")
    {
        $data['error'] = $error;
        $this->load->view('web/login', $data);
    }
    
    function login_done()
    {
        //username, password
        $post = $this->input->post(null, true);
        $username = "admin";
        $password = "password";
        if($post['username'] == $username && $post['password'] == $password)
        {
            $this->session->set_userdata('logged', true);
            redirect(site_url('web/map'));
        }
        else
            redirect(site_url('web/login/error'));
    }

    function mobiles()
    {
        $this->data['active'] = 'mobiles';
        $this->data['mobiles'] = $this->dbmodel->mobile_get_all();
        $this->display('web/mobiles');
    }
    
    function mobile_add_done()
    {
        //serial_number, model, mobile_number
        $post = $this->input->post(null, true);
        $this->dbmodel->mobile_add($post);
        redirect(site_url('web/mobiles'));
    }
    
    function mobile_update($mobile_id)
    {
        $this->data['active'] = 'mobiles';
        $this->data['mobile'] = $this->dbmodel->mobile_get($mobile_id);
        $this->display('web/mobile_update');        
    }
    
    function mobile_update_done()
    {
        //mobile_id, serial_number, model, mobile_number
        $post = $this->input->post(null, true);
        $mobile_id = $post['mobile_id'];
        unset($post['mobile_id']);
        $this->dbmodel->mobile_update($mobile_id, $post);
        redirect(site_url('web/mobiles'));      
    }
    
    
    function cars()
    {
        $this->data['active'] = 'cars';
        $this->data['cars'] = $this->dbmodel->car_get_all();
        $this->display('web/cars');
    }
    
    function car_add_done()
    {
        //license_plate, model
        $post = $this->input->post(null, true);
        $this->dbmodel->car_add($post);
        redirect(site_url('web/cars'));
        
    }
    
    function car_update($car_id)
    {
        $this->data['active'] = 'cars';
        $this->data['car'] = $this->dbmodel->car_get($car_id);
        $this->display('web/car_update');        
    }
    
    function car_update_done()
    {
        //car_id, license_plate, model
        $post = $this->input->post(null, true);
        $car_id = $post['car_id'];
        unset($post['car_id']);
        $this->dbmodel->car_update($car_id, $post);
        redirect(site_url('web/cars'));              
    }    
    
    function drivers()
    {
        $this->data['drivers'] = $this->dbmodel->driver_get_all();
		$this->data['cars'] = $this->dbmodel->car_get_all();
		$this->data['mobiles'] = $this->dbmodel->mobile_get_all();
        $this->data['active'] = 'drivers';
        $this->display('web/drivers');
    }
    
    function driver_add_done()
    {
		//driver_id, name, line, car_id, mobile_id
        $post = $this->input->post(null, true);
        $this->dbmodel->driver_add($post);
        redirect(site_url('web/drivers'));        
    }
    
    function driver_update($driver_id)
    {
		$this->data['driver'] = $this->dbmodel->driver_get($driver_id);
		$this->data['cars'] = $this->dbmodel->car_get_all();
		$this->data['mobiles'] = $this->dbmodel->mobile_get_all();
		$this->data['active'] = 'drivers';
		$this->display('web/driver_update');
    }
    
    function driver_update_done()
    {
        //driver_id, name, line, car_id, mobile_id
        $post = $this->input->post(null, true);
        $driver_id = $post['driver_id'];
        unset($post['driver_id']);
        $this->dbmodel->driver_update($driver_id, $post);
        redirect(site_url('web/drivers')); 		
    }    
    
    function map()
    {
        $this->data['active'] = 'map';
        $this->display('web/map');
    }
	
	function tracking()
	{
		$this->data['active'] = 'tracking';
		$this->data['trackings'] = $this->dbmodel->tracking_get_all();
		$this->display('web/tracking');
	}
}

?>