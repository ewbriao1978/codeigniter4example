
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
     

    </tr>
  </thead>
  <tbody>

<?php
    foreach ($customers as $customer){
        if ($customer['name']=='admin') continue;
        echo "<tr class=\"table-primary\"> <td>".$customer['id']."</td>
        <td>".$customer['name']."</td>
        <td>".$customer['email']."</td></tr>";
?>
    
<tr><td>
            <table class="table table-light">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Description order(s)</th>
                <th scope="col">Amount</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
            <?php 
                 foreach ($orders as $order){
                     if ($order['customer_id'] != $customer['id']) continue;
                    echo "<tr> <td>".$order['id']."</td>
                    <td>".$order['description']."</td>
                    <td>".$order['amount']."</td></tr>";
                 
            
            ?>
               
              
                <?php
                }// foreach orders
                ?>

            <!-- </tr> -->
            

            </body>
           
            </table>
         </td></tr>   

        <?php
            }// foreach customers
            ?>    
    </body>
</table>