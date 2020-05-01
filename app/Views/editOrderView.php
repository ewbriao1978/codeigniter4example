<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}
?>

<form action="<?php echo base_url('editorder/'.$id);?>" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Description:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="description" value="<?php echo $description;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="emailInputLabel">Amount:</label>
            <input type="text" class="form-control" id="emailInputLabel" name = "amount" value="<?php echo $amount;?>">
          </div>
        </div>   
        <input type = "hidden" id="inputHidden" name="customerIDform" value="<?php echo $customer_id; ?> ">
    
      
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>