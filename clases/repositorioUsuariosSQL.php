<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosSQL extends RepositorioUsuarios {

		private $conn;

		public function __construct(PDO $conn) {
			$this->conn = $conn;
		}

		public function traerTodosLosUsuarios() {

			$usuarios = [];

			$sql = "SELECT * FROM usuarios";

			$query = $this->conn->prepare($sql);
			$query->execute();

			$usuariosArrays = $query->fetchAll(PDO::FETCH_ASSOC);

	        foreach ($usuariosArrays as $usuarioArray) {

	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["nombre"],
	        		$usuarioArray["email"],
	        		$usuarioArray["user"],
	        		$usuarioArray["password"]);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }


	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$sql = "INSERT into usuarios(id,nombre,email,user,password) values (default, :nombre, :email, :user, :password)";
	    	}


	    	$query = $this->conn->prepare($sql);

	    	$query->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
	    	$query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
	    	$query->bindValue(":user", $usuario->getUsername(), PDO::PARAM_STR);
	    	$query->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);

	    	if ($usuario->getId() != null) {
	    		$query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
	    	}

	    	$query->execute();

	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->conn->lastInsertId());
	    	}

	    }

	    public function traerUsuarioPorEmail($email) {
	        $sql = "SELECT * FROM usuarios WHERE email = :email";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":email", $email, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["nombre"],
	        		$usuarioArray["email"],
	        		$usuarioArray["user"],
	        		$usuarioArray["password"]);
	        	return $usuario;
	        }

	        return false;
	    }
	}
