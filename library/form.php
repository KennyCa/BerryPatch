<?php
<<<<<<< HEAD
	echo'
		  <div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form class="box" action="#">
=======
     
	echo'	  <div id="contact-form" style="background-color: #f8f8f8;padding-bottom: 15px;">
	          <form action="$page" method="POST" enctype ="multipart/form-data">
>>>>>>> 257f120188ecba6f1d78543434c3c6b5c6c05b63
	            <div class="form-group">
	                <label for="first_name">First Name</label>
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
	              <label for="phone">Phone:</label>
	              <input type="#" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
	            </div>
<<<<<<< HEAD
				<div class="text-center">
					<button type="button" class="btn btn-info btn-md">Submit</button>
				</div><br><br>
=======
	            <div class="form-group">
	              <label for="time">when is the best time to reach you?:</label>
	              	<input type="radio" name="time" value="AM">AM
					<input type="radio" name="time" value="PM">PM
					<input type="radio" name="time" value="Either">Either
	            </div>
	            <div class="form-group">
	              <label for="textarea">Let use know how we can help:</label> 
		            <br>
		          <textarea name="comment" rows="5" cols="40"></textarea>
	            </div>
	            <label>*What is 3+3? (Anti-spam)</label>
				<input name="human" placeholder="Type Here">
				<br>
	            <input class="btn btn-success" type="submit" name="sumbit" value="Submit">
>>>>>>> 257f120188ecba6f1d78543434c3c6b5c6c05b63
	          </form><!-- end index-form-->
	        </div><!-- end contact form-->'
?>