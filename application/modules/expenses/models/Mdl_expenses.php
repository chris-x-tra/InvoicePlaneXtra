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

/* 

// expense-module done by chrissie ^ x-tra-designs in 12.2024
// descriptions of fieldata     // example value
'expense_id',                   // 0			<- primary key
'expense_number',               // XTD-B-0001           // my number number in the ip program
'expense_description',         	// Netzteil schnell besorgt wegen notfall // my personal desription
'expense_status_id',            // paid, ???
'expense_category_id',          // ? <- buchhaltungskategorie for later use
'expense_supplier_id',          // 1			// for later use if there is extra supplier table
'expense_supplier_name',        // Arlt
'expense_supplier_number',	// A-RE-2734		// number on invoice from supplier
'expense_filename',             // arlt-asdf-001.jpg    // filename uploaded file of the supplier invoice
'expense_date',                 // 01.07.2024		// date on suppliere expense
'expense_due_date',             // 14.07.2024
'expense_paid_date',            // 18.07.2024
'expense_amount',               // 39.95 [EUR]
'expense_bank_book_day',        // 19.07.2024
'expense_bank_book_subject',    // Zahlung an ARLT
'expense_date_created',         // 01.07.2024   <- auto fields erstellt
'expense_date_modified'         // 19.07.2024   <- auto fields modified

// mysql commmand
create table ip_expenses (
expense_id int auto_increment primary key,
expense_number varchar(100),
expense_description varchar(255),
expense_status_id tinyint,
expense_category_id tinyint,
expense_supplier_id int,
expense_supplier_name varchar(100),
expense_supplier_number varchar(100),
expense_filename varchar(100),
expense_date date,
expense_due_date date,
expense_paid_date date,
expense_amount decimal(20,2),
expense_bank_book_day date,
expense_bank_book_subject varchar(100),
expense_date_created datetime,
expense_date_modified datetime
);

*/


#[AllowDynamicProperties]
class Mdl_Expenses extends Response_Model
{
    public $table = 'ip_expenses';
    public $primary_key = 'ip_expenses.expense_id';
    public $date_created_field = 'expense_date_created';
    public $date_modified_field = 'expense_date_modified';


    public function default_select()
    {
        $this->db->select(
            'SQL_CALC_FOUND_ROWS ' . $this->table . '.*, '
	 , false) ;
    }
    public function default_order_by()
    {
        $this->db->order_by('ip_expenses.expense_id');
    }

    public function validation_rules()
    {
	    return [
		    'expense_number' => [
		    	'field' => 'expense_number',
		    	'label' => trans('expense_number'),
		    	'rules' => 'required',
		    ],
		    'expense_description' => [
			'field' => 'expense_description',
		    	'label' => trans('expense_description'),
		    	'rules' => 'required',
		    ],
		    'expense_status_id' => [
			'field' => 'expense_status_id',
		    	'rules' => 'required',
		    ],
		    'expense_category_id' => [
			'field' => 'expense_category_id',
		    ],
		    'expense_supplier_id' => [
			'field' => 'expense_supplier_id',
		    ],
		    'expense_supplier_name' => [
			'field' => 'expense_supplier_name',
		    	'rules' => 'required',
		    ],
		    'expense_supplier_number' => [
			'field' => 'expense_supplier_number',
		    	'rules' => 'required',
		    ],
		    'expense_filename' => [
			'field' => 'expense_filename varchar',
		    ],
		    'expense_date' => [
			'field' => 'expense_date',
		    	'rules' => 'required',
		    ],
		    'expense_due_date' => [
			'field' => 'expense_due_date' 
		    ],
		    'expense_paid_date' => [
			'field' => 'expense_paid_date',
		    ],
		    'expense_amount' => [
			'field' => 'expense_amount',
		    	'rules' => 'required',
		    ],
		    'expense_bank_book_day' => [
			'field' => 'expense_bank_book_day',
		    ],
		    'expense_bank_book_subject' => [
			'field' => 'expense_bank_book_subject',
		    ],
		    'expense_date_created' => [
			'rules' => 'required',
		    ],
	    ];
    }

    /**
     * @param int $amount
     * @return mixed
     */
    public function get_latest($amount = 10)
    {
        return $this->mdl_expenses
            ->order_by('expense_id', 'DESC')
            ->limit($amount)
            ->get()
            ->result();
    }

}
