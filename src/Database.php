<?php

namespace WagnerBugs\DatabaseManager;

use PDO;
use PDOException;

class Database
{
<<<<<<< HEAD
    /**
     * Host de conexão com o banco de dados
     * @var string
     */
=======
  /**
   * Host de conexão com o banco de dados
   * @var string
   */
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
    private static $host;

    /**
     * Nome do banco de dados
     * @var string
     */
    private static $name;

    /**
     * Usuário do banco
     * @var string
     */
    private static $user;

    /**
     * Senha de acesso ao banco de dados
     * @var string
     */
    private static $pass;

    /**
<<<<<<< HEAD
     * Porta de acesso ao banco de dados
=======
     * Porta de acesso ao banco
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @var integer
     */
    private static $port;

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
<<<<<<< HEAD
     * Instância de conexão com o banco de dados
=======
     * Instancia de conexão com o banco de dados
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @var PDO
     */
    private $connection;

    /**
<<<<<<< HEAD
     * Função que configura a classe
=======
     * Método responsável por configurar a classe
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  string  $host
     * @param  string  $name
     * @param  string  $user
     * @param  string  $pass
     * @param  integer $port
     */
    public static function config($host, $name, $user, $pass, $port = 3306)
    {
        self::$host = $host;
        self::$name = $name;
        self::$user = $user;
        self::$pass = $pass;
        self::$port = $port;
    }

    /**
<<<<<<< HEAD
     * Contrutor que define a tabela, instancia de conexão
=======
     * Define a tabela e instancia e conexão
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
<<<<<<< HEAD
     * Função que cria uma conexão com o banco de dados
=======
     * Método responsável por criar uma conexão com o banco de dados
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::$host.';dbname='.self::$name.';port='.self::$port, self::$user, self::$pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
<<<<<<< HEAD
     * Função que executa queries dentro do banco de dados
=======
     * Método responsável por executar queries dentro do banco de dados
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  string $query
     * @param  array  $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
<<<<<<< HEAD
     * Função que insere dados no banco de dados
=======
     * Método responsável por inserir dados no banco
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  array $values [ field => value ]
     * @return integer ID inserido
     */
    public function insert($values)
    {
<<<<<<< HEAD
        //Dados da query
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        //Monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        //Executa o insert
        $this->execute($query, array_values($values));

        //Retorna o id inserido
=======
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        //EXECUTA O INSERT
        $this->execute($query, array_values($values));

        //RETORNA O ID INSERIDO
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
        return $this->connection->lastInsertId();
    }

    /**
<<<<<<< HEAD
     * Função que executa uma consulta no banco
=======
     * Método responsável por executar uma consulta no banco
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @param  string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
<<<<<<< HEAD
        //Dados da query
=======
        //DADOS DA QUERY
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

<<<<<<< HEAD
        //Monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //Executa a query
=======
        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
        return $this->execute($query);
    }

    /**
<<<<<<< HEAD
     * Função que executa atualizações no banco de dados
=======
     * Método responsável por executar atualizações no banco de dados
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  string $where
     * @param  array $values [ field => value ]
     * @return boolean
     */
    public function update($where, $values)
    {
<<<<<<< HEAD
        //Dados da query
        $fields = array_keys($values);

        //Monta a query
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        //Executa a query
        $this->execute($query, array_values($values));

        //Retorna sucesso
=======
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        //RETORNA SUCESSO
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
        return true;
    }

    /**
<<<<<<< HEAD
     * Função que exclui dados do banco de dados
=======
     * Método responsável por excluir dados do banco
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
     * @param  string $where
     * @return boolean
     */
    public function delete($where)
    {
<<<<<<< HEAD
        //Monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //Executa a query
        $this->execute($query);

        //Retorna sucesso
=======
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
>>>>>>> c8e0e3783d3ce5c0149b1f2a80affb9a1ddcdec6
        return true;
    }
}
