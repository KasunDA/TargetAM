
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyAEjrugKySRWYWygi94Tl3bs6j4nuytKfM" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<style type="text/css" media="screen">
    #map {width:600px; height:500px;} 
    #list {background:#eee; list-style:none; padding: 0} 
    #list li { padding:5px; } 
    #list li:hover { background:#555; color:#fff; cursor:pointer; cursor:hand; }

</style>

<!--- drivers list !--->
<script type="text/javascript" src="<?php echo INC_WEB; ?>js/jQuery.jGlideMenu.067.js"></script>
<link href="<?php echo INC_WEB; ?>css/jGlideMenu.css" rel="stylesheet" media="screen" type="text/css" />
<link href="<?php echo INC_WEB; ?>css/jGlideMenuNotAbsolute.css" rel="stylesheet" media="screen" type="text/css" />

<!-- 75% Box Grid Container: Start -->
<div class="grid_18">
    <!-- Box Header: Start -->
    <div class="box_top">
        <h2 class="icon pages" align="right">الخريطة</h2>
        <!-- Tab Select: Start -->
        <ul class="sorting">
            <li><a href="#tab1" class="active">الموقع الحالى</a></li>
            <li><a href="#tab2"> تاريخ التنقلات </a></li>
        </ul>
        <!-- Tab Select: End -->
    </div>
    <!-- Box Header: End -->

    <!-- Box Content: Start -->
    <div class="box_content padding">
        <!-- Tabs: Start -->
        <div class="tabs">

            <div id="tab1">
                <div id="map"></div>
            </div>
            <div id="tab2">
                <p>
                    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                    suscipit faucibus urna.
                </p>
            </div>
        </div>
        <!-- Tabs: End -->

    </div>
    <!-- Box Content: End -->
</div>
<!-- 75% Box Grid Container: End -->

<!-- 25% Box Grid Container: Start -->
<div class="grid_6">
    <!-- Box Header: Start -->
    <div class="box_top">
        <p align="center">قائمة السائقين</p>
    </div>
    <!-- Box Header: End -->
    <!-- Box Content: Start -->
    <div class="box_content padding">
        <ul id="list" dir="rtl"> </ul>
    </div>

    <!-- Box Content: End -->
</div>
<!-- 25% Box Grid Container: End -->


