<div class="content">
        <?php $this->load->view('user_panel/user-topbar'); ?>
        <div class="main-content">
            
<table class="table">
  <thead>
    <tr>
      <th>Order Title</th>
      <th>Price</th>
      <th>Commission(<?php echo $rate . '% of Price' ?>)</th>
      <th>Balance</th>
    </tr>
  </thead>
  <tbody>
  <?php $balance=0; foreach($history as $key => $list){ $commission=($rate*$list['order_price'])/100; $balance+=$commission; ?>
    <tr>
      <td><?php echo $list['order_title'] ?></td>
      <td>Rs. <?php echo $list['order_price'] ?></td>
      <td>Rs. <?php echo $commission ?></td>
      <td>Rs. <?php echo $balance; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>


<?php $this->load->view('user_panel/user-footer'); ?>
            
        </div>
    </div>