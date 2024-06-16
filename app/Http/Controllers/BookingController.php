<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure you import the User model
use App\Models\Bookings; // Ensure you import the Booking model
use App\Models\WebPage;

use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $query = Bookings::select('booking.*', 'users.name as user_name')
                        ->leftJoin('users', 'booking.user_id', '=', 'users.id');
        
        $data = $query->get();
      
        return view('AdminDashboard.Bookings.index', ['data' => $data]);
    }

public function userBookings(){
    $query = Bookings::select('booking.*', 'users.name as user_name')
    ->leftJoin('users', 'booking.user_id', '=', 'users.id');
$query->where('booking.user_id',Auth::user()->id);
$data = $query->get();

return view('UserDashboard.Bookings.index', ['data' => $data]);
 }

public function add(){ 
    $data=User::get();
    return view('AdminDashboard.Bookings.addEdit',['data'=>$data]);

}

public function save(Request $request) {
    $user = new Bookings([
        'name' => $request->get('booking_name'),
        'booking_datatime' => $request->get('booking_on'),
        'status' => $request->get('booking_status'),
        'user_id' => Auth::user()->user_type == 1? $request->get('user_name'):Auth::user()->id
       
    ]);

    $user->save();

    if(Auth::user()->user_type ==1){
        $route = 'booking.all';
    }
    else{
        $route ='booking.my';
    }
    return  redirect()->route($route);
    
    }


 

public function getBookingsById($id) { 
    $data=User::get();
    $booking = Bookings::find($id);
    
    return view('AdminDashboard.Bookings.addEdit', ['data' => $data, 'booking' => $booking]);
}

public function updateBookingsById(Request $request, $id) { 
   
        $booking = Bookings::find($id);
        
        $booking->name = $request->get('booking_name');
        
        $booking->booking_datatime = $request->get('booking_on');
        
        $booking->status = $request->get('booking_status');
        
        $booking->user_id = Auth::user()->user_type == 1 ? $request->get('user_name'): Auth:: user()->id;
        
        $booking->save();
        
        if (Auth::user()->user_type == 1){
        
        $route = 'booking.all';
        
        }else{
        
        $route = 'booking.my';
        
        }
        
        return redirect()->route($route);
        
        
}

public function  viewDelete($id) {
    if(Auth::user()->use_type==1){
        $view = 'AdminDashboard.Bookings.delete';
    }else{
        $view = 'UserDashboard.Bookings.delete';
    }
    return view($view);

} 

public function delete($id){
$status = Bookings::where('id',$id)->delete();
if(Auth::user()->user_type ==1){
    $route = 'booking.all';
}
else{
    $route ='booking.my';
}
return  redirect()->route($route);

}
}



