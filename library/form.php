<?php
	echo'
	  		<div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form action="send_form_email.php" method="POST" enctype ="multipart/form-data">

		            <div class="form-group">
		                <label for= "first_name">First Name</label>
		                <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
		            </div>
		            <div class="form-group">
		                <label for="last_name">Last Name</label>
		                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
		            </div>
		            <div class="form-group">
		              <label for="email">Email:</label>
		              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		            </div>
		            <div class="form-group">
		              <label for="telephone">Phone:</label>
		              <input type="tel" class="form-control" id="telephone" placeholder="Enter phone number" name="telephone">
		            </div>

					<br>

		            <div class="form-group">
		              <label for="time">When is the best time to reach you?:</label>
		              	<input type="radio" name="time" value="AM">AM
						<input type="radio" name="time" value="PM">PM
						<input type="radio" name="time" value="Either">Either
		            </div>
		            <div class="form-group">
		              <label for="comments">Let use know how we can help:</label> 
			            <br>
			          <textarea name="comments" rows="5" cols="40"></textarea>
			      	</div>
		            <div>
		            	<label>*What is 3+3? (Anti-spam)</label>
						<input name="human" placeholder="Type Here">
					</div>
					<br>
					<br>
					<div class="text-center">
		            	<input class="btn btn-success" type="submit" name="sumbit" value="submit">
					</div>
	          </form><!-- end index-form-->
	        </div><!-- end contact form-->'
?>