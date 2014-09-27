<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
    }
    
    public function index()
    {
        //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('checkout',$obj_products);
    }
    public function pay(){
        if(isset($_SESSION['customer'])){
            $customer_id =  $_SESSION['customer']['customer_id'];
            
            $product_id = "";
            $i = 1;
            
            foreach ($this->cart->contents() as $item):
                //INSERT 
                             $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
//                                    <tr>
//                                        <td><img src="<?php echo SERVER2.$item['big_image'];?>" height="42" width="42"></td>
//                                        <td><div class="post_title"><?php echo $item['name'];?></div></td>
                                        <td>S/.//<?php echo $this->cart->format_number($item['price']);?></td>
                                        <td>
                                            <div class="quantity">
                                                <input name="qty" type="number" value="//<?php echo $item['qty']; ?>" class="input-text qty text" size="4">
                                            </div>
                                        </td>
                                        <td>S/.//<?php echo $this->cart->format_number($item['subtotal']);?></td>
                                        <td><p><a onclick="update_car('//<?php echo $item['rowid'];?>');" class="button">Editar</a> </p>
                                            <a onclick="delete_car('//<?php echo $item['rowid'];?>');" class="button">Eliminar</a> </p>
                                        </td>
                                    </tr>
            <?php $i++;
            endforeach; 
                                
            
            
            
        }else{
            redirect('micuenta');
        }
    }
}
