
 
<?php
	  echo($this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'),'type'=>'file')));
	  ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <?php echo $this->Form->input("User.email", array("placeholder"=>"Email" ,"type" => "text", "div" => false, "label" => false, 'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input("User.password", array("placeholder"=>"Password" ,"type" => "password", "div" => false, "label" => false, 'class'=>'form-control'));?>
                    </div>          
                    
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                </div>
            </form>