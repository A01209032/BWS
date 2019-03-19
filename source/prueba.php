<?php include ("views/_header_carpetas.html") ?>

<div class="container mt-3">
  <h2>Modal Methods</h2>
  <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" id="myBtn">Hide Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Methods</h4>
        </div>
        <div class="modal-body">
          <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
        </div>
      </div>
      
    </div>
  </div>
</div>
 
<script>
  
$(document).ready(function(){
  // Show the Modal on load
  $("#myModal").modal("show");
    
  // Hide the Modal
  $("#myBtn").click(function(){
    $("#myModal").modal("hide");
  });
});

</script>
<?php include ("views/_footer.html") ?>
