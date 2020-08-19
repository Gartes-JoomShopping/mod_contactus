<?php 
/**
 * @package Joomly Contactus for Joomla! 2.5 - 3.x
 * @version 3.15
 * @author Artem Yegorov
 * @copyright (C) 2016- Artem Yegorov
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
if (!isset($dependencys)) {
    $dependencys = array();
}
?>
<div id="contactus-lightbox<?php if (isset($module->id)){echo $module->id;};?>" class="contactus-lightbox contactus-lightbox<?php if (isset($module->id)){echo $module->id;};?>">
	<div class="contactus-lightbox-caption" style="background-color:<?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>;">
		<div class="contactus-lightbox-cap"><h4 class="text-center"><?php if (!empty($fields->title_name)){echo $fields->title_name;}else {echo JText::_('MOD_CONTACTUS_TITLE_NAME_MODULE');};?></h4></div><div class="contactus-lightbox-closer"><i id="contactus-lightbox-close<?php if (isset($module->id)){echo $module->id;};?>" class="fas fa-times"></i></div>		
	</div>
	<div class="contactus-lightbox-body">
		<form  action="<?php echo JFactory::getURI();?>" method="post" class="reg_form" onsubmit="joomly_analytics(<?php echo $module->id;?>);return contactus_validate(this);" enctype="multipart/form-data" novalidate>
			<div>
				<?php if (isset($fields->field))
					{	
						$i = 0;
						foreach ($fields->field as $k=>$f)
						{	
							switch ($f->type){
								case "Input":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div1">
										<input type="text" placeholder="<?php echo $f->title; if ($f->required == 1){echo '*';};?>" class="contactus-fields <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?> value="<?php if (isset($data[$f->name])){echo $data[$f->name];};?>" />
									</div>
							<?php break; 
								case "Email":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div2">
										<input type="email" placeholder="<?php echo $f->title;if ($f->required == 1){echo '*';};?>" class="contactus-fields <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?> value="<?php if (isset($data[$f->name])){echo $data[$f->name];};?>" />
									</div>
							<?php break; 
							case "Phone":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div3">
										<input type="tel" id="phone" <?php if (isset($fields->mask) && strlen($fields->mask) > 0) {echo 'onkeypress="joomlyHandleMask(event, \'' . $fields->mask . '\')"';};?> placeholder="<?php echo $f->title;if ($f->required == 1){echo '*';};?>" class="contactus-fields <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" name="phone" <?php if ($f->required == 1){echo "required";}; ?> value="<?php if (isset($data[$f->name])){echo $data[$f->name];};?>" />
									</div>
							<?php break; 
								case "Textarea":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div">
										<textarea  placeholder="<?php echo $f->title;if ($f->required == 1){echo '*';};?>" class="contactus-fields contactus-textarea <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" name="values[<?php echo $f->name;?>]" cols="120" rows="6" <?php if ($f->required == 1){echo "required";}; ?>><?php if (isset($data[$f->name])){echo $data[$f->name];};?></textarea>
									</div>
							<?php break; 
								case "Date":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div">
										<input type="text" placeholder="<?php echo $f->title; if ($f->required == 1){echo '*';};?>" class="contactus-fields constructor <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" onfocus="(this.type='date')" name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?> value="<?php if (isset($data[$f->name])){echo $data[$f->name];};?>" />
									</div>	
							<?php break; 
							case "Time":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div">
										<input type="text" placeholder="<?php echo $f->title; if ($f->required == 1){echo '*';};?>" class="contactus-fields constructor <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" onfocus="(this.type='time')" name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?> value="<?php if (isset($data[$f->name])){echo $data[$f->name];};?>" />
									</div>	
							<?php break; 	
								case "Checkbox":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div checkbox-container">
										<label class="contactus-checkbox-label" ><span class="contactus-sp"><?php echo $f->title;?></span><input type="checkbox" class="contactus-fields <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" value="<?php echo JText::_('MOD_CONTACTUS_CHECKBOX_YES');?> " name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?>/></label>
									</div>		
							<?php break;
								case "Radio":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>	
									<div class="joomly-contactus-div radio-container">
											<?php foreach ($f->options as $o => $option)
											{?>
												<label class="contactus-container"><?php echo $option;?>
												  <input type="radio" class="<?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" data-row="<?php echo $o;?>" name="values[<?php echo $f->name;?>]" value="<?php echo $option;?>">
												  <span class="contactus-checkmark"></span>
												</label>	
											<?php }?>											
									</div>				
							<?php break;  
								case "Select":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>	
									<div class="joomly-contactus-div select-container">
										<select class="contactus-fields contactus-select <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>" name="values[<?php echo $f->name;?>]" <?php if ($f->required == 1){echo "required";}; ?>>
										<option <?php if ($f->required == 1){echo 'selected="selected" disabled="disabled" value=""';}; ?>><?php echo $f->title; if ($f->required == 1){echo '*';};?></option>	
										<?php foreach ($f->options as $option)
										{?>
											<option><?php echo $option;?></option>	
										<?php }?>
										</select>
									</div>
							<?php break; 
								case "Field":?>
								<div>
									<input type="text" name="values[field<?php echo $k;?>]" class="contactus-fields-const" style="display: none;"/>	
								</div>				
							<?php break; 
								case "Text":
									if ($f->dependency != "")
									{
										$temp_d = explode(":",$f->dependency);
										$dependencys[$temp_d[0].$module->id][] = array("value"=>$temp_d[1], "child" => $f->name.$module->id);
									} ?>
									<div class="joomly-contactus-div">
										<p class="joomly-p <?php echo $f->name.$module->id;?>" data-id="<?php echo $k.$module->id;?>"><?php echo $f->title;?></p>
									</div>						
							<?php break;		
							}
							$i+=1;
						 }
					}?>
				<?php if (($fields->uploader !==null ? $fields->uploader : 1)  == 1){?>
					<div class="contactus-file"  >
						<span id="file-contactus<?php if (isset($module->id)){echo $module->id;};?>" class="contactus-file" >
							<label class="contactus-file-label" id="file-label<?php if (isset($module->id)){echo $module->id;};?>"><?php echo JText::_('MOD_CONTACTUS_ADD_FILES'); ?></label>
							<label class="contactus-file" style="background-color: <?php echo ($fields->color !==null ? $fields->color : "#21ad33");?>;" for="file-input<?php if (isset($module->id )){echo $module->id;};?>"><?php echo JText::_('MOD_CONTACTUS_BROWSE'); ?></label>
							<input type="file" name="file[]" id="file-input<?php if (isset($module->id)){echo $module->id;};?>" class="contactus-file" onchange="contactus_uploader(<?php if (isset($module->id )){echo $module->id;};?>)" multiple  >			
						</span>
					</div>
				<?php }?>
				<?php if ((isset($fields->personal) ? $fields->personal : 1)  == 1){?>
					<div class="joomly-contactus-div">
						<label class="contactus-label-<?php if (isset($fields->margin)){echo $fields->margin;}; ?>"><a href="<?php if (!empty($fields->personal_link)){ echo $fields->personal_link;};?>" target="_blank"><?php echo JText::_('MOD_CONTACTUS_CONSENT_PERSONAL_DATA');?></a><input type="checkbox" class="contactus-fields joomly-contactus-checkbox" checked required></label>
					</div>	
				<?php }?>
				<?php if ((($fields->captcha !==null ? $fields->captcha : 1)  == 1) && ($fields->captcha_size !== 'invisible')){?>
					<div class="joomly-contactus-div">
						<div class="g-recaptcha" data-sitekey="<?php if (isset($fields->captcha_sitekey)){echo $fields->captcha_sitekey;}?>" data-size="<?php if (isset($fields->captcha_size)){echo $fields->captcha_size;}?>"></div>
					</div>
				<?php }?>	
			</div>
			<div>
				<button type="submit" value="save" class=" contactus-button contactus-submit" style="background-color: <?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>;" id="button-contactus-lightbox<?php if (isset($module->id)){echo $module->id;};?>"><?php if (!empty($fields->button_send)) { echo $fields->button_send;} else {echo  JText::_('MOD_CONTACTUS_SEND');};?></button>
			</div>
			<div>
				<input type="hidden" name="option" value="com_contactus" />
				<input type="hidden" name="layout" value="lightbox" />
				<input type="hidden" name="module_id" value="<?php echo $module->id;?>" />	
				<input type="hidden" name="module_title" value="<?php echo $module->title;?>" />	
				<input type="hidden" name="module_token" data-sitekey="<?php if (isset($fields->captcha_sitekey)){echo $fields->captcha_sitekey;}?>" value="" />	
				<input type="hidden" name="module_hash" value="<?php echo JUserHelper::getCryptedPassword(JFactory::getURI()->toString());?>" />
				<input type="hidden" name="page" value="<?php echo urldecode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>" />
				<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
				<input type="hidden" name="task" value="add.save" />
				<?php echo JHtml::_('form.token'); ?>
			</div>	
		</form>
	</div> 
<script src="https://pro-spec.ru/plugins/system/maskedinput/assets/jquery.maskedinput.min.js" type="text/javascript"></script>
    

	<script type="text/javascript">
jQuery(document).ready(function() { if (jQuery("#modal-messages").length) modalMessages("1", "both", "", "fast"); });
	jQuery(function($){
		$.mask.definitions['*'] = '[0-9]';
		$('#mobil_phone, #d_mobil_phone').mask('+7(***) ***-**-**',{placeholder:'x'});
	});
	jQuery(function($){
		$('#oneStepCheckoutForm').delegate('[name="country"],[name="d_country"],[name="delivery_adress"]', 'change' ,function(e){
			oneStepCheckout.updateForm(2);
		});
	});
	var acymailing = Array();
				acymailing['NAMECAPTION'] = 'Введите Ваше имя';
				acymailing['NAME_MISSING'] = 'Пожалуйста, введите свое имя';
				acymailing['EMAILCAPTION'] = 'Введите Ваш email';
				acymailing['VALID_EMAIL'] = 'Пожалуйста, введите корректный эл. адрес';
				acymailing['ACCEPT_TERMS'] = 'Пожалуйста, ознакомьтесь с \'Условиями и положениями\'';
				acymailing['CAPTCHA_MISSING'] = 'Пожалуйста, введите защитный код, отображаемый на картинке';
				acymailing['NO_LIST_SELECTED'] = 'Пожалуйста, выберите рассылки, на которые вы хотите подписаться';
acymailing['reqFieldsformAcymailing62391'] = Array('html');
		acymailing['validFieldsformAcymailing62391'] = Array('Пожалуйста, введите значение для поля Получить');
jQuery(function($) {
			 $('.hasTip').each(function() {
				var title = $(this).attr('title');
				if (title) {
					var parts = title.split('::', 2);
					var mtelement = document.id(this);
					mtelement.store('tip:title', parts[0]);
					mtelement.store('tip:text', parts[1]);
				}
			});
			var JTooltips = new Tips($('.hasTip').get(), {"maxTitleChars": 50,"fixed": false});
		});
acymailing['excludeValuesformAcymailing62391'] = Array();
acymailing['excludeValuesformAcymailing62391']['email'] = 'Введите Ваш email';
	var mod_ajax_data2;
	mod_ajax_data2={
	"data_controller":"checkout"
	};
if (typeof jfbcJQuery == "undefined") jfbcJQuery = jQuery;

<?php
/*window.addEvent((window.webkit) ? 'load' : 'domready', function() {
    window.rokajaxsearch = new RokAjaxSearch({
        'results': 'Результаты поиска',
					'close': '',
					'websearch': 1,
					'blogsearch': 0,
					'imagesearch': 0,
					'videosearch': 0,
					'imagesize': 'LARGE',
					'safesearch': 'STRICT',
					'search': 'Поиск по сайту...',
					'readmore': 'Подробнее...',
					'noresults': 'Во вашему запросу ничего не найдено',
					'advsearch': 'Advanced search',
					'page': 'Page',
					'page_of': 'of',
					'searchlink': 'https://pro-spec.ru/index.php?option=com_search&amp;view=search&amp;tmpl=component',
					'advsearchlink': 'https://pro-spec.ru/index.php?option=com_search&amp;view=search',
					'uribase': 'https://pro-spec.ru/',
					'limit': '50',
					'perpage': '10',
					'ordering': 'popular',
					'phrase': 'exact',
					'hidedivs': '',
					'includelink': 1,
					'viewall': 'Смотреть все результаты поиска',
					'estimated': 'estimated',
					'showestimated': 1,
					'showpagination': 1,
					'showcategory': 0,
					'showreadmore': 1,
					'showdescription': 1
				});
			});*/

