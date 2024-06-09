<?php
    defined('BASEPATH') OR exit ('No direct script acces allowed');
    class Kategori_m extends CI_Model {

        public function get()
        {
            return $this->db->get('kategori')->result_array();
        }
        public function getCategory($id)
        {
            return $this->db->get_where('kategori', ['id'=> $id ])->row_array();
        }
        public function getAllCategory()
        {
            return $this->db->get('kategori')->result_array();
        }
    }