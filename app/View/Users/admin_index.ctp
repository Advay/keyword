 <section class="content-header">
                    <h1>
                        Users list
                        
                    </h1>
                   
                </section>
 <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th>User type</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Zipcode</th>
                                                <th>Website</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												foreach($data as $value){
											?>
                                            <tr>
                                                	<td><?php 
													if($value['User']['role_id'] == 1){
														echo "Admin";
													}else{
														echo "Registered";
													}
													?></td>
                                                	<td><?php echo $value['User']['first_name']?></td>
													<td><?php echo $value['User']['last_name']?></td>
													<td class="center"> <?php echo $value['User']['email']?></td>
													<td class="center"> <?php echo $value['Storage']['name']?></td>
													<td class="center"> <?php echo $value['Storage']['addr']?></td>
													<td class="center"> <?php echo $value['Storage']['zip']?></td>
													<td class="center"> <?php echo $value['Storage']['href']?></td>
													<td class="center"> <?php echo $value['User']['location']?></td>
													
													<td class="center">
													
													<?php
													if($value['User']['role_id'] == 1){
														echo $this->Html->link('Edit',array('controller'=>'users','action'=>'edit',$value['User']['id']),array('escape'=>false,'class'=>'btn btn-success'));
													}	
													?>
													
													
													
													<?php
														if($value['User']['role_id'] != 1){
														//echo $this->Html->link('Delete',array('controller'=>'users','action'=>'delete',$value['User']['id']),array('escape'=>false,'class'=>'btn btn-danger','onclick'=>"return (confirm('Are you sure?'))"));
														}
													?>
													</td>
                                            </tr>
											<?php }?>
                                          
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                           
                        </div>
                    </div>

                </section>