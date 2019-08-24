<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Query
 * Обертка над стандартной библиотекой работы с БД
 * @property CI_DB_query_builder $db
 */
class Query {

	private $CI;
	private $db;

	/**
	 * Query constructor.
	 * @param array $config
	 */
	public function __construct($config = array())
	{
		$this->CI =& get_instance();
		$this->db = $this->CI->db;
	}

	/**
	 * Возвращает все строки из таблицы по заданным условиям
	 * @param string $table Таблица из которой берем данные
	 * @param null|int $limit Лимит строк на запрос
	 * @param null|int $offset Смещение
	 * @param null|string $order Сортировка
	 * @param array $params Параметры для выборки(Where)
	 * @return array
	 */
	public function items($table, $limit = NULL, $offset = NULL, $order = NULL, $params = array())
	{
		if(!empty($params)) $this->params($params);

		if($order) $this->order($order);

		$items = $this->db->get($table, $limit, $offset);
		return $items->result_array();
	}

	/**
	 * Возвращает 1 строку подходящую под параметры
	 * @param string $table Таблица из которой берем данные
	 * @param array $params Параметры для выборки(Where)
	 * @return mixed
	 */
	public function item($table, $field = null, $value = null)
	{
		if(!is_null($field))
		{
			if(!is_array($field)) $params[$field] = $value;
			else $params = $field;
		}
		
		if(!empty($params)) $this->params($params);

		$item = $this->db->get($table);
		return $item->row_array();
	}

	/**
	 * Возвращает количество строк, подходящих под заданные условия
	 * @param string $table Таблица из которой берем данные
	 * @param array $params Параметры для выборки(Where)
	 * @return int
	 */
	public function items_count($table, $params = array())
	{
		if(!empty($params)) $this->params($params);
		return $this->db->count_all_results($table);
	}

	/**
	 * Вставляет в таблицу указанные данные
	 * @param string $table Таблица из которой берем данные
	 * @param array $insert Данные для вставки
	 * @return bool|string
	 */
	public function insert($table, $insert = array())
	{
		if($this->db->insert($table, $insert)) return false;
		else return $this->_server_error();
	}

	/**
	 * Возвращает id последней вставленной строки
	 * @return int
	 */
	public function insert_id()
	{
		return $this->db->insert_id();
	}

	/**
	 * Обнавляет строки в указанной таблицы, выбранные по параметрам
	 * @param string $table Таблица из которой берем данные
	 * @param array $insert Данные для обновления
	 * @param array $params Параметры для выборки(Where)
	 * @return bool|string
	 */
	public function update($table, $insert = array(), $params = array())
	{
		if(!empty($params)) $this->params($params);

		if($this->db->update($table, $insert)) return false;
		else return $this->_server_error();
	}

	/**
	 * Удаляет строки, попадающие под условия в указанной таблице
	 * @param string $table Таблица из которой берем данные
	 * @param array $params Параметры для выборки(Where)
	 * @return bool|string
	 */
	public function delete($table, $params = array())
	{
		if(!empty($params)) $this->params($params);

		if($this->db->delete($table)) return false;
		else return $this->_server_error();
	}

	/* HELPERS */

	/**
	 * Генерирует часть $this->db->from()
	 * @param string $table таблица из которой осуществляется выборка
	 */
	public function table($table)
	{
		$this->db->from($table);
	}

	/**
	 * Гененирует часть $this->db->select()
	 * @param string $select
	 */
	public function select($select)
	{
		$this->db->select($select);
	}

	/**
	 * генерирует часть where
	 * @param array $params
	 */
	public function params($params = array())
	{
		foreach($params as $k => $v) $this->db->where($k, $v);
	}

	/**
	 * Генерирует часть order_by. Разбирает строку сортировки
	 * @param string|null $order
	 */
	public function order($order = NULL)
	{
		if(!is_null($order)) {
			$order = explode('//', $order);
			$order_by = array();
			foreach ($order as $str) $order_by[] = explode('|', $str);

			foreach ($order_by as $item) {
				if ($item[0] != '' and $item[1] != '') $this->db->order_by($item[0], $item[1]);
			}
		}
	}

	/**
	 * Копирует строку в таблице и заменяет значения данными из $update с указанными параметрами. Все указанные параметры удаляются из результирующего обьекта, если не пересекаются с массивом $update
	 * @param string $table Таблица, в которой будет происходить клонирование.
	 * @param array $params Параметры для выборки
	 * @param array $update Данные для замены в результирующем объекте
	 * @return array|string id Новой строки либо ошибка
	 */
	public function clone_string($table, $params = array(), $update = array()){
		$item = $this->item($table, $params);
		foreach ($params as $key=>$value)
			unset($item[$key]);

		if(isset($item['idItem']))
			unset($item['idItem']);

		foreach ($update as $key=>$value){
			if(isset($item[$key]) || array_key_exists($key, $params))
				$item[$key] = $value;
		}

		if(!$this->insert($table, $item)) return $this->insert_id();
		else return $this->_server_error();
	}

	/**
	 * Копирует все строки в таблице и заменяет значения данными из $update с указанными параметрами. Все указанные параметры удаляются из результирующего обьекта, если не пересекаются с массивом $update
	 * @param string $table Таблица, в которой будет происходить клонирование.
	 * @param array $params Параметры для выборки
	 * @param array $update Данные для замены в результирующем объекте
	 * @return array|string Массив id Новых строк, либо ошибка
	 */
	public function clone_all_strings($table, $params = array(), $update = array()){
		$items = $this->items($table, NULL, NULL, NULL, $params);
		$result = array();
		foreach ($items as $item){
			foreach ($params as $key=>$value)
				unset($item[$key]);

			if(isset($item['idItem']))
				unset($item['idItem']);

			foreach ($update as $key=>$value){
				if(isset($item[$key]) || array_key_exists($key, $params))
					$item[$key] = $value;
			}

			if(!$this->insert($table, $item))
				$result[] = $this->insert_id();
			else return $this->_server_error();
		}
		return $result;
	}

	/**
	 * Возвращает ошибку сервера
	 * @return string
	 */
	function _server_error()
	{
		$CI =& get_instance();
		return fa('times mr5').' Ошибка сервера! Обратитесь к разработчику <span class="medium underline">'.$CI->config->config['cms_developer_email'].'</span>';
	}
}