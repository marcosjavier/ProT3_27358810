<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class PanelController extends Controller
{
  public function index()
  {
    $session = session();
    $nombre = $session->get('usuario'); // Obtiene el nombre de usuario de la sesión
    $perfil = $session->get('perfil_id'); // Obtiene el perfil del usuario de la sesion

    $data['perfil_id'] = $perfil; //Prepara los datos del perfil para pasar a la vista

    $dato['titulo'] = 'Panel de usuario';
    echo view('front/head_view', $dato);
    echo view('front/navbar_view');
    echo view('back/usuario/usuario_logueado', $data);
    echo view('front/footer_view');

  }
  
}
