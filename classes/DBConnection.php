<?php
namespace App;
use PDO;
use PDOException;
class DBConnection
{
    private static $connection;
    public static function getConnection()
    {
        if (self::$connection === null) {
            // Charger la configuration
            $config = include __DIR__ . '/../config/config.php';

            try {
                // Créer une connexion PDO
                self::$connection = new PDO(
                    "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}",
                    $config['db']['user'],
                    $config['db']['password']
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage()); // En cas d'échec de la connexion
            }
        }
        return self::$connection;
    }
}
