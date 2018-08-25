<?php
namespace dao;

use model\{DomainObject, Libro};

class LibroDAO extends DAO
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    protected function convert(array $raw)
    {
        $obj = new Libro(
            $raw['titulo'],
            $raw['contenido'],
            $raw['imagen']
        );
        $obj->setId((int) $raw['id']);

        return $obj;
    }
}