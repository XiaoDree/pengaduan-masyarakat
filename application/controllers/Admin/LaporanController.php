<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Tanggapan_m');
		$this->load->model('Pengaduan_m');
		$this->load->model('Kategori_m');
		$this->load->model('Petugas_m');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Generate Laporan';
		$data['laporan'] = $this->Pengaduan_m->laporan_pengaduan()->result_array();
		$data['kategori'] = $this->Kategori_m->get_categories();
		$data['data_filter'] = $this->input->get('jp');

		if ($this->input->get('jp') && $this->input->get('jp') !== "semua") {
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_by_kategori($this->input->get('jp'))->result_array();
		}

		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/generate_laporan', $data);
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}
	public function generate_laporan()
	{
		$data['laporan'] = $this->Pengaduan_m->laporan_pengaduan()->result_array();
		// $this->load->library('dompdf_gen');
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/pengaduan-masyarakat/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf();
		$this->load->view('laporan_pdf', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("laporan pengaduan.pdf", array('Attachment' => 0));
		// nama file pdf yang di hasilkan
	}
	// public function generate_laporan()
	// {

	// $data['laporan'] = $this->Pengaduan_m->laporan_pengaduan()->result_array();

	// $this->load->library('pdf');
	// $sroot = $_SERVER['DOCUMENT_ROOT'];
	// include $sroot . "/pengadudan-masyarakat-master/application/third_party/dompdf/autoload.inc.php";
	// $dompdf = new Dompdf\Dompdf();
	// $this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
	// $this->pdf->filename = "laporan-pengaduan.pdf"; // opsional | default is laporan.pdf
	// $this->pdf->load_view('laporan_pdf', $data);
	// $html = $this->output->get_output();
	// $dompdf->load_html($html);
	// $dompdf->render();
	// $dompdf->stream("laporan.pdf", array('Attachment' => 0));
	// }
}

/* End of file LaporanController.php */
/* Location: ./application/controllers/Admin/LaporanController.php */
