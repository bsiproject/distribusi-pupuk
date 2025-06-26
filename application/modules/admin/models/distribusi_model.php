<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_model extends CI_Model
{
    var $table = 'distribusi';
    // Sesuaikan nama kolom yang dapat diurutkan dan dicari sesuai dengan yang ada di database dan kebutuhan
    // 'id' dihilangkan karena biasanya nomor urut, bukan kolom database untuk sorting/searching
    // 'tanggal_distribusi' adalah nama kolom di DB Anda
    var $column_order = array(null, 'ekspedisi', 'tracking_id', 'status', 'tanggal_distribusi', null); // Kolom yang dapat diurutkan
    var $column_search = array('ekspedisi', 'tracking_id', 'status', 'tanggal_distribusi'); // Kolom yang dapat dicari
    var $order = array('tanggal_distribusi' => 'desc'); // Urutan default

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) { // loop kolom pencarian
            if ($_POST['search']['value']) { // jika ada nilai pencarian
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because multiple OR clause can be wrong
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end(); //close bracket
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function add_distribusi($data) { // Mengubah nama method agar konsisten
        return $this->db->insert($this->table, $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update_distribusi($id, $data) { // Mengubah nama method
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_distribusi($id) { // Mengubah nama method
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function get_all_orders()
{
    return $this->db
                ->order_by('tanggal_distribusi', 'DESC')
                ->get($this->table)
                ->result();
}

}