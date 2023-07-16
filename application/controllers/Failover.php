<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Failover extends CI_Controller
{
	public function mangle()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$mangle = $API->comm('/ip/firewall/mangle/print');
		$data = [
			'title' => 'Konfigurasi Failover',
			'totalmangle' => count($mangle),
			'mangle' => $mangle,
		];

		$this->load->view('template/main', $data);
		$this->load->view('failover/mangle', $data);
		$this->load->view('template/footer');
	}
	public function mangleactive()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$mangleactive = $API->comm('/ip/firewall/mangle/print');
		$data = [
			'title' => 'Mangle Active',
			'mangleactive' => count($mangleactive),
			'mangleactive' => $mangleactive,
		];

		$this->load->view('template/main', $data);
		$this->load->view('failover/mangleactive', $data);
		$this->load->view('template/footer');
	}

	public function addMangle()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'ether2',
			'connection-mark' => 'no-mark',
			'per-connection-classifier' => 'src-address-and-port:2/0',
			'action' => 'mark-connection',
			'new-connection-mark' => 'ISP-1',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'ether2',
			'connection-mark' => 'no-mark',
			'per-connection-classifier' => 'src-address-and-port:2/1',
			'action' => 'mark-connection',
			'new-connection-mark' => 'ISP-2',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'ether2',
			'connection-mark' => 'ISP-1',
			'action' => 'mark-routing',
			'new-routing-mark' => 'KE-ISP-1',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'ether2',
			'connection-mark' => 'ISP-2',
			'action' => 'mark-routing',
			'new-routing-mark' => 'KE-ISP-2',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'WAN1',
			'connection-mark' => 'no-mark',
			'action' => 'mark-connection',
			'new-connection-mark' => 'ISP-1',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'prerouting',
			'in-interface' => 'WAN2',
			'connection-mark' => 'no-mark',
			'action' => 'mark-connection',
			'new-connection-mark' => 'ISP-2',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'output',
			'connection-mark' => 'ISP-1',
			'action' => 'mark-routing',
			'new-routing-mark' => 'KE-ISP-1',
		));
		$API->comm("/ip/firewall/mangle/add", array(
			'chain' => 'output',
			'connection-mark' => 'ISP-2',
			'action' => 'mark-routing',
			'new-routing-mark' => 'KE-ISP-2',
		));

		redirect('failover/mangle');
	}

	public function delMangle($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/firewall/mangle/remove", array(
			".id" => '*' . $id,
		));
		redirect('failover/mangle');
	}
	public function routes()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$routes = $API->comm('/ip/route/print');

		$data = [
			'title' => 'Konfigurasi Routes',
			'totalroutes' => count($routes),
			'routes' => $routes,
		];

		$this->load->view('template/main', $data);
		$this->load->view('failover/routes', $data);
		$this->load->view('template/footer');
	}
	public function addRoutes()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/route/add", array(
			"gateway" => $post['gateway'],
			"check-gateway" => $post['check-gateway'],
			"distance" => $post['distance'],
			"routing-mark" => $post['routing-mark'],
		));

		redirect('failover/routes');
	}
	public function delRoutes($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/route/remove", array(
			".id" => '*' . $id,
		));
		redirect('failover/routes');
	}
}
