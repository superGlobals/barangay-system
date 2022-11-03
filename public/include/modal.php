<div class="modal fade" id="cancel<?= $row['brgy_clearance_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="transactionFunction" method="post">        
          <h1 class="text-center">Cancel this request?</h1>
          <input type="hidden" name="brgy_clearance_id" value="<?= $row['brgy_clearance_id'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="cancelRequest" class="btn btn-primary">Yes</button>
      </div>
    </form>
    </div>
  </div>
</div>