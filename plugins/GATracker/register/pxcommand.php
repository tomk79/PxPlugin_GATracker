<?php
$this->load_px_class('/bases/pxcommand.php');

/**
 * PX Plugin "GATracker"
 */
class pxplugin_GATracker_register_pxcommand extends px_bases_pxcommand{

	private $command;

	/**
	 * コンストラクタ
	 * @param $command = PXコマンド配列
	 * @param $px = PxFWコアオブジェクト
	 */
	public function __construct( $command , $px ){
		parent::__construct( $command , $px );
		$this->command = $this->get_command();
		$this->start();
	}

	/**
	 * 処理の開始
	 */
	private function start(){
		// if( $this->command[2] == 'aaa' ){
		// 	return $this->page_aaa();
		// }elseif( $this->command[2] == 'bbb' ){
		// 	return $this->page_bbb();
		// }
		return $this->page_homepage();
	}

	/**
	 * ホームページを表示する。
	 */
	private function page_homepage(){

		$src = '';
		$src .= '<p>GATracker プラグインの開発中です。</p>'."\n";

		// $this->set_title( 'GATracker' );//タイトルをセットする

		print $this->html_template($src);
		exit;
	}



	/**
	 * コンテンツ内へのリンク先を調整する。
	 */
	private function href( $linkto = null ){
		if(is_null($linkto)){
			return '?PX='.implode('.',$this->command);
		}
		if($linkto == ':'){
			return '?PX=plugins.GATracker';
		}
		$rtn = preg_replace('/^\:/','?PX=plugins.GATracker.',$linkto);

		$rtn = $this->px->theme()->href( $rtn );
		return $rtn;
	}

	/**
	 * コンテンツ内へのリンクを生成する。
	 */
	private function mk_link( $linkto , $options = array() ){
		if( !strlen($options['label']) ){
			if( $this->local_sitemap[$linkto] ){
				$options['label'] = $this->local_sitemap[$linkto]['title'];
			}
		}
		$rtn = $this->href($linkto);

		$rtn = $this->px->theme()->mk_link( $rtn , $options );
		return $rtn;
	}

}

?>
