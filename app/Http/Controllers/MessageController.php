<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class MessageController extends Controller
{
	/**
	 * 
	 */
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'sender_client' => 'required|numeric',
            'receive_client' => 'required|numeric',
        ]);
        
    }

    public function index() {

    	// Get logged user
    	$user = Auth::user();
    	if(!$user) {
			return redirect()->to('/rs/pocetna');
		}

    	// Get all messages for logged user TODO stavi select into select da bude samo jedan upit
    	$messages = Message::where('receive_client', $user->id)->orWhere('sender_client', $user->id)->orderBy('created_at', 'asc')->get();

    	$usersIds = [];
    	foreach ($messages as $message) {
    		if($message->receive_client != $user->id) {
    			$usersIds[] = $message->receive_client;
    		}
    		if($message->sender_client != $user->id) {
    			$usersIds[] = $message->sender_client;
    		}
    	}

    	if(!empty($usersIds)) {
    		$usersIds = array_unique($usersIds);
    	}
    	
    	$users = User::whereIn('id', $usersIds)->orderBy('updated_at', 'asc')->get();

    	$lastMessage = [];
    	if(!empty($users)) {
    		foreach ($users as $storyTell) {
	    		$lastMessage[$storyTell->id] = Message::where([
	    			'receive_client' => $storyTell->id,
	    			'sender_client'=>  $user->id
	    		])->orWhere([
	    			'receive_client' => $user->id,
	    			'sender_client' => $storyTell->id
	    		])->orderBy('created_at', 'asc')->first();
	    	}
    	}
    	
    	
    	return view('messages.index')->with(compact('messages', 'users', 'lastMessage')); 
    }

	public function store(Request $request) {

		$user = Auth::user();
		$to = (int) $request->request->get("to");
		$success = true;


		if(!$user) {
			$success = false;
			$message = "You must be logged in!";
			$response = compact('message', 'success');
			return response()
				->json($response);
		}
		
		if(is_numeric($to)) {
            $toUser = User::find($to);

			if (!isset($toUser)){
                $success = false;
                $message = "Nepostojeci korisnik";
                $response = compact('message', 'success');
                return response()
                    ->json($response);
            }
		}

		$messageText = '';
		$offer = null;

		if(!empty($request->request->get("message"))) {
			$messageText = $request->request->get("message");
		}

		if(!empty($request->request->get("offer"))) {
			$offer = $request->request->get("offer");
		}

		if( empty($messageText) && $offer == null ) {
			$success = false;
			$message = "Ne možete poslati praznu poruku!";
			$response = compact('message', 'success');
            return redirect()->to('/poruke');
		}

		try {
			$message = new Message;
			$message->sender_client = $user->id;
			$message->receive_client = $to;
			$message->message_text = $messageText;
			$message->offer_id = $offer;
			$message->save();	

		} catch (Exception $e) {
			$success = false;
			$message = $e->getMessage();
			$response = compact('message', 'success');
			return response()
					->json($response);
		}
		
		$message = "Uspešno ste poslali poruku!"; 
		$response = compact('message', 'success');
		if($request->ajax()){
            return response()
				->json($response);;
        }
		return redirect()->to('/poruke');
	}

	public function messages(Request $request) {

		// Get logged user
    	$user = Auth::user();
    	$friend = (int) $request->request->get("friend");
    	$success = true;

    	if(!$user) {
			return redirect()->to('/rs/pocetna');
		}

		if(is_numeric($friend)) {
			try {
				$toUser = User::findOrFail($friend);
			} catch (Exception $e) {
				$success = false;
				$message = $e->getMessage();
				$response = compact('message', 'success');
				return response()
    			->json($response);
			}
		}

    	// Get all messages for logged user TODO stavi select into select da bude samo jedan upit
    	$messages = Message::with('sender', 'reciver')->where([
	    			'receive_client' => $toUser->id,
	    			'sender_client'=>  $user->id
	    		])->orWhere([
	    			'receive_client' => $user->id,
	    			'sender_client' => $toUser->id
	    		])->orderBy('created_at', 'asc')->get();
	   	
	   	$updateMessages = Message::with('sender', 'reciver')->where([
	    			'receive_client' => $user->id,
	    			'sender_client' => $toUser->id
	    		])->update(['is_readed' => 1]);

	   	$response = compact('messages', 'user', 'success');
    	
    	return response()
    			->json($response);
	}

	public function unread() {
		$user = Auth::user();

		if(!$user) {
			return redirect()->to('/rs/pocetna');
		}

    	$messages = Message::with('sender')->where(['receive_client' => $user->id, 'is_readed' => 0 ])->orderBy('created_at', 'desc')->get();

    	$response = compact('messages');
    	
    	return response()
    			->json($response);
	}


	public function pretraga(Request $request) {
		//TODO
		$user = Auth::user();

		if(!$user) {
			return redirect()->to('/rs/pocetna');
		}
		$search = strip_tags(addslashes($request->request->get("message")));

    	$result = DB::table('messages')
            ->join('users_clients', 'messages.sender_client', '=', 'users_clients.id')
            ->select()
            ->where(['messages.receive_client' => $user->id])
            ->where(function ($query) use ($search) {
			    $query->where("users_clients.name", 'LIKE','%'.$search.'%')
            			->orWhere("users_clients.lname", 'LIKE','%'.$search.'%');
			})
			->orderBy('messages.created_at', 'asc')
            ->get();
        $messages = [];
        $ids = [];
        foreach ($result as $message) {
        	if(!in_array($message->id, $ids)) {
           		$messages[] = $message;
       		}
           	$ids[] = $message->id;
        }   
    	$response = compact('messages');

    	return response()
    			->json($response);
	}
}