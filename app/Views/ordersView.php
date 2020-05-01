  <!-- In this case, $id represents user id-->
      <a href= "<?php echo base_url('insertformorder/'.$id);?>"  >  
      <svg class="bi bi-file-earmark-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      
        <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z"/>
        <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>

        
      </svg>

      <text class="btn btn-secondary" >Insert order</text>

      </a>

   



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>
<?php 
    foreach ($orders as $row){
        echo "<tr> <td>".$row['id']."</td>
        <td>".$row['description']."</td>
        <td>".$row['amount']."</td>";
    
   
?>

<td>


    <a href="<?php echo base_url('edit/'.$row['id']);?>" class="btn btn-info">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('delete/'.$row['id']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table>