<?php
/**
 * Class Autenticacion
 * 
 * Administra la autenticación del sistema.
 */
class Autenticacion
{
    /** @var PDO */
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Autentica al usuario con las credenciales provistas.
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */
    public function login($email, $password)
    {
        $query = "SELECT * FROM usuarios
                WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);

        $usuario = $stmt->fetchObject(Usuario::class);

        if (!$usuario) {
            return false;
        }

        if (!password_verify($password, $usuario->getPassword())) {
            return false;
        }

        $_SESSION['usuario_id'] = $usuario->getUsuarioId();
        return true;
    }

    /**
     * Cierra la sesión.
     */
    public function logout()
    {
        unset($_SESSION['usuario_id']);
    }

    /**
     * Retorna si el usuario está o no autenticado.
     * @return bool
     */
    public function estaAutenticado()
    {
        return isset($_SESSION['usuario_id']);
    }
}