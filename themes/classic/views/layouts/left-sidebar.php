<?php $this->beginContent('//layouts/main'); ?>

        <div class="row">
        <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Menu Actions</h3>
            </div>
            <div class="panel-body">
             <?php
                    echo BsHtml::stackedPills($this->menu);
            ?> 
            </div>
      </div>    
            
        </div>
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $this->pagetitle; ?></h3>
                </div>
                <div class="panel-body">
                  <?php echo $content; ?>
                </div>
            </div>
              
            </div>
          </div>

<?php $this->endContent(); ?>