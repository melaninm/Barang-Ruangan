<?php 

class Mo_laporan_ruangan extends CI_Model{

private $table_ = "tbl_pinjamruangan";

	function tampil_laporan_ruangan($perPage, $start)
    {
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get('tbl_pinjamruangan', $perPage, $start)->result();
	}

    function tampil_laporan_ruangan_dashboard($perPage, $start)
    {
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get_where('tbl_pinjamruangan', array('status' => 'Pending'), $perPage, $start)->result();
    }

	function baris_ruangan()
    {
        return $this->db->get($this->table_)->num_rows();
    }
	function tampil_laporan_ruangan_user(){
        // return $this->db->get($this->table_)->result();
        $id = $this->session->userdata['id'];
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$this->db->from('tbl_pinjamruangan');
		$query = $this->db->get();
		return $query->result();
	}
    function cetak_laporan($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function get_keyword_ruangan($keyword){
            $this->db->select('*');
            $this->db->from('tbl_pinjamruangan');
             if(!empty($keyword)) {
        	$this->db->group_start();
            $this->db->like('nama2', $keyword);
            $this->db->or_like('tujuan', $keyword);
            $this->db->group_end();
         }
            return $this->db->get()->result();
        }

    function hapus_ruangan($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function UPDATE($data){
        $query = $this->db->query( "UPDATE tbl_pinjamruangan SET status = '".$data['status']."', keterangan = '".$data['keterangan']."' WHERE id_pr ='".$data['id']."'");

        $this->db->set($query);
    }

    public function display_denda(){
        $query = $this->db->query("SELECT * FROM tbl_pinjamruangan WHERE STATUS = 'diterima' AND tanggal_kembali < '".date('Y-m-d')."'");
        $data = $query->result();

        return $data;
    }
}