<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

// expenses by chrissie ^ x-tra-designs 12.2024

#[AllowDynamicProperties]
class Expenses extends Admin_Controller
{

    /**
     * Invoices constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_expenses');
    }

    public function index()
    {

        // profiler for debug by chrissie
        $this->output->enable_profiler(TRUE);

        // Display all expenses by default
        redirect('expenses/status/all');
    }

    /**
     * @param string $status
     * @param int $page
     */
    public function status($status = 'all', $page = 0)
    {
        // Determine which group of expenses to load
        switch ($status) {
            case 'payed':
                $this->mdl_expenses->is_paid();
                break;
            case 'open':
                $this->mdl_expenses->is_open();
                break;
            case 'overdue':
                $this->mdl_expenses->is_overdue();
                break;
        }

        $this->mdl_expenses->paginate(site_url('expenses/status/' . $status), $page);
        $expenses = $this->mdl_expenses->result();

        $this->layout->set(
            [
                'expenses' => $expenses,
                'status' => $status,
            ]
        );

        $this->layout->buffer('content', 'expenses/index');
        $this->layout->render();
    }

	
    public function recalculate_all_expenses()
    {
        $this->db->select('expense');
        $expense_ids = $this->db->get('ip_expenses')->result();

        $this->load->model('mdl_expense');

        foreach ($expense as $expense) {
            $this->mdl_expense->calculate($expense_id->expense_id);
        }
    }

}

/*
vim:et:ts=4:sw=4:
*/

