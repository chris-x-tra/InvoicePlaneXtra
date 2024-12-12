
<div id="headerbar">
<h1 class="headerbar-title">
	<?php _trans('add_expense'); ?>
</h1>
</div>

<div id="content">
    <?php echo $this->layout->load_view('layout/alerts'); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h3><?php _trans('add_expense'); ?></h3>
                    <br />

    <!-- -->
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('expenses/form'); ?>">

    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
           value="<?php echo $this->security->get_csrf_hash() ?>">


    <div class="form-group">
        <label for="expense_descripton">
            <?php _trans('expense_descripton'); ?>
        </label>
        <input id="expense_descripton" name="expense_descripton" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_descripton', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_supplier_number">
            <?php _trans('expense_supplier_number'); ?>
        </label>
        <input id="expense_supplier_number" name="expense_supplier_number" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_supplier_number', true); ?>">

    <div class="form-group">
        <label for="expense_supplier_name">
            <?php _trans('expense_supplier_name'); ?>
        </label>
        <input id="expense_supplier_name" name="expense_supplier_name" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_supplier_name', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_amount">
            <?php _trans('expense_amount'); ?>
        </label>
        <input id="expense_amount" name="expense_amount" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_amount', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_date">
            <?php _trans('expense_date'); ?>
        </label>
        <input id="expense_date" name="expense_date" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_date', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_due_date">
            <?php _trans('expense_due_date'); ?>
        </label>
        <input id="expense_due_date" name="expense_due_date" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_due_date', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_paid_date">
            <?php _trans('expense_paid_date'); ?>
        </label>
        <input id="expense_paid_date" name="expense_paid_date" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_paid_date', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_bank_book_date">
            <?php _trans('expense_bank_book_date'); ?>
        </label>
        <input id="expense_bank_book_date" name="expense_bank_book_date" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_bank_book_date', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_bank_book_subject">
            <?php _trans('expense_bank_book_subject'); ?>
        </label>
        <input id="expense_bank_book_subject" name="expense_bank_book_subject" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_bank_book_subject', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_status_id">
            <?php _trans('expense_status_id'); ?>
        </label>
        <input id="expense_status_id" name="expense_status_id" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_status_id', true); ?>">
    </div>

    <div class="form-group">
        <label for="expense_category_id">
            <?php _trans('expense_category_id'); ?>
        </label>
        <input id="expense_category_id" name="expense_category_id" type="text" class="form-control"
            value="<?php echo $this->mdl_expenses->form_value('expense_category_id', true); ?>">
    </div>


<!-- TODO upload, expense_filename -->
    <div class="form-group">
    TODO!
        <label><?php _trans('select_document'); ?></label>
        <input class="form-control" type="file" name="document" required>
    </div>

    <div class="btn-group btn-group-sm index-options">
        <button type="submit" class="btn btn-success"> 
            <?php _trans('add'); ?>
        </button>
    </div>
    </form>
    <!-- -->



            </div>
        </div>
    </div>
</div>

<?php
/*
 * vim: tabstop=4 shiftwidth=4 expandtab
 */
?>
