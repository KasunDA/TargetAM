
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">تعديل - السائقين</h2>
    </div>
    <!-- Box Header: End -->

    <!-- Box Content: Start -->
    <div class="box_content" dir="rtl">
        <div id="addnews" class="padding">
				<form action="<?php echo site_url('web/driver_update_done');?>" method="post">

                    <div class="field" >
                        <label>اسم السائق</label>
                        <input type="text" class="validate" name="name" value="<?php echo $driver['name'];?>">
                    </div>
					
                    <div class="field">
                        <label>خط السير</label>
                        <input type="text" class="validate" name="line" value="<?php echo $driver['line'];?>">
                    </div>
					
                    <div class="field">
                        <label>اختر العربة</label>
                        <select name="car_id">
						<?php foreach($cars as $car): ?>
                            <option <?php if($car['car_id'] == $driver['car']['car_id']) echo "selected";?> value="<?php echo $car['car_id'];?>"><?php echo $car['model']." - ". $car['license_plate'];?></option>
						<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label>اختر الهاتف</label>
                        <select name="mobile_id">
						<?php foreach($mobiles as $mobile): ?>
                            <option <?php if($mobile['mobile_id'] == $driver['mobile']['mobile_id']) echo "selected";?> value="<?php echo $mobile['mobile_id'];?>"><?php echo $mobile['model']." - ". $mobile['mobile_number'];?></option>
						<?php endforeach; ?>
                        </select>
                    </div>
					<input type="hidden" name="driver_id" value="<?php echo $driver['driver_id']; ?>">
                    <button type="submit">تعديل</button>
                    <button class="secondary" type="reset">استعادة</button>
                </form>
        </div>
    </div>
    <!-- Box Content: End -->

</div>
<!-- 100% Box Grid Container: End -->


