<?php
/**
 * Created by PhpStorm.
 * User: quankim
 * Date: 24/03/2016
 * Time: 11:17
 */

namespace App\Controller\Api;
use QuanKim\PhpJwt\JWT;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Core\Configure;
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        $this->Auth->allow(['']);
    }

    public function login(){
        $user = $this->Auth->identify();
        if (!$user) {
            $this->set([
                'success' => false,
                'message' => __('Invalid email or password'),
                '_serialize' => ['success', 'message']
            ]);


        } else {
            $expire =  (!is_null(Configure::read('AuthToken.expire'))) ? Configure::read('AuthToken.expire') : 3600;
            $access_token = JWT::encode([
                'sub' => $user['id'],
                'exp' =>  time() + $expire
            ],Security::salt());
            $refresh_token = JWT::encode([
                'sub' => $user['id'],
                'ref'=>time()
            ],Security::salt());
            $authToken = $this->Users->AuthToken->newEntity();
            $authToken->user_id = $user['id'];
            $authToken->access_token = $access_token;
            $authToken->refresh_token = $refresh_token;
            $this->Users->AuthToken->save($authToken);
            $this->set([
                'success' => true,
                'data' => [
                    'access_token' => $access_token,
                    'refresh_token'=> $refresh_token,
                    'id'=>$user['id'],
                    'username'=> $user['username'],
                    'email'=> $user['email']
                ],
                '_serialize' => ['success', 'data']
            ]);
        }
    }
    public function info(){
        $user = $this->Auth->user();
        $this->set([
            'status'=>'success',
            'user'=>$user,
            '_serialize'=>['status','user']
        ]);
    }

}