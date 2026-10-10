<?php

class DBPDO
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $charset = 'utf8mb4';
    private $conn = null;

    /**
     * Constructor que toma por defecto las constantes de config.php si existen
     */
    public function __construct($db_name = null, $username = null, $password = null, $host = null)
    {
        $this->host     = $host !== null ? $host : (defined('DB_HOST') ? DB_HOST : 'localhost');
        $this->db_name  = $db_name !== null ? $db_name : (defined('DB_NAME') ? DB_NAME : 'lsasesores_db');
        $this->username = $username !== null ? $username : (defined('DB_USER') ? DB_USER : 'root');
        $this->password = $password !== null ? $password : (defined('DB_PASS') ? DB_PASS : '');
    }

    /**
     * Obtiene la conexión PDO a la base de datos
     * 
     * @return PDO|null
     */
    public function connect()
    {
        if ($this->conn !== null) {
            return $this->conn;
        }

        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            error_log("Error de conexión DBPDO: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Cierra la conexión PDO
     */
    public function disconnect()
    {
        $this->conn = null;
    }

    /**
     * Ejecuta una consulta SELECT y retorna todos los registros
     * 
     * @param string $sql Sentencia SQL preparada
     * @param array $params Parámetros para bindear
     * @return array
     */
    public function selectAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt ? $stmt->fetchAll() : [];
    }

    /**
     * Ejecuta una consulta SELECT y retorna un solo registro
     * 
     * @param string $sql Sentencia SQL preparada
     * @param array $params Parámetros para bindear
     * @return mixed
     */
    public function selectOne($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt ? $stmt->fetch() : null;
    }

    /**
     * Ejecuta sentencias INSERT, UPDATE o DELETE
     * 
     * @param string $sql Sentencia SQL preparada
     * @param array $params Parámetros para bindear
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt !== false;
    }

    /**
     * Retorna el último ID autoincremental generado
     * 
     * @return string
     */
    public function lastInsertId()
    {
        return $this->connect()->lastInsertId();
    }

    /**
     * Método base para preparar y ejecutar consultas
     * 
     * @param string $sql
     * @param array $params
     * @return PDOStatement|false
     */
    private function query($sql, $params = [])
    {
        try {
            $db = $this->connect();
            if (!$db) {
                return false;
            }
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("Error en la consulta DBPDO: " . $e->getMessage());
            return false;
        }
    }
}
