<div id="headerbar">
<h1 class="headerbar-title">
	<?php _trans('view_expense'); ?>
</h1>
</div>
<!--
'expense_id',			// 0			<- primary key
'expense_number',		// XTD-B-0001		// my number number in the ip program - ??? not used atm - rethink
'expense_description',		// Netzteil schnell besorgt wegen notfall // my personal desription
'expense_status_id',		// paid, ???
'expense_category_id',		// ? <- buchhaltungskategorie for later use
'expense_supplier_id',		// 1			// for later use if there is extra supplier table
'expense_supplier_name',	// Arlt
'expense_supplier_number',	// A-RE-2734		// number on invoice from supplier
'expense_filename',		// arlt-asdf-001.jpg	// filename uploaded file of the supplier invoice
'expense_date',			// 01.07.2024		// date on suppliere expense
'expense_due_date',		// 14.07.2024
'expense_paid_date',		// 18.07.2024
'expense_amount',		// 39.95 [EUR]
'expense_bank_book_day',	// 19.07.2024
'expense_bank_book_subject',	// Zahlung an ARLT
'expense_date_created',		// 01.07.2024	<- auto fields erstellt
'expense_date_modified'		// 19.07.2024	<- auto fields modified
-->


<div id="content" class="tabbable tabs-below no-padding">
	<div class="row">
		<div class="col-xs-12 col-md-6">
		<div class="panel panel-default no-margin">

			<div class="panel-heading"><?php _trans('expense'); ?></div>

			<div class="panel-body table-content">
			<table class="table no-margin">

				<tr>
					<th><?php _trans('expense_id'); ?></th>
					<td><?php _htmlsc($expense->expense_id); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_number'); ?></th>
					<td><?php _htmlsc($expense->expense_number); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_description'); ?></th>
					<td><?php _htmlsc($expense->expense_description); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_status_id'); ?></th>
					<td><?php _htmlsc($expense->expense_status_id); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_category_id'); ?></th>
					<td><?php _htmlsc($expense->expense_category_id); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_supplier_id'); ?></th>
					<td><?php _htmlsc($expense->expense_supplier_id); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_supplier_name'); ?></th>
					<td><?php _htmlsc($expense->expense_supplier_name); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_supplier_number'); ?></th>
					<td><?php _htmlsc($expense->expense_supplier_number); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_filename'); ?></th>
					<td><?php _htmlsc($expense->expense_filename); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_date'); ?></th>
					<td><?php _htmlsc($expense->expense_date); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_due_date'); ?></th>
					<td><?php _htmlsc($expense->expense_due_date); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_paid_date'); ?></th>
					<td><?php _htmlsc($expense->expense_paid_date); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_amount'); ?></th>
					<td><?php _htmlsc($expense->expense_amount); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_bank_book_date'); ?></th>
					<td><?php _htmlsc($expense->expense_bank_book_date); ?></td>
				</tr>
				<tr>
					<th><?php _trans('expense_bank_book_subject'); ?></th>
					<td><?php _htmlsc($expense->expense_bank_book_subject); ?></td>
				</tr>
				</table>

			</div>
		</div>
	</div>
</div>

