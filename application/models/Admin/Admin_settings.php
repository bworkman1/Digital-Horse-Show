<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_settings extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getSettingsGroup($group)
    {
        if(is_array($group)) {
            if(count($group)>1) {
                $count = 0;
                foreach ($group as $val) {
                    if ($count == 0) {
                        $this->db->where('group', $val);
                    } else {
                        $this->db->or_where('group', $val);
                    }
                    $count++;
                }
            } else {
                $this->db->where('group', $group[0]);
            }
            $result = $this->db->get('admin_settings');
            return $this->sort_result($result->result());
        } else {
            $result = $this->db->get_where('admin_settings', array('group'=>$group));
            return $result->result();
        }
        $result = $this->db->get_where('admin_settings', array('group'=>$group));
        return $result->result();
    }

    private function sort_result($result)
    {
        $data = array();
        if($result) {
            foreach ($result as $row) {
                if(array_key_exists($row->group, $data)) {
                    $data[$row->group][] = $row;
                } else {
                    $data[$row->group] = array($row);
                }
            }
        }

        return $data;
    }

    public function getSetting($field_name)
    {
        $result = $this->db->get_where('admin_settings', array('field_name' => $field_name));
        return $result->row();
    }

}