<?php
function toggleModal($visibility) {
  ?>
    <script type="text/javascript">
      $(document).ready(function(){
      $("#myModal").modal(<?php $visibility ?>);
    });
    </script> 
  <?php
} 
?>