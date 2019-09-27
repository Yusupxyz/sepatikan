<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download_model extends CI_Model
{

    public $table = 'download';
    public $table2 = 'tags';
    public $id = 'id_download';
    public $nama = 'file';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    
   
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_tags($id)
    {
        $tag = $this->db->query("SELECT nama_tag FROM tags WHERE id_download = '$id'");
        //$this->db->where($this->id_download, $id);
        return $tag->result();
         ;
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('id_download', $q);
	$this->db->from($this->table);
    $this->db->join('kategori', 'download.id_kategori = kategori.id_kategori');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);

        $this->db->like('id_download', $q);

    $this->db->join('kategori', 'download.id_kategori = kategori.id_kategori');
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($downloadtags, $file,$nama_tabel,$tahun,$id_kategori,$deskripsi)
    {
        $sql1 = "INSERT INTO download (id_download,file,nama_tabel,tahun,id_kategori,deskripsi) VALUES ('$downloadtags', '$file','$nama_tabel','$tahun','$id_kategori','$deskripsi') ";
        //$this->db->insert($this->table, $data);
        $this->db->query($sql1);
        return TRUE;
    }
    // insert tag
    function insert_tag($downloadtags,$tag)
    {
       $sql ="INSERT INTO tags (id_download,nama_tag) VALUES ('$downloadtags','$tag')";
       $this->db->query($sql);
       return TRUE;
    }
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk(){
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data); 
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
//check pk data is exists 

        function is_exist($id){
         $query = $this->db->get_where($this->table, array($this->id => $id));
         $count = $query->num_rows();
         if($count > 0){
            return true;
         }else{
            return false;
         }
        }


}

/* End of file Download_model.php */
/* Location: ./application/models/Download_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-04 05:43:32 */
/* http://harviacode.com */