
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">السائقين</h2>

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
                            <th class="align_right center">الاسم</th>
                            <th class="align_right center">خط السير</th>
                            <th class="align_right center">الهاتف</th>
                            <th class="align_right center">العربة</th>
                            <th class="align_right center tools">أدوات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
						
						<?php if(empty($drivers)):?>
						<td class="center">لا يوجد نتائج</td>
						<td class="center"></td>
						<td class="center"></td>
						<td class="center"></td>
						<td class="center"></td>
						<?php endif;?>
						
                            <?php foreach($drivers as $driver): ?>
                            <td class="center"><?php echo $driver['name']; ?></a></td>
                            <td class="center"><?php echo $driver['line']; ?></a></td>
                            <td class="center"><?php echo $driver['mobile']['mobile_number']; ?></a></td>
                            <td class="center"><?php echo $driver['car']['license_plate']; ?></a></td>
                            <td class="tools center">
                                <a href="<?php echo site_url('web/driver_update/'.$driver['driver_id']);?>" class="edit tip" title="تعديل">edit</a>
                                <a href="<?php echo site_url('web/delete/driver/'.$driver['driver_id']);?>" class="delete tip" title="مسح">delete</a>
                            </td>
							<?php endforeach; ?>
                        </tr>
                        

                    </tbody>
                </table> 


            </div>
            <!-- News Sorting Table: End -->

            <!-- News Sorting Table - Add News Tab: Start -->
            <div id="addnews" class="padding">

                <form action="<?php echo site_url('web/driver_add_done');?>" method="post">

                    <div class="field" >
                        <label>اسم السائق</label>
                        <input type="text" class="validate" name="name">
                    </div>
					
                    <div class="field">
                        <label>خط السير</label>
                        <input type="text" class="validate" name="line">
                    </div>
					
                    <div class="field">
                        <label>اختر العربة</label>
                        <select name="car_id">
						<?php foreach($cars as $car): ?>
                            <option value="<?php echo $car['car_id'];?>"><?php echo $car['model']." - ". $car['license_plate'];?></option>
						<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label>اختر الهاتف</label>
                        <select name="mobile_id">
						<?php foreach($mobiles as $mobile): ?>
                            <option value="<?php echo $mobile['mobile_id'];?>"><?php echo $mobile['model']." - ". $mobile['mobile_number'];?></option>
						<?php endforeach; ?>
                        </select>
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


