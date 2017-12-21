<html>
    <head>
        <title> Mobile Simulator </title>
        <style>
            .fs1{
                width: 60%;
            }
            .hidden{
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <div id="connect" class="hidden">
            <fieldset class="fs1">
                <legend>Connect</legend>
                <form action="blank" method="POST">
                    PIN: <input type="text" name="PIN" id="connect_PIN" />
                    lon: <input type="text" name="lon" id="connect_lon" />
                    lat: <input type="text" name="lat" id="connect_lat" />
                    <input type="submit" value="Connect" id="connect_btn_connect"/>
                    &nbsp;&nbsp;&nbsp; <input type="submit" value="Register" id="connect_btn_register"/>
                </form>
            </fieldset>
        </div>
        <div id="connected" class="hidden">
            <fieldset class="fs1">
                <legend>Connected</legend>
                <form action="blank" method="POST">
                    PIN: <input type="text" name="PIN" id="connected_PIN" disabled />
                    lon: <input type="text" name="lon" id="connected_lon" />
                    lat: <input type="text" name="lat" id="connected_lat" />
                    &nbsp;&nbsp;&nbsp; <input type="submit" value="Update Location" id="connected_btn_update_location" />
                    <br/>
                    name: <input type="text" name="name" id="connected_name" />                    
                    mobile number: <input type="text" name="mobileNumber" id="connected_mobile_number" />                    
                    car number: <input type="text" name="carNumber" id="connected_car_number" />                    
                    <input type="submit" value="Edit Info" id="connected_btn_edit_info"/>
                    <br/>
                    <input type="submit" value="Disconnect" id="connected_btn_disconnect"/>
                </form>
            </fieldset>
        </div>
        <div id="register" class="hidden">
            <fieldset class="fs1">
                <legend>Register</legend>
                <form action="blank" method="POST">
                    PIN: <input type="text" name="PIN" id="register_PIN" />
                    password: <input type="password" name="password" id="register_password" /> <br/>
                    name: <input type="text" name="name" id="register_name" />                    
                    mobile number: <input type="text" name="mobileNumber" id="register_mobile_number" />                    
                    car number: <input type="text" name="carNumber" id="register_car_number" />
                    &nbsp;&nbsp;&nbsp; <input type="submit" value="Register" id="register_btn_register"/>
                </form>
            </fieldset>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            //by default display connection form
            $('#connect').attr('class', '');
            
            //display register form
            $('#connect_btn_register').click(function (event){
                event.preventDefault();
                //$('#current').html($('#register').html());
                $('#connect').attr('class', 'hidden');
                $('#register').attr('class', '');
            })
            
            //submit registration with ajax
            $('#register_btn_register').click(function(event){
                event.preventDefault();
                                
                var form_data = {
                    PIN: $('#register_PIN').val(),
                    password: $('#register_password').val(),
                    name: $('#register_name').val(),
                    mobile_number: $('#register_mobile_number').val(),
                    car_number: $('#register_car_number').val()
                };
	
                $.ajax({
                    url: '<?php echo site_url('mob/register'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        if(msg == "successful")
                        {
                            //alert('Registered successfully');
                            $('#register').attr('class', 'hidden');
                            $('#connect').attr('class', '');
                        }
                        else
                        {
                            //alert(msg);
                        }
                    }
                });                
            })
            
            //connect with ajax
            $('#connect_btn_connect').click(function(event){
                event.preventDefault();
                                
                var form_data = {
                    PIN: $('#connect_PIN').val(),
                    lon: $('#connect_lon').val(),
                    lat: $('#connect_lat').val()
                };
	
                $.ajax({
                    url: '<?php echo site_url('mob/connect'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        var obj = $.parseJSON(msg);
                        $('#connected_PIN').val(obj.PIN);
                        $('#connected_lon').val(obj.lon);
                        $('#connected_lat').val(obj.lat);
                        $('#connected_name').val(obj.name);
                        $('#connected_car_number').val(obj.car_number);
                        $('#connected_mobile_number').val(obj.mobile_number);
                            
                        $('#connect').attr('class', 'hidden');
                        $('#connected').attr('class', '');
                    }
                });                
            })
            
            //disconnect and change form
            $('#connected_btn_disconnect').click(function(event){
                event.preventDefault();
                var form_data = {
                    PIN: $('#connect_PIN').val(),
                };
	
                $.ajax({
                    url: '<?php echo site_url('mob/disconnect'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        if(msg == "successful")
                        {
                            $('#connected').attr('class', 'hidden');
                            $('#connect').attr('class', '');
                        }
                    }
                });                

            })
            //edit info with ajax
            $('#connected_btn_edit_info').click(function(event){
                event.preventDefault();
                                
                var form_data = {
                    PIN: $('#connected_PIN').val(),
                    name: $('#connected_name').val(),
                    mobile_number: $('#connected_mobile_number').val(),
                    car_number: $('#connected_car_number').val()
                };
	
                $.ajax({
                    url: '<?php echo site_url('mob/edit_info'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        if(msg == "successful")
                        {
                            //alert('sent successfully');
                        }
                        else
                        {
                            //alert(msg);
                        }
                    }
                });                
            })
            //update location with ajax
            $('#connected_btn_update_location').click(function(event){
                event.preventDefault();
                                
                var form_data = {
                    PIN: $('#connected_PIN').val(),
                    lon: $('#connected_lon').val(),
                    lat: $('#connected_lat').val()
                };
	
                $.ajax({
                    url: '<?php echo site_url('mob/update_position'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        if(msg == "successful")
                        {
                            //alert('sent successfully');
                        }
                        else
                        {
                            //alert(msg);
                        }
                    }
                });                
            })            
        })
    </script>
</html>