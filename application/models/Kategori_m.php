<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    private $table = 'kategori';
    public function get_categories()
    {
        return $this->db->get($this->table)->result();
    }
}
