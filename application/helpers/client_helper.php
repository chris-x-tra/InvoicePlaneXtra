<?php

if ( ! defined('BASEPATH')) {
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

/**
 * @param object $client
 * @return string
 */
function format_client($client)
{
	if(property_exists($client, 'client_title')){
		$client_title = $client->client_title === 'custom' ? '' : ucfirst($client->client_title ?? '');
	} else $client_title="";

    if ( ! empty($client->client_surname)) {
        return $client_title . ' ' . $client->client_name . ' ' . $client->client_surname;
    }

    return $client_title . ' ' . $client->client_name;
}

/**
 * @param string $gender
 * @return string
 */
function format_gender($gender)
{
    if ($gender == 0) {
        return trans('gender_male');
    }

    if ($gender == 1) {
        return trans('gender_female');
    }

    return trans('gender_other');
}
