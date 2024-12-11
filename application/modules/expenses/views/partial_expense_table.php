<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <th><?php _trans('status'); ?></th>
            <th><?php _trans('expense'); ?></th>
            <th><?php _trans('expense__description'); ?></th>
            <th><?php _trans('created'); ?></th>
            <th><?php _trans('due_date'); ?></th>
            <th style="text-align: right;"><?php _trans('amount'); ?></th>
            <th style="text-align: right;"><?php _trans('balance'); ?></th>
            <th><?php _trans('options'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php
$expense_statuses =[ 'asdf','ghjk'];
        $expense_idx = 1;
        $expense_count = count($expenses);
        $expense_list_split = $expense_count > 3 ? $expense_count / 2 : 9999;
        foreach ($expenses as $expense) {
            // Convert the dropdown menu to a dropup if expense is after the expense split
            $dropup = $expense_idx > $expense_list_split ? true : false;
            ?>
            <tr>
                <td>
                    <span class="label <?php echo $expense_statuses[$expense->expense_status_id]; ?>"
                        <?php echo $expense_statuses[$expense->expense_status_id]; ?>
                    </span>
                </td>

                <td>
                    <a href="<?php echo site_url('expenses/view/' . $expense->expense_id); ?>"
                       title="<?php _trans('edit'); ?>">
                        <?php echo($expense->expense_number ? $expense->expense_number : $expense->expense_id); ?>
                    </a>
                </td>

                <td>
                    <a href="<?php echo site_url('expenses/view/' . $expense->expense_id); ?>"
                       title="<?php _trans('view_expense'); ?>">
                        <?php echo($expense->expense_description); ?>
                    </a>
                </td>

                <td>
                    <?php //echo date_from_mysql($expense->expense_date_created); ?>
                    <?php echo ($expense->expense_date_created); ?>
                </td>

                <td>
                    <span class="">
                    </span>
                </td>

                <td class="amount">
                    <?php echo format_currency($expense->expense_amount); ?>
                </td>

                <td class="amount">
                    <?php echo format_currency($expense->expense_amount); ?>
                </td>

                <td>
                    <div class="options btn-group<?php echo $dropup ? ' dropup' : ''; ?>">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        <ul class="dropdown-menu">
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
