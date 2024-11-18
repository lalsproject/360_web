<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('slogin')!='True')
		{
			$this->session->set_flashdata('notif', '<script>swal("Warning","Silakan Login Dulu","warning")</script>');
			redirect('login');
		}	
	}

	public function index()
	{
		$data['title'] = 'DASHBOARD';
		dashPage('admin/home',$data);
	}

	function scene()
	{
		$data['title'] = 'Data Scene';
		$data['scene'] = $this->db->order_by('id_scane','ASC')->get('tbl_scane')->result();
		dashPage('admin/scene',$data);
	}

	function add_scene()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$title = $this->input->post('title');
			$foto = upload64($this->input->post('foto_new'));
			if ($foto == false)
			{
				$this->session->set_flashdata('notif', '<script>swal("Warning","Foto Tidak Terupload","warning")</script>');
				redirect('scene');
			}
			else
			{
				$data = array(
					'title' => $title, 
					'panorama' => $foto, 
				);

				$this->db->insert('tbl_scane', $data);
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Ditambahkan","success")</script>');
				redirect('scene');
			}
		}
		else
		{
			http_response_code(404);
		}
	}

	function hapus_scene($id='')
	{
		if ($id != '')
		{
			$id = decrypt_url($id);
			$data = $this->db->get_where('tbl_scane', 'id_scane = "'.$id.'"');
			if ($data->num_rows() > 0)
			{
				$data = $data->row();
				unlink('assets/tour/assets/'.$data->panorama);
				$this->db->delete('tbl_scane',array('id_scane' => $id,));
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Dihapus","success")</script>');
				redirect('scene');
			}
			else
			{
				http_response_code(404);
			}
		}
		else
		{
			http_response_code(404);
		}
	}

	function hotspot()
	{	
		$data['scene'] = $this->db->order_by('id_scane','ASC')->get('tbl_scane')->result();
		if ($data['scene'] != null)
		{
			$data['title'] = 'Data Hotspot';
			$data['hotspot'] = $this->db->order_by('id_hotspot','ASC')->get('tbv_hotspot')->result();
			
			$data['config'] = $this->get_config();
			dashPage('admin/hotspot',$data);
		}
		else
		{
			$this->session->set_flashdata('notif', '<script>swal("Warning","Silahkan Tambahkan Scene Dahulu","warning")</script>');
			redirect('scene');
		}
	}

	

	function simpan_hotspot()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$title = $this->input->post('title');
			$in = decrypt_url($this->input->post('in'));
			$yaw = $this->input->post('yaw');
			$pitch = $this->input->post('pitch');
			$to = decrypt_url($this->input->post('to'));

			if ($yaw == '' or $pitch == '')
			{
				$this->session->set_flashdata('notif', '<script>swal("Warning","Tidak Ada Lokasi Hotspot","warning")</script>');
				redirect('hotspot');
			}
			else
			{
				$data = array(
					'title' => $title, 
					'in' => $in, 
					'yaw' => $yaw, 
					'pitch' => $pitch, 
					'to' => $to, 
				);

				$this->db->insert('tbl_hotspot', $data);
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Ditambahkan","success")</script>');
				redirect('hotspot');
			}
		}
	}

	function hapus_hotspot($id='')
	{
		if ($id != '')
		{
			$id = decrypt_url($id);
			$data = $this->db->get_where('tbl_hotspot', 'id_hotspot = "'.$id.'"');
			// var_dump($data->row());
			// die();
			if ($data->num_rows() > 0)
			{
				$data = $data->row();
				$this->db->delete('tbl_hotspot',array('id_hotspot' => $id,));
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Dihapus","success")</script>');
				redirect('hotspot');
			}
			else
			{
				http_response_code(404);
			}
		}
		else
		{
			http_response_code(404);
		}
	}

	function galery()
	{
		$data['title'] = 'Data Galery';
		$data['galery'] = $this->db->order_by('id_foto', 'desc')->get('tbl_galery')->result();
		dashPage('admin/galery',$data);
	}

	function simpan_galery()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$title = $this->input->post('title');
			$foto = upload64($this->input->post('foto_new'));
			if ($foto == false)
			{
				$this->session->set_flashdata('notif', '<script>swal("Warning","Foto Tidak Terupload","warning")</script>');
				redirect('galery');
			}
			else
			{
				$data = array(
					'title' => $title, 
					'foto' => $foto, 
				);

				$this->db->insert('tbl_galery', $data);
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Ditambahkan","success")</script>');
				redirect('galery');
			}
		}
		else
		{
			http_response_code(404);
		}
	}

	function hapus_galery($id='')
	{
		if ($id != '')
		{
			$id = decrypt_url($id);
			$data = $this->db->get_where('tbl_galery', 'id_foto = "'.$id.'"');
			if ($data->num_rows() > 0)
			{
				$data = $data->row();
				unlink('assets/tour/assets/'.$data->foto);
				$this->db->delete('tbl_galery',array('id_foto' => $id,));
				$this->session->set_flashdata('notif', '<script>swal("Success","Data Berhasil Dihapus","success")</script>');
				redirect('galery');
			}
			else
			{
				http_response_code(404);
			}
		}
		else
		{
			http_response_code(404);
		}
	}

	private function get_config()
	{
		
		$first = $this->db->get_where('tbl_scane', 'first_scane = "Y"')->row();
		
		$data['default'] = array(
			'firstScene' => encrypt_url($first->id_scane), 
			'author' => 'Virtual Tour',
			'sceneFadeDuration' => 1000,
			'autoLoad' => True,
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

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */