<?php

class pluginIsso extends Plugin {

	private $enable;

	public function init()
	{
		$this->dbFields = array(
			'enablePages'=>0,
			'enableDefaultHomePage'=>1,
			'pathData'=>'',
			'pathSrc'=>'',
			'pathCss'=>'',
			'dataLang'=>'',
			'dataReplySelf'=>'false',
			'dataRequireAuthor'=>'true',
			'dataRequireEmail'=>'false',
			'dataCommentsTop'=>'10',
			'dataCommentsNested'=>'5',
			'dataRevealClick'=>'5',
			'dataAvatar'=>'true',
			'dataAvatarBg'=>'',
			'dataAvatarFg'=>'',
			'dataVote'=>'true'
		);
	}

	public function form()
	{
		global $L;

		$html = '<div style="margin: 2em 0;">';
		$html .= '<i>'.$L->get('intro-header').'</i>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<input name="enablePages" type="hidden" value="0">';
		$html .= '<input name="enablePages" id="jsenablePages" type="checkbox" value="1" '.($this->getValue('enablePages')?'checked':'').'>';
		$html .= '<label class="forCheckbox" for="jsenablePages">'.$L->get('enable-on-page').'</label>';
		$html .= '</div>';

		$html = '<div style="margin: 2em 0;">';
		$html .= '<i>'.$L->get('intro-header').'</i>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<input name="enablePages" type="hidden" value="0">';
		$html .= '<input name="enablePages" id="jsenablePages" type="checkbox" value="1" '.($this->getValue('enablePages')?'checked':'').'>';
		$html .= '<label class="forCheckbox" for="jsenablePages">'.$L->get('enable-on-page').'</label>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<input name="enableDefaultHomePage" type="hidden" value="0">';
		$html .= '<input name="enableDefaultHomePage" id="jsenableDefaultHomePage" type="checkbox" value="1" '.($this->getValue('enableDefaultHomePage')?'checked':'').'>';
		$html .= '<label class="forCheckbox" for="jsenableDefaultHomePage">'.$L->get('enable-on-default-page').'</label>';
		$html .= '</div>';

		$html .= '<p><h3>'.$L->get('required-settings').':</h3></p>';

		$html .= '<div>';
		$html .= '<label>data-isso: '.$L->get('path-to-data').'</label>';
		$html .= '<input name="pathData" id="jsdata" type="text" value="'.$this->getValue('pathData').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>src: '.$L->get('path-to-script').'</label>';
		$html .= '<input name="pathSrc" id="jssource" type="text" value="'.$this->getValue('pathSrc').'">';
		$html .= '</div>';


		$html .= '<p><h3>'.$L->get('optional-settings').':</h3></p>';

		$html .= '<div>';
		$html .= '<label>data-isso-reply-to-self: ['.$L->get('true').'/'.$L->get('false').']</label>';
		$html .= '<input name="dataReplySelf" id="jsdatareplyself_1" type="radio" value="true" ';
		$html .= (($this->getValue('dataReplySelf') == 'true')?'checked':'').'> '.$L->get('true').'</br>';
		$html .= '<input name="dataReplySelf" id="jsdatareplyself_2" type="radio" value="false" ';
		$html .= (($this->getValue('dataReplySelf') == 'false')?'checked':'').'> '.$L->get('false').'</br>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-require-author: ['.$L->get('true').'/'.$L->get('false').']</label>';
		$html .= '<input name="dataRequireAuthor" id="jsdatarequireauthor_1" type="radio" value="true" ';
		$html .= (($this->getValue('dataRequireAuthor') == 'true')?'checked':'').'> '.$L->get('true').'</br>';
		$html .= '<input name="dataRequireAuthor" id="jsdatarequireauthor_2" type="radio" value="false" ';
		$html .= (($this->getValue('dataRequireAuthor') == 'false')?'checked':'').'> '.$L->get('false').'</br>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-require-email: ['.$L->get('true').'/'.$L->get('false').']</label>';
		$html .= '<input name="dataRequireEmail" id="jsdatarequireemail_1" type="radio" value="true" ';
		$html .= (($this->getValue('dataRequireEmail') == 'true')?'checked':'').'> '.$L->get('true').'</br>';
		$html .= '<input name="dataRequireEmail" id="jsdatarequireemail_2" type="radio" value="false" ';
		$html .= (($this->getValue('dataRequireEmail') == 'false')?'checked':'').'> '.$L->get('false').'</br>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-vote: ['.$L->get('true').'/'.$L->get('false').']</label>';
		$html .= '<input name="dataVote" id="jsdatavote_1" type="radio" value="true" ';
		$html .= (($this->getValue('dataVote') == 'true')?'checked':'').'> '.$L->get('true').'</br>';
		$html .= '<input name="dataVote" id="jsdatavote_2" type="radio" value="false" ';
		$html .= (($this->getValue('dataVote') == 'false')?'checked':'').'> '.$L->get('false').'</br>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-avatar: ['.$L->get('true').'/'.$L->get('false').']</label>';
		$html .= '<input name="dataAvatar" id="jsdataavatar_1" type="radio" value="true" ';
		$html .= (($this->getValue('dataAvatar') == 'true')?'checked':'').'> '.$L->get('true').'</br>';
		$html .= '<input name="dataAvatar" id="jsdataavatar_2" type="radio" value="false" ';
		$html .= (($this->getValue('dataAvatar') == 'false')?'checked':'').'> '.$L->get('false').'</br>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-avatar-fg: ['.$L->get('color-code').']</label>';
		$html .= '<input name="dataAvatarFg" id="jsdataavatarfg" type="text" value="'.$this->getValue('dataAvatarFg').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-avatar-bg: ['.$L->get('color-code').']</label>';
		$html .= '<input name="dataAvatarBg" id="jsdataavatarbg" type="text" value="'.$this->getValue('dataAvatarBg').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-lang: ['.$L->get('language-code').']</label>';
		$html .= '<input name="dataLang" id="jsdatalang" type="text" value="'.$this->getValue('dataLang').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-max-comments-top: ['.$L->get('number').']</label>';
		$html .= '<input name="dataCommentsTop" id="jsdatacommentstop" type="number" min="0" value="'.$this->getValue('dataCommentsTop').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-max-comments-nested: ['.$L->get('number').']</label>';
		$html .= '<input name="dataCommentsNested" id="jsdatacommentsnested" type="number" min="0" value="'.$this->getValue('dataCommentsNested').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>data-isso-reveal-on-click: ['.$L->get('number').']</label>';
		$html .= '<input name="dataRevealClick" id="jsdatarevealclick" type="number" min="0" value="'.$this->getValue('dataRevealClick').'">';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('path-to-css').'</label>';
		$html .= '<input name="pathCss" id="jsdatacss" type="text" value="'.$this->getValue('pathCss').'">';
		$html .= '</div>';

		$html .= '<br>';
		$html .= '<br>';

		return $html;
	}

