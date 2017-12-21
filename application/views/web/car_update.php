
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">تعديل - العربات</h2>
    </div>
    <!-- Box Header: End -->

    <!-- Box Content: Start -->
    <div class="box_content" dir="rtl">
        <div id="addnews" class="padding">
            <form method="POST" action="<?php echo site_url('web/car_update_done'); ?>">

                <div class="field">
                    <label>نمرة العربة</label>
                    <input type="text" class="validate" name="license_plate" value="<?php echo $car['license_plate']; ?>">
                </div>
                <div class="field">
                    <label>الموديل</label>
                    <input type="text" class="validate" name="model" value="<?php echo $car['model']; ?>">
                </div>   
                
                <input type="hidden" name="car_id" value="<?php echo $car['car_id']; ?>">
                <button type="submit">تعديل</button>
                <button class="secondary" type="reset">استعادة</button>
            </form>
        </div>
    </div>
    <!-- Box Content: End -->

</div>
<!-- 100% Box Grid Container: End -->


