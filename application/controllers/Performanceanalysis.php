<?php
class Performanceanalysis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        $this->load->model('Mwpm');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{
        $this->load->model('Mperformance'); // Pastikan model sudah dibuat
        $user_id = $this->session->userdata('id_user'); // Ambil ID user dari session

        // Ambil data default untuk "Overall"
        $overall_time = $this->Mperformance->get_practice_time($user_id, 'overall');
        $today_time = $this->Mperformance->get_practice_time($user_id, 'today');
        $this_week_time = $this->Mperformance->get_practice_time($user_id, 'this_week');

        $data = [
            'overall_time' => $overall_time,
            'today_time' => $today_time,
            'this_week_time' => $this_week_time,
        ];
        // Hitung waktu penyelesaian
        $data['practice_time_today'] = $this->Mperformance->get_practice_time($user_id, 'today');
        $data['practice_time_overall'] = $this->Mperformance->get_practice_time($user_id, 'overall');
    
        // Hitung jumlah attempts
        $data['attempts_today'] = $this->Mperformance->get_practice_attempts($user_id, 'today');
        $data['attempts_overall'] = $this->Mperformance->get_practice_attempts($user_id, 'overall');
    
        $bestWpmValue = $this->Mwpm->getBestWpm($this->session->userdata('id_user'));
        $data['bestWpm'] = $bestWpmValue->best_wpm;
		$this->load->view('performanceanalysis', $data);
	}
    public function filter_time($filter)
    {
        $this->load->model('Mperformance');
        $user_id = $this->session->userdata('id_user');

        $time = $this->Mperformance->get_practice_time($user_id, $filter);
        echo json_encode(['time' => gmdate("H:i:s", $time)]);
    }
}
