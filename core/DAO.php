<?php

abstract class DAO implements CRUDInterface, RepositoryInterface
{
    static private $PDO = null;
    public string $tableName = 'animal';

    public function __construct()
    {
        // Créer la connexion uniquement si elle n'existe pas déjà
        if (self::$PDO === null) {
            $content = file_get_contents(dirname(__DIR__, 1) . '/config/database.json');
            if ($content === false) {
                throw new Exception("Impossible de lire le fichier de configuration de la base de données.");
            }
            $objectContent = json_decode($content);
            if ($objectContent === null) {
                throw new Exception("Le fichier de configuration de la base de données est mal formaté.");
            }

            try {
                self::$PDO = new PDO(
                    "{$objectContent->driver}:host={$objectContent->host};dbname={$objectContent->dbname};charset=utf8",
                    $objectContent->username,
                    $objectContent->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                // Gérer l'erreur de connexion
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
    }

    protected function getTableName(): string
    {
        return $this->tableName;
    }

    // Méthodes abstraites pour forcer l'implémentation dans les classes enfants
    abstract public function create($array);
    abstract public function retrieve($id);
    abstract public function update($array);
    abstract public function delete($id);
    abstract public function getAll();
    abstract public function getAllby($filter);

    protected function getPDO(): PDO
    {
        // Si la connexion n'est pas établie, lancez une exception
        if (self::$PDO === null) {
            throw new Exception("Connexion à la base de données non établie");
        }
        return self::$PDO;
    }
}
