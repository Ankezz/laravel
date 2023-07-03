<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Reviews;

class Main extends Controller
{
    public function Product()
    {
        $products = Products::all()->take(9);

        return view(
            'welcome',
            [
                'product' => $products,
            ]
        );
    }
    public function ProductId($id)
    {
        $review = Reviews::paginate(3);
        $products = Products::where('id', $id)->get();
        return view(
            'description',
            [
                'product' => $products,
                'review' => $review,
            ]
        );
    }
    public function addReview(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        $review = new Reviews;
        $review->name = $data['name'];
        $review->comment = $data['comment'];
        $review->save();
        return redirect()->back()->with('success', 'Отзыв успешно добавлен!');
    }
}
