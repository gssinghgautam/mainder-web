<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    /**
     * This function is used to get all room sizes
     */
    function getRoomSizes()
    {
        $this->db->select('sizeId, sizeTitle, sizeDescription');
        $this->db->from('ldg_room_sizes');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function getFloorInfo()
    {
        $this->db->select('*');
        $this->db->from('ldg_floor');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();

        return $query->result();
    }
    function sendConnectQuery($insertInfo)
    {
        $this->db->trans_start();
        $this->db->insert('ldg_customer', $insertInfo);
        /*  echo $this->db->last_query();
        die('===================');     */
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
}
