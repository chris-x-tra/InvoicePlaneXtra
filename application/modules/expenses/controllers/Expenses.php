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
        //$this->output->enable_profiler(TRUE);

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

    function dump_post()
    {
        $post = array();
        foreach ( array_keys($_POST) as $key ) {
            $post[$key] = $this->input->post($key);
        }
        echo '<pre>'; print_r($post); echo '</pre>';
    }

    public function form($id = NULL)
    {
        // profiler for debug by chrissie
        //$this->output->enable_profiler(TRUE);

        if ($this->input->post('btn_cancel')) {
            redirect('expenses/index');
        }

        // debug by chrissie
        if ( 0 && $this->input->post('btn_submit')) {
            $this->dump_post();
        }
        //

        $this->filter_input();  // <<<--- filters _POST array for nastiness

        if ($this->mdl_expenses->run_validation()) {
            // new or edit?
            if ($this->input->post('expense_id')) 
                $id = $this->input->post('expense_id');

            $id = $this->mdl_expenses->save($id);

            if (!$id ) {
                $this->session->set_flashdata('alert_error', $result);
                $this->session->set_flashdata('alert_success', null);
                redirect('expenses/form');

                return;
            }
            redirect('expenses/view/' . $id);
        }

        if ($id && ! $this->input->post('btn_submit')) {
            if ( ! $this->mdl_expenses->prep_form($id)) {
                show_404();
            }
        }

        $this->layout->buffer('content', 'expenses/form');
        $this->layout->render();
    }

    public function view($id = 0)
    {
        $this->db->reset_query();
        $expense = $this->mdl_expenses->get_by_id($id);

        if (!$expense) {
            show_404();
        }

        $this->layout->set(
                [
                'expense' => $expense,
                ]
                );

        $this->layout->buffer('content', 'expenses/view');
        $this->layout->render();
    }

    // TODO!
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

