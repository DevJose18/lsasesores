<?php
declare(strict_types=1);

/**
 * LS ASESORES - Capa de Base de Datos (app/libs/db/db.php)
 *
 * Ubicado en app/libs/db/ según la gestión de archivos de la clase.
 * Provee la implementación de MockDatabase (entorno de base de datos ficticia)
 * que reemplaza cualquier conexión real a motores de bases de datos externos.
 */

class MockStatement
{
    private MockDatabase $db;
    private string $sql;
    private array $result = [];
    private int $affectedRows = 0;

    public function __construct(MockDatabase $db, string $sql)
    {
        $this->db = $db;
        $this->sql = $sql;
    }

    /**
     * Simula la ejecución de una sentencia preparada.
     *
     * @param array<string|int, mixed> $params
     */
    public function execute(array $params = []): bool
    {
        $sql = trim($this->sql);

        // Si es una inserción en la tabla leads
        if (preg_match('/^INSERT\s+INTO\s+leads/i', $sql)) {
            $data = [
                'nombre'   => $params[':nombre'] ?? $params['nombre'] ?? '',
                'email'    => $params[':email'] ?? $params['email'] ?? '',
                'telefono' => $params[':telefono'] ?? $params['telefono'] ?? '',
                'servicio' => $params[':servicio'] ?? $params['servicio'] ?? '',
                'mensaje'  => $params[':mensaje'] ?? $params['mensaje'] ?? null,
                'ip'       => $params[':ip'] ?? $params['ip'] ?? null,
            ];

            $this->db->insert('leads', $data);
            $this->affectedRows = 1;
            return true;
        }

        // Si es una consulta SELECT
        if (preg_match('/^SELECT\s+.*FROM\s+leads/i', $sql)) {
            $this->result = $this->db->all('leads');
            $this->affectedRows = count($this->result);
            return true;
        }

        $this->affectedRows = 1;
        return true;
    }

    public function rowCount(): int
    {
        return $this->affectedRows;
    }

    public function fetchAll(): array
    {
        return $this->result;
    }

    public function fetch(): ?array
    {
        return array_shift($this->result) ?: null;
    }
}

class MockDatabase
{
    private string $storagePath;
    private array $tables = [
        'leads' => [],
    ];
    private int $lastId = 0;

    public function __construct(?string $storagePath = null)
    {
        $configFile = dirname(__DIR__, 3) . '/config/config.php';
        $config = is_readable($configFile) ? require $configFile : [];
        $defaultStorage = dirname(__DIR__, 3) . '/database/mock_database.json';

        $this->storagePath = $storagePath ?? ($config['db']['storage'] ?? $defaultStorage);
        $this->load();
    }

    /**
     * Carga los datos existentes desde el archivo JSON ficticio.
     */
    private function load(): void
    {
        if (is_file($this->storagePath) && is_readable($this->storagePath)) {
            $content = file_get_contents($this->storagePath);
            if ($content !== false) {
                $decoded = json_decode($content, true);
                if (is_array($decoded)) {
                    if (isset($decoded['leads']) && is_array($decoded['leads'])) {
                        $this->tables['leads'] = $decoded['leads'];
                    }
                }
            }
        }

        // Determina el último ID insertado
        $maxId = 0;
        foreach ($this->tables['leads'] as $record) {
            if (isset($record['id']) && (int) $record['id'] > $maxId) {
                $maxId = (int) $record['id'];
            }
        }
        $this->lastId = $maxId;
    }

    /**
     * Guarda el estado actual en el archivo JSON.
     */
    private function persist(): bool
    {
        $payload = [
            'meta' => [
                'name'        => 'lsasesores_mock_db',
                'driver'      => 'mock_json',
                'description' => 'Entorno de base de datos simulada (sin conexión real)',
                'updated_at'  => date('c'),
            ],
            'leads' => $this->tables['leads'],
        ];

        $json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if ($json === false) {
            return false;
        }

        $dir = dirname($this->storagePath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        return @file_put_contents($this->storagePath, $json, LOCK_EX) !== false;
    }

    /**
     * Inserta un nuevo registro en la tabla indicada.
     *
     * @param array<string, mixed> $data
     */
    public function insert(string $table, array $data): int
    {
        if (!isset($this->tables[$table])) {
            $this->tables[$table] = [];
        }

        $this->lastId++;
        $nuevoRegistro = array_merge([
            'id'             => $this->lastId,
            'fecha_creacion' => date('Y-m-d H:i:s'),
        ], $data);

        $this->tables[$table][] = $nuevoRegistro;
        $this->persist();

        return $this->lastId;
    }

    /**
     * Retorna todos los registros de una tabla.
     *
     * @return array<int, array<string, mixed>>
     */
    public function all(string $table): array
    {
        return $this->tables[$table] ?? [];
    }

    /**
     * Busca un registro por su ID.
     *
     * @return array<string, mixed>|null
     */
    public function find(string $table, int $id): ?array
    {
        $registros = $this->all($table);
        foreach ($registros as $registro) {
            if (isset($registro['id']) && (int) $registro['id'] === $id) {
                return $registro;
            }
        }
        return null;
    }

    /**
     * Retorna la cantidad de registros en una tabla.
     */
    public function count(string $table): int
    {
        return count($this->tables[$table] ?? []);
    }

    /**
     * Devuelve el último ID insertado.
     */
    public function lastInsertId(): int
    {
        return $this->lastId;
    }

    /**
     * Simula la creación de una sentencia preparada PDO.
     */
    public function prepare(string $sql): MockStatement
    {
        return new MockStatement($this, $sql);
    }
}

/**
 * Devuelve la instancia singleton de la base de datos ficticia.
 */
function db(): MockDatabase
{
    static $mockDb = null;

    if ($mockDb instanceof MockDatabase) {
        return $mockDb;
    }

    $mockDb = new MockDatabase();

    return $mockDb;
}
