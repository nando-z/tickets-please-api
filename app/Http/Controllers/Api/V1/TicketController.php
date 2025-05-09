<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ticket;
use App\Http\Resources\V1\TicketResource;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;
use App\Http\Controllers\Api\V1\ApiController;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if ($this->include('author')) {
            #
            return TicketResource::collection(Ticket::with('user')->paginate());
        }

        return TicketResource::collection(Ticket::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        // This method is used to show a single ticket resource.
        // It retrieves the ticket from the database using the provided ID

        if ($this->include('author')) {

            return new TicketResource($ticket->load('user'));
        }
        return new TicketResource($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
