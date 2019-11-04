<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('seo_checker'))
{
	function seo_checker($item)
	{
		$result = null;
		$text = [];
		$icon = '<i class=\'fa fa-warning fa-fw\'></i>';
		
		if(array_key_exists('meta_title', $item))
		{
			$meta_title = mb_strlen($item['meta_title']);
			if($meta_title == '')
			{
				$text[] = $icon . ' Meta Title не указан!';
			} elseif($meta_title < META_TITLE_ALLOW) {
				$text[] = $icon . ' Meta Title должен содержать не менее ' . META_TITLE_ALLOW . ' символов!';
			} elseif($meta_title > META_TITLE_TOTAL) {
				$text[] = $icon . ' Meta Title должен содержать не более ' . META_TITLE_TOTAL . ' символов!';
			}
		}
		
		if(array_key_exists('meta_description', $item))
		{
			$meta_description = mb_strlen($item['meta_description']);
			if($meta_description == '')
			{
				$text[] = $icon . ' Meta Description не указан!';
			} elseif($meta_description < META_DESCRIPTION_ALLOW) {
				$text[] = $icon . ' Meta Description должен содержать не менее ' . META_DESCRIPTION_ALLOW . ' символов!';
			} elseif($meta_description > META_DESCRIPTION_TOTAL) {
				$text[] = $icon . ' Meta Description должен содержать не более ' . META_DESCRIPTION_TOTAL . ' символов!';
			}
		}
		
		if(!empty($text))
		{
			$result = '<span class="text-warning" data-toggle="tooltip" data-html="true" data-title="<div>' . implode("</div><div class='mt5'>", $text) . '</div>" data-placement="left">' . fa('warning fa-fw') . '</span>';
		}
		
		return $result;
	}
}

if ( ! function_exists('visibility'))
{
	function visibility($check)
	{
		return $check
			? '<span class="text-success" data-toggle="tooltip" title="Отображать на сайте">'.fa('eye fa-fw').'</span>'
			: '<span class="text-error" data-toggle="tooltip" title="Не отображать на сайте">'.fa('eye-slash fa-fw').'</span>';
	}
}

if ( ! function_exists('is_read'))
{
	function is_read($check)
	{
		return $check == 0
			? '<span class="text-warning" data-toggle="tooltip" title="Новая заявка">'.fa('circle').'</span>'
			: null;
	}
}

if ( ! function_exists('entries_date'))
{
	function entries_date($date)
	{
		return '<div>'.fa('calendar mr5 fa-fw text-gray') . ' ' . date('d.m.Y', strtotime($date)) . '</div>' .
			'<div>'.fa('clock-o mr5 fa-fw text-gray') . ' ' . date('H:i', strtotime($date)) . '</div>';
	}
}

if ( ! function_exists('entries_link'))
{
	function entries_link($link)
	{
		return '<div class="entries-link" title="' . $link . '">' . ($link ? fa('link fa-fw text-gray mr5') . ' ' . anchor($link, $link, ['target' => '_blank']) : null) . '</div>';
	}
}

function iconlist($params)
{
	$html = '<ul class="iconlist">';
	
	foreach($params as $item)
	{
		if(isset($item['divider']) or in_array('divider', $item))
		{
			$html .= '<li class="divider"></li>';
		} else {
			$html .= '<li><div class="item">' .
				'<div class="icon">' . (!empty($item['icon']) ? $item['icon'] : null) . '</div>' .
				'<div class="text">' . (!empty($item['text']) ? $item['text'] : null) . '</div>' .
			'</div></li>';
		}
	}
	
	
	$html .= '</ul>';
	
	return $html;
}

function iconlist_visibility($visibility)
{
	return $visibility == 1
		? ['text' => 'Отображать на сайте', 'icon' => fa('eye fa-fw text-success')]
		: ['text' => 'Не отображать на сайте', 'icon' => fa('eye-slash fa-fw text-error')];
}


# BUTTONS

/* icons */

function btn_view($path)
{
	return anchor('admin/'.$path, fa('eye'), ['class' => 'btn btn-info btn-icon', 'title' => 'Просмотр']);
}

function btn_edit($path)
{
	return anchor('admin/'.$path, fa('pencil'), ['class' => 'btn btn-success btn-icon', 'title' => 'Редактирование']);
}

function btn_delete($path)
{
	return anchor('admin/'.$path, fa('trash'), ['class' => 'btn btn-error btn-icon', 'title' => 'Удаление', 'data-entries' => 'delete']);
}

/* links */

function btn_edit_alt($path, $text = 'Редактировать', $icon = 'pencil')
{
	return anchor('admin/'.$path, fa($icon . ' mr5') . ' ' . $text, ['class' => 'btn btn-success']);
}

function btn_create($path, $text = 'Добавить запись', $icon = 'plus')
{
	return anchor('admin/'.$path, fa($icon . ' mr5') . ' ' . $text, ['class' => 'btn btn-success']);
}

function btn_back($path, $text = 'Вернуться назад', $icon = 'reply')
{
	return anchor('/admin/'.$path, fa($icon . ' mr5') . ' ' . $text, ['class' => 'btn']);
}

/* buttons */

function btn_add($text = 'Добавить', $icon = 'check')
{
	return '<button class="btn btn-success">' . fa($icon . ' mr5') . ' ' . $text . '</button>';
}

function btn_save($text = 'Сохранить', $icon = 'save')
{
	return '<button class="btn btn-success">' . fa($icon . ' mr5') . ' ' . $text . '</button>';
}

function btn_save_exit($text = 'Соxранить и выйти', $icon = 'check')
{
	return '<button class="btn btn-info" data-entryform="close">' . fa($icon . ' mr5') . ' ' . $text . '</button>';
}