	public function pageEnd()
	{
		global $url;
		global $L;

		// Bludit check not-found page after the plugin method construct.
		// It's necesary check here the page not-found.

		if( $this->enable && !$Url->notFound()) {
			$html = '<section id="isso-thread"></section>';
			$html .= '<noscript>'.$L->get('no-script-msg');
			$html .= '</noscript>';
			return $html;
		}

		return false;
	}

	public function siteHead()
	{
		if( $this->enable ) {
			$html = '<style>#isso-thread { margin: 20px 0 !important }</style>';

			if( !Text::isEmpty($this->getValue('pathCss')) ) {
			    $html .= '<link rel="stylesheet" href="'.trim($this->getValue('pathCss')).'">';
			}

			$html .= '<script ';
			$html .= 'data-isso="'.$this->getValue('pathData').'" ';
			$html .= 'src="'.$this->getValue('pathSrc').'" ';

			if( $this->getValue('dataReplySelf') == 'true' || $this->getValue('dataReplySelf') == 'false' ) {
			    $html .= 'data-isso-reply-to-self="'.$this->getValue('dataReplySelf').'" ';
			}

			if( $this->getValue('dataRequireAuthor') == 'true' || $this->getValue('dataRequireAuthor') == 'false' ) {
			    $html .= 'data-isso-require-author="'.$this->getValue('dataRequireAuthor').'" ';
			}

			if( $this->getValue('dataRequireEmail') == 'true' || $this->getValue('dataRequireEmail') == 'false' ) {
			    $html .= 'data-isso-require-email="'.$this->getValue('dataRequireEmail').'" ';
			}

			if( $this->getValue('dataVote') == 'true' || $this->getValue('dataVote') == 'false' ) {
			    $html .= 'data-isso-vote="'.$this->getValue('dataVote').'" ';
			}

			if( $this->getValue('dataAvatar') == 'true' || $this->getValue('dataAvatar') == 'false' ) {
			    $html .= 'data-isso-avatar="'.$this->getValue('dataAvatar').'" ';
			}

			if( !Text::isEmpty($this->getValue('dataAvatarFg')) ) {
			    $html .= 'data-isso-avatar-fg="'.trim($this->getValue('dataAvatarFg')).'" ';
			}

			if( !Text::isEmpty($this->getValue('dataAvatarBg')) ) {
			    $html .= 'data-isso-avatar-bg="'.trim($this->getValue('dataAvatarBg')).'" ';
			}

			if( !Text::isEmpty($this->getValue('dataLang')) ) {
			    $html .= 'data-isso-lang="'.trim($this->getValue('dataLang')).'" ';
			}

			if( Valid::int( $this->getValue('dataCommentsTop') ) ) {
			    $html .= 'data-isso-max-comments-top="'.$this->getValue('dataCommentsTop').'" ';
			}

			if( Valid::int( $this->getValue('dataCommentsNested') ) ) {
			    $html .= 'data-isso-max-comments-nested="'.$this->getValue('dataCommentsNested').'" ';
			}

			if( Valid::int( $this->getValue('dataRevealClick') ) ) {
			    $html .= 'data-isso-reveal-on-click="'.$this->getValue('dataRevealClick').'" ';
			}

			if( !Text::isEmpty($this->getValue('pathCss')) ) {
			    $html .= 'data-isso-css="false" ';
			} else {
			    $html .= 'data-isso-css="true" ';
			}

			$html .= '></script>';

			return $html;
		}

		return false;
	}
}
