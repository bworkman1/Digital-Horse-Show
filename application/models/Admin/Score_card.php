<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Score_card extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_score_card()
    {
        $this->db->insert('score_cards', array(
            'name' => $_POST['name'],
            'heading' => $_POST['heading'],
            'max_score' => $_POST['max_score'],
            'active' => $_POST['active'] == 'y'?'y':'n',
            'option_name' => $_POST['option_name'],
            'child_of' => $_POST['child_of'],
        ));
        if($this->db->insert_id()>0) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function getAllScoreCards()
    {
        $this->db->order_by('id');
        $result = $this->db->get('score_cards');
        return $result->result();
    }

    public function getScoreCardHeader($id)
    {
        $result = $this->db->get_where('score_cards', array('id'=>$id));
        return $result->row();
    }

    public function buildScoreCard($card_id)
    {
        $row = array();
        for($i=0;$i<count($_POST['order']);$i++) {
            if($_POST['test'][$i]) {
                if($_POST['divider'][$i] == 'y') {
                    $_POST['divider'][$i] = 'y';
                } else {
                    $_POST['divider'][$i] = 'n';
                }
                $row[] = array(
                    'letters' => $_POST['letters'][$i],
                    'test' => $_POST['test'][$i],
                    'directive' => $_POST['directive'][$i],
                    'points' => $_POST['points'][$i],
                    'co_effecient' => $_POST['co_efficent'][$i],
                    'order' => $_POST['order'][$i],
                    'card_id' => $card_id,
                    'divider' => $_POST['divider'][$i],
                );
            }
        }


        $this->db->insert_batch('scorecard_sections_7', $row);

        if($this->db->affected_rows() == count($row)) {
            return true;
        } else {
            return false;
        }
    }

    private function getScoreCardRows($scorecard_id)
    {
        $this->db->order_by('order');
        $result = $this->db->get_where('scorecard_sections_7', array('card_id'=>$scorecard_id));

        return $result->result();
    }

    public function getSelectionGroups()
    {
        $this->db->select('child_of');
        $this->db->group_by('child_of');
        $this->db->where('child_of !=', '');
        $result = $this->db->get('score_cards');
        $rows = $result->result();
        $options = array();
        foreach($rows as $row) {
            $options[$row->child_of] = $row->child_of;
        }
        return $options;
    }

    public function load_view($id)
    {
        $data['heading'] = $this->getScoreCardHeader($id);
        $data['rows'] = $this->getScoreCardRows($id);

        return $data;
    }

    public function reorderCard()
    {
        $idsArray = explode('%', rtrim($_POST['ids'], '%'));
        for($i=0;$i<count($idsArray); $i++) {
            if($idsArray[$i]>0) {
                $this->db->where('id', $idsArray[$i]);
                $this->db->update('scorecard_sections_7', array('order' => $i));
            }
        }
        return true;
    }

    public function edit_score_card()
    {
        $id = $_POST['id'];
        unset($_POST['id']);
        $this->delete_score_card_sections($id);
        if($this->buildScoreCard($id)) {
            $this->session->set_flashdata('alert-success', 'Scorecard Saved Successfully');
            return true;
        } else {
            return false;
        }
    }

    public function delete_score_card_sections($id)
    {
        $this->db->delete('scorecard_sections_7', array('card_id' => $id));
    }

}