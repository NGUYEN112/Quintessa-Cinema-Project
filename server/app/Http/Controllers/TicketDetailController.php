<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use App\Models\TicketDetail;
use Illuminate\Http\Request;

class TicketDetailController extends Controller
{
    public function manageTicket()
	{
        $tickets = TicketDetail::all();
		return view('admin.manage.ticket',compact('tickets'));
	}

    public function orderTicket()
	{
        $rooms = Room::all();
        return view('admin.ticket.order',compact('rooms'));
	}
	public function ticketPayment(Request $request)
	{
        $ticket = new TicketDetail();

	}
    public function edit($id) {
        
    }

    public function update(Request $request, $id ) {
       
    }

	public function deleteStaff($id) {
	}

    public function getSeat($id) {
        $seats = Seat::select('row')
            ->where('room_id', $id)
            ->groupBy('row')
            ->distinct()
            ->get();

        for ($i = 0; $i < count($seats); $i++) {
            $seat = Seat::where([['room_id', $id], ['row', $seats[$i]->row]])->get();

            $seats[$i]['number'] = $seat;
        }
    }
}