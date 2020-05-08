<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:49 PM
 */
class JsonDB
{
    public $path;
    public function __construct($path = null)
    {
        if (!$path) {
            $this->path = getcwd();
        } else {
            $this->path = $path;
        }
    }

    public function insert($table, $data)
    {
        $insert_data = [];
        $table_content = file_get_contents($this->path.'/'.$table.'.json');
        $table_content = json_decode($table_content, true);
        $table_schema = $table_content['schema'];

        $table_data = $table_content['data'];
        $diff = array_diff(array_keys($data), array_keys($table_schema));
        if ($diff) {
            foreach ($diff as $item) {
                throw new \Exception("Column $item not found");
            }
        }

        foreach ($table_schema as $col=>$def) {
            $insert_data[$col] = null;
            if (array_key_exists($col, $data)) {
                $insert_data[$col] = $data[$col];
            } else {
                if (!$def['nullable']) {
                    throw new \Exception("No value provided for column $col");
                } else {
                    $insert_data[$col] = $table_schema[$col]['default'];
                }
            }
        }

        $table_data[] = $insert_data;

        $table_content['data'] = $table_data;

        $table_content = json_encode($table_content);

        file_put_contents($this->path.'/'.$table.'.json', $table_content);
    }

    public function recursive_array_intersect_key(array $array1, array $array2) {
        $array1 = array_intersect_key($array1, $array2);
        foreach ($array1 as $key => &$value) {
            if (is_array($value) && is_array($array2[$key])) {
                $value = $this->recursive_array_intersect_key($value, $array2[$key]);
            }
        }
        return $array1;
    }

    public function select($table, $query=null)
    {
        $table_content = file_get_contents($this->path.'/'.$table.'.json');
        $table_content = json_decode($table_content, true);
        $table_schema = $table_content['schema'];

        $table_data = $table_content['data'];

        $diff = array_diff(array_keys($query), array_keys($table_schema));
        if ($diff) {
            foreach ($diff as $item) {
                throw new \Exception("Column $item not found");
            }
        }

        if (!$query) {
            return $table_data;
        } else {
            $match = [];
            var_dump($this->recursive_array_intersect_key($table_data, [$query]));
        }
    }
}

$jdb = new JsonDB();
$jdb->select('users', ['first_name' => 'Ali']);