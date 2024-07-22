<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Home extends BaseController
{
	/*
	public function index(): string
	{
			return view('front/principal');
	}
	*/
	public function index()
	{
		$data['titulo'] = 'pagina_principal ';
		echo view('front/head_view', $data);
		echo view('front/navbar_view');
		echo view('front/principal');
		echo view('front/footer_view');
	}

	public function quienes_somos()
	{
		$data['titulo'] = 'quienes somos';
		echo view('front/head_view', $data);
		
		echo view('front/navbar_view');
		echo view('front/quienes_somos');
		echo view('front/footer_view');
	}
	public function listaUsuarios(){
    $dato['titulo'] = 'lista_usuarios';
		$modeloUsuario = new UsuarioModel();
		$datos = $modeloUsuario->getUsuarios();  
    echo view('front/head_view', $dato);
    echo view('front/navbar_view');
    echo view('back/usuario/usuarios', compact('datos'));
    echo view('front/footer_view');
  }

	public function acerca_de()
	{
		$data['titulo'] = 'Acerca de';
		echo view('front/head_view', $data);
		echo view('front/navbar_view');
		echo view('front/acerca_de');
		echo view('front/footer_view');
	}

	public function registro()
	{
		$data['titulo'] = 'Registro';
		echo view('front/head_view', $data);
		echo view('front/navbar_view');
		echo view('back/usuario/registro');
		echo view('front/footer_view');
	}

	public function login()
	{
		$data['titulo'] = 'Login';
		echo view('front/head_view', $data);
		echo view('front/navbar_view');
		echo view('back/usuario/login');
		echo view('front/footer_view');
	}
}
