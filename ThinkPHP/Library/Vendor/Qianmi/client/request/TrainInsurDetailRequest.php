<?php
/**
 * API: qianmi.elife.train.insur.detail request
 * 
 * @author auto create
 * @since 1.0
 */
class TrainInsurDetailRequest
{
	private $apiParas = array();

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.train.insur.detail";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
