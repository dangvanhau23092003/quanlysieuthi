<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class Cart extends Model
{
    use HasFactory;
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

    public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

    //thêm 1 mặt hàng item có id cụ thể vào giỏ hàng
	public function add($item, $id){
		$mathang = ['qty'=>0, 'price' => $item->giamoi==0?$item->giacu:$item->giamoi, 'item' => $item];
		//$mathang: lưu số lượng, tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//qty: số lượng của 1 item (mặt hàng) trong giỏ hàng
		//price: tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//item: là mặt hàng trong giỏ hàng
		if($this->items){ //nếu items != null tức có mặt hàng trong cart thì
			if(array_key_exists($id, $this->items)){ //array_key_exists() là hàm kiểm tra id của item (mặt hàng) được thêm vào đã có trong giỏ hàng chưa? nếu có thì lấy về item(mặt hàng) có id này rồi lưu vào biến $mathang 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty']++;  //tăng số lượng của item vừa thêm lên 1
		$mathang['price'] = $item->giamoi==0?$item->giacu:$item->giamoi * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty++;
		$this->totalPrice += ($item->giamoi==0?$item->giacu:$item->giamoi);
	}

	//thêm nhiều mặt hàng item có số lượng soluong có id cụ thể vào giỏ hàng
	public function addMany($item, $id,$soluong){
		$mathang = ['qty'=>0, 'price' => $item->giamoi==0?$item->giacu:$item->giamoi, 'item' => $item];
		//$mathang: lưu số lượng, tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//qty: số lượng của 1 item (mặt hàng) trong giỏ hàng
		//price: tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//item: là mặt hàng trong giỏ hàng
		if($this->items){ //nếu items != null tức có mặt hàng trong cart thì
			if(array_key_exists($id, $this->items)){ //array_key_exists() là hàm kiểm tra id của item (mặt hàng) được thêm vào đã có trong giỏ hàng chưa? nếu có thì lấy về item(mặt hàng) có id này rồi lưu vào biến $mathang 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty']=$mathang['qty']+$soluong;  //tăng số lượng của item vừa thêm lên số lượng
		$mathang['price'] = ($item->giamoi==0?$item->giacu:$item->giamoi) * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty +=$soluong;
		$this->totalPrice += ($item->giamoi==0?$item->giacu:$item->giamoi) * $soluong;
	}

	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
