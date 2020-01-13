<?php
App::uses('HttpSocket', 'Network/Http');
class KinetoComponent extends Component {
	public $settings = array(
		'authToken' => '',
		'clientName' => '',
		'url' => ''
	);
	private $socket = '';
	private $tag = 'kineto';

	public function initialize(Controller $controller, $settings = array()) {
		$this->controller = $controller;
		$this->settings = array_merge($this->settings, $settings);
		$this->socket = new HttpSocket(array(
			'ssl_verify_peer' => false,
			'ssl_verify_host' => false,
			'ssl_verify_peer' => false,
			'timeout' => 60
		));
	}

	public function airtimeCitySale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/airtimeCity/sale/v1',
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/flexiCall/sale/v1',
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/hollard/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function mtcSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$this->log('MTC API request (N$' . $amount . ' for ' . $mobileNumber . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/mtc/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('MTC API result (N$' . $amount . ' for ' . $mobileNumber . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function mtcAwehSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$this->log('MTC API request (N$' . $amount . ' for ' . $mobileNumber . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/mtcAweh/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('MTC API result (N$' . $amount . ' for ' . $mobileNumber . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}
	public function mtcDirectSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$this->log('MTC Topup API request (N$' . $amount . ' for ' . $mobileNumber . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/mtcdirect/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('MTC Topup API result (N$' . $amount . ' for ' . $mobileNumber . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function switchSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/switch/sale/v1',
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
		$this->log('TN Mobile API request (N$' . $amount . ' for ' . $mobileNumber . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/tnmobile/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('TN Mobile API result (N$' . $amount . ' for ' . $mobileNumber . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function tradespotSale($transactionId, $mobileNumber, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'mobileNumber' => $mobileNumber,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/tradespot/sale/v1',
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/airtime/vodacom/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function netvendInfo($meter_number, $municipality_code) {
		$payload = array(
			'meterNumber' => $meter_number,
			'municipalityCode' => $municipality_code,
		);
		$this->log('Prepaid electricity API request (' . $meter_number . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->get(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/netvend/electricity/info/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('Prepaid electricity API result (' . $meter_number . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function netvendSale($transactionId, $meterNumber, $municipalityCode, $amount, $mobile_number) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'meterNumber' => $meterNumber,
			'municipalityCode' => $municipalityCode,
			'amount' => $amount,
			'mobileNumber' => $mobile_number
		));
		$this->log('Prepaid electricity API request (N$' . $amount . ' for ' . $meterNumber . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/netvend/electricity/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('Prepaid electricity API result (N$' . $amount . ' for ' . $meterNumber . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function netvendWaterInfo() {
		$result = $this->socket->get(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/netvend/water/info/v1',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function netvendWaterSale($transactionId, $meterNumber, $municipalityCode, $amount) {
		$payload = json_encode(array(
			'transactionId' => $transactionId,
			'meterNumber' => $meterNumber,
			'municipalityCode' => $municipalityCode,
			'amount' => $amount
		));
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/netvend/water/sale/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function termsAndConditions() {
		$result = $this->socket->get(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/termsAndConditions',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function getProductList() {
		$result = $this->socket->get(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/productList',
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/createAccount',
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/loadAccount/deviceReference',
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
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/loadAccount/mobileNumber',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		return json_decode($result->body, true);
	}

	public function dstvInfo($account_number) {
		if (strlen($account_number) > 10) {
			$payload = array(
				'smartcardNumber' => $account_number
			);
		} else {
			$payload = array(
				'customerNumber' => $account_number
			);
		}
		$this->log('DSTv info API request (' . $account_number . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->get(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/dstv/info/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('DSTv info API result (' . $account_number . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}

	public function dstvSale($transactionId, $account_number, $amount, $type) {
		switch ($type) {
			case 'boxoffice':
				$action = 'BOX_OFFICE_AMOUNT';
				break;
			case 'dstv':
			default:
				$action = 'OWN_AMOUNT';
				break;
		}
		if (strlen($account_number) > 10) {
			$payload = json_encode(array(
				'transactionId' => $transactionId,
				'smartcardNumber' => $account_number,
				'action' => $action,
				'amount' => $amount,
			));
		} else {
			$payload = json_encode(array(
				'transactionId' => $transactionId,
				'customerNumber' => $account_number,
				'action' => $action,
				'amount' => $amount,
			));
		}
		$this->log('DSTv API request (N$' . $amount . ' for ' . $account_number . '): ' . json_encode($payload, true), 'kineto');
		$result = $this->socket->post(
			$this->settings['url'] . '/' . $this->settings['clientName'] . '/billpayment/dstv/confirmPayment/v1',
			$payload,
			array('header' => array('authenticationToken' => $this->settings['authToken'], 'Content-Type' => 'application/json'))
		);
		$this->log('DSTv API result (N$' . $amount . ' for ' . $account_number . '): ' . $result, 'kineto');
		return json_decode($result->body, true);
	}
}