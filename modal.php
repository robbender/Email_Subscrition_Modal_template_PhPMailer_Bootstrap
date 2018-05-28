
<div class="modal-dialog modal-newsletter">
  <div class="modal-content">
  
  <?php 
  require('toggleModal.php');
  session_start();
  /* Already subscribed and notified */
  if (isset($_SESSION['done'])){
    /* toggleModal('hide'); */ // Why wont this work???
    ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#myModal").modal('hide');
        });
      </script> 
    <?php
    
  /* Already subscribed session + notify once */
  } else if (isset($_SESSION['sucess'])) {
    toggleModal('show');
    $_SESSION['done'] = 'done';
    ?>
      <p><?php echo($_SESSION['msg']); ?></p>
      <button id="closeModal" name="closeModal" class="form-control btn btn-success" data-dismiss="modal">Close</button>
    <?php 

  /* New user session */
  } else { 
    toggleModal('show');
  ?>
  <form action="" method="post">
    <div class="modal-header">
      <div class="icon-box">						
        <i class="fa fa-envelope-open-o"></i>
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <h4>Your modal title</h4>	
        <p>Your sub title here</p>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name" required>
        <input class="form-control mt-1" name="email" type="email"  placeholder="Enter Your Email" required>
        <input id="submit" name="submit" type="submit" class="form-control btn btn-large btn-primary" value="Subscribe">
        </div>
      <?php if(isset($_POST['submit'])){ send_mail();} ?></p> 
    </div>
  </form>	
  <?php } ?>
  </div>
</div>