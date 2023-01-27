<?php
class M_login extends CI_Model
{
    function auth_user_admin($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('t_admin');
        $where = array('username' => $user, 'password' => $pass);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
