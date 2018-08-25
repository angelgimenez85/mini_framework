<?php
namespace dao;

use model\DomainObject;

abstract class DAO
{
    //abstract public function insertar(DomainObject $obj);
    //abstract public function modificar(DomainObject $obj);
    //abstract public function eliminar(int $id);
    //abstract protected function getTargetClass(): string;
    abstract protected function convert(array $raw);

    public function getAsObject(string $query, array $params = null): array
    {
        $stmt = $this->pdo->prepare($query);
        if ($params == null) {
            $stmt->execute();
        } else {
            $stmt->execute($params);
        }
        $objects = [];
        while ($raw = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $objects[] = $this->convert($raw);
        }

        return $objects;
    }

    public function getAsRaw(string $query, array $params = null): array
    {
        $stmt = $this->pdo->prepare($query);
        if ($params == null) {
            $stmt->execute();
        } else {
            $stmt->execute($params);
        }
        $data = [];
        while ($raw = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $raw;         
        }

        return $data;     
    }
}
