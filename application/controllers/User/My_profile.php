<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        $this->output->set_common_meta('My Profile', 'Digital Horse Show My Profile', '');
        $this->load->model('User_videos');

        $data['user'] = $this->ion_auth->user()->row();
        $data['videos'] = $this->User_videos->getUsersVideos($this->session->userdata('user_id'));
        $data['page_name'] = 'my-profile';

        $this->load->view('users/my-profile', $data);
    }

    public function edit()
    {
        $this->output->set_common_meta('Edit Profile', 'Digital Horse Show Edit Profile', '');
        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
        $this->load->js('assets/themes/default/js/app/edit-profile.js');

        $data['user'] = $this->ion_auth->user()->row();
        $data['page_name'] = 'edit-profile';

        $this->load->view('users/edit-profile', $data);
    }

    public function save()
    {
        $user = $this->ion_auth->user()->row();

        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]|max_length[40]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]|max_length[40]');

        if($user->email != $_POST['email']) {
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[50]|valid_email|xss_clean|is_unique[users.email]');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[50]|valid_email|xss_clean');
        }

        if($user->profile_name != $_POST['profile_name']) {
            $this->form_validation->set_rules('profile_name', 'Profile Name', 'required|min_length[6]|max_length[40]|is_unique[users.profile_name]|xss_clean');
        } else {
            $this->form_validation->set_rules('profile_name', 'Profile Name', 'required|min_length[6]|max_length[40]');
        }

        $this->form_validation->set_rules('bio', 'Bio', 'min_length[5]|max_length[1000]');

        $this->form_validation->set_rules('facebook', 'Facebook Profile', 'min_length[5]|max_length[50]|valid_url');
        $this->form_validation->set_rules('twitter', 'Twitter', 'min_length[5]|max_length[50]|valid_url');
        $this->form_validation->set_rules('google', 'Google Plus', 'min_length[5]|max_length[50]|valid_url');
        $this->form_validation->set_rules('instagram', 'Instagram', 'min_length[5]|max_length[50]|valid_url');

        $this->form_validation->set_rules('emails_on', 'Emails On', 'min_length[3]|max_length[3]|alpha');
        $this->form_validation->set_rules('newsletters', 'Newsletter', 'min_length[3]|max_length[3]|alpha');
        $this->form_validation->set_rules('email_public', 'Email Public', 'min_length[3]|max_length[3]|alpha');
        $this->form_validation->set_rules('profile_public', 'Profile Public', 'min_length[3]|max_length[3]|alpha');

        if($_FILES['file']['name']) {
            $this->load->model('uploads');
            $image = $this->uploads->upload_image($_FILES['file'], 'file', 'true', array('resize'=>TRUE));
        }

        if ($this->form_validation->run() == true) {
            extract($_POST);
            $data = array(
                'first_name'        => $first_name,
                'last_name'         => $last_name,
                'profile_name'      => url_title($profile_name),
                'email'             => $email,
                'bio'               => $bio,
                'facebook'          => $facebook,
                'twitter'           => $twitter,
                'google'            => $google,
                'instagram'         => $instagram,
                'emails_on'         => $emails_on,
                'newsletter'        => $newsletter,
                'email_public'      => $email_public,
                'profile_public'    => $profile_public,
            );

            $this->session->set_userdata('first_name', $first_name);
            $this->session->set_userdata('last_name', $last_name);
            $this->session->set_userdata('profile_name', url_title($profile_name));

            if(isset($image['success']['system_path'])) {
                $this->session->set_userdata('user_image', $image['success']['system_path']);
                $data['user_image'] = $image['success']['system_path'];
            }

            if(isset($image['error'])) {
                $this->session->set_flashdata('error', $image['error']);
                redirect('user/my-profile/edit');
                exit;
            }

            if($this->ion_auth->update($this->session->userdata('user_id'), $data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile failed to save, try again');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<span>', '</span>'));
        }
        redirect('user/my-profile/edit');
        exit;
    }

    public function delete_image()
    {
        $data = array(
            'user_image' => '/assets/themes/default/images/user-default.jpg'
        );
        if($this->ion_auth->update($this->session->userdata('user_id'), $data)) {
            $this->session->set_userdata('user_image', 'assets/themes/default/images/user-default.jpg');
            $this->session->set_flashdata('success', 'Image deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Image failed to delete');
        }
        redirect('user/my-profile/edit');
        exit;
    }

    public function password()
    {
        $this->form_validation->set_rules('old', 'Old Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
        $this->form_validation->set_rules('password', 'Password', 'required', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password]');

        if ($this->form_validation->run() == true) {
            extract($_POST);
            if($this->ion_auth->change_password($this->session->userdata('identity'), $old, $password)) {
                $this->session->set_flashdata('success', 'Password changed successfully');
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<span>', '</span>'));
        }
        redirect('user/my-profile/edit');
        exit;
    }

}