<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Products::all();
        return view('products', compact('products'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        // session()->forget('cart');
        // session()->save();
        // dd(session()->all());
        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if ($product->product_qty <= 0) {
            return redirect()->back()->with('error', 'Товара нет в наличии!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "qty" => 1,
                "max_qty" => $product->product_qty,
                "price" => $product->product_price,
                "image" => $product->product_image,
                "code" => $product->product_code,
                "categ" => $product->product_categ,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Продукт успешно добавлен в корзину!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Корзина успешно обновлена');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cartOrder()
    {
        $totalPrice = 0;
        $jsonProducts = [];
        $session = session('cart');
        $check='';
        //dd($session);
        if ($session == null) {
            return redirect(route('cart.list'))->with('error', 'Добавьте в корзину что-нибудь');
        }
        foreach (session('cart') as $item) {
            $totalPrice += $item["price"];
            $check .= $item['name'].', '.$item['qty'].', ';
        }

        foreach (session('cart') as $key => $cartItem) {
            $jsonProducts[] = [
                "name" => $cartItem["name"],
                "category_id" => $cartItem["categ"],
                "qty" => $cartItem["qty"] + 0,
                "price" => $cartItem["price"],
            ];
            Products::where('id', $key)->update([
                "product_qty" => $cartItem["max_qty"] - $cartItem["qty"],
            ]);

        }

        $order = [
            'number_order' => uniqid(),
            'products' => json_encode($jsonProducts),
            'user_id' => Auth()->user()->id,
            'sum' => $totalPrice,
        ];

        Order::create($order);
//отрпаввка чека

        $details = [

            'number_order' => uniqid(),
            'products' => $check,
            'user_id' => Auth()->user()->id,
            'sum' => $totalPrice,

       ];


       \Mail::to(Auth()->user()->email)->send(new \App\Mail\CheckMail($details));

        session()->forget('cart');

        return redirect()->route('catalog.list')->with('success', 'Заказ успешно оформлен');


    }

    public function catalogPage()
    {
        return view('catalog', ['products' => Products::paginate($perPage = 12, $columns = ['*'], $pageName = 'products'), 'category' => category::all()]);
    }

    // filter cost
    public function sortby()
    {
        $products = Products::paginate();
        $sorter = Products::orderBy('product_price', 'desc')->paginate();
        return view('catalog', ["products" => $sorter, "sortedProducts" => $sorter,]);
    }
    // CLose
    public function sortbyMin()
    {
        $products = Products::paginate();
        $sorter = Products::orderBy('product_price', 'asc')->paginate();
        return view('catalog', ["products" => $sorter, "sortedProducts" => $sorter,]);
    }

    //category
    public function sortcategory(Request $request)
    {
        $name_category = $request->name_category;
        $categor = Products::query();
        if (request('name_category')) {
            $categor->where('id_category', $name_category);
        }

        $output = '';
        if ($categor->count()> 0) {
            foreach ($categor->paginate($perPage = 12, $columns = ['*'], $pageName = 'products') as $product) {
                $output .=
                    '<div class="col">

                    <div class="card h-100 w-100">
                        <div class="card-image" style="min-width:200px; ">
                            <a href="' . route('product', $product['id']) . '">
                                <img class="card-img-top p-2 img-fluid" src="' . asset($product['product_image']) . '"
                                    alt="">
                            </a>
                        </div>
                        <div class="card-body" style="min-height: 180px;">
                            <a href="#">
                                <h4>' . $product['product_name'] . '</h4>
                            </a>
                            <h6>' . number_format($product['product_price'], 0, ',', ' ') . '₽</h6>
                            <p>' . $product['product_description'] . '
                            </p>

                        </div>
                        <div class="card-footer">';
                if ($product->product_qty > 0) {
                    $output .=
                        '<form class="m-0" action="' . route('add.to.cart', $product['id']) . '"
                                    method="get">
                                    <input type="hidden" name="id" value="' . $product['id'] . '">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </form>
                                </div>
                                </div>

                            </div>';
                } else {
                    $output .=
                        '<span class="d-block" style="height: 38px;">
                                    Товара нет в наличии
                                </span>
                                </div>
                                </div>

                            </div>';
                }
            }
        }else{
            $output = '<div class="product-item w-100">
            Ничего не найдено
        </div>';
        }
        return response($output);

    }

    public function search(Request $request)
    {
        $products = Products::where('product_name', 'LIKE', '%' . $request->search . '%')->paginate(12);
        $output = '';

        if ($products->count()>0) {
            foreach ($products as $product) {
                $output .=
                    '<div class="col">

                    <div class="card h-100 w-100">
                        <div class="card-image" style="min-width:200px; ">
                            <a href="' . route('product', $product['id']) . '">
                                <img class="card-img-top p-2 img-fluid" src="' . asset($product['product_image']) . '"
                                    alt="">
                            </a>
                        </div>
                        <div class="card-body" style="min-height: 180px;">
                            <a href="#">
                                <h4>' . $product['product_name'] . '</h4>
                            </a>
                            <h6>' . number_format($product['product_price'], 0, ',', ' ') . '₽</h6>
                            <p>' . $product['product_description'] . '
                            </p>

                        </div>
                        <div class="card-footer">';
                if ($product->product_qty > 0) {
                    $output .=
                        '<form class="m-0" action="' . route('add.to.cart', $product['id']) . '"
                                    method="get">
                                    <input type="hidden" name="id" value="' . $product['id'] . '">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </form>
                                </div>
                                </div>

                            </div>';
                } else {
                    $output .=
                        '<span class="d-block" style="height: 38px;">
                                    Товара нет в наличии
                                </span>
                                </div>
                                </div>

                            </div>';
                }

            }
        } else {
            $output = '<div class="product-item w-100">
                        Ничего не найдено
                    </div>';
        }
        return response($output);
    }
}
