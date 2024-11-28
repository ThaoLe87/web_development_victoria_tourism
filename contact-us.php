<?php
	include('include/header.inc');
	include('include/nav.inc');
?>
            
        <div class="contactus">
            <form>
                <h2 class="form_header">Sign Up</h2>
                <label>Firstname</label>
                <input type="text" id="firstname" placeholder="enter your first name here">
                <label>Lastname</label>
                <input type="text" id="lastname" placeholder="enter your last name here">
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="enter your email here">
                <label for="number">Phone number</label>
                <input type="text" id="number">
                <label for="activities">Choose your activities</label>
                    <select id="activities">
                        <option>Major event</option>
                        <option selected>Thinks to do</option>
                        <option>Places to visit</option>
                        <option>Foods and wines</option>
                        <option>Family activities</option>
                    </select>
                <button type="submit">Submit Enquiry</button>
            </form>
        </div>
<?php
	include('include/footer.inc');
?>
