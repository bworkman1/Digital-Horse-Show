<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scorecards extends CI_Controller
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

        if (!$this->ion_auth->in_group('admin')) {
            redirect('user/dashboard');
            exit;
        }
    }

    public function index()
    {
        $this->load->model('Admin/Score_card');
        $this->load->model('Format_data');
        $this->load->library('grocery_CRUD');
        $this->output->unset_template();
        $this->output->set_template('crud');
        $crud = new grocery_CRUD();

        $crud->set_theme('bootstrap');
        $crud->set_table('score_cards')->set_subject('Scorecards')->columns('name', 'option_name', 'child_of', 'active', 'max_score');

        $crud->edit_fields('name', 'heading', 'max_score', 'active', 'child_of', 'option_name');

        $crud->add_fields('name', 'heading', 'max_score', 'active', 'child_of', 'option_name');
        $crud->field_type('active', 'dropdown', array('y' => 'Yes', 'n' => 'No'));
        $crud->field_type('child_of','dropdown', $this->Score_card->getSelectionGroups());
        $crud->required_fields('name', 'heading', 'max_score', 'active', 'child_of', 'option_name');
        $crud->callback_delete(array($this,'delete_scorecard'));
        $crud->add_action('Edit Score Sections', '', 'admin/scorecards/edit-scorecard-sections/','fa fa-pencil');
        $crud->add_action('View Full Card', '', 'admin/scorecards/view-scorecard','fa fa-list');
        $crud->set_rules('max_score','Max Score','integer');

        $output = $crud->render();

        foreach($output->js_files as $val) {
            $this->load->js($val);
        }
        foreach($output->css_files as $val) {
            $this->load->css($val);
        }

        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');

        $data['data'] = $output->output;

        $this->load->view('admin/score-cards', $data);
    }

    public function add_scorecard()
    {
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/css/select2.min.css');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/admin/score-card.js');
        $this->load->js('assets/themes/default/js/select2.full.min.js');

        $this->load->model('Admin/Score_card');
        $data['child_of'] = $this->Score_card->getSelectionGroups();

        $this->load->view('admin/add-score-card', $data);
    }

    public function build_scorecard()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/Score_card');
        $data['heading'] = $this->Score_card->getScoreCardHeader($id);

        $this->output->set_template('full-screen');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/admin/score-card.js');

        $this->load->view('admin/build-score-card', $data);
    }

    public function view_scorecard()
    {
        $this->output->unset_template();
        $this->output->set_template('full-screen');

        $id = (int)$this->uri->segment(4);
        $this->load->model('Admin/Score_card');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('https://code.jquery.com/ui/1.11.4/jquery-ui.js');
        $this->load->js('assets/themes/default/js/admin/score-card.js');

        $data = $this->Score_card->load_view($id);
        if(empty($data['heading'])) {
            $this->session->set_flashdata('error', 'No scorecard found, try again');
            redirect('admin/scorecards/');
            exit;
        }

        $this->load->view('score-cards/cards/scorecard-sections-7', $data);
    }

    public function edit_scorecard_sections()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Admin/Score_card');

        $this->output->set_template('full-screen');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/admin/score-card.js');

        $data = $this->Score_card->load_view($id);
        $data['heading'] = $this->Score_card->getScoreCardHeader($id);

        $this->load->view('admin/edit-scorecard', $data);
    }

    public function delete_scorecard($id)
    {
        $this->db->delete('scorecard_sections_7', array('card_id'=>$id));
        $this->db->delete('score_cards', array('id'=>$id));
        return true;
    }

    /* AJAX CALLS BELOW */
    public function save_scorecard()
    {
        $this->output->unset_template();
        $this->load->model('Admin/Score_card');
        $added = $this->Score_card->add_score_card();
        if($added>0) {
            echo json_encode(array('success'=>$added));
            $this->session->set_flashdata('alert-success', 'Scorecard Saved Successfully, now add the grading sections!');
        } else {
            echo json_encode(array('error'=>'Score Card Failed To Save, Try Again'));
        }
    }

    public function save_scorecard_edits()
    {
        $id = $_POST['id'];
        $this->output->unset_template();
        $this->load->model('Admin/Score_card');
        $added = $this->Score_card->edit_score_card();
        if($added>0) {
            echo json_encode(array('success'=>base_url('admin/scorecards/edit-scorecard-sections/'.$id)));
            $this->session->set_flashdata('alert-success', 'Scorecard Saved Successfully, now add the grading sections!');
        } else {
            echo json_encode(array('error'=>'Score Card Failed To Save, Try Again'));
        }
    }

    public function save_built_card()
    {
        $this->output->unset_template();
        $this->load->model('Admin/Score_card');
        $added = $this->Score_card->buildScoreCard($this->uri->segment(4));
        
        if($added) {
            echo json_encode(array('success'=>base_url('admin/scorecards/view-scorecard/'.$this->uri->segment(4))));
            $this->session->set_flashdata('alert-success', 'Scorecard Saved Successfully, now add the grading sections!');
        } else {
            echo json_encode(array('error'=>'Score Card Failed To Save, Try Again'));
        }
    }

    public function reorder_card()
    {
        $this->output->unset_template();
        $this->load->model('Admin/Score_card');
        $updated = $this->Score_card->reorderCard($this->uri->segment(4));

        if($updated) {
            echo json_encode(array('success'=>'Success, card reordered'));
        } else {
            echo json_encode(array('error'=>'Score Card Failed To Save, Try Again'));
        }
    }


}