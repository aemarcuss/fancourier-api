<?php

namespace Fancourier\Response;

class DeleteCourierOrder extends Generic implements ResponseInterface
{
    public function setData($datastr)
    {
		$response_json = json_decode($datastr, true);
		
		parent::setData(false);
		
		if (json_last_error() === JSON_ERROR_NONE)
			{
			if ($response_json['status'] == 'success')
				{
				parent::setData(true);
				}
			else
				{
				$this->setErrorMessage($response_json['message']);
				$this->setErrorCode(-1);
				}
			}
		else
			{
			$this->setErrorMessage($datastr);
			$this->setErrorCode(-1);
			}


        return $this;
    }
}
