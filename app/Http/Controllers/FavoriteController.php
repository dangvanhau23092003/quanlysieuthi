<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //Sanr phẩm yêu thích
    public function getFavorite() {
        $list_like = session('favorite');
        $discount_products = [];
        $bestseller_products = [];

        if ($list_like) {
            foreach ($list_like->items as $item) {
                $discount_products[] = $item['item'];
                $bestseller_products[] = $item['item'];
            }
        }
        return view('favorite',compact('discount_products','bestseller_products'));
    }

    public function addFavorite(Request $request, $id) {
        $product = Product::find($id);
        $oldList = $request->session()->has('favorite') ? $request->session()->get('favorite') : null;
        $list = new Favorite($oldList);
        $list->add($product, $id);
        $request->session()->put('favorite', $list);
        
        // Thông báo đã thêm sản phẩm vào danh sách yêu thích
        $message = 'Đã thêm sản phẩm vào danh sách yêu thích.';
        return redirect()->back()->with('message', $message);
    }

    public function delFavorite($id)
    {
        $oldList = Session::has('favorite') ? Session::get('favorite') : null;
        $list = new Favorite($oldList);
        
        // Kiểm tra xem người dùng muốn xóa sản phẩm hay không

            $list->removeItem($id);
            if (count($list->items) > 0) {
                Session::put('favorite', $list);
            } else Session()->forget('favorite');
            // Thông báo đã xóa sản phẩm khỏi danh sách yêu thích
            $message = 'Đã xóa sản phẩm khỏi danh sách yêu thích.';
            return redirect()->back()->with('message', $message);
        
    }
}
