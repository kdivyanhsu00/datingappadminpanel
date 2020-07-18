<!-- The Modal -->
<div class="modal fade" id="modal-block">
  <div class="modal-dialog">
    <form action="" method="POST">
    @csrf 
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="h-msg">Block/Unblock</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
          Are you sure want to <strong id="message"></strong> this?
          </div>
         </div>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline btn-info">Submit</button>
        <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
      </div>
      
    </div>
    </form>
  </div>
</div>