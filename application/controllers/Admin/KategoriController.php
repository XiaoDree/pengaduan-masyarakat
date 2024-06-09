<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class KategoriController extends CI_Controller{
	public function index(){
	$data['kategori'] = $this->kategori->get();
	}
}