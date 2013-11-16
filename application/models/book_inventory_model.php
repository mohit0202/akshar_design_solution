<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class book_inventory_model extends CI_Model {

	public function getDetailsByBranch($branchId) {
		$this -> db -> where('branchId', $branchId);
		return $this -> db -> get('inventory_inward') -> result();
	}

	public function getDetailsByInventory($branchId, $inventoryInwardId) {
		$this -> db -> where('branchId', $branchId);
		$this -> db -> where('inventoryInwardId', $inventoryInwardId);
		return $this -> db -> get('inventory_inward') -> result();
	}

	public function addinventory($data) {
		if (isset($data)) {
			return $this -> db -> insert('inventory_inward', $data);
		}
		return false;
	}

	public function updateinventory($data, $inventoryInwardId) {
		if (isset($data)) {
			$this -> db -> where('inventoryInwardId', $inventoryInwardId);
			return $this -> db -> update('inventory_inward', $data);
		}
		return false;
	}

	public function deleteInventory($inventoryInwardId) {
		if (isset($inventoryInwardId)) {
			$this -> db -> where('inventoryInwardId', $inventoryInwardId);
			$this -> db -> delete('inventory_inward');
			return false;
		}
		return true;
	}

}
?>