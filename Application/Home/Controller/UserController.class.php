<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class UserController extends Controller {
    public function index(){
      $User = M("tempsensor");
      $list = $User->select();
      echo json_encode($list);
    }
    public function model(){
      $user = new Model('environment_data');
      var_dump($user->select());
    }
    public function temp(){
      $User = M("tempsensor");
      $list = $User->select();
      echo json_encode($list);
    }
    public function humd(){
      $User = M("humdsensor");
      $list = $User->select();
      echo json_encode($list);
    }
    public function illu(){
      $User = M("illusensor");
      $list = $User->select();
      echo json_encode($list);
    }
    public function pm(){
      $User = M("pmsensor");
      $list = $User->select();
      echo json_encode($list);
    }
    public function startbulb(){
      $postdata = http_build_query(1);
      $option = array(
        'http' => array(
        'method' => 'POST',
        'header' => 'Content-type:start',
        'content' => $postdata,
        'timeout' => 15*60
      )
    );
    $url = '';
    $context = stream_context_create($option);
    $result = file_get_contents($url,false,$context);

    return $result;
    }
}
