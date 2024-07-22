<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller{

  public function __construct(){
    helper(['form', 'url']);
  }

  public function create(){
    $dato['titulo'] = 'Registro';
    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('back/usuario/registro');
    echo view('front/footer_view');
  }

  public function listaUsuarios(){
    $dato['titulo'] = 'lista_usuarios';
    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('back/usuario/usuarios');
    echo view('front/footer_view');
  }

  public function edit($id){
    $model = new UsuarioModel();
    $datos = $model->getUsuario($id);

    $dato['titulo'] = 'editar_usuario';
    echo view('front/head_view', $dato);
    echo view('front/navbar_view');
    echo view('back/usuario/editar_usuario', compact('datos'));
    echo view('front/footer_view');
  }


  public function formValidation(){
    $input = $this->validate([
      'nombre' => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario' => 'required|min_length[3]',
      'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
      'pass' => 'required|min_length[3]|max_length[10]'
      ],

    );

    $formModel = new UsuarioModel();

    if (!$input) {
      $data['titulo'] = 'Registro';
      echo view('front/head_view', $data);
		  echo view('front/navbar_view');
		  echo view('back/registro', ['validation' => $this->validator]);
		  echo view('front/footer_view');
    } else {
      $formModel->save([
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
        'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
        //password_hash crea un nuevo hash de contraseña usando un algoritmo hash de único sentido
      ]);

      //Flashdata funciona solo en redirigir la función en el controlador en la vista de la carga.
      session()->setFlashdata('success', 'Usuario registrado con exito');
      return $this->response->redirect('login');
    }
    
  }


}