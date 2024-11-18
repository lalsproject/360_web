<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	function index()
	{
		redirect('home');
	}

	function home()
	{
		$data['config'] = $this->get_config();
		frontPage('front/home',$data);
	}

	function login_page()
	{
		if ($this->session->userdata('slogin') == 'True')
		{
			redirect('dashboard');
		}
		else
		{
			$data['title'] = 'Login Administrator';
			frontPage('front/login');
		}
	}



	function login_proses()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->db->get_where('login', 'username = "'.$username.'" AND password = "'.md5($password).'"');
			if ($cek->num_rows() > 0)
			{
				$dataSession = array(
					'slogin' => 'True', 
					'username' => $cek->row()->username, 
				);

				$welcome = '<script>swal("Success","Selamat Datang '.$username.'","success")</script>';
				$this->session->set_userdata($dataSession);
				$this->session->set_flashdata('notif', $welcome);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('notif', '<script>swal("Warning","Akun Tidak Terdaftar","error")</script>');
				redirect('login');
			}
		}
	}

	

	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	function tour()
	{
		$scene = $this->db->order_by('id_scane','ASC')->get('tbl_scane');
		if ($scene->num_rows() > 0)
		{

			$data['config'] = $this->get_config();
			$data['scene'] = $scene->result();
			$this->load->view('front/tour',$data);
		}
		else
		{
			$this->session->set_flashdata('notif', '<script>swal("Warning","Tour Belum Dibuat","warning")</script>');
			redirect('home');
		}
	}

	function galery()
	{
		$data['galery'] = $this->db->order_by('id_foto', 'desc')->get('tbl_galery')->result();
		frontPage('front/galery',$data);
	}

	private function get_config()
	{
		
		$first = $this->db->get_where('tbl_scane', 'first_scane = "Y"')->row();
		
		$data['default'] = array(
			'firstScene' => encrypt_url($first->id_scane), 
			'author' => 'Virtual Tour',
			'sceneFadeDuration' => 1000,
			'autoLoad' => True,
			'autoRotate' => -2,
			'showFullscreenCtrl' => False
		);



		$scane = $this->db->order_by('id_scane','ASC')->get('tbl_scane')->result();

		foreach ($scane as $s)
		{
			$hotspot = $this->db->get_where('tbl_hotspot','in = "'.$s->id_scane.'"');
            $hotspot_item = array();
			if ($hotspot->num_rows() > 0)
			{
				
				foreach ($hotspot->result() as $h)
				{
					$hotspot_item[] = array(
						'pitch' => $h->pitch, 
						'yaw' => $h->yaw, 
						'type' => $h->type,
						'text' => $h->title, 
						'sceneId' => encrypt_url($h->to), 
					);
				}
				
				$scane_item[encrypt_url($s->id_scane)] = array(
					'title' => $s->title, 
					'panorama' => base_url().'assets/tour/assets/'.$s->panorama, 
					'pitch' => 0, 
					'hfov' => 110, 
					"type"=> "equirectangular",
					'hotSpots' => $hotspot_item
				);
			}
			else
			{
				$scane_item[encrypt_url($s->id_scane)] = array(
					'title' => $s->title, 
					'panorama' => base_url().'assets/tour/assets/'.$s->panorama, 
					'pitch' => 0, 
					'hfov' => 110, 
					"type"=> "equirectangular",
				);
			}
			
		}
		$data['scenes'] = $scane_item;

		return json_encode($data);
	}

	
}
