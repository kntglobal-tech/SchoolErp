<?php
/**
 * Created by PhpStorm.
 * User: Akshat
 * Date: 7/18/2017
 * Time: 11:30 AM
 */
?>
<div class="container">
    <div class="row">
        <p style="font-size: 20px; margin-top:0px;" class="text-default">Attendance / New</p>
    </div>
    <div class="row">
        <div class="col-lg-3" style="margin-right:-10px;">
            <?php echo form_open('attendance/attend_new', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label for="inputText" class="col-lg-2 control-label">Date</label>
                <div class="col-lg-9">
                    <input type="date" class="form-control" name="entry_date">
                </div>
            </div>
        </div>
        <div class="col-lg-2" style="margin-right: -30px;">
            <div class="form-group">
                <label for="inputText" class="col-lg-5 control-label" style="margin-top: 8px;">Class</label>
                <div class="col-lg-7">
                    <?php
                    $drop = array();
                    foreach ($class_drop as $r) {
                        $drop[$r['class']] = $r['class'];
                    }
                    $attribute_class = [
                        'class' => 'form-control',
                        'id' => 'select',
                    ];
                    echo form_dropdown('class', $drop, set_value('class'), $attribute_class);
                    ?>
                    <?php echo form_error('class'); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="inputText" class="col-lg-4 control-label" style="margin-top: 8px;">Section</label>
                <div class="col-lg-4">
                    <?php
                    $drop = array();
                    foreach ($section_drop as $r) {
                        $drop[$r['section_name']] = $r['section_name'];
                    }
                    $attribute_class = [
                        'class' => 'form-control',
                        'id' => 'select',
                    ];
                    echo form_dropdown('section', $drop, set_value('section'), $attribute_class);
                    ?>
                    <?php echo form_error('section'); ?>
                </div>
                <?php echo form_submit(['name' => 'submit', 'value' => 'Search', 'class' => 'btn btn-primary btn-sm',
                    'style' => 'margin-top:4px; margin-left:10px;']); ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <?php echo form_open('attendance/attend_new_insert', ['class' => 'form-horizontal']); ?>
    <div class="row">
    <div class="col-lg-8" style="overflow-y:scroll; overflow-x:hidden; height: 350px; width:850px;">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="text-default">
                <th>Class</th>
                <th>Section</th>
                <th>Student Id</th>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Admission No.</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Leave</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($data)): ?>
                <?php foreach ($data as $student_det): ?>
                    <tr class="">
                        <td>
                            <?php echo $student_det['student_class']; ?>
                        </td>
                        <?php $myArray = array();
                        $myArray = $student_det['student_class']; ?>
                        <td><?php echo $student_det['student_section']; ?></td>
                        <td><?php echo $student_det['student_id']; ?></td>
                        <td><?php echo $student_det['student_roll_no']; ?></td>
                        <td><?php echo $student_det['student_first_name'] ?></td>
                        <td><?php echo $student_det['admission_no'] ?></td>
                        <td>
                            <?php $data = array('name' => 'optradio[]', 'id' => 'P', 'value' => 'Present', 'checked' => 'True');
                            echo form_checkbox($data);
                            ?>
                        </td>
                        <td>
                            <?php $data = array('name' => 'optradio[]', 'id' => 'A', 'value' => 'Absent');
                            echo form_checkbox($data); ?>
                            <script>
                                if (document.getElementByID("P").checked) {
                                    alert("ajsj");
                                    document.getElementByID('P').checked = false;
                                }
                            </script>
                            <?php
                            ?>
                        </td>
                        <td>
                            <?php $data = array('name' => 'optradio[]', 'id' => 'L', 'value' => '');
                            echo form_checkbox($data);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="">
                    <td>No Records Found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
    <div class="row">
        <?php echo form_submit(['name' => 'insert', 'value' => 'Save', 'class' => 'btn btn-primary btn-sm',
            'style' => 'margin-top:25px; margin-left:40px;']); ?>
        <?php echo form_close(); ?>
    </div>
</div>

