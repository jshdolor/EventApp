<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Rules\CompleteDays;
use Illuminate\Http\Request;

use App\Repository\IEventsRepo;
use App\Http\Controllers\Api\ApiController;

class EventsController extends ApiController
{

    public function __construct(IEventsRepo $repository) {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->repository->getAll();
        return $this->response($records);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'days' => ['required', new CompleteDays],
        ]);

        $request->recurrence = $request->days;

        $record = $this->repository->create(
            array_merge($request->all(), ['recurrence' => $request->days])
        );

        return $this->response($record, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'days' => ['required', new CompleteDays],
        ]);

        $data = array_merge($request->all(), ['recurrence' => $request->days]);
        $record = $this->repository->update($id, $data);
        return $this->response($record, 202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
