<?php
  namespace App\Models;
  use CodeIgniter\Model;

	class UsuarioModel extends Model
	{
		protected $table= 'usuarios';
		protected $primaryKey= 'id_usuario';
		protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id',
		'baja', 'created_at'];

		// Obtener todos los usuarios
		public function getUsuarios() {
			return $this->findAll();
		}	

		// Obtener un usuario por ID
		public function getUsuario($id) {
				return $this->find($id);
		}

		// Crear un nuevo usuario
		public function createUsuario($data) {
				return $this->insert($data);
		}

		// Actualizar un usuario
		public function updateUsuario($id, $data) {
				return $this->update($id, $data);
		}

		// Borrar un usuario
    public function deleteUsuario($id) {
			return $this->delete($id);
		}
	}

