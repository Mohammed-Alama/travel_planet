<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationsValidate;
use App\Models\Hotel;
use App\Models\Reservation;
use Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  Response
     */
    public function index()
    {
        return view('dashboard.reservation.plural')->with('reservations', Reservation::with('room', 'room.hotel')->orderBy('arrival', 'asc')->get());

    }

    /**
     * Show the form for creating a new resource.
     * @param $hotel_id
     * @return  Response
     */
    public function create($hotel_id)
    {
        return view('dashboard.reservation.create')->with('hotel', Hotel::with('rooms')->find($hotel_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationsValidate $request
     * @return Response
     */
    public function store(ReservationsValidate $request)
    {
        $request->validated();
        $request->request->add(['user_id' => 1]);
        Reservation::create($request->all());

        return redirect('dashboard/reservations')->with('success', 'Reservation Created !');
    }

    /**
     * Display the specified resource.
     * @param Reservation $reservation
     * @return Response
     * @property string id
     */
    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('room', 'room.hotel')->find($reservation->id)->get();
        $hotel = Hotel::with('rooms')->find($reservation->room->hotel_id)->get();

        return view('dashboard.reservation.single', compact('reservation', 'hotel'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        $reservation = Reservation::with('room', 'room.hotel')->find($reservation->id)->get();
        $hotel = Hotel::with('rooms')->find($reservation->room->hotel_id)->get();

        return view('dashboard.reservation.edit', compact('reservation', 'hotel'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReservationsValidate $request
     * @param Reservation $reservation
     * @return Response
     */
    public function update(ReservationsValidate $request, Reservation $reservation)
    {
        $request->validated();
        $reservation->user_id = 1;
        $reservation->save();

        return redirect(route('reservations'))->with('success', 'Reservation Updated !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return Response
     * @throws
     */
    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->delete();

        return redirect(route('reservations'))->with('success', 'Reservation Deleted');

    }
}
