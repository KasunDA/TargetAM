
<!-- 100% Box Grid Container: Start -->
<div class="grid_24">

    <!-- Box Header: Start -->
    <div class="box_top">

        <h2 class="icon pages">التتبع</h2>

        <!-- Tab Select: Start -->
        <ul class="sorting">
            <li><a href="#listing" class="active">عرض الكل</a></li>
            <li><a href="#addnews">خيارات البحث</a></li>
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
                            <th class="align_right center">السرعة</th>
							<th class="align_right center">الشارع</th>
							<th class="align_right center">الوقت</th>
							<th class="align_right center">التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($trackings as $tracking): ?>
                        <tr>
                            <td class="center"><?php echo $tracking['driver']['name']; ?></a></td>
                            <td class="center"><?php echo $tracking['driver']['line']; ?></a></td>
							<td class="center"><?php echo $tracking['mobile']['mobile_number']; ?></a></td>
							<td class="center"><?php echo $tracking['car']['license_plate']; ?></a></td>
							<td class="center"><?php echo $tracking['speed']; ?></a></td>
							<td class="center"><?php echo $tracking['street']; ?></a></td>
							<td class="center"><?php echo $tracking['time']; ?></a></td>
							<td class="center"><?php echo $tracking['date']; ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table> 


            </div>
            <!-- News Sorting Table: End -->

            <!-- News Sorting Table - Add News Tab: Start -->
            <div id="addnews" class="padding">
			not implemented yet
            </div>
            <!-- News Sorting Table - Add News Tab: End -->

        </div>
        <!-- News Table Tabs: End -->

    </div>
    <!-- Box Content: End -->

</div>
<!-- 100% Box Grid Container: End -->


