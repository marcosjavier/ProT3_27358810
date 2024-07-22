<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
{
  public function index()
  {
    helper(['form', 'url']);

    $dato['titulo'] = 'Login';
    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('back/usuario/registro');
    echo view('front/footer_view');
  }

  public function auth()
  {
    $session = session();
    $model = new UsuarioModel();

    //traemos los datos del formulario
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('pass');

    $data = $model->where('email', $email)->first();
    if ($data) {
      $pass = $data['pass'];
      $ba = $data['baja'];
      if ($ba == 'SI') {
        # code...
        $session->setFlashdata('msg', 'usuario dado de baja');
        return redirect()->to('/LoginController');
      }

        /*como no es usuario dado de baja se procede a verificar
        los datos ingresados para iniciar, si cumple la verificacion
        inicia la sesion. passsword_verify determina los requisitos
        de configuracion de la contraseña*/
        $verify_pass = password_verify($password, $pass);
        if ($verify_pass) {
          $ses_data = [
            'id_usuario' => $data['id_usuario'],
            'nombre' =>$data['nombre'],
            'apellido' =>$data['apellido'],
            'email' =>$data['email'],
            'usuario' =>$data['usuario'],
            'perfil_id' =>$data['perfil_id'],
            'logged_in' => TRUE
          ];
          $session->set($ses_data);
          session()->setFlashdata('msg', 'Bienvenido!!!');
          return redirect()->to('/panel');
          //
        } else {
          $session->setFlashdata('msg', 'Password Incorrecta');
          return redirect()->to('/login');
        }
        

      
    } else {
      $session->setFlashdata('msg', 'No Existe el email o es incorrecto');
      return redirect()->to('/login');
    }
    
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }

}