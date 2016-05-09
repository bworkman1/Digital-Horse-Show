<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_video extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->js('assets/themes/default/plugins/uploadify/jquery.uploadify.min.js');
        $this->load->js('assets/themes/default/js/app/user-uploads.js');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/google-auto-complete.js');

        $this->load->model('Security');
        $this->output->set_template('default');
    }

    public function index()
    {
        $this->load->model('Admin/admin_settings');
        $this->load->model('Coach/Grades');
        $googleSetting = $this->admin_settings->getSetting('google_api');

        $this->output->set_common_meta('Upload Video', 'Digital Horse Show Upload Video', '');
        $this->load->js('https://maps.googleapis.com/maps/api/js?key='.$googleSetting->value.'&signed_in=true&libraries=places&callback=initMap');
        $this->load->js('assets/themes/default/js/select2.full.min.js');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');

        $this->load->js('vendor/jQuery-File-Upload/js/vendor/jquery.ui.widget.js');
        $this->load->js('vendor/jQuery-File-Upload/js/jquery.iframe-transport.js');
        $this->load->js('vendor/jQuery-File-Upload/js/jquery.fileupload.js');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/themes/semantic.css');
        $this->load->css('assets/themes/default/css/select2.min.css');
        
        $lng = $this->session->set_userdata('lng', '40.2313420');
        $lat = $this->session->set_userdata('lat', '-82.4500300');

        if(empty($lat) && empty($lng)) {
            $this->session->set_userdata('lat', '40.2313420');
            $this->session->set_userdata('lng', '-82.4500300');
        }

        $this->load->model('Coach/Coaches');
        $this->load->library('Geolocation');
        $this->load->config('geolocation', true);

        $config = $this->config->config['geolocation'];

        $this->geolocation->initialize($config);
        $this->geolocation->set_ip_address('77.52.107.69');

        $data['options'] = $this->Grades->getUserOptions();
        $data['coaches'] = $this->Coaches->coachOptions();
        $data['user'] = $this->ion_auth->user()->row();
        $data['page_name'] = 'add-upload';
        $this->load->view('users/upload-video', $data);
    }

    public function upload()
    {
        $this->output->unset_template();
        $this->load->model('Uploads');
        $this->Uploads->set_image_path();
        $response = $this->load->model('Test/Uploadhandler');
        /*
                error_reporting(0);
                $config = array(
                   'max_tmp_file_age' => 900,
                   'max_execution_time' => 180,
                   'target_dir' => $this->Uploads->mUploadPath);
                $this->load->library('Chunked_uploader', $config, 'uploader');
                //$this->load->helper('json_rpc');

                try
                {
                   $this->uploader->upload();
                   if ($this->uploader->is_completed())
                   {

                       $response = array('success' => $this->uploader->get_file_path());//$response = new Json_rpc_response('success');
                   }
                   else
                   {
                       $response = array('continue');//$response = new Json_rpc_response('continue');
                   }
                }
                catch (RuntimeException $ex)
                {
                   $response = aay($ex->getMessage());//$response = new Json_rpc_error_response($ex->getMessage());
                }
                $response['pather'] = $this->Uploads->mUploadPath;
                echo json_encode($response);
        /*
                   $this->output->set_template('blank');
                   $this->form_validation->set_rules('name', 'Video Name', 'required|max_length[100]|xss_clean|required|xss_clean');
                   $this->form_validation->set_rules('location', 'Location', 'max_length[200]|xss_clean');
                   $this->form_validation->set_rules('lat', 'Latitude', 'max_length[100]|xss_clean');
                   $this->form_validation->set_rules('lng', 'Longitude', 'max_length[100]|xss_clean');
                   $this->form_validation->set_rules('coach', 'Coach', 'integer|required|xss_clean');
                   $this->form_validation->set_rules('card_id', 'Scoring Type', 'integer|required|xss_clean');

                   if ($this->form_validation->run() == true) {
                       $this->load->model('Uploads');
                       extract($_POST);
                       $input = array(
                           'name'          => $name,
                           'location'      => $location,
                           'public'        => $public = ''?$public='n':$public='y',
                           'date'          => $date,
                           'coach'         => $coach,
                           'scorecard_id'  => $card_id,
                           'date'          => date('Y-m-d'),
                       );

                       if(!empty($lat) && !empty($lng)) {
                           $input['cords'] = $lat.'|'.$lng;
                       }
                       $feedback = $this->Uploads->uploadVideo($_FILES, $input);
                       $this->session->set_flashdata('success', 'Video uploaded successfully');
                   } else {
                       $feedback = array('error' => validation_errors('<span><i class="fa fa-exclamation-triangle"></i> ','</span><br>'));
                   }

                   echo json_encode($feedback);
                   exit;*/
    }

}

?>