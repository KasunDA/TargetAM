
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">تعديل - الهواتف</h2>
    </div>
    <!-- Box Header: End -->

    <!-- Box Content: Start -->
    <div class="box_content" dir="rtl">
        <div id="addnews" class="padding">
            <form method="POST" action="<?php echo site_url('web/mobile_update_done'); ?>">

                <div class="field">
                    <label>رقم المسلسل</label>
                    <input type="text" class="validate" name="serial_number" value="<?php echo $mobile['serial_number']; ?>">
                </div>
                <div class="field">
                    <label>الموديل</label>
                    <input type="text" class="validate" name="model" value="<?php echo $mobile['model']; ?>">
                </div>
                <div class="field">
                    <label>رقم الهاتف</label>
                    <input type="text" class="validate" name="mobile_number" value="<?php echo $mobile['mobile_number']; ?>">
                </div>                
                
                <input type="hidden" name="mobile_id" value="<?php echo $mobile['mobile_id']; ?>">
                <button type="submit">تعديل</button>
                <button class="secondary" type="reset">استعادة</button>
            </form>
        </div>
    </div>
    <!-- Box Content: End -->

</div>
<!-- 100% Box Grid Container: End -->


