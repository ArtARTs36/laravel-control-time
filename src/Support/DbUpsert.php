<?php

namespace ArtARTs36\ControlTime\Support;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait DbUpsert
{
    abstract protected function newQuery(): Builder;

    public function upsert(array $values, array $conflicts, array $mergeFields = [], array $ignoreFields = []): int
    {
        $values = array_filter($values);

        if (count($values) === 0) {
            return 0;
        }

        $eloquentQuery = $this->newQuery();
        $query = $eloquentQuery->getQuery();

        $conflictString = $query->getGrammar()->columnize($conflicts);

        $insert = $query->getGrammar()->compileInsert($query, $values);

        //

        $sets = $this->buildSetsStringForUpsert(
            $eloquentQuery->getModel()->getFillable(),
            $mergeFields,
            $ignoreFields
        );

        $insert .= ' ON CONFLICT ('. $conflictString .') DO UPDATE 
  SET '. $sets .';';

        //

        return $query->getConnection()->affectingStatement($insert, Arr::flatten($values, 1));
    }

    protected function buildSetsStringForUpsert(array $keys, array $values, array $ignoreFields): string
    {
        return implode(',', array_filter(array_map(function (string $column) use ($values, $ignoreFields) {
            if (in_array($column, $ignoreFields)) {
                return null;
            }

            if (array_key_exists($column, $values)) {
                return $column . '=' . "'" . $values[$column] . "'";
            }

            return $column . '=excluded.'. $column;
        }, $keys)));
    }
}
