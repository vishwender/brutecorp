<div class="content">
        <?php $this->load->view('user_panel/user-topbar'); ?>
        <div class="main-content">
            
<table class="table">
  <thead>
    <tr>
      <th>Title/Name</th>
      <th>Category</th>
      <th>Description</th>
      <th>Register Date</th>
      <th>Expire Date</th>
      <th>Price</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($order_list as $key => $list){ ?>
    <tr>
      <td><?php echo $list['order_title'] ?></td>
      <td><?php echo $this->front_model->select_field_where_db('bc_sv_category',array('category_id = '. $list['order_category_id']),'category_name'); ?></td>
      <td><?php echo $list['order_description'] ?></td>
      <td><?php if ($list['order_register_date']!='0000-00-00'){echo aw_convert_date($list['order_register_date']);}else{echo '-';} ?></td>
      <td><?php if ($list['order_expired_date']!='0000-00-00'){echo aw_convert_date($list['order_expired_date']);}else{echo '-';} ?></td>
      <td><?php echo $list['order_price'] ?></td>
      <td><?php echo $list['order_status'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<!--
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>-->


            <?php $this->load->view('user_panel/user-footer'); ?>
        </div>
    </div>