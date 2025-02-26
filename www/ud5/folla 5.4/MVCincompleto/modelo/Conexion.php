<?php
// Declaramos estrictos los tipos de datos para evitar errores inesperados
declare(strict_types=1);

// Definimos una clase Conexion que extiende la clase PDO (PHP Data Objects)
class Conexion extends PDO
{
   // Definimos las propiedades privadas para la configuración de la base de datos
   private string $host = "db"; // Nombre del host (servidor de la base de datos)
   private string $db = "proba2";  // Nombre de la base de datos
   private string $user = "root";  // Usuario para la conexión
   private string $pass = "root";  // Contraseña del usuario
   private string $dsn; // Variable para almacenar la cadena de conexión (Data Source Name)

   // Constructor de la clase, se ejecuta al instanciar la clase Conexion
   public function __construct()
   {
      // Se construye la cadena DSN con los datos de conexión
      $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

      try {
         // Se llama al constructor de la clase padre (PDO) para establecer la conexión
         parent::__construct($this->dsn, $this->user, $this->pass);

         // Configuramos PDO para que lance excepciones en caso de error
         $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         // Si hay un error en la conexión, se captura la excepción y se detiene el script
         die("Erro na conexión: mensaxe: " . $e->getMessage());
      }
   }
}
