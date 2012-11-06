<?php
/**
 * 
 * Управление параметрами модуля в системе
 * @author n1k
 *
 */
namespace fmake\modules\core\fmakeModule;
use fmake\modules\core\fmakeCore\fmakeCore;
class config extends fmakeCore{
	public $idField = "id_modules_config";
	public $table = "modules_configs";
}