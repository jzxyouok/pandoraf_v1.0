<?php
/*
 * -----------------------------
* module of shopcart component
* 购物车组件模块
* -----------------------------
* @author HollenMok
* @date 2015/09/15
*
*/

class shopcartModuleShopcart{
	
	public function __construct(){
		require ROOT.'/pf_core/factory.php';
		require ROOT.'/pf_core/dbquery/pandoraf/shopcart/shopcart.php';
		$this->shopcartQuery = new shopcartDbqueryShopcart();
	}
	
	public function display(){
		$itemImage['image_url'] = '/applications/pandoraf/templates/imgServer/p962452/medium/SKU189442 (15).jpg';
		return $itemImage;
	}
	
	/**
	 * @desc shopcart info/购物车信息
	 * @access public
	 * @author  HollenMok
	 * @date  2016-03-23
	 * @return array blockList 
	 */
	public function cartInfo(){
	    $customers_id = '2016042101';
	    $productData = $this->shopcartQuery->getCartInfo($customers_id);
	    foreach($productData as $k =>$v){
	        $productList[$k]['products_id'] = $v['products_id'];
	        $productList[$k]['products_model'] = 'SKU189442';
	        $productList[$k]['products_name'] = 'Sexy Plus Size V-Neck Short Sleeve Lace Hollow Out Dress';
	        $productList[$k]['force_url_name'] = 'Sexy Women Plus Size V-neck Short Sleeves Lace Hollow Out Dress';
	        $productList[$k]['image_list']['products_image'] = 'upload/2015/08/SKU189442 (8).jpg';
	        $productList[$k]['image_list']['products_image_2'] = 'upload/2015/08/SKU189442_2.jpg';
	        $productList[$k]['image_list']['products_image_3'] = 'upload/2015/08/SKU189442 (15).jpg';
	        $productList[$k]['image_list']['products_image_4'] = 'upload/2015/08/SKU189442 (16).jpg';
	        $productList[$k]['image_list']['products_image_5'] = 'upload/2015/08/SKU189442 (17).jpg';
	        $productList[$k]['products_price'] = $v['final_price'];
	        $productList[$k]['final_price'] = $v['final_price'];
	        $productList[$k]['discount'] = '0';
	        $productList[$k]['botCat'] = '3660';
	        $productList[$k]['categories_name'] = 'Plus Size Dresses';
	        
	        $productList[$k]['categories_seo_url'] = 'Plus Size Dresses';
	        $productList[$k]['reviewAmount'] = '962452';
	        $productList[$k]['diggs'] = '962452';
	        $productList[$k]['products_bulk'] = '962452';
	        $productList[$k]['show_size'] = '962452';
	        $productList[$k]['image_url'] = ' http://pandoraf.com/thumb/list_grid//upload/2015/08/SKU189442 (8).jpg';
	        $productList[$k]['url'] = '962452';
	        $productList[$k]['review_url'] = '962452';
	        $productList[$k]['category_url'] = '962452';
	        $productList[$k]['wishlist'] = '962452';
	        
	        $productList[$k]['image_cover'] = '962452';
	        $productList[$k]['askquestion_url'] = '962452';
	        $productList[$k]['questions_url'] = '962452';
	        $productList[$k]['shareImage_url'] = '962452';
	        $productList[$k]['warehouse'] = '962452';
	        $productList[$k]['quantity'] = $v['customers_basket_quantity'];
	        $productList[$k]['maximum'] = '999';
	        $productList[$k]['clearStock'] = '962452';
	        $productList[$k]['price_discount'] = '962452';
	        $productList[$k]['format_products_price'] = 'US$10.09';
	        
	        $productList[$k]['price'] = $v['final_price'];
	        $productList[$k]['format_final_price'] = 'US$'.$v['final_price'];
	        $productList[$k]['format_total_price'] = 'US$'.$v['final_price'];
	        $productList[$k]['attributes'] = '962452';
	        $productList[$k]['qty'] = $v['customers_basket_quantity'];
	        $productList[$k]['cart_id'] = '962452{379}16344{380}16218';
	        $productList[$k]['active'] = '962452';
	        $productList[$k]['selected'] = '962452';
	        $productList[$k]['attrs'] = '962452';
	        $productList[$k]['weight'] = '962452';
	        $productList[$k]['acce_main'] = '962452';
	    }	    
		
		$blockList = array();
		$blockList['619']['warehouse'] = '619';  
		$blockList['619']['warehouseName'] = 'CN_HJ';
		$blockList['619']['shipmentList']['hkairmail_hkairmail'] = 'Standard Shipping (Free shipping & 7-20 business days)';
		$blockList['619']['shipmentList']['airmail_airmail'] = 'Air Parcel Register (US$1.30 & 7-20 business days)';
		$blockList['619']['shipmentList']['pam_pam'] = 'Priority Direct Mail (US$2.48 & 6-9 business days)';
		$blockList['619']['shipmentList']['chinapost_chinapost'] = 'EMS Express Mail Service (US$16.68 & 10-15 business days)';
		$blockList['619']['shipmentList']['cndhl_cndhl'] = 'Expedited Shipping Service (US$10.68 & 3-7 business days)';
		$blockList['619']['areaList']['0']['productList'] = $productList;
		$blockList['619']['areaList']['0']['format_total_price'] = 'US$10.09';
		
		$blockList['619']['selected'] = '1';
		$blockList['619']['active'] = '1';
		$blockList['619']['shipmentListOrder'] = '1';
		$blockList['619']['defaultShip'] = '1';
		$blockList['619']['defaultShipName'] = '1';
		$blockList['619']['totalShipCost'] = '1';
		$blockList['619']['formatShipCost'] = '1';
		$blockList['619']['itemTotal'] = '1';
		$blockList['619']['itemTotalAmount'] = '1';
		$blockList['619']['formatItemTotalAmount'] = '1';
		$blockList['619']['orderTotal'] = '1';
		$blockList['619']['formatOrderTotal'] = '1';
		
		return $blockList; 
	}
	public function addProduct(){
		$qty = $_POST['qty'];		
		$warehouse = $_POST['warehouse'];
		$attrs = $_POST['attrs'];
		$products_id = $_POST['products_id'];
		//判断这个产品是否已存在，已存在则更新，否则进行插入
		$productsIdCheck = $this->shopcartQuery->productsIdCheck($products_id);
		if($productsIdCheck){
		    $this->shopcartQuery->updateQty($qty,$products_id);
		}else{
		    $this->shopcartQuery->addToCart($qty,$warehouse,$attrs,$products_id);
		}	    
		return "success in adding!";
	}
	/**
	 * @desc 更新购物车产品数量
	 * @author HollenMok 2016-04-21
	 */
	public function updateQty(){
	    $qty = $_POST['qty'];		
		$products_id = $_POST['products_id'];
	    $this->shopcartQuery->updateQty($qty,$products_id);
		return "success in updating!";
	}
	/**
	 * @desc 更改购物车产品数量
	 * @author HollenMok 2016-05-01
	 */
	public function changeQty(){
	    $qty = $_POST['qty'];
	    $products_id = $_POST['products_id'];
	    $this->shopcartQuery->changeQty($qty,$products_id);
	    return "success in changing qty!";
	}
	public function miniCart(){
	    $customers_id = '2016042101';
	    $productData = $this->shopcartQuery->getCartInfo($customers_id);
	    foreach($productData as $k => $v){
	        if($v['customers_id']==$customers_id){
	            $qty = $v['customers_basket_quantity'];
	        }
	    }
	    $qty = isset($qty)?$qty:$_POST['qty']; 
		$cartProduct['count'] = "1"; 
		$cartProduct['products']['962452{379}16344{380}16218']['ocart_id'] = "962452{379}16344{380}16218";
		$cartProduct['products']['962452{379}16344{380}16218']['cart_id'] = "962452_379-16344_380-16218";
		$cartProduct['products']['962452{379}16344{380}16218']['products_id'] = "962452";
		$cartProduct['products']['962452{379}16344{380}16218']['url'] = "/plus-size-dresses-3660/p-962452.html";
		$cartProduct['products']['962452{379}16344{380}16218']['image_url'] = "/thumb/list_grid//upload/2015/08/SKU189442 (8).jpg";
		$cartProduct['products']['962452{379}16344{380}16218']['products_name'] = "Sexy Plus Size V-Neck Short Sleeve Lace Hollow Out Dress";
		$cartProduct['products']['962452{379}16344{380}16218']['products_model'] = "SKU189442";
		$cartProduct['products']['962452{379}16344{380}16218']['warehouse'] = "619";
		$cartProduct['products']['962452{379}16344{380}16218']['maximum'] = "0";
		$cartProduct['products']['962452{379}16344{380}16218']['clearStock'] = "0";
		$cartProduct['products']['962452{379}16344{380}16218']['quantity'] = $qty;
		$cartProduct['products']['962452{379}16344{380}16218']['final_price'] = "10.09";
		$cartProduct['products']['962452{379}16344{380}16218']['format_final_price'] = "US$10.09";
		$cartProduct['products']['962452{379}16344{380}16218']['attrList']['0']['options_name'] = "Color";
		$cartProduct['products']['962452{379}16344{380}16218']['attrList']['0']['value_name'] = "Dark Blue";
		$cartProduct['products']['962452{379}16344{380}16218']['attrList']['1']['options_name'] = "Size";
		$cartProduct['products']['962452{379}16344{380}16218']['attrList']['1']['value_name'] = "M";
		
		$cartProduct['showCheckout'] = "1";
		$cartProduct['format_final_productTotal'] = "10.09";
		$cartProduct['productTotal'] = "US$10.09";
		return $cartProduct; 
	}
}



