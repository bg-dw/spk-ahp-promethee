<?php
class M_ahp extends CI_Model
{

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->update($table, $data);
        return $hasil;
    }
}
