<?php
class M_dashboard_admin extends CI_Model
{
    function cek_pwd($id, $pwd)
    {
        $this->db->select('*');
        $this->db->from('t_admin');
        $where = array('id_admin' => $id, 'password' => $pwd);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function get_post($limit, $start)
    {
        $query = $this->db->get('t_post', $limit, $start);
        return $query;
    }

    function get_post_by($id)
    {
        $this->db->select('*');
        $this->db->from('t_post');
        $where = array('id_post' => $id);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    function hapus($where, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->delete($table);
        return $hasil;
    }

    function get_data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query;
    }
    function get_data_by($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
