 <?php 
       if($this->Paginator->params['paging'][$paging_model_name]['pageCount'] >= 2){
?>
<div class="PagingTable">
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="background_paging">    
      <tr>
            <td class="paging">
			 <?php
			    echo $this->Paginator->prev($this->Html->image('/img/admin/prev.gif', array('border' => '0')), array('escape' => false));
			    echo $this->Paginator->numbers();			           
			    echo $this->Paginator->next($this->Html->image('/img/admin/next.gif', array('border' => '0')), array('escape' => false));
			  ?>				
		 </td>
		</tr>
</table>
</div>
<?php 
   }
?>