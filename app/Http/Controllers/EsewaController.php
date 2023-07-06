<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\esewadetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
require '../vendor/autoload.php';
use Cixware\Esewa\Client;use Cixware\Esewa\Config;

class EsewaController extends Controller
{
    public function index(){
         $datas  = esewadetail::with(['blogs'=>function($query){
        $query->select('id','title','price');
      },
      'users'=>function($query){
        $query->select('id','phone');
      }])->get();

      return view('payment/index', compact('datas'));
    }
    public function payWithEsewa($id){
       $blog = blogs::find($id);
       $payment = esewadetail::create([
        'user_id'=>Auth::id(),
        'username'=>Auth::user()->name,
        'blog_id'=>$id,
        'amount'=>$blog->price,
       ]);

      // Set success and failure callback URLs.
        $successUrl = url('/success');
        $failureUrl = url('/failed');

        // Config for development.
        $config = new Config($successUrl, $failureUrl);

        // Initialize eSewa client.
        $esewa = new Client($config);
        $esewa->process($payment->id, $payment->amount, 0, 0, 0);

    }

    public function esewaPaySuccess(){
        $payment_id = $_GET['oid'];
       $status = esewadetail::find($payment_id)->update(['esewa_status'=>'verified']);
       if($status){
        $msg = 'SuccessFully Paied';
        $msg2 = 'Thank You for making Purches with Us!!';
       }
        return view('esewa_payment', compact('msg', 'msg2'));
    }
    public function esewaPayFailed(){
       
            $msg = 'Failed';
            $msg2 = 'Please Contact with us ! ';
           
            return view('esewa_payment', compact('msg', 'msg2'));

      
    }
}
