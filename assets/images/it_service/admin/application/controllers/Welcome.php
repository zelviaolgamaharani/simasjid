<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function upload(){
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'png|jpg';
                $config['max_size']             = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('importexcel'))
                {
                        $error = array('error' => $this->upload->display_errors());
						print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        print_r($data);
                }
	}
}
