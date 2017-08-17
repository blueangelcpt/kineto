<?php
App::uses('HttpSocket', 'Network/Http');
class KinetoComponent extends Component {
	public $settings = array(
		'authToken' => '',
		'clientName' => ''
	);
	private $url = 'https://vndairtimecity.kineto.co/VendingRestfulAPI/api';
	private $socket = '';
	private $tag = 'kineto';

	public function initialize(Controller $controller, $settings = array()) {
		$this->controller = $controller;
		$this->settings = array_merge($this->settings, $settings);
		$this->socket = new HttpSocket();
	}

	public function airtimeCitySale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/airtimeCity/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function flexiCallSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/flexiCall/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function hollardSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/hollard/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function mtcSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount / 100
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/mtc/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function switchSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/switch/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function tnMobileSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/tnMobile/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function tradespotSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/tradespot/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function vodacomSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/airtime/vodacom/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function netvendInfo() {
		return $this->socket->get(
			$this->url . '/' . $this->settings['clientName'] . '/billpayment/netvend/electricity/info/v1',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
	}

	public function netvendSale($transactionId, $meterNumber, $municipalityCode, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'meterNumber' => $meterNumber,
			'municipalityCode' => $municipalityCode,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/billpayment/netvend/electricity/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function netvendWaterInfo() {
		return $this->socket->get(
			$this->url . '/' . $this->settings['clientName'] . '/billpayment/netvend/water/info/v1',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
	}

	public function netvendWaterSale($transactionId, $meterNumber, $municipalityCode, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'meterNumber' => $meterNumber,
			'municipalityCode' => $municipalityCode,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/billpayment/netvend/water/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function termsAndConditions() {
		return $this->socket->get(
			$this->url . '/' . $this->settings['clientName'] . '/termsAndConditions',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
	}

	public function getProductList() {
		return $this->socket->get(
			$this->url . '/' . $this->settings['clientName'] . '/productList',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
	}

	public function createAccount($firstName, $secondName, $lastName, $deviceId, $deviceType, $language) {
		$payload = json_encode(array(
			'firstName' => $firstName,
			'secondName' => $secondName,
			'lastName' => $lastName,
			'deviceList' => array(
				'deviceId' => $deviceId,
				'deviceType' => $deviceType,
				'language' => $language,
			)
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/createAccount',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function loadAccountByDeviceReference($deviceReference, $amount, $reference) {
		$payload = json_encode(array(
			'deviceReference' => $deviceReference,
			'amount' => $amount,
			'reference' => $reference,
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/loadAccount/deviceReference',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function loadAccountByMobileNumber($mobile_number, $amount, $reference) {
		$payload = json_encode(array(
			'mobileNumber' => $mobile_number,
			'amount' => $amount,
			'reference' => $reference
		));
		$result = $this->socket->post(
			$this->url . '/' . $this->settings['clientName'] . '/loadAccount/mobileNumber',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}
}