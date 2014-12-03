<?php
require_once("ACoreAdmin.php");

    class orders extends ACore_Admin {

        protected function obr(){}

        protected function get_content(){

            echo "<div id='wrapper'>";

            if ($_SESSION['res']) {
                echo "<script>alert('".$_SESSION['res']."');</script>";
                unset($_SESSION['res']);
            }

            $query = "SELECT o.*, c.name as cname, c.secondname as sname FROM orders o 
            		  LEFT JOIN customers c ON c.customers_id=o.customer_id";
            $result = mysql_query($query) or mysql_error();

			$query_op = "SELECT op.*, p.name, p.price FROM orders_product op 
            		  	 LEFT JOIN products p ON p.product_id=op.product_id";
            $result_op = mysql_query($query_op) or mysql_error();            

            $status_query = "SELECT * FROM order_status";
            $status_result = mysql_query($status_query) or mysql_error();

            print("
            <div id='show'>
                <h1>Список замовлень</h1>
                <table cellspacing='0' cellpadding='5px'>
                    <thead>
                    	<tr>
							<th></th>
							<th>Дата замовлення</th>
							<th>Замовник</th>
							<th>Контактні дані</th>
							<th>Сума замовлення</th>
							<th>Статус замовлення</th>
						</tr>
                    </thead>");

            if (mysql_num_rows($result)>0) {
                while ($arr = mysql_fetch_array($result)) {
                    print('
                        <tr>
                        	<td><a><img src="images/arrow_right.png" alt="Right" class="arrow" id="'.$arr['order_id'].'"></a></td>
                        	<td>' . $arr['create_date'] . '</td>
                            <td>' . $arr['cname'] . $arr['sname'] . '</td>
                            <td>' . $arr['customer_data'] . '</td>
                            <td>' . $arr['total_price'] . '</td>
                            <td>
                            	<select size="1">');
                    		while ($status = mysql_fetch_array($status_result)){
                            	if ($status['status_id'] == $arr['status']) {
                            		echo "<option value='".$status['status_id']."' selected>". $status['status_name'] ."</option>";	
                            	} else {
                            		echo "<option value='".$status['status_id']."'>". $status['status_name'] ."</option>";	
                            	}
                            }
                    print('            
                        		</select>
                            </td>
                        </tr>
                        <tr class="hidden_row hidden_row_'.$arr['order_id'].'" style="padding:0;">
							<td></td>
							<td colspan="5">
								<table class="product">
									<tr>
										<th>Назва товару</th>
										<th>Ціна товару</th>
										<th>Замовлена кількість</th>
										<th>Сума по товару</th>
									</tr>');
								$sum = 0;
			                    while ($prod = mysql_fetch_array($result_op)) {
			                    	if ($prod['order_id'] == $arr['order_id']) {
			                    		print('
					                    	<tr>
												<td>'. $prod['name'] .'</td>
												<td>'. $prod['price'] .' грн.</td>
												<td>'. $prod['qty'] .'</td>
												<td>'. $prod['qty'] * $prod['price'] .' грн.</td>
											</tr>
			                    		');	
			                    		$sum = $sum + ($prod['qty'] * $prod['price']);
			                    	}
			                	}
			                	print('
			                		<tr>
			                			<td></td>
			                			<td></td>
			                			<td><strong>Сума замовлення</strong></td>
			                			<td><strong>'. $sum .' грн.</strong></td>
			                		</tr>
			                		');


					print('		</table>
							</td>
						</tr>');
                    
            	}
            }
            else { echo "<tr><td colspan='6'>В таблиці немає записів</td></tr>"; }
            echo   "</table>
                    <a href='?view=product_add' class='add'> Add product <img src='images/plus.png' width='16px' style='vertical-align: middle'> </a><br>
                    <br>";
            echo "</div>";

            echo "</div>";
        }

    }

?>