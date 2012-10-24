<?php

class dcFallSeason
{
	static public function showURLType($attr)
	{
		$core = &$GLOBALS['core'];
		$mode = $core->url->type;
		return '<?php echo "mode='.$mode.' url='.$_SERVER['REQUEST_URI'].' - blog='.html::stripHostURL($core->blog->url).'"; ?>';
	}

	static public function isCurrentPageItem($attr)
	{
		$current = false;

		$core = &$GLOBALS['core'];
		$mode = $core->url->type;
		
		if (isset($attr['menu'])) {
			$menu = (string) $attr['menu'];
		} else {
			$menu = '';
		}
		if (isset($attr['item'])) {
			$item = (string) $attr['item'];
		} else {
			$item = '';
		}

		switch ($menu)
		{
			case 'user-defined':
				if ($item != '') {
					// Compare item with current URL
					if ($_SERVER['REQUEST_URI'] == html::stripHostURL($core->blog->url).$item) {
						$current = true;
					}
				}
				break;

			default:
				if ($menu == $mode) {
					$current = true;
				}
				break;
		}

		return (string) ($current ? ' current_page_item' : '');
	}

	static public function flagFirstPage($attr)
	{
		if (isset($attr['true'])) {
			$flag = 'true';
		} else {
			$flag = 'false';
		}
		return '<?php $dc_fallSeason_flag_first_page = '.$flag.'; ?>';
	}

	static public function flagFirstPageIf($attr,$content)
	{
		$if = '';

		if (isset($attr['true'])) {
			$sign = (boolean) $attr['true'] ? '' : '!';
			$if = $sign.'$dc_fallSeason_flag_first_page';
		}

		if ($if != '') {
			return '<?php if('.$if.') : ?>'.$content.'<?php endif; ?>';
		} else {
			return $content;
		}
	}
	
	static public function flagFlashPost($attr)
	{
		if (isset($attr['true'])) {
			$flag = 'true';
		} else {
			$flag = 'false';
		}
		return '<?php $dc_fall_season_flag_flash_post = '.$flag.'; ?>';
	}

	static public function flagFlashPostIf($attr,$content)
	{
		$if = '';

		if (isset($attr['true'])) {
			$sign = (boolean) $attr['true'] ? '' : '!';
			$if = $sign.'$dc_fall_season_flag_flash_post';
		}

		if ($if != '') {
			return '<?php if('.$if.') : ?>'.$content.'<?php endif; ?>';
		} else {
			return $content;
		}
	}
	
	static public function isMenuFreshyEnabled($attr,$content)
	{
		$core = &$GLOBALS['core'];
		
		$if = '';
		if (isset($attr['true'])) {
			$sign = (boolean) $attr['true'] ? '' : '!';
			$cond = $core->plugins->moduleExists('menuFreshy') ? 1 : 0;
			if ((boolean) $cond) {
				$cond = isset($core->plugins->getDisabledModules['menuFreshy']) ? 0 : 1;
			}
			$if = $sign.'('.$cond.')';
		}

		if ($if != '') {
			return '<?php if('.$if.') : ?>'.$content.'<?php endif; ?>';
		} else {
			return $content;
		}
	}
	
}

// Add Flag management to the template scheme

$core->tpl->addValue('FlagFirstPage',array('dcFallSeason','flagFirstPage'));
$core->tpl->addBlock('FlagFirstPageIf',array('dcFallSeason','flagFirstPageIf'));
$core->tpl->addValue('FlagFlashPost',array('dcFallSeason','flagFlashPost'));
$core->tpl->addBlock('FlagFlashPostIf',array('dcFallSeason','flagFlashPostIf'));

// Add Menu management to the template scheme

$core->tpl->addValue('showURLType',array('dcFallSeason','showURLType'));
$core->tpl->addValue('isCurrentPageItem',array('dcFallSeason','isCurrentPageItem'));
$core->tpl->addBlock('isMenuFreshyEnabled',array('dcFallSeason','isMenuFreshyEnabled'))
?>