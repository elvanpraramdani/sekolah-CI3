<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sarpras extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id_sarpras', $data['id_sarpras']);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
