<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$ipaddress = $API->comm('/ip/address/print');
		$pool = $API->comm('/ip/pool/print');
		$dhcp = $API->comm('/ip/dhcp-server/print');
		$dhcpclient = $API->comm('/ip/dhcp-client/print');
		$dns = $API->comm('/ip/dns/print');
		$nat = $API->comm('/ip/firewall/nat/print');
		$mangle = $API->comm('/ip/firewall/mangle/print');
		$route = $API->comm('/ip/route/print');
		$queues = $API->comm('/queue/simple/print');
		$resource = $API->comm("/system/resource/print");
		$interface = $API->comm("/interface/print");

		$data = [
			'title' => 'API Mikrotik Imigrasi',
			'ipaddress' => count($ipaddress),
			'pool' => count($pool),
			'dhcp' => count($dhcp),
			'dhcpclient' => count($dhcpclient),
			'dns' => count($dns),
			'nat' => count($nat),
			'mangle' => count($mangle),
			'route' => count($route),
			'queues' => count($queues),
			'cpu' => $resource['0']['cpu-load'],
			'uptime' => $resource['0']['uptime'],
			'interface' => $interface,
		];

		$this->load->view('template/main', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

	public function traffic()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
			'interface' => 'ether3',
			'once' => '',
		));

		$rx = $getinterfacetraffic[0]['rx-bits-per-second'];
		$tx = $getinterfacetraffic[0]['tx-bits-per-second'];
		$data = [
			'tx' => $tx,
			'rx' => $rx,
		];
		$this->load->view('traffic', $data);
	}
}
