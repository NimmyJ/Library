	<div id="accept_book<?php echo $borrow_accept_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-success">Do you want to grant access to this Book?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-success" href="accept_save.php<?php echo '?id='.$id; ?>&<?php echo 'book_id='.$book_id; ?>">Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
