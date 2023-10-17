<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert('clientes', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('clientes', $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('clientes');
        return $this->db->affected_rows() > 0;
    }

    public function get($id)
    {
        $query = $this->db->get_where('clientes', array('id' => $id));
        return $query->row();
    }

    public function get_all()
    {
        $query = $this->db->get('clientes');
        return $query->result();
    }
}
