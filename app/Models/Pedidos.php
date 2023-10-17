<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedidos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert('pedidos', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pedidos', $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pedidos');
        return $this->db->affected_rows() > 0;
    }

    public function get($id)
    {
        $query = $this->db->get_where('pedidos', array('id' => $id));
        return $query->row();
    }

    public function get_all()
    {
        $query = $this->db->get('pedidos');
        return $query->result();
    }
}
