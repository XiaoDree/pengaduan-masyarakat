<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_m');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_m->get_all();
        $data['kategori'] = $this->Kategori_m->get_kategori();

        $this->load->view('pengaduan', $data);
    }

    public function filter() {
        $category_id = $this->input->get('category_id');

        if ($category_id) {
            $data['services'] = $this->service_model->get_by_category($category_id);
        } else {
            $data['services'] = $this->service_model->get_all();
        }

        $data['categories'] = $this->category_model->get_categories();
        $this->load->view('service/index', $data);
    }
}