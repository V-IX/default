<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends ADMIN_Controller {

    public function index()
    {
        $this->init('files');
        $this->data['template'] = 'admin/common/files';
        $this->output();
    }

    public function elfinder_init()
    {
        $this->load->helper('path');

        $opts = array(
            'roots' => array(
                array(
                    'driver' => 'LocalFileSystem',
                    'path'   => set_realpath(FCPATH . '/assets/uploads/files/'),
                    'URL'    => site_url('/assets/uploads/files/'),
                    'acceptedName' => '/^[A-Za-zА-Яа-я0-9_][A-Za-zА-Яа-я0-9_\s\.\%\-]*$/u',
                    'accessControl' => 'access',
                    'attributes' => array(
                        array(
                            'pattern' => '/\.tmb$/',
                            'hidden' => true,
                        )
                    ),
                    'uploadAllow' => array('all'),
                    'uploadOrder'=> 'deny, allow',
                )
            ),

        );
        $this->load->library('ElfinderLib', $opts);
    }

    function translit($string)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }

    function str2url($str)
    {
        $str = $this->translit($str);
        $str = strtolower($str);
        $str = preg_replace('~[^-a-z0-9_.]+~u', '-', $str);
        $str = trim($str, "-");
        return $str;
    }

    public function upload(){
        $callback = $_GET['CKEditorFuncNum'];
        $file_name = $this->str2url($_FILES['upload']['name']);
        $file_name_tmp = $this->translit($_FILES['upload']['tmp_name']);
        $file_new_name = FCPATH.'assets/uploads/files/ckimages/'; // серверный адрес - папка для сохранения файлов. (нужны права на запись)
        $full_path = $file_new_name.$file_name;
        while (file_exists($full_path)) {
            $file_name = md5(uniqid())[0] . $file_name;
            $full_path = $file_new_name . $file_name;;
        }

        $http_path = uri(0).'/assets/uploads/files/ckimages/'.$file_name; // адрес изображения для обращения через http
        $error = '';
        if (move_uploaded_file($file_name_tmp, $full_path))
        {
        } else
        {
            $error = 'Ошибка, повторите попытку позже'; // эта ошибка появится в браузере если скрипт не смог загрузить файл
            $http_path = '';
        }
        echo '<script type="text/javascript">';
        echo 'window.parent.CKEDITOR.tools.callFunction('.$callback.',  "'.addslashes($http_path).'","'.$error.'");';
        echo '</script>';
    }
}
