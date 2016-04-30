<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploads extends CI_Model
{

    var $base_path;
    var $mUserFolderName;
    var $mUploadPath;
    var $mInput;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('upload');

        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            echo 'Get OUT!';
            exit;
        }

    }

    public function upload_image($img, $feildName, $profile = false, $args = false)
    {
        $this->set_image_path();

        $config['upload_path'] = $this->mUploadPath;
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|JPEG|jpeg';

        $this->upload->initialize($config);

        $file = $feildName;
        if (!$this->upload->do_upload($file)) {
            $error = array('error' => $this->upload->display_errors('', ''));
            return $error;
        } else {
            $data = $this->upload->data();
            if (isset($args['resize'])) {
                $this->resizeImage($data);
            }

            $data['system_path'] = ltrim($this->mUploadPath . '/' . $data['file_name'], '.');

            $data = array('success' => $data);

            return $data;
        }

    }

    public function uploadPDF($img, $feildName)
    {
        $this->set_image_path();

        $config['upload_path'] = $this->mUploadPath;
        $config['allowed_types'] = 'pdf';

        $this->upload->initialize($config);

        $file = $feildName;
        if (!$this->upload->do_upload($file)) {
            $error = array('error' => $this->upload->display_errors('', ''));
            return $error;
        } else {
            $data = $this->upload->data();
            if (isset($args['resize'])) {
                $this->resizeImage($data);
            }

            $data['system_path'] = ltrim($this->mUploadPath . $data['file_name'], '.');

            $data = array('success' => $data);

            return $data;
        }

    }

    public function uploadVideo($file, $data)
    {
        $this->set_image_path();

        $this->mInput = $data;

        $config['upload_path'] = $this->mUploadPath;
        $config['allowed_types'] = 'mpeg|mpg|mp4|mpe|qt|mov|avi';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $file = "file";

        if (!$this->upload->do_upload($file)) {
            $data = array('error' => $this->upload->display_errors('', ''));
        } else {
            $data = $this->upload->data();
            $data['system_path'] = ltrim($this->mUploadPath . '/' . $data['file_name'], '.');
            $data['thumb'] = $this->getVideoThumbNail($data['system_path']);
            if(empty($data['thumb'])) {
                $data['thumb'] = 'assets/themes/default/images/video-default.jpg';
            }
            $thumb = $this->createVideoThumb($data);
            if (!empty($thumb)) {
                $data['thumb'] = $thumb;
            }

            $this->saveVideo($data);
            $data = array('success' => $data);
        }

        return $data;
    }

    public function uploadFile($file)
    {
        $this->set_image_path();

        $config['upload_path'] = $this->mUploadPath;
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|pdf|doc|docx';

        $this->upload->initialize($config);
        $file = "file";

        if (!$this->upload->do_upload($file)) {
            $error = array('error' => $this->upload->display_errors('', ''));
            return $error;
        } else {
            $data = $this->upload->data();
            $data['system_path'] = ltrim($this->mUploadPath . '/' . $data['file_name'], '.');
            $data = array('success' => $data);


            return $data;
        }
    }

    private function createVideoThumb($data)
    {
        //NEED TO FIGURE OUT A WAY TO CREATE THUMBNAIL
    }

    private function set_image_path()
    {
        /*
            All images will be stored in user-files according to id and type, then encrypted to hide file names. This should create a unique folder just for that user that will then be able to see all the files they have uploaded later.
        */

        $user_folder = './uploads/' . $this->session->userdata('username') . '/';

        $m = date('m');
        $y = date('Y');

        if (!file_exists($user_folder)) {
            mkdir($user_folder, 0777);
            $this->createIndexFile($user_folder);
        }

        if (!file_exists($user_folder . '/' . $y)) {
            mkdir($user_folder . '/' . $y, 0777);
            $this->createIndexFile($user_folder . '/' . $y);
        }

        if (!file_exists($user_folder . '/' . $y . '/' . $m)) {
            mkdir($user_folder . '/' . $y . '/' . $m, 0777);
            $this->createIndexFile($user_folder . '/' . $y . '/' . $m);
        }

        if (!file_exists($user_folder . '/' . $y . '/' . $m . '/thumbs')) {
            mkdir($user_folder . '/' . $y . '/' . $m . '/thumbs', 0777);
            $this->createIndexFile($user_folder . '/' . $y . '/' . $m . '/thumbs');
        }


        $this->mUploadPath = $user_folder . $y . '/' . $m;
    }

    private function createIndexFile($path)
    {
        $content = "ACCESS DENIED";
        $fp = fopen($path . "/index.php", "wb");
        fwrite($fp, $content);
        fclose($fp);
    }

    private function resizeImage($data)
    {
        if ($data['image_width'] > 600 || $data['image_height'] > 600) {

            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $data['image_width'] / 2;
            $config['height'] = $data['image_height'] / 2;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
        }
    }

    private function saveVideo($data)
    {
        $videoData = array(
            'user_id' => $this->session->userdata('user_id'),
            'size' => $data['file_size'],
            'path' => $data['system_path'],
            'ext' => $data['file_ext'],
            'orig_name' => $data['orig_name'],
            'client_name' => $this->mInput['name'],
            'encypt_name' => $data['file_name'],
            'date' => $this->mInput['date'],

            'file_type' => $data['file_type'],
            'thumb' => $data['thumb'],
            'star_rating' => 0,
            'location' => $this->mInput['location'],
            'cords' => $this->mInput['cords'],
            'coach_id' => $this->mInput['coach'],
            'scorecard_id' => $this->mInput['scorecard_id']
        );

        $this->db->insert('video_uploads', $videoData);

        $this->removeCoachingCredit();
        $this->notifyCoach();
    }

    private function removeCoachingCredit()
    {
        $user = $this->ion_auth->user()->row();
        $coaching_credits = $user->coaching_credits-1;
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('users', array('coaching_credits' => $coaching_credits));

        $this->db->where('remaining >', 0);
    }

    private function notifyCoach()
    {
        //TODO set up function to send email to the coach about the new video
    }

    public function delete_upload($id)
    {
        $this->load->helper('file');

        $query = $this->db->get_where('video_uploads', array('id' => $id));
        $video = $query->row();
        $user = $this->ion_auth->user()->row($video->user_id);

        if (!empty($video) && !empty($user)) {
            if (!delete_files(base_url($video->path))) {
                return false;
            } else {
                //TODO : Need to add awards to this section once built
                $this->db->delete('video_uploads', array('id' => $id));
                $this->db->delete('upload_comments', array('video_id' => $id));
                return true;
            }
        } else {
            return false;
        }
    }

    private function getVideoThumbNail($videoPath)
    {
        $videoPath = ltrim($videoPath, '/');
        $pathArray = explode('/', $videoPath);
        $imageFileArray = explode('.', end($pathArray));
        $imgLocation = ltrim($this->mUploadPath, './').'/thumbs/'.$imageFileArray[0].'.jpg';
        $path = 'C:\\MAMP\htdocs\\ffmpeg\\bin\\ffmpeg';
        $size = '454x256';
        $getFromSecond = '5';
        $cmd = "$path -i $videoPath -an -ss $getFromSecond -s $size $imgLocation";
        if(!shell_exec($cmd)) {
            $img = $imgLocation;
        } else {
            $img = '';
        }
        return $img;
    }

}