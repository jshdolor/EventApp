<?php
namespace App\Repository;

use App\Repository\IEventsRepo;

use App\Event;


class EloquentEventRepo implements IEventsRepo {
    
    public function getAll(): object {
        return Event::all();
    }

    public function create($data): object {
        return Event::create($data);
    }

    public function update($id, $data): object {
        $record = Event::find($id);
        $record->update($data);
        return $record;
    }

}