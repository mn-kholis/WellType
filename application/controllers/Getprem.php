<?php
class Getprem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{

		include 'midtrans-php/Midtrans.php';

		\Midtrans\Config::$serverKey = 'SB-Mid-server-BlXnKBNfw8kdW6hn-15OBHdX';
		\Midtrans\Config::$isProduction = false;
		\Midtrans\Config::$isSanitized = true;
		\Midtrans\Config::$is3ds = true;
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email_user');
		$params = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => 25000,
			),
			'customer_details' => array(
				'first_name' => $username,
				'last_name' => '',
				'email' => $email,
				'phone' => '',
			),
		);
		$snapToken = "";
		try {
			$snapToken = \Midtrans\Snap::getSnapToken($params);
		}catch(Exception $e){
		}

		$order_id = $params['transaction_details']['order_id'];
		$data['snapToken']=$snapToken;
		$data['order_id']=$order_id;

		$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/".$order_id."/status",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"accept: application/json", "authorization: Basic U0ItTWlkLXNlcnZlci1CbFhuS0JOZnc4a2RXNmhuLTE1T0JIZFg6"),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);
				
				if ($err) {
				echo "cURL Error #:" . $err;
				} else {
				$responsi = json_decode($response, TRUE);
				if(isset($responsi["status_code"])&& in_array($responsi['status_code'], [200,201])){
					$data['cekmidtrans'] = $responsi;
					if ($responsi['transaction_status']=="settlement") {
						echo "Midtrans Settlement Success";
						exit();
					}
				}
				}
		$data["snapToken"] = $snapToken;
		$this->load->view('getprem', $data);
	}
	public function succes(){
		$user_id = $this->session->userdata('id_user');
		$this->load->model('Mmember');
		$this->Mmember->setprem($user_id);

		redirect('Dashboard');
	}
}