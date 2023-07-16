<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internet extends CI_Controller
{
	public function IpAddress()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$ipaddress = $API->comm('/ip/address/print');
		$data = [
			'title' => 'Konfigurasi Ip Address',
			'totalipaddress' => count($ipaddress),
			'ipaddress' => $ipaddress,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/ipaddress', $data);
		$this->load->view('template/footer');
	}
	public function addIpAddress()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/address/add", array(
			"address" => $post['address'],
			"interface" => $post['interface'],
		));
		redirect('internet/ipaddress');
	}
	public function delIpAddress($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/address/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/ipaddress');
	}
	public function Nat()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$nat = $API->comm('/ip/firewall/nat/print');
		$data = [
			'title' => 'Konfigurasi Nat',
			'totalnat' => count($nat),
			'nat' => $nat,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/nat', $data);
		$this->load->view('template/footer');
	}
	public function addNat()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/firewall/nat/add", array(
			"chain" => $post['chain'],
			"action" => $post['action'],
			"out-interface" => $post['out-interface'],
		));
		redirect('internet/nat');
	}
	public function delNat($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/firewall/nat/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/nat');
	}
	public function DhcpClient()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$dhcpclient = $API->comm('/ip/dhcp-client/print');
		$data = [
			'title' => 'Konfigurasi Dhcp Client',
			'totaldhcpclient' => count($dhcpclient),
			'dhcpclient' => $dhcpclient,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/dhcpclient', $data);
		$this->load->view('template/footer');
	}
	public function addDhcpClient()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dhcp-client/add", array(
			"interface" => $post['interface'],
		));
		redirect('internet/dhcpclient');
	}
	public function delDhcpClient($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-client/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpclient');
	}
	public function enaDhcpClient($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-client/enable", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpclient');
	}
	public function Dns()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$servers = $API->comm('/ip/dns/print');
		$data = [
			'title' => 'Konfigurasi DNS Servers',
			'totalservers' => count($servers),
			'servers' => $servers,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/dns', $data);
		$this->load->view('template/footer');
	}
	public function addDns()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dns/set", array(
			"servers" => $post['servers'],
		));
		redirect('internet/dns');
	}
	public function delDns($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dns/remove-value", array(
			".id" => '*' . $id,
		));
		redirect('internet/dns');
	}
	public function DhcpServer()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$dhcpserver = $API->comm('/ip/dhcp-server/print');
		$pool = $API->comm('/ip/pool/print');
		$interface = $API->comm('/interface/print');
		$data = [
			'title' => 'Konfigurasi DHCP Server',
			'totaldhcpserver' => count($dhcpserver),
			'dhcpserver' => $dhcpserver,
			'pool' => $pool,
			'interface' => $interface,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/dhcpserver', $data);
		$this->load->view('template/footer');
	}
	public function addDhcpServer()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/dhcp-server/add", array(
			"name" => $post['name'],
			"interface" => $post['interface'],
			"address-pool" => $post['pool'],
		));

		redirect('internet/dhcpserver');
	}
	public function addNetwork()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dhcp-server/network/add", array(
			'address' => "192.168.10.0/24",
			'gateway' => "192.168.10.1",
			'netmask' => "255.255.255.0",
			'dns-server' => "192.168.140.88,192.168.0.1",
		));
		$API->comm("/ip/pool/add", array(
			'name' => "dhcp_pool_ether2",
			'ranges' => "192.168.10.2-192.168.10.254",
		));

		redirect('internet/dhcpserver');
	}
	public function enaDhcpServer($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-server/enable", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpserver');
	}
	public function delDhcpServer($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-server/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpserver');
	}
	public function Pool()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$pool = $API->comm('/ip/pool/print');
		$interface = $API->comm('/interface/print');
		$data = [
			'title' => 'Konfigurasi DHCP Server',
			'totalpool' => count($pool),
			'pool' => $pool,
			'interface' => $interface,
		];
		$this->load->view('template/main', $data);
		$this->load->view('internet/pool', $data);
		$this->load->view('template/footer');
	}
	public function addPool()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/pool/add", array(
			"name" => $post['name'],
			"ranges" => $post['ranges'],
		));
		$API->comm("/ip/dhcp-server/network/add", array(
			'address' => "192.168.10.0/24",
			'gateway' => "192.168.10.1",
			'dns-server' => "8.8.8.8,8.8.4.4,192.168.140.88,192.168.0.1",
		));

		redirect('internet/pool');
	}
	public function delPool($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/pool/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/pool');
	}
}
