

<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php mysql_select_db('eb_lms',mysql_connect('localhost','root',''))or die(mysql_error());?>
    <div class="container">
		<div class="margin-top">


<div class="control-group"> 
					<div class="controls">
<form action="index.php">
						<div class="controls">

								<button name="delete_student" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Log out</button>
					</div>
			</form>	
					
				</div>



			<div class="row">	
				<div class="span12">		
						<div class="alert alert-info"><strong>Borrowed Books</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                <thead>
                                    <tr>
                                        <th>Book title</th>                                 
                                        <th>Borrower</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Date Borrow</th>                                 
                                        <th>Due Date</th>                                
                                        <th>Date Returned</th>
										<th>Borrow Status</th>

                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php

                                  	// session_start();
                                  	$id = $_SESSION["id"];



                                    $user_query=mysql_query("select * from borrow
								LEFT JOIN member ON borrow.member_id = member.member_id
								LEFT JOIN borrowdetails ON borrow.borrow_id = borrowdetails.borrow_id
								LEFT JOIN book on borrowdetails.book_id =  book.book_id 
								WHERE member.member_id = '$id' AND borrowdetails.permission>0
								")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['borrow_id'];
									$book_id=$row['book_id'];
									$borrow_details_id=$row['borrow_details_id'];
									?>
									<tr class="del<?php echo $id ?>">
									
									                              
                                    <td><?php echo $row['book_title']; ?></td>
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['year_level']; ?></td>
									<td><?php echo $row['date_borrow']; ?></td> 
                                    <td><?php echo $row['due_date']; ?> </td>
									<td><?php echo $row['date_return']; ?> </td>
									<td><?php echo $row['borrow_status'];?></td>

							


									<td> <a rel="tooltip"  title="Return" id="<?php echo $borrow_details_id; ?>" href="#delete_book<?php echo $borrow_details_id; ?>" data-toggle="modal"    class="btn btn-success"><i class="icon-check icon-large" style="color: red" ></i>Return</a>
                                    <?php include('modal_return.php'); ?></td>


									<td>    <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="iicon-info-sign icon-large"></i>Fine</a>
									<?php include('get_fine_model.php'); ?></td>


									                                    

								

                                    </tr>
									<?php  }?>
                                </tbody>
                            </table>
							

			</div>		
	
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Books are allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>