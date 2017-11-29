<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $nombre;
		private $email;
		private $user;
		private $id;
		private $password;
		private $avatar;

		public function __construct($id, $nombre, $email, $user, $password) {
			$this->id = $id;
			$this->nombre =$nombre;
			$this->email = $email;
			$this->user = $user;
			$this->password = $password;
		}

		public function getNombre()
		{
			return $this->nombre;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getUsername()
		{
			return $this->user;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getPassword()
		{
			return $this->password;
		}

		public function getAvatar()
		{
			$name = "img" . $this->getId();
			$matching = glob($nombre . ".*");

			$info = pathinfo($matching[0]);
			$ext = $info['extension'];

			return $nombre . "." . $ext;
		}
		public function setName($nombre) {
			$this->nombre = $nombre;
		}
		public function setUsername($username) {
			$this->user = $user;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setPassword($password) {
			$this->password = password_hash($password, PASSWORD_DEFAULT);
		}
		public function setAvatar($avatar) {
			if ($avatar["error"] == UPLOAD_ERR_OK) {

				$path = "img/";

				if (!is_dir($path)) {
					mkdir($path, 0777);
				}

				$ext = pathinfo($avatar["nombre"], PATHINFO_EXTENSION);

				move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
			}
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"nombre" => $this->getNombre(),
				"email" => $this->getEmail(),
				"password" => $this->getPassword(),
				"user" => $this->getUsername()
			];

		}
	}
