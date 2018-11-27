<div class="content">
        <?php $this->load->view('user_panel/user-topbar'); ?>
        <div class="main-content">
            




    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">Latest Stats</a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="100" data-displayPrevious="true" value="<?php echo $total ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Orders</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="200000" data-displayPrevious="true" value="<?php echo $income ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center"><?php echo $stat3; ?></h3>
                            </div>
                        </div>
        </div>
    </div>






            <?php $this->load->view('user_panel/user-footer'); ?>
        </div>
    </div>