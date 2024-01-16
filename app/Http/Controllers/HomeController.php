<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(10);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view ('home.userpage',compact('product','comment','reply'));


    }


public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if ($usertype=='1'){

            $total_product=product::all()->count();

            $total_order=order::all()->count();

            $total_user=user::all()->count();

            $total_cart=cart::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','=','delevered')->get()->count();

            $total_processing=order::where('delivery_status','=','Processing')->get()->count();

            $total_paid=order::where('payment_ststus','=','Paid')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing','total_paid','total_cart'));
        }

        else
        {
            $product=Product::paginate(10);

            $comment=comment::orderby('id','desc')->get();

            $reply=reply::all();

        return view ('home.userpage',compact('product','comment','reply'));
        }

    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $product = product::find($id);

            $product_exist_id = cart::where('Product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            $error = '';

            if ($product_exist_id) {
                $cart = cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if ($product->discount != null) {
                    $cart->price = $product->discount * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }

                if ($request->quantity > $product->quantity) {
                    $error = 'Requested quantity is not available in the product table.';
                }

                if ($request->quantity <= 0) {
                    $error = 'Quantity cannot be less than or equal to zero.';
                }

                if ($error) {
                    return redirect()->back()->with('error', $error);
                }

                $product->quantity -= $request->quantity;
                $product->save();

                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
            } else {
                if ($request->quantity > $product->quantity) {
                    $error = 'Requested quantity is not available in the product table.';
                }

                if ($request->quantity <= 0) {
                    $error = 'Quantity cannot be less than or equal to zero.';
                }

                if ($error) {
                    return redirect()->back()->with('error', $error);
                }

                $cart = new cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;

                if ($product->discount != null) {
                    $cart->price = $product->discount * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }

                $cart->image = $product->image;
                $cart->Product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->save();

                Alert::success('Product Added Successfully');

                $product->quantity -= $request->quantity;
                $product->save();

                return redirect()->back()->with('message', 'Product Added Successfully');
            }
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $product = Product::find($cart->Product_id);
        $product->quantity += $cart->quantity;
        $product->save();
        $cart->delete();

        return redirect()->back();
}




    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();

            return view('home.showcart',compact('cart'));
        }

        else
        {
            return redirect('login');
        }

    }


    public function cash_order()

    {
        $user = Auth::user();
    $userid = $user->id;

    $data = cart::where('user_id', '=', $userid)->get();

    foreach ($data as $item) {
        $product = Product::find($item->Product_id);
        $product->quantity -= $item->quantity;
        $product->save();

        $order = new Order;

        $order->name = $item->name;
        $order->email = $item->email;
        $order->phone = $item->phone;
        $order->address = $item->address;
        $order->user_id = $user->id;
        $order->product_title = $item->product_title;
        $order->price = $item->price;
        $order->quantity = $item->quantity;
        $order->image = $item->image;
        $order->product_id = $item->Product_id;

        $order->payment_ststus = 'Cash on Delivery';
        $order->delivery_status = 'Processing';

        $order->save();

        $cart_id = $item->id;

        $cart = cart::find($cart_id);

        $cart->delete();
    }

    return redirect()->back()->with('message', 'We Have Received Your Order.');

    }


    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thank You for the Payment"
        ]);

        $user = Auth::user();
        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();

        foreach ($data as $item) {
            $product = Product::find($item->Product_id);
            $product->quantity -= $item->quantity;
            $product->save();

            $order = new Order;

            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->user_id = $user->id;
            $order->product_title = $item->product_title;
            $order->price = $item->price;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->product_id = $item->Product_id;

            $order->payment_ststus = 'Paid';
            $order->delivery_status = 'Processing';

            $order->save();

            $cart_id = $item->id;

            $cart = cart::find($cart_id);

            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status="Cancelled";
        $order->save();
        return redirect()->back();

    }

    public function add_comment(Request $request)
    {
         if(Auth::id())
         {
            $comment=new comment;

            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;

            $comment->save();

            return redirect()->back();


         }

        else
        {
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();


        }
        else
        {
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);
        return view('home.userpage',compact('product','comment','reply'));
    }

    public function products()
    {
        $product=Product::paginate(10);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.all_product',compact('product','comment','reply'));
    }


    public function search_product(Request $request)
    {
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);
        return view('home.all_product',compact('product','comment','reply'));
    }
}


