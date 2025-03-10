<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Returns a printable pagination
 *
 * @param $base_url
 * @param $model
 * @return string
 */
function pager($base_url, $model)
{
    // sort asc desc by chrissie
    $sort = 'id';
    $order = 'asc';
    if (isset($_GET['sort'])) $sort = $_GET['sort'];
    if (isset($_GET['order'])) $order = $_GET['order'];

    $CI = &get_instance();

    $pager = '<div class="model-pager btn-group btn-group-sm">';

    if (($previous_page = $CI->$model->previous_offset) >= 0) {
        $pager .= '<a class="btn btn-default" href="' . $base_url . '/0?sort='.$sort.'&order='.$order.'" title="' . trans('first') . '"><i class="fa fa-fast-backward no-margin"></i></a>';
        $pager .= '<a class="btn btn-default" href="' . $base_url . '/' . $CI->$model->previous_offset . '?sort='.$sort.'&order='.$order.'" title="' . trans('prev') . '"><i class="fa fa-backward no-margin"></i></a>';
    } else {
        $pager .= '<a class="btn btn-default disabled" href="#" title="' . trans('first') . '"><i class="fa fa-fast-backward no-margin"></i></a>';
        $pager .= '<a class="btn btn-default disabled" href="#" title="' . trans('prev') . '"><i class="fa fa-backward no-margin"></i></a>';
    }

    if (($next_page = $CI->$model->next_offset) <= $CI->$model->last_offset) {
        $pager .= '<a class="btn btn-default" href="' . $base_url . '/' . $CI->$model->next_offset . '?sort='.$sort.'&order='.$order.'" title="' . trans('next') . '"><i class="fa fa-forward no-margin"></i></a>';
        $pager .= '<a class="btn btn-default" href="' . $base_url . '/' . $CI->$model->last_offset . '?sort='.$sort.'&order='.$order.'" title="' . trans('last') . '"><i class="fa fa-fast-forward no-margin"></i></a>';
    } else {
        $pager .= '<a class="btn btn-default disabled" href="#" title="' . trans('next') . '"><i class="fa fa-forward no-margin"></i></a>';
        $pager .= '<a class="btn btn-default disabled" href="#" title="' . trans('last') . '"><i class="fa fa-fast-forward no-margin"></i></a>';
    }

    $pager .= '</div>';

    return $pager;
}
