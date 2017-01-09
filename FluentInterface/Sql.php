<?php

namespace design\FluentInterface;

class Sql
{
    private $from   = [];
    private $fields = [];
    private $where  = [];

    public function select(array $fields): Sql
    {
        $this->fields = $fields;
        return $this;
    }

    public function from(string $table, string $alias): Sql
    {
        $this->from[] = $table . ' AS ' . $alias;
        return $this;
    }

    public function where(string $condition): Sql
    {
        $this->where[] = $condition;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            implode(', ', $this->fields),
            implode(', ', $this->from),
            implode(' AND ', $this->where)
        );
    }
}
