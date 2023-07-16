<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qos extends CI_Controller
{
	public function queues()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$queues = $API->comm('/queue/simple/print');
		$data = [
			'title' => 'Konfigurasi Qos',
			'totalqueues' => count($queues),
			'queues' => $queues,
		];

		$this->load->view('template/main', $data);
		$this->load->view('qos/queues', $data);
		$this->load->view('template/footer');
	}
	public function addQueues()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/queue/simple/add", array(
			'name' => 'Limit-Ether2',
			'target' => 'ether2',
			'max-limit' => '512K/128k',
		));

		redirect('qos/queues');
	}
	public function delQueues($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/queue/simple/remove", array(
			".id" => '*' . $id,
		));

		redirect('qos/queues');
	}
	public function enaQueues($id)
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/queue/simple/enable", array(
			".id" => '*' . $id,
		));

		redirect('qos/queues');
	}
	public function disQueues($id)
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/queue/simple/disable", array(
			".id" => '*' . $id,
		));

		redirect('qos/queues');
	}
}
