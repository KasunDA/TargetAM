
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">الهواتف</h2>

        <!-- Tab Select: Start -->
        <ul class="sorting">
            <li><a href="#listing" class="active">عرض الكل</a></li>
            <li><a href="#addnews">اضافة جديد</a></li>
        </ul>
        <!-- Tab Select: End -->

    </div>
    <!-- Box Header: End -->

    <!-- Box Content: Start -->
    <div class="box_content" dir="rtl">

        <!-- News Table Tabs: Start -->
        <div class="tabs">

            <!-- News Sorting Table: Start -->
            <div id="listing">

                <table class="sorting">
                    <thead>
                        <tr>
                            <th class="align_right center">رقم المسلسل</th>
                            <th class="align_right center">الموديل</th>
                            <th class="align_right center">رقم التليفون</th>
                            <th class="align_right center tools">أدوات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mobiles as $mobile): ?>
                        <tr>
                            <td class="center"><?php echo $mobile['serial_number']; ?></td>
                            <td class="center"><?php echo $mobile['model']; ?></td>
                            <td class="center"><?php echo $mobile['mobile_number']; ?></td>
                            <td class="tools center">
                                <a href="<?php echo site_url('web/mobile_update/'.$mobile['mobile_id']); ?>" class="edit tip" title="تعديل">edit</a>
                                <a href="<?php echo site_url('web/delete/mobile/'.$mobile['mobile_id']); ?>" class="delete tip" title="مسح">delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table> 


            </div>
            <!-- News Sorting Table: End -->

            <!-- News Sorting Table - Add News Tab: Start -->
            <div id="addnews" class="padding">

                <form method="POST" action="<?php echo site_url('web/mobile_add_done'); ?>">

                <div class="field">
                    <label>رقم المسلسل</label>
                    <input type="text" class="validate" name="serial_number">
                </div>
                <div class="field">
                    <label>الموديل</label>
                    <input type="text" class="validate" name="model">
                </div>
                <div class="field">
                    <label>رقم الهاتف</label>
                    <input type="text" class="validate" name="mobile_number">
                </div>                

                <button type="submit">اضافة</button>
                <button class="secondary" type="reset">تفريغ</button>
                </form>
            </div>
            <!-- News Sorting Table - Add News Tab: End -->

        </div>
        <!-- News Table Tabs: End -->

    </div>
    <!-- Box Content: End -->

</div>
<!-- 100% Box Grid Container: End -->


