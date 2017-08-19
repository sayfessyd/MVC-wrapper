<script type="text/javascript">	
$(<?= "'a.{$this->variables['key']}'"; ?>).click(function(){
		$(<?= "'div.{$this->variables['key']}'"; ?>).css('display', 'none');
});
</script>
<div class="ui-popup-container ui-popup-active" id="myPopup-popup" tabindex="0" style="top: 52px; left: 12px;">
<div data-role="popup" id="Popup" class=<?= '"ui-popup ui-body-inherit ui-overlay-shadow ui-corner-all '.$this->variables['key'].'"'; ?>>
	<a class=<?= '"ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-left '.$this->variables['key'].'"'; ?>></a>
	<H3>Level: <?= $this->variables['level']; ?></H3>
	<div class="ui-content" style="color: red">
		<p><?= $this->variables['description']; ?></p>
		<span><?= $this->variables['script'].' | '.$this->variables['line']; ?></span>
		<p><?= $this->variables['message']; ?></p>
	</div>
</div>

