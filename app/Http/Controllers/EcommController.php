<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;
class EcommController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('ecom.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$name,$regular_price)
    {


        

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->slug=$slug;
        $product=Product::where('slug',$this->slug)->first();
        $popular_products=Product::inRandomOrder()->limit(4)->get();
        $related_products=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('ecom.deatils', compact('product','popular_products','related_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function cart(){

$user_id=Session::get('user')['id'];

        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$user_id)
        ->select('products.*','cart.id as cart_id')
        
        ->get();
    return view('ecom.cart',compact('products'));
    }
    public function about(){

        return view('ecom.about');
        }
        public function shop(){

$products=Product::get();



            return view('ecom.shop',compact('products'));
            }
    
            
                public function user(){

                    return view('ecom.auth');
                    }

                    public function admin(){




                             return view('ecom.auth');
                        }
                        

                        public function  login(){
                            return view('ecom.login');
                        }

    
                        
                        
                        public function  search(Request $request){
                            
                            $products=Product::where('name','like','%'.$request->input('search').'%')->get();
                            
                            return view('ecom.search',compact('products'));
                           


                        }
                        public function  addtocart( Request $request,$id){

                            if($request->session()->has('user')){

                                $this->product_id=$id;
                           $cart=new Cart;
                           $cart->product_id= $this->product_id;
                           $cart->user_id=$request->session()->get('user')['id'];
                           $cart->save();
                           
                           return redirect()->route('product.shop');

                            }else{
                                return redirect('/login');
                            }
                           
                        }
                        public function deletecart($id){
                            Cart::destroy($id);
                            return redirect('/cart');

                        }





                        public function checkout(){

                            $products=DB::table('cart')
                            
                            ->select('cart.product_id')
                            
                            ->get();
                        
                        
                           
                            return view('ecom.checkoout',compact('products'));
                            }
                            public function order(Request $request){

                                
$user_id=Session::get('user')['id'];
$allcart=Cart::where('user_id',$user_id)->get();
$product=$request->input('product_id');
foreach($allcart as $cart){

    $order=new Order();
    $order->product_id=$cart['product_id'];
    $order->user_id=$cart['user_id'];
    $order->status= 'pending';
    $order->payment_method=$request->payment;
    $order->payment_status='pending';
    $order->address=$request->address;
$order->first_name=$request->first_name;
$order->last_name=$request->lastname;
$order->phone=$request->phone;
$order->save();
Cart::where('user_id',$user_id)->delete();
  }
return redirect('/shop');

                                }

                                static function cartitem(){

                                    $user_id=Session::get('user')['id'];
                                    return Cart::where('user_id',$user_id)->count();

                                }
                                public function myorder(){
                                    $user_id=Session::get('user')['id'];

        $products=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user_id)
        ->get();
        return view('ecom.myorder',compact('products'));

                                }
                                public function register(Request $request){
                                    $user=new User();
                                    $user->name= $request->name;
                                    $user->email= $request->email;

                                    $user->password=Hash::make($request->password);
                                    $user->save();
                                    return redirect('/login');
                                }

                        
}
