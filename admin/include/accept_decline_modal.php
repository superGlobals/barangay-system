<!-- accept certificate -->
<div class="modal fade" id="accept<?= $brgy_clearance_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form method="post" action="function/requestFunction.php">
            <input type="hidden" name="brgy_clearance_id" value="<?= $row['brgy_clearance_id'] ?>">
            <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
            <input type="hidden" name="certificate_type" value="<?= $row['certificate_type'] ?>">
            <h5 class="text-center">Do you want to accept this request?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="accepted" class="btn btn-primary">Yes!</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- decline -->
<div class="modal fade" id="decline<?= $brgy_clearance_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/requestFunction.php">
          <input type="hidden" name="brgy_clearance_id" value="<?= $row['brgy_clearance_id'] ?>">
           <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
           <input type="hidden" name="certificate_type" value="<?= $row['certificate_type'] ?>">

        <label>Reason for declining request</label>
        <textarea class="form-control" name="reason" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="decline" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- mark as ready to pick up -->
<div class="modal fade" id="pickup<?php echo $brgy_clearance_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mark this as ready to pick up ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/requestFunction.php">
          <input type="hidden" name="brgy_clearance_id" value="<?php echo $row['brgy_clearance_id'] ?>">
          <input type="hidden" name="resident_id" value="<?php echo $row['resident_id'] ?>">
          <input type="hidden" name="certificate_type" value="<?php echo $row['certificate_type'] ?>">
          <textarea class="form-control" name="message" placeholder="Add message(Optional)"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="pickup" class="btn btn-primary">Yes!</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- mark as completed -->
<div class="modal fade" id="completed<?php echo $brgy_clearance_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mark this as completed ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/requestFunction.php">
          <input type="hidden" name="brgy_clearance_id" value="<?php echo $row['brgy_clearance_id'] ?>">
          <input type="hidden" name="resident_id" value="<?php echo $row['resident_id'] ?>">
          <input type="hidden" name="certificate_type" value="<?php echo $row['certificate_type'] ?>">
          <textarea class="form-control" name="message" placeholder="Add message(Optional)"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="completed" class="btn btn-primary">Yes!</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- view ref number -->
<div class="modal fade" id="view<?= $brgy_clearance_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body text-center">
          <form method="post" action="function/requestFunction.php">
            <label>Gcash Ref. number</label>
            <h3><?= $row['reference_number'] ?></h3>
            <input type="hidden" name="brgy_clearance_id" value="<?= $row['brgy_clearance_id'] ?>">
            <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
            <input type="hidden" name="certificate_type" value="<?= $row['certificate_type'] ?>">
            <h5>Do you want to accept this request?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="accepted" class="btn btn-primary">Yes!</button>
        </div>
      </form>
    </div>
  </div>
</div>