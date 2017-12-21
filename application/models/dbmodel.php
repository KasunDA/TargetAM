<?php

/*
 * @Description : Dbmodel the main model to access your database.
 * @Author      : Magdy Medhat
 * @Date        : 15/10/2011
 */

class Dbmodel extends CI_Model
{
    function Dbmodel()
    {
        parent::__construct();
        //support arabic in Database: set default collation to: utf8_unicode_ci
        //last inserted id: $this->db->insert_id()
        //check affected rows: $this->db->affected_rows()
        //count all records in a table: $this->db->count_all();
        //get: $this->db->where('id', $id)->limit('1')->get($table)->row_array();
    }
    
    public function mobile_get_id($serial_number)
    {
        $result = $this->db->where('serial_number', $serial_number)->get('mobile')->row_array();
        return $result['mobile_id'];
    }
    public function driver_get_id($mobile_id)
    {
        $result = $this->db->where('mobile_id', $mobile_id)->get('driver')->row_array();
        return $result['driver_id'];
    }
	
    public function driver_get_all()
    {
        $result = $this->db->get('driver')->result_array();

        foreach($result as &$driver)
        {
            $driver['mobile'] = $this->db->where('mobile_id', $driver['mobile_id'])->get('mobile')->row_array();
            unset($driver['mobile_id']);
            
            $driver['car'] = $this->db->where('car_id', $driver['car_id'])->get('car')->row_array();
            unset($driver['mobile_id']);
            
            $driver['tracking'] = $this->db->where('tracking_id', $driver['tracking_id_current'])->get('tracking')->row_array();
            unset($driver['tracking_id']);
        }
        return $result;
        
    }
    
    public function driver_get($driver_id)
    {
        $result = $this->db->where('driver_id', $driver_id)->get('driver')->row_array();
        $result['car'] = $this->db->where('car_id', $result['car_id'])->get('car')->row_array();
        unset($result['car_id']);
        $result['mobile'] = $this->db->where('mobile_id', $result['mobile_id'])->get('mobile')->row_array();
        unset($result['mobile_id']);
        return $result;
    }
    
    public function driver_add($data)
    {
        $this->db->insert('driver', $data);
    }
    
    public function driver_update($driver_id, $data)
    {
        $this->db->where('driver_id', $driver_id)->update('driver', $data);
    }
    
    public function car_get_all()
    {
        return $this->db->get('car')->result_array();
    }
    
    public function car_add($data)
    {
        $this->db->insert('car', $data);
    }
    
    public function car_get($car_id)
    {
        return $this->db->where('car_id', $car_id)->get('car')->row_array();
    }
    
    public function car_update($car_id, $data)
    {
        $this->db->where('car_id', $car_id)->update('car', $data);
    }        
    
    public function mobile_get_all()
    {
        return $this->db->get('mobile')->result_array();
    }
    
    public function mobile_get($mobile_id)
    {
        return $this->db->where('mobile_id', $mobile_id)->get('mobile')->row_array();
    }
    
    public function mobile_add($data)
    {
        $this->db->insert('mobile', $data);
    }
    
    public function mobile_update($mobile_id, $data)
    {
        $this->db->where('mobile_id', $mobile_id)->update('mobile', $data);
    }
    
    public function tracking_add_record($data)
    {
        $this->db->insert('tracking', $data);
		$updateArr['tracking_id_current'] = $this->db->insert_id();
        $this->db->where('driver_id', $data['driver_id'])->update('driver', $updateArr);
    }
	
	public function tracking_get_all()
	{
        $result = $this->db->get('tracking')->result_array();

        foreach($result as &$tracking)
        {
            $tracking['driver'] = $this->db->where('driver_id', $tracking['driver_id'])->get('driver')->row_array();
            unset($tracking['driver_id']);
            
            $tracking['car'] = $this->db->where('car_id', $tracking['driver']['car_id'])->get('car')->row_array();
            
            $tracking['mobile'] = $this->db->where('mobile_id', $tracking['driver']['mobile_id'])->get('mobile')->row_array();
        }
        return $result;
	}
}

?>