?>

		jQuery(document).ready(function(){
			jQuery("input[name *= 'phone']").mask("+7 (999) 999-99-99"); 
                        jQuery("input[name *= 'fax']").mask("+7 (999) 999-99-99"); 
                        jQuery("input[name *= 'tel']").mask("+7 (999) 999-99-99"); 
		});
	</script>	
</div>	
<?php
	if (($fields->lightbox_element !==null ? $fields->lightbox_element : 1)  > 0){?>
	<div>
		<button class="<?php if ($fields->lightbox_element == 2){echo "sliding ".$class;};?> contactus-<?php if (isset($fields->margin)){echo $fields->margin;}; ?> contactus<?php if (isset($module->id)){echo "-".$module->id;};?> contactus-button"  style="background-color: <?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>; <?php echo $button_align ;?>" id="button-contactus-lightbox-form<?php if (isset($module->id)){echo $module->id;};?>"><?php if (!empty($fields->lightbox_button_caption)) { echo $fields->lightbox_button_caption;} else {echo  JText::_('MOD_CONTACTUS_WRIGHT_TO_US');};?></button>
	</div>
<?php } else if (($fields->lightbox_element !==null ? $fields->lightbox_element : 1) == -1){ ?>
	<div id="button-contactus-lightbox-form<?php if (isset($module->id)){echo $module->id;};?>" class="contactus-button-toggle <?php echo $class;?>" onclick="return false;" style="<?php echo $button_align ;?>"><div class="contactus-button circlephone" style="background-color: <?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>; transform-origin: center;"></div><div class="contactus-button circle-fill" style="background-color: <?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>; transform-origin: center;"></div><div class="contactus-button img-circle" style="background-color: <?php echo (isset($fields->color) ? $fields->color : "#21ad33");?>; transform-origin: center;text-align: center;"><div class="contactus<?php if (isset($module->id)){echo "-".$module->id;};?> contactus-button <?php echo (isset($fields->toggle_button) && $fields->toggle_button == 'envelope' ? 'far fa-envelope' : 'fas fa-phone');?> fa-3x img-circleblock" style="transform-origin: center;"></div></div></div>
<?php }?>	
<div class="contactus-alert" id="contactus-sending-alert<?php if (isset($module->id)){echo $module->id;};?>">
	<div class="contactus-lightbox-caption" style="background-color:<?php echo $alert_message_color;?>;">
		<div class="contactus-lightbox-cap"><h4 class="contactus-lightbox-text-center"><?php if (isset($alert_headline_text)){echo $alert_headline_text;};?></h4></div><div class="contactus-lightbox-closer"><i id="contactus-lightbox-sending-alert-close<?php if (isset($module->id)){echo $module->id;};?>" class="fas fa-times"></i></div>
	</div>
	<div class="contactus-alert-body">
		<p class="contactus-lightbox-text-center"><?php if (isset($alert_message_text)){echo $alert_message_text;};?></p>
	</div>
</div>
<script type="text/javascript">
var dependencys = <?php echo json_encode($dependencys);?>;
set_dependencys(dependencys);
var contactus_module_id = <?php if (isset($module->id)){echo $module->id;};?>,
files_added = "<?php echo JText::_('MOD_CONTACTUS_FILES_ADDED');?>",
type_field = "<?php echo JText::_('MOD_CONTACTUS_TYPE_FIELD');?>",
styles = "<?php echo $styles;?>",
captcha_error = "<?php echo JText::_('MOD_CONTACTUS_CAPTCHA_ERROR');?>",
defense_error = "<?php echo JText::_('MOD_CONTACTUS_DEFENSE_ERROR');?>",
filesize_error = "<?php echo JText::_('MOD_CONTACTUS_FILESIZE_ERROR');?>";
var uploads_counter = uploads_counter || [];
uploads_counter[contactus_module_id] = 0;
var contactus_params = contactus_params || [];
contactus_params[contactus_module_id] = <?php echo json_encode($contactus_params);?>;
var popup = document.getElementById("contactus-lightbox" + contactus_module_id);
document.body.appendChild(popup);
contactus_lightbox();
</script>