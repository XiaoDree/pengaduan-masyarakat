<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LupaPasswordController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Masyarakat_m');
        // $this->load->library('sms_service'); // Asumsi ada library untuk mengirim SMS
    }

    public function index() {
        $this->load->view('password_v');
    }

    public function reset_password() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/forgot_password_phone');
        } else {
            $phone = $this->input->post('phone');
            $user = $this->user_model->get_by_phone($phone);

            if ($user) {
                $new_password = $this->generate_password();
                $this->user_model->update_password($user->id, $new_password);

                $this->send_reset_password_sms($user->phone, $new_password);

                $this->session->set_flashdata('success', 'Password reset instructions have been sent to your phone number.');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'No user found with the provided phone number.');
                $this->load->view('auth/forgot_password_phone');
            }
        }
    }

    private function generate_password() {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $password;
    }

    private function send_reset_password_sms($phone, $new_password) {
        $message = "Your new password is: " . $new_password;
        $this->sms_service->send_sms($phone, $message);
    }
}