<?php

namespace App\Repository;


interface IEventsRepo {

    public function getAll(): object;
    public function create($data): object;
    public function update($id, $data): object;

}