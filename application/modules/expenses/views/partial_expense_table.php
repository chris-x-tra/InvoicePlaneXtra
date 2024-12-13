<div class="table-responsive">
    <table class="table table-hover table-striped" >

        <thead>
        <tr>
            <!-- <th><?php _trans('expense_id'); ?></th> -->
            <th><?php _trans('expense_date'); ?></th>
            <th><?php _trans('expense_description'); ?></th>
            <th><?php _trans('expense_supplier_number'); ?></th>
            <th><?php _trans('expense_supplier_name'); ?></th>
            <th style="text-align: right;"><?php _trans('expense_amount'); ?></th>
            <th><?php _trans('expense_category_id'); ?></th>
            <th><?php _trans('due_date'); ?></th>
            <th><?php _trans('status'); ?></th>
            <th><?php _trans('options'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php
        $expense_idx = 1;
//var_dump ($expenses);
        $expense_count = count($expenses);
        $expense_list_split = $expense_count > 3 ? $expense_count / 2 : 9999;
        foreach ($expenses as $expense) {
            // Convert the dropdown menu to a dropup if expense is after the expense split
            $dropup = $expense_idx > $expense_list_split ? true : false;
            ?>
            <tr>
            <!--
                <td>
                    <a href="<?php echo site_url('expenses/view/' . $expense->expense_id); ?>"
                       title="<?php _trans('edit'); ?>">
                        <?php echo($expense->expense_id); ?>
                    </a>
                </td>
            -->
                <td>
                        <?php echo date_from_mysql($expense->expense_date); ?>
                </td>

                <td>
                    <a href="<?php echo site_url('expenses/view/' . $expense->expense_id); ?>"
                       title="<?php _trans('expense_description'); ?>">
                        <?php echo($expense->expense_description); ?>
                    </a>
                </td>

                <td>
                        <?php echo ($expense->expense_supplier_number); ?>
                </td>

                <td>
                        <?php echo ($expense->expense_supplier_name); ?>
                </td>

                <td class="amount">
                    <?php echo format_currency($expense->expense_amount); ?>
                </td>

                <td>
                        <?php echo ($expense->expense_category_id); ?>
                </td>

                <td class="due_date">
                        <?php echo format_date($expense->expense_due_date); ?>
                </td>

                <td>
                        <?php echo $expense->expense_status_id; ?>
                </td>

                <td>
                    <div class="options btn-group<?php echo $dropup ? ' dropup' : ''; ?>">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('expenses/form/' . $expense->expense_id); ?>">
                                        <i class="fa fa-edit fa-margin"></i> <?php _trans('edit'); ?>
                                    </a>
                                </li>
                            <li>
                                <a href="#" class="expense-add-payment"
                                   data-expense-id="<?php //echo $expense->expense_id; ?>"
                                   data-expense-balance="<?php //echo $expense->expense; ?>"
                                    <i class="fa fa-money fa-margin"></i>
                                    <?php _trans('enter_payment'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
            $expense_idx++;
        } ?>
        </tbody>

    </table>
</div>
<?php
/* vim: tabstop=4 shiftwidth=4 expandtab 
 */
?>

