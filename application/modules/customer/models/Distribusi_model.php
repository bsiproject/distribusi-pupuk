<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_all_by_user($user_id)
    {
        return $this->db->where('user_id', $user_id)->count_all_results('distribusi');
    }

    public function get_all_by_user($user_id, $limit, $offset)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('tanggal_distribusi', 'DESC')
            ->get('distribusi', $limit, $offset)
            ->result();
    }

    public function get_by_id_and_user($id, $user_id)
    {
        return $this->db
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->get('distribusi')
            ->row();
    }
}