<!-- JavaScript ///////////////////////////////////////////////////////////////////////////////// !-->
<script>
    $(document).ready(function(){ 						
        //get initial drivers from database
        var drivers = null;
        $.ajax({
            url: '<?php echo site_url('web/check_for_updates'); ?>',
            type: 'POST',
            async: false,
            success: function(msg) {
                drivers = $.parseJSON(msg);
            }
        });
            
        //generate the map and set center point and zoom
        var map = new GMap2(document.getElementById('map')); 
        var Abbas = new GLatLng(30.056527,31.337949); 
        map.setCenter(Abbas, 15); 
        var str = "";
            
        //generate markers and add them to map
        var markers = []; 
        for (var i = 0; i<drivers.length; i++)
        {
            //MMS: Marker Position
            var point = new GLatLng(drivers[i].tracking.lat, drivers[i].tracking.lng);
            marker = new GMarker(point,{draggable: true});
            marker.disableDragging();
            map.addOverlay(marker);
            markers[i] = marker; 
        }
            
        //generate the drivers list
        $(markers).each(function(i,marker){
            $("<li />")
            //MMS: name in List
            .html(drivers[i].name)
            .click(function(){
                ChooseMarkerEventHandler(marker, i);
            })
            .appendTo("#list");

            GEvent.addListener(marker, "click", function(){
                ChooseMarkerEventHandler(marker, i);
            });
        });
            
        //choosing a driver or choosing a marker event handler
        function ChooseMarkerEventHandler(marker, index){
            var moveEnd = GEvent.addListener(map, "moveend", function(){
                //MMS: Driver Details
                str = "Name: "		+ drivers[index].name           		+ "<br/>"
                    + "Car: "   	+ drivers[index].car.license_plate		+ "<br/>"
                    + "mobile: "	+ drivers[index].mobile.mobile_number	+ "<br/>"
                    + "speed: "		+ drivers[index].tracking.speed			+ "<br/>"
                    + "street: "    + drivers[index].tracking.street;
                marker.openInfoWindowHtml(str);
                GEvent.removeListener(moveEnd);
            });
            map.panTo(marker.getLatLng());
        }
            
        //continues timed calling
        window.setInterval(function(){
            $.ajax({
                url: '<?php echo site_url('web/check_for_updates'); ?>',
                type: 'POST',
                success: function(msg) {
                    var updatedDrivers = $.parseJSON(msg);
                        
                    var size = updatedDrivers.length;
                    var newDrivers = [];
                        
                    while(size--)
                        newDrivers.push(true);
                            
                    for (var i = 0; i<drivers.length; i++)
                    {   
                        for (var j = 0; j<updatedDrivers.length; j++)
                        {
                            if(drivers[i].driver_id == updatedDrivers[j].driver_id)   
                            {
                                newDrivers[j] = false;
                                //alert(drivers[i].driver_id);

                                //update location
                                if(drivers[i].tracking.lng != updatedDrivers[j].tracking.lng || drivers[i].tracking.lat != updatedDrivers[j].tracking.lat)
                                {
                                    markers[i].closeInfoWindow();
                                    markers[i].enableDragging();
                                    markers[i].setLatLng(new GLatLng(updatedDrivers[j].tracking.lat, updatedDrivers[j].tracking.lng));
                                    markers[i].disableDragging();
                                    //markers[i].click();
                                    map.panTo(new GLatLng(updatedDrivers[j].tracking.lat, updatedDrivers[j].tracking.lng));
                                    marker.openInfoWindowHtml(str);
										
                                }
                                    
                                //update name in the list
                                if(drivers[i].name != updatedDrivers[j].name)
                                {
                                    $("#list li").each(function(index){
                                        if ($(this).html() == drivers[i].name)
                                        {
                                            drivers[i].name = updatedDrivers[j].name;
                                            $(this).html(drivers[i].name);
                                        }
                                    });                                                                                
                                }
                                    
                                //update driver data
                                drivers[i] = updatedDrivers[j];
                                    
                                break;
                            }
                                
                            //cant find  the driver, he disconnected
                            if(j == updatedDrivers.length - 1)
                            {
                                //alert('disconnected');
                                $("#list li").each(function(index){
                                    if ($(this).html() == drivers[i].name)
                                        $(this).remove();
                                });
                                markers[i].closeInfoWindow();
                                markers[i].hide(); // need to delete it
                                drivers.splice(i, 1);
                            }
                        }
                    }
                        
                    for (var i = 0; i<newDrivers.length; i++)
                    {
                        if(newDrivers[i])
                        {
                            alert(updatedDrivers[i].name);
                            //                                var point = new GLatLng(updatedDrivers[i].lng, drivers[i].lat);
                            //                                var marker = new GMarker(point,{draggable: true});
                            //                                marker.disableDragging();
                            //                                map.addOverlay(marker);
                            //                                markers.push(marker);
                                
                            //                                drivers.push(updatedDrivers[i]);
                            //                                var index = drivers.length - 1;
                            //                                $("<li />").html(updatedDrivers[i].name).click(function(){
                            //                                   ChooseMarkerEventHandler(marker, index);
                            //                                }).appendTo("#list");
                            //
                            //                                GEvent.addListener(marker, "click", function(){
                            //                                    ChooseMarkerEventHandler(marker, index);
                            //                                });
                        }
                    }
                    ////////////////////////////////////////////////////////                        
                        
                }
            });                
        }, 5000);
            
    });
    </script>