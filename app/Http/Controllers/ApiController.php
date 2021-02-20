<?php

namespace Cotizate\Http\Controllers;

use Cotizate\Client;
use Cotizate\Payment;
use Cotizate\PortalNew;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{

    public function __construct()
    {
        //$this->middleware('cors');
    }

    public function getFile($folder, $file)
    {
        $path = storage_path('app\media\\' . $folder . '\\' . $file);
        try {
            $file = File::get($path);
            $type = File::mimeType($path);
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
            return $response;
        } catch (FileNotFoundException $exception) {
            abort(403);
        }
    }

    public function getIpAddress(Request $request){
        return response()->json($request->ip());
    }

    public function clients(){

        $clients = Client::with('payments')->get();

        return $clients->toJson(JSON_PRETTY_PRINT);

    }
    public function news(){

        $news = PortalNew::all();

        return $news->toJson(JSON_PRETTY_PRINT);

    }
    public function client(Request $request, $id){

        $user = Client::find($id);

        return $user->toJson(JSON_PRETTY_PRINT);

    }

    public function new(Request $request, $id){

        $new = PortalNew::find($id);

        return $new->toJson(JSON_PRETTY_PRINT);

    }

    public function clientByIp(Request $request){

        $user = Client::with('payments')->where('ip_address', request()->ip())->get();

        return $user->toJson(JSON_PRETTY_PRINT);

    }

    public function editClient(Request $request){

        $client = $request->input('user');

        $validate = Validator::make($client,[
            'ip_address' => ['required', Rule::unique('clients')->ignore($client['id'])]
            ])->validate();



            $user = Client::find($client['id']);
            if ($user) {
                $user->nick = $client['nick'];
                $user->account = $client['account'];
                $user->ip_address = $client['ip_address'];
                $user->active_account = $client['active_account'];
                $user->save();
                return response()->json($client, 204);
            }else {
                $user = new Client();
                $user->nick = $client['nick'];
                $user->account = $client['account'];
                $user->ip_address = $client['ip_address'];
                $user->active_account = $client['active_account'];
                $user->save();
                for ($j=0; $j < 12; $j++){
                    $payment = new Payment();
                    $payment->month = $j+1;
                    $payment->year = 2021;
                    $payment->cant = 0;
                    $payment->client()->associate($user);
                    $payment->save();
                }
                return response()->json('Creado correctamente', 201);
            }


        }

        public function editNew(Request $request) {

            $new = PortalNew::find($request->input('id'));

            $validate = Validator::make($new,[
                'image' => ['mimetypes:image/*']
                ])->validate();

            if ($new) {
                $new->title = $request->input('title');
                $new->description = $request->input('description');
                if($request->hasFile('image')){
                    $pathToDelete = str_replace('\\', '/', $new->src);
                    Storage::disk('media')->delete($pathToDelete);
                    $path = Storage::disk('media')->putFile('img', $request->file('image'));
                    $path = str_replace('/', '\\', $path);
                    $new->src = $path;
                }
                $new->save();
                return response()->json('all good', 204);
            }else {
                $new = new PortalNew();
                $new->title = $request->input('title');
                $new->description = $request->input('description');
                if($request->hasFile('image')){
                    $path = Storage::disk('media')->putFile('img', $request->file('image'));
                    $path = str_replace('/', '\\', $path);
                    $new->src = $path;
                }
                $new->save();
                return response()->json('all good', 201);
            }
        }

        public function deleteNew($id){

            $new = PortalNew::find($id);

            if ($new) {
                $pathToDelete = str_replace('\\', '/', $new->src);
                Storage::disk('media')->delete($pathToDelete);
                $new->delete();
                return response()->json('all good', 204);
            }

        }


        public function deleteClient($id){

            $client = Client::find($id);
            if ($client) {
                foreach ($client->allPayments as $payment) {
                    $payment->delete();
                }
                $client->delete();
                return response()->json('all good', 204);
            }

        }


        public function addPayments(Request $request){

            $users = $request->input('users.users');

            foreach ($users as $user) {
                $client = Client::find($user['id']);
                $requestPayments = $user['payments'];
                $payments = $client['payments'];
                foreach ($payments as $id => $payment) {
                    $pay = Payment::find($payment['id']);
                    $pay->cant = $requestPayments[$id]== null ? 0 :$requestPayments[$id];
                    $pay->save();
                }

            }

            return response()->json('Correcto', 201);

        }


    }
