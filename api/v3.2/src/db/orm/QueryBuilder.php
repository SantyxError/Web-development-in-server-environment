<?php

namespace App\db\orm;

use App\DTO\MovieDTO;
use stdClass;

class QueryBuilder
{

    private string $fields = '*';
    private string $where = '';
    private ?array $params = null;
    private string $sql;

    function __construct(private string $table)
    {
        $this->table = $table;
    }


    //SELECT se le pasa por parámetro los campos que queremos que nos devuelva la consulta.
    public function select(?string $fields = null)
    {
        $this->fields = (is_null($fields)) ? '*' : $fields;
        return $this;
    }

    public function where(string $field, string $condition, ?string $value)
    {
        if (is_null($value)) {
            $value = $condition;
            $condition = '=';
        }
        $this->where = "WHERE $field $condition :$field";
        $this->params[":$field"] = $value;
        return $this;
    }




    public function get(): array
    {
        $this->sql = "SELECT $this->fields FROM $this->table $this->where";
        return DB::select($this->sql, $this->params);
    }

    public function getOne(): stdClass
    {
        $this->sql = "SELECT $this->fields FROM $this->table $this->where LIMIT 1";
        return DB::selectOne($this->sql, $this->params);
    }

    public function find(int $id)
    {
        $this->where('id', '=', $id);
        return $this->getOne();
    }

    public function insert(array $data): int
    {
        $fieldsParams = "";
        foreach ($data as $key => $value) {
            $fieldsParams .= ":$key,";
            $this->params[":$key"] = $value;
        }
        $fieldsParams = rtrim($fieldsParams, ',');
        $fieldsName = implode(",", array_keys($data));
        $this->sql = "INSERT INTO $this->table($fieldsName) VALUES ($fieldsParams)";
        return DB::insert($this->sql, $this->params);
    }

    public function delete(int $id): int
    {
        $this->where('id', '=', $id);
        $this->sql = "DELETE FROM $this->table $this->where LIMIT 1";
        return DB::delete($this->sql, $this->params);
    }


    public function update(int $id, array $data)
    {
        $set = '';
        $counter = 1;
        $this->where('id', '=', $id);

        foreach ($data as $name => $value) {
            $set .= "$name = \"$value\"";
            if ($counter < count($data)) {
                $set .= ',';
            }
            $counter++;
        }

        $this->sql = "UPDATE $this->table SET $set $this->where";

        return DB::update($this->sql, $this->params);
    }



    private function toSql()
    {
        dd($this->sql);
    }
